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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');
//Route::resource('category', CategoryController::class);
Route::get('/category/{slug}', 'CategoryListController@index')->name('category.index');
Route::get('/store/{slug}', 'StoreController@index')->name('store.single');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function (){
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
    Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('my-orders', 'UserOrderController@index')->name('user.orders');

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
        Route::resource('orders', 'OrdersController');

//        Route::get('orders/my', 'OrdersController@index')->name('orders.my');
//        Route::post('images/remove', 'ProductImageController@removeImage')->name('img.remove');


    });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/model', function () {
    $product = \App\Product::find(40);
    dd($product->categories()->sync([2]));
});
