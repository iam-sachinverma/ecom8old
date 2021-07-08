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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\\Http\\Controllers\\Admin')->group(function(){
    // All Admin Routes:-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
    });

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


    

});