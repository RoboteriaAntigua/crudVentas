<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

// Rutas CRUD
/* Crear */
Route::get('admin/productos/crear', 'App\Http\Controllers\productosController@crear')->name('admin/productos/crear');
Route::put('admin/productos/store', 'App\Http\Controllers\productosController@store')->name('admin/productos/store');

/* Leer */
Route::get('admin/productos/show/{id}', 'App\Http\Controllers\productosController@show')->name('admin/productos/detalles');

/* Actualizar */
Route::get('admin/productos/actualizar/{id}', 'App\Http\Controllers\productosController@actualizar')->name('admin/productos/actualizar');
Route::put('admin/productos/update/{id}', 'App\Http\Controllers\productosController@update')->name('admin/productos/update');

/* Eliminar */
Route::put('admin/productos/eliminar/{id}', 'App\Http\Controllers\productosController@eliminar')->name('admin/productos/eliminar');

/* Vista Principal */
Route::get('admin/productos', 'App\Http\Controllers\productosController@index')->name('admin/productos');
