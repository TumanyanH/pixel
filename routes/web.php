<?php

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

Route::name('admin.')->namespace('Admin')->prefix('admin')->middleware('role:super')->group( function() {
    // homepage
    Route::resource('homepage', 'HomepageController');
    Route::post('/homepage/changeSort', 'HomepageController@changeSort');
    Route::post('/admin/homepage/get-details', 'HomepageController@getDetails')->name('homepage.getDetails');
    
    // brand and categories
    Route::resource('brand', 'BrandController');
    Route::post('/brand/changeSort', 'BrandController@changeSort')->name('brand.changeSort');
    Route::post('/brand/storeSubcategory', 'BrandController@storeSubcategory')->name('brand.storeSubcategory');
    Route::delete('/brand/{category}/destroySubcategory', 'BrandController@destroySubcategory')->name('brand.destroySubcategory');
    Route::post('/brand/changeCategorySort', 'BrandController@changeCategorySort')->name('brand.changeCategorySort');
    Route::post('/brand/getCategoryDetails', 'BrandController@getCategoryDetails')->name('brand.getCategoryDetails');
    Route::post('/brand/{id}/updateSubcategory', 'BrandController@updateSubcategory')->name('brand.updateSubcategory');

    // products
    Route::resource('product', 'ProductController');
    Route::get('/product/{id}/showAllProducts', 'ProductController@showAllProducts')->name('product.showAllProducts');

    Route::name('product.')->prefix('product')->group( function() {
        // description
        Route::resource('description', 'ProductDescriptionController');
        Route::get('/{product}/configuration', 'ProductConfigurationController@show')->name('configuration.showConfigurations');
        Route::resource('configuration', 'ProductConfigurationController');
    });

    Route::resource('product-other', 'ProductOtherController');
    Route::get('/product-other/{id}/showAllProducts', 'ProductOtherController@showAllProducts')->name('product-other.showAllProducts');

    Route::name('product-other.')->prefix('product-other')->group( function() {
        // description
        Route::resource('description', 'ProductDescriptionController');
        Route::get('/{id}/configuration', 'ProductOtherConfigurationController@show')->name('configuration.showConfigurations');
        Route::resource('configuration', 'ProductOtherConfigurationController');
    });

    Route::get('privacy-policy/languages', 'PolicyController@askLanguages')->name('privacy-policy.askLanguages');
    Route::resource('privacy-policy', 'PolicyController');
    Route::resource('order', 'OrderController');

    Route::resource('info', 'InfoController');
    
});
