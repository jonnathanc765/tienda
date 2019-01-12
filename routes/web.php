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
    return 'Bienvenido';
});


Route::get('productos', 'ProductController@index')->name('product.index');
Route::get('productos/crear','ProductController@create')->name('product.create');
Route::post('productos/guardar', 'ProductController@store')->name('product.store');
Route::delete('productos/eliminar/{product}', 'ProductController@destroy')->name('product.destroy');
Route::get('productos/editar/{product}', 'ProductController@edit')->name('product.edit');
Route::put('productos/update/{product}', 'ProductController@update')->name('product.update');