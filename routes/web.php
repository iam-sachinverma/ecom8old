<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Category;

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\\Http\\Controllers\\Admin')->group(function(){
    // All Admin Routes:-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){

        //Admin
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        //Sections
        Route::get('sections','SectionController@sections');
        Route::post('update-section-status','SectionController@updateSectionStatus');
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');
        Route::get('delete-section-image/{id}','SectionController@deleteSectionImage');
        Route::get('delete-section/{id}','SectionController@deleteSection');
    
        // Brands
        Route::get('brands','BrandController@brands');
        Route::post('update-brand-status','BrandController@updateBrandStatus');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        Route::get('delete-brand/{id}','BrandController@deleteBrand');

        // Categories
        Route::get('categories','CategoryController@categories');
        Route::post('update-category-status','CategoryController@updateCategoryStatus');
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
        Route::post('append-categories-level','CategoryController@appendCategoryLevel');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');
        Route::get('delete-category/{id}','CategoryController@deleteCategory');

        //Products
        Route::get('products','ProductsController@products');
        Route::post('update-product-status','ProductsController@updateProductStatus');
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
        Route::get('delete-product-video/{id}','ProductsController@deleteProductVideo');

        //Product Attributes
        Route::match(['get','post'],'add-attributes/{id}','ProductsController@addAttributes');
        Route::post('edit-attributes/{id}','ProductsController@editAttributes');
        Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');

        // Product Images
        Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
        Route::post('update-image-status','ProductsController@updateImageStatus');
        Route::get('delete-image/{id}','ProductsController@deleteImage');

        //Banners
        Route::get('banners','BannerController@banners');
        Route::post('update-banner-status','BannerController@updateBannerStatus');
        Route::get('delete-banner/{id}','BannerController@deleteBanner');
        Route::get('delete-banner-image/{id}','BannerController@deleteBannerImage');
        Route::match(['get','post'],'add-edit-banner/{id?}','BannerController@addEditBanner');


    }); 

});

Route::namespace('App\\Http\\Controllers\\Front')->group(function(){
    // Home Page Route
    Route::get('/','IndexController@index');

    // Listing Page Route
     // Route::get('/{url}','ProductsController@listing');
    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
    foreach ($catUrls as $url) {
        Route::get('/'.$url,'ProductsController@listing');
    }

    // Product Detail Page
    Route::get('/product/{id}','ProductsController@detail');
     //Get Product Attribute Price
     Route::post('/get-product-price','ProductsController@getProductPrice');
    
}); 