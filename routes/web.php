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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/model', function () {
//    $products = Product::all();
//
//    return $products;

//    $user = new User();
//    $user = User::find(1);
//    $user->name = 'Usuário Teste... Edited';
//    $user->email = 'usr@email.com';
//    $user->password = bcrypt('12345678');

//    $user->save();
//    return User::find(3);
//    return User::where('name', 'Cleo Pollich')->first();
//    return User::paginate(10);

//    Mass Assignment
//    $user = User::create([
//       'name' => 'Fulano DeTal',
//       'email' => 'fulano@email.com',
//        'password' => bcrypt('12345678')
//    ]);

//    Mass Update
//    $user = User::find(41);
//    $user = $user->update([
//        'name' => 'Fulano atualizado'
//    ]);
//    dd($user);

//    $user = User::find(5);
//    return  dd($user->store()->count());
//    $loja = \App\Store::find(1);
//    return $loja->products()->where('id', 1)->get();

//    $categoria = \App\Category::find(1);
//    $categoria->products;

//    $user = \App\User::find(10);
//    $store = $user->store()->create([
//        'name' => 'loja teste',
//        'description' => 'loja teste de prod info',
//        'mobile_phone' => 'XX-XXXXX-XXXX',
//        'phone' => 'XX-XXXXX-XXXX',
//        'slug' => 'loja-teste'
//    ]);

//    $store = \App\Store::find(10);
//    $product = $store->products()->create([
//        'name' => 'notebook ic',
//        'description' => 'essead krai',
//        'body' => 'QQ coisa...',
//        'price' => '2999.90',
//        'slug' => 'notebook-ic'
//    ]);

//    $category = \App\Category::create([
//        'name' => 'Games',
//        'description' => null,
//        'slug' => 'games'
//    ]);
//
//    $category = \App\Category::create([
//        'name' => 'Notebooks',
//        'description' => null,
//        'slug' => 'notebooks'
//    ]);

    $product = \App\Product::find(40);
//    dd($product->categories()->attach([1]));
//    dd($product->categories()->sync([1, 2]));
    dd($product->categories()->sync([2]));
//    return $product;

//    return User::all();
});
