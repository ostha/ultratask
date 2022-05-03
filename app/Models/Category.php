<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';


    public function setSlugAttribute($value) {

        $getstr = Str::slug($value);
         // / $pslug = $preslug;
                if($getstr == ""){
                   
                    $randstr = substr(md5(microtime()),rand(0,26),5);
                    $getstr =$randstr;

                
                }

if (static::whereSlug($slug = $getstr)->exists()) {

  
    $slug = $this->incrementSlug($slug);
     
                     

         
}else{
        $slug = $getstr;

}


$this->attributes['slug'] = $slug;
//dd($slug);
return $slug;
}


public function incrementSlug($slug) {


$count = 2;

while (static::whereSlug($slug)->exists()) {

$original = $slug;

    $slug = "{$original}-" . $count++;

}
//dd($slug);
return $slug;

}

}
