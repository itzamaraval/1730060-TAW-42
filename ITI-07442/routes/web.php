<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layout.patron');
});

//Vista para el controlador de empleados
Route::resource('empleados','empleadosController');
//Vista para el controlador de departamentos
Route::resource('departamentos','departamentosController');




















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

/*Route::get('/', function () {
    return view('welcome');
});

//Route:get
//metodos para obtencion, guardado y eliminación de datos
//get, post (guardar), put, delete

Route::get('/productos', function () {
    return ('productos');
});

Route::post('/productos', function () {
    return ('Almacenando productos (post)');
});

Route::put('/productos/{id}', function($id){
	return ('actualizando producto: ' . $id);
});

//parámetros
Route::get('saludo/{nombre}/{apodo?}', function($nombre, $apodo=null){
	//Poner la primera letra en mayuscula
    $nombre = ucfirst($nombre);
    //validar si tiene apodo
	if ($apodo) {
		return "Bienvenido {$nombre}, tu apodo es {$apodo}";
	} else {
		return "Buenvenido {$nombre}";
	}
});

*/