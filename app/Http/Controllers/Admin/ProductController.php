<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = array();
        $data['results'] = Product::paginate(10);
        return view('dashboard.pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array();
        $data['categories'] = Category::get();


        return view('dashboard.pages.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        d($request);

        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'featimg' =>  'mimes:jpeg,bmp,png,gif,svg|max:2048',
            'status' => 'required|in:0,1'

        ]);


        $data = new Product;
        $data->title = $request->input('title');
        $data->status = $request->input('status');
        $data->description = $request->input('description');

        if ($request->hasFile('featimg')) {
            if (!empty($request->file('featimg'))) {

                $nm = $data->featimg;
                $image_path = "assets/media/products/";
                $imagethumb_paths = "assets/media/products/thumbnails/";

                $imgarrs = array();
                $imgarrs = [$image_path, $imagethumb_paths];

                foreach ($imgarrs as $iarr) {
                    if (File::exists(public_path("/" . $iarr . $nm))) {
                        File::delete(public_path("/" . $iarr . $nm));
                    }
                }

                $file = $request->file('featimg');
                $fileName = substr(md5(microtime()), rand(0, 26), 4) . "_" . $file->getClientOriginalName();

                $img = Image::make($file->getRealPath());
                //  dd($img->width(),$img->height());
                if ($img->width() > 100 || $img->height() > 100) {

                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($imagethumb_paths . $fileName);
                } else {
                    $img->save($imagethumb_paths . $fileName);
                }

                //$request->file('img')->move($image_path, $fileName);
                $request->file('featimg')->move($image_path, $fileName);


                $data->featimg = $fileName;
            }
        }
        $data->status = 1;



        if ($request->input('slug') && $request->input('slug') != "") {
            $this->validate($request, [
                'slug' => 'nullable|alpha_dash|unique:products,slug',
            ]);


            $data->slug = $data->setSlugAttribute($request->input('slug'));
        } else {
            $data->slug = $data->setSlugAttribute($request->title);
        }

        $data->save();

        $categories = $request->categories;
        if ($categories != null) {
            foreach ($categories as $cat) {


                $compdatas['product_id'] = $data->id;
                $compdatas['category_id'] = $cat;
                $res = \DB::table('product_categories')->insertGetId($compdatas);
            }
        }
        Session::flash('success', 'Succesfully done.');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = array();
        $res = Product::where('id', $id)->first();
        $data['categories'] = Category::get();
        $data['pcats'] = ProductCategory::where('product_id', $id)->get();
        if ($res == null) {
            dd('sad');
        } else {
            $data['res'] = $res;
            return view('dashboard.pages.products.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'featimg' =>  'mimes:jpeg,bmp,png,gif,svg|max:2048',
            'slug' => 'nullable|alpha_dash|unique:categories,slug,' . $id,
            'status' => 'required|in:0,1'



        ]);
        $data = Product::find($id);
        if ($data == null || $request->parent_id == $id) {
            abort(404);
            dd();
        }

        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        if ($request->input('slug') == "") {
            if ($data->title != $request->title) {
                $data->setSlugAttribute($request->input('title'));
            } else if ($request->slug == "" ||  $request->slug == null) {
            }
        } else if ($request->input('slug') != "") {
            if ($data->slug  == $request->input('slug')) {
            } else {
                $data->setSlugAttribute($request->input('slug'));
            }
        }

        if ($request->hasFile('featimg')) {


            if (!empty($request->file('featimg'))) {


                $nm = $data->featimg;
                $image_path = "assets/media/products/";
                $imagethumb_paths = "assets/media/products/thumbnails/";


                $imgarrs = array();
                $imgarrs = [$image_path, $imagethumb_paths,];

                foreach ($imgarrs as $iarr) {
                    if (File::exists(public_path("/" . $iarr . $nm))) {
                        File::delete(public_path("/" . $iarr . $nm));
                    }
                }


                $file = $request->file('featimg');
                $fileName = substr(md5(microtime()), rand(0, 26), 4) . "_" . $file->getClientOriginalName();

                //$fileName = time() . '.' . $file->getClientOriginalExtension();
                //$width = Image::make('public/foo.jpg')->width();



                $img = Image::make($file->getRealPath());
                //  dd($img->width(),$img->height());
                if ($img->width() > 100 || $img->height() > 100) {

                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($imagethumb_paths . $fileName);
                } else {
                    $img->save($imagethumb_paths . $fileName);
                }

                $request->file('featimg')->move($image_path, $fileName);
                $data->featimg = $fileName;
            }
        }
        $data->save();


        $posttocomp = ProductCategory::where('product_id', $id)->get();
        if ($posttocomp->isEmpty()) {
            $companies = $request->categories;
            if ($companies != null) {
                foreach ($companies as $comp) {


                    $compdatas['product_id'] = $id;
                    $compdatas['category_id'] = $comp;
                    $res = \DB::table('product_categories')->insertGetId($compdatas);
                }
            }
        } else {
            foreach ($posttocomp as $posttocompany) {
                ProductCategory::destroy($posttocompany->id);
            }
            $companies = $request->categories;
            if ($companies != null) {
                foreach ($companies as $comp) {

                    $compdatas['product_id'] = $id;
                    $compdatas['category_id'] = $comp;
                    $res = \DB::table('product_categories')->insertGetId($compdatas);
                }
            }
        }
        Session::flash('success', 'Succesfully done.');
        return redirect()->route('product.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Product::find($id);

        $producttocats = ProductCategory::where('product_id', $id)->get();
        if ($producttocats->isEmpty() || $producttocats == null) {
        } else {
            foreach ($producttocats as $posttocomp) {
                ProductCategory::destroy($posttocomp->id);
            }
        }

        $data->delete();

        Session::flash('success', 'Succesfully done.');
        return redirect()->route('product.index');
    }
}
