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

Route::resource('productos', 'ProductosController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// carrito
Route::get('cart/show',[
  'as'=> 'cart-show',
  'uses' => 'CartController@show'
]);

Route::get('cart/add/{producto}',[
  'as'=> 'cart-add',
  'uses' => 'CartController@add'
]);

Route::get('cart/delete/{producto}',[
  'as'=> 'cart-delete',
  'uses' => 'CartController@delete'
]);

Route::get('cart/trash',[
  'as'=> 'cart-trash',
  'uses' => 'CartController@trash'
]);

Route::get('cart/update/{producto}/{quantity?}',[
  'as'=> 'cart-update',
  'uses' => 'CartController@update'
]);