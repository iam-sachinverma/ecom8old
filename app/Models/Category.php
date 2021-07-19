<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function categories(){
        $getCatgeory = Category::select('id','category_name','parent_id','category_image')->where(['parent_id'=>'ROOT','status'=>1])->get();
        $getCatgeory = json_decode(json_encode($getCatgeory),true);
        return $getCatgeory;
    }
    
    public function subcategories(){
        return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }

    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function parentcategory(){
        return $this->belongsTo('App\Models\Category','parent_id')->select('id','category_name');
    }
}
