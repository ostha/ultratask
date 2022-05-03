@extends('dashboard.layouts.layout')

@section('title') Product - UltraTask Project @endsection
@section('contenttitle') Category @endsection



@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link type="text/css" href="{{ asset('assets/dashboard') }}/vendor/ckeditor/sample/css/sample.css" rel="stylesheet" media="screen" />

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Edit Category</h4>
                   </div>
                </div>
                <div class="card-body">

        
                     <div class="new-user-info">
                        <form  action="{!! route('product.update',$res->id) !!}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="title">Title:</label>
                                 <input type="text" class="form-control" id="title" placeholder="title" name="title" value="j{{ $res->title }}">
                                 @if ($errors->has('title'))
                                 <div class="error">{{ $errors->first('title') }}</div>
                             @endif
                                </div>
                              <div class="form-group col-md-12">
                                 <label for="slug">Slug:</label>
                                 <input type="text" class="form-control" id="slug" placeholder="slug" name="slug" value="{{ $res->slug }}">
                                 @if ($errors->has('slug'))
                                 <div class="error">{{ $errors->first('slug	') }}</div>
                             @endif
                                </div>
                              <div class="form-group col-md-12">
                                <label for="featimg">Image:</label>

                                @if($res->featimg != null)
<div class="">
               <img src="{{asset('assets/media/products')}}/thumbnails/{{ $res->featimg }}" 
              alt="Cat Img">
</div>
              @endif
                                <input type="file" class="form-control" id="featimg" placeholder="featimage" name="featimg">
                                @if ($errors->has('featimg	'))
                                <div class="error">{{ $errors->first('featimg') }}</div>
                            @endif
                            </div>
                             <div class="form-group col-md-12">
                                <label for="description">Description:</label>
                                <textarea  id="editor"   class="form-control" name="description">{!! $res->description !!}</textarea>
                                @if ($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                            @endif
                            </div>

                            <div class="form-group col-md-12">
                              <label for="status">Category:</label>
                              <select name="categories[]" class="form-control select2" id="catoption" multiple="multiple" data-placeholder="Select Categories">
  

                                 @foreach($categories as $category)
             
                               
                                <option value="{{ $category->id }}"
                                 @foreach( $pcats as $cat)
                
                                 @if($cat->category_id == $category->id)
                                   selected
                           
                           
                                 @endif
                           
                               @endforeach
                                 
                                 >
                              {{ $category->title }}</option>
             
                            
                                 @endforeach
             
             </select>
             @if ($errors->has('categories'))
             <div class="error">{{ $errors->first('categories') }}</div>
         @endif 
                            </div>

                            <div class="form-group col-md-12">
                              <label for="status">Status:</label>
                              <input type="radio" name="status" value="1" @if($res->status == 1) checked @endif> Active  &nbsp; 
                              <input type="radio" name="status" value="0" @if($res->status == 0) checked @endif> Inactive  &nbsp; 
                              
                              @if ($errors->has('status'))
                              <div class="error">{{ $errors->first('status') }}</div>
                          @endif
                             </div>

            
                        
                           


            
                           </div>
                           
                
                           <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                </div>
             </div>
       </div>
    </div>
 </div>


 @endsection


 @section('scripts')
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{ asset('assets/dashboard') }}/vendor/ckeditor/ckeditor.js"></script>
 <script>
 $('.select2').select2();

 ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

 </script>


 @endsection