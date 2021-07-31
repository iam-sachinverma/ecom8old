<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\Cart;
use Session;
use Auth;

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

    // Product DETAIL Page Note: Use parameters like Product Name or Code or any product detail in URL for SEO 

    public function detail($id){
        $productDetails = Product::with('brand','category','attributes','images')->find($id)->toArray();
        //dd($productDetails); die;
        $relatedProducts = Product::with('brand')->where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(3)->inRandomOrder()->get()->toArray();
        return view('front.products.detail')->with(compact('productDetails','relatedProducts'));
    }

    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $getProductPrice = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
            return $getProductPrice->price;
        }
    }

    // Add To Cart
    public function addtocart(Request $request){
       if($request->isMethod('post')){
           $data = $request->all();

           // Check Product Stock is available or not
           $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first()->toArray();
           if($getProductStock['stock']<$data['quantity']){
               $message = "Out of Stock";
               session::flash('error_message',$message);
               return redirect()->back();
            }

            // Generate Session ID if not exists
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            // Check Product if already in cart 
            if(Auth::check()){
                // User is logged in
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>Auth::user()->id])->count();
            }else {
                // User is not logged in
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>Session::get('session_id')])->count();
            }
            if($countProducts>0){
                $message = "Product Size already exists in cart";
                session::flash('error_message',$message);
                return redirect()->back();
            }

            // Add Prroduct to Cart table
            $cart = new Cart;
            $cart->session_id = $session_id;
            $cart->product_id = $data['product_id'];
            $cart->size = $data['size'];
            $cart->quantity = $data['quantity'];
            $cart->save();

            $message = "Product added in cart";
            session::flash('success_message',$message);
            return redirect()->back();

        }
    }

    // Shopping Cart
    public function cart(){
        $userCartItems = Cart::userCartItems();
        echo "<pre>"; print_r($userCartItems); die;
        return view('front.products.cart');
    }
}
