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

Route::get('/','ProductoController@index' )->name('productos');
Route::get('/producto/crear','ProductoController@create');
Route::get('/producto/{id}','ProductoController@show');
Route::post('/producto/crear','ProductoController@store');

Auth::routes(['verify' => true]);



Route::get('/categoria/crear','CategoriaController@create');
Route::post('/categoria/crear','CategoriaController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/favoritos','FavoritosController@index')->name('favoritos');
Route::post('/favoritos/nuevo/{id}', 'FavoritosController@store');
Route::post('/favoritos/borrar/{id}', 'FavoritosController@destroy');

Route::post('/mensaje/nuevo/{id}', 'ContactoController@store');