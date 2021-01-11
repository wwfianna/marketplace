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

use App\User;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
});

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {

//    Route::prefix('stores')->name('stores.')->group(function () {
//
//        Route::get('/', 'StoreController@index')->name('index');
//        Route::get('/create', 'StoreController@create')->name('create');
//        Route::post('/store', 'StoreController@store')->name('store');
//        Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
//        Route::post('/update/{store}', 'StoreController@update')->name('update');
//        Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
//
//    });

        Route::resource('products', 'ProductController');
        Route::resource('stores', 'StoreController');
        Route::resource('categories', 'CategoryController');
        Route::resource('images', 'ProductImageController');

//        Route::post('images/remove', 'ProductImageController@removeImage')->name('img.remove');


    });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model', function () {
    $product = \App\Product::find(40);
    dd($product->categories()->sync([2]));
});
