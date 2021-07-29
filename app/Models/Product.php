<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id')->select('id','name');
    }

    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductsImage')->where('status',1);
    }

    public static function productFilters(){
        //Product Filters
        $productFilters['cuisineArray'] = array('Italian','Indian','Thai','English','Mediterranean');
        $productFilters['foodpreferenceArray'] = array('Vegetarian','Non Vegetarian','Contain Egg','Vegan');
        $productFilters['countryArray'] = array('America','England','Australia','Belgium','Canada');
        return $productFilters;
    }
}
