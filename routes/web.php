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

Route::name('admin.')->prefix('admin')->middleware('role:super')->group( function() {
    // homepage
    Route::resource('homepage', 'HomepageController');
    Route::post('/homepage/changeSort', 'HomepageController@changeSort');
    Route::post('/admin/homepage/get-details', 'HomepageController@getDetails')->name('homepage.getDetails');
    
    // brand
    Route::resource('brand', 'BrandController');
    Route::post('/brand/changeSort', 'BrandController@changeSort')->name('brand.changeSort');
    

});
