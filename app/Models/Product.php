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
        return $this->hasMany('App\Models\ProductsImage');
    }

    public static function productFilters(){
        //Product Filters
        $productFilters['cuisineArray'] = array('Italian','Indian','Thai','English','Mediterranean');
        $productFilters['foodpreferenceArray'] = array('Vegetarian','Non Vegetarian','Contain Egg','Vegan');
        $productFilters['countryArray'] = array('America','England','Australia','Belgium','Canada');
        return $productFilters;
    }

    // Product Discount Price
    public static function getDiscountedPrice($product_id){
        $proDetails = Product::select('product_price','product_discount','category_id')->
        where('id',$product_id)->first()->toArray();
        //echo "<pre>"; print_r($proDetails); die;
        $catDetails = Category::select('category_discount')->
        where('id',$proDetails['category_id'])->first()->toArray();
        
        // Sale Price = Cost Price - Discount Price
        if($proDetails['product_discount']>0){
            // If Product Discount Exists
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price']*
            $proDetails['product_discount']/100);
        }else{
            $discounted_price = 0;
        }
        return $discounted_price;

    }

    // Product Attributes Discount Price
    public static function getDiscountedAttrPrice($product_id,$size){
        $proAttrPrice = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->
        first()->toArray();
        $proDetails = Product::select('product_discount','category_id')->
        where('id',$product_id)->first()->toArray();
        //echo "<pre>"; print_r($proDetails); die;

        if($proDetails['product_discount']>0){
            // If Product Discount Exists
            $discounted_price = $proAttrPrice['price'] - ($proAttrPrice['price']*
            $proDetails['product_discount']/100);
        }else{
            $discounted_price = 0;
        }
        return array('product_price'=>$proAttrPrice['price'],'discounted_price'=>$discounted_price);
        
    }

}
