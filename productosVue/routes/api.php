<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('producto/crear', 'ProductoController@store');
Route::get('producto/editar/{id}', 'ProductoController@edit');
Route::post('producto/actualizar/{id}', 'ProductoController@update');
Route::delete('producto/eliminar/{id}', 'ProductoController@delete');
Route::get('productos', 'ProductoController@index');
