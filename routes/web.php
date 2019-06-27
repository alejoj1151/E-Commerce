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

//ELIMINAR!!
use Application\Producto;
//


Route::resource('/', 'ProductoController');
Route::resource('/productos', 'ProductoController');
//ELIMINAR!!!!
Route::get('/publicaciones', function () {
    $productos = Producto::all(); // Lista de todos los productos
    return view('perfil.publicaciones', compact('productos'));
});
//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
