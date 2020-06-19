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

Route::get('/productos', function () {
    return 'productos';
});

Route::post('/productos', function () {
    return 'productos (post)';
});

Route::put('/productos{id}', function($id){
	return ('actualizando producto: ' . $id);
});

Route::get('saludo/{nombre}/{apodo?}', function($nombre, $apodo=null){
	//Poner la primera letra en mayuscula
	$nombre = ucfirst($nombre);
	if ($apodo) {
		return "Bienvenido {$nombre}, tu apodo es {$apodo}";
	} else {
		return "Buenvenido {$nombre}";
	}
});
