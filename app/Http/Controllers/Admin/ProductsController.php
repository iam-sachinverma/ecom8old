<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\Brand;
use Session;
use Image;

class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        $products = Product::with(['category','section'])->get();
       /* $products = json_decode(json_encode($products));
        echo "<pre>"; print_r($products); die;*/
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

    public function deleteProduct($id){
        // Delete Product
        Product::where('id',$id)->delete();
        $message = 'Product has been deleted successfully';
        session::flash('success_message',$message);
        return redirect()->back();
    }

    public function addEditProduct(Request $request, $id=null){
        if($id==""){
            $title = "Add Product";
            $product = new Product;
            $productdata = array();
            $message =  "Product Added Successfully";  
        }else{
            $title = "Edit Product";
            $productdata = Product::find($id);
            $productdata = json_decode(json_encode($productdata),true);
            //echo "<pre>"; print_r($productdata); die;
            $product = Product::find($id);
            $message =  "Product Updated Successfully";  
        }

        if($request->isMethod('post')){
            $data = $request->all();
           //echo "<pre>"; print_r($data); die;  

            //Category Validations
            $rules = [
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_code' => 'required|regex:/^[\w-]*$/',
                'product_name' => 'required',
                'product_price' => 'required|numeric',
            ];
            $customMessages = [
                'category_id.required' => 'Category is required',
                'brand_id.required' => 'Brand is required',
                'product_code.required' => 'Product Code is required',
                'product_code.regex' => 'Enter Valid Product Code',
                'product_name.required' => 'Enter Product Name',
                'product_price.required' => 'Product Price is required',
                'product_price.numeric' => 'Enter Valid Product Price',

            ];
            $this->validate($request,$rules,$customMessages);

            if(empty($data['is_featured'])){
                $is_featured = "No";
            }else{
                $is_featured = "Yes";
            }
            //echo $is_featured; die;

            //Upload Product Images
            if($request->hasFile('main_image')){
                $image_tmp = $request->file('main_image');
                if($image_tmp->isValid()){
                    //Upload Images
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/product_images/large/'.$imageName;
                    $medium_image_path = 'images/product_images/medium/'.$imageName;
                    $small_image_path = 'images/product_images/small/'.$imageName;
                     //Upload Large Images 
                    Image::make($image_tmp)->save($large_image_path); // W:1040 H:1200
                     //Upload Images after Resize Small and Medium
                    Image::make($image_tmp)->save($medium_image_path);
                    Image::make($image_tmp)->save($small_image_path);
                    //FOR RESIZE OPTION Image::make($image_tmp)->resize(150,150)->save($small_image_path);
                    //Save Image In DB
                    $product->main_image = $imageName;
                }
            }

            //Upload Product Video
            if($request->hasFile('product_video')){
                $video_tmp = $request->file('product_video');
                if($video_tmp->isValid()){
                    // Upload Video
                    $video_name = $video_tmp->getClientOriginalName();
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = $video_name.'-'.rand().'.'.$extension;
                    $video_path = 'videos/product_videos';
                    $video_tmp->move($video_path,$videoName);
                    //Save Video in DB
                    $product->product_video = $videoName;
   
                }

            }

        
          //Save Product Details in Database
          $categoryDetails = Category::find($data['category_id']);
          $product->section_id = $categoryDetails['section_id'];
          $product->parentcategory_id = $categoryDetails['parent_id'];
          $product->brand_id = $data['brand_id'];
          $product->category_id = $data['category_id'];
          $product->product_code = $data['product_code'];
          $product->product_name = $data['product_name'];
          $product->product_price = $data['product_price'];
          $product->product_discount = $data['product_discount'];
          $product->description = $data['description'];
          $product->meta_title = $data['meta_title'];
          $product->meta_description = $data['meta_description'];
          $product->meta_keywords = $data['meta_keywords'];
          $product->is_featured = $is_featured;
          $product->status = 1;
          $product->save();
         //echo "<pre>"; print_r($product); die;
          session::flash('success_message', $message);
          return redirect('admin/products'); 
        }
        //Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories), true);
        //echo "<pre>"; print_r($categories); die;

        $brands = Brand::where('status',1)->get();
        $brands = json_decode(json_encode($brands), true);

        return view('admin.products.add_edit_product')->with(compact('title','categories','productdata','brands'));
    }
}
