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

use Application\Producto;

Auth::routes();

// User authenticate, show the information
Route::group(['middleware' => ['auth']], function () { 

    Route::resource('/', 'ProductoController');
    Route::resource('/productos', 'ProductoController');

    Route::get('/publicaciones', 'ProductoController@ShowMisPublicaciones');
    Route::get('/ShowProduct/{id}', 'ProductoController@Show');
    Route::post('/carrito/{id}', 'CarritoController@store');
    Route::get('/carrito', 'CarritoController@index');
    Route::get('/carrito/{id}/destroy', 'CarritoController@destroy');
    Route::get('/home', 'HomeController@index')->name('home');
});