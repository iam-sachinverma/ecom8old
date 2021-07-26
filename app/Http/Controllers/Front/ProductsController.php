<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function listing(Request $request){
        Paginator::useBootstrap();
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $url = $data['url'];
            $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
            if($categoryCount>0){
                //echo "Category Exist"; die;
                $categoryDetails = Category::catDetails($url);
                //echo "<pre>"; print_r($categoryDetails); die;
                $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->
                    where('status',1);


                // if Cuisine Filter selected
                if(isset($data['cuisine']) && !empty($data['cuisine'])){
                    $categoryProducts->whereIn('products.cuisine',$data['cuisine']);
                }

                // if country Filter selected
                if(isset($data['country']) && !empty($data['country'])){
                    $categoryProducts->whereIn('products.country',$data['country']);
                }

                // if foodpreference Filter selected
                if(isset($data['foodpreference']) && !empty($data['foodpreference'])){
                    $categoryProducts->whereIn('products.foodpreference',$data['foodpreference']);
                }

    
                //  Sort Filter
                if(isset($data['sort']) && !empty($data['sort'])){
                    if($data['sort']=="product_latest"){
                        $categoryProducts->orderBy('id','Desc');
                    }else if($data['sort']=="price_lowest"){
                        $categoryProducts->orderBy('product_price','Asc');
                    }else if($data['sort']=="price_highest"){
                        $categoryProducts->orderBy('product_price','Desc');
                    }else if($data['sort']=="product_name_a_z"){
                        $categoryProducts->orderBy('product_name','Asc');
                    }else if($data['sort']=="product_name_z_a"){
                        $categoryProducts->orderBy('product_name','Desc');
                    }    
                }else{
                    $categoryProducts->orderBy('id','Asc');
                } 
                
                $categoryProducts = $categoryProducts->paginate(15);
                
                //echo "<pre>"; print_r($categoryProducts); die;
                return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'));    
            }else{
                abort(404);
            }
                 
        }else{
            $url = Route::getFacadeRoot()->current()->uri();
            $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
            if($categoryCount>0){
                //echo "Category Exist"; die;
                $categoryDetails = Category::catDetails($url);
                //echo "<pre>"; print_r($categoryDetails); die;
                $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->
                    where('status',1);
    
                $categoryProducts = $categoryProducts->paginate(15);

                // Product Array
                $productFilters = Product::productFilters();
                $cuisineArray = $productFilters['cuisineArray'];
                $countryArray = $productFilters['countryArray'];
                $foodpreferenceArray = $productFilters['foodpreferenceArray'];

                $page_name = "listing";
                //echo "<pre>"; print_r($categoryProducts); die;
                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url','page_name','cuisineArray','countryArray','foodpreferenceArray'));    
            }else{
                abort(404);
            }   
        }
        
    }

    public function details($code,$id){
        return view('front.products.detail');
    }
}
