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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('empresas', ['as' => 'empresas.adminempresa', 'uses' => 'EmpresasController@adminempresa']);
	Route::put('empresas', ['as' => 'empresas.create', 'uses' => 'EmpresasController@create']);
	Route::get('productos', ['as' => 'productos.adminprod', 'uses' => 'ProductosController@adminprod']);
	Route::put('productos', ['as' => 'productos.create', 'uses' => 'ProductosController@create']);
	Route::get('servicios', ['as' => 'servicios.adminservicios', 'uses' => 'ServiciosController@adminservicios']);
	Route::put('servicios', ['as' => 'servicios.create', 'uses' => 'ServiciosController@create']);
	Route::put('register', ['as' => 'register', 'uses' => 'UserController@create']);
});

