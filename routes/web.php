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

Route::prefix('productos')->group(function ()
{
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('{product}/', 'ProductController@show')->name('product.show');
    Route::get('nuevo/producto', 'ProductController@create')->name('product.create');
    Route::post('guardar/', 'ProductController@store')->name('product.store');
    Route::delete('eliminar/{product}', 'ProductController@destroy')->name('product.destroy');
    Route::get('editar/{product}', 'ProductController@edit')->name('product.edit');
    Route::put('actualizar/{product}', 'ProductController@update')->name('product.update');
});

Route::prefix('carrito')->group(function ()
{
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::get('/vaciar', 'CartController@empty')->name('cart.empty'); 
});

Route::prefix('detalles')->group(function ()
{
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::delete('/{detail}', 'CartDetailController@destroy')->name('detail.destroy');
    Route::post('/guardar', 'CartDetailController@store')->name('detail.store');
    Route::get('/vaciar', 'CartDetailController@empty')->name('detail.empty');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
