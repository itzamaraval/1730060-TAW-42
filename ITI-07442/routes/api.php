<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;
use App\Departamento;

//Listar empleados
Route::get('empleados', function(){
	$empleados = Empleado::get();
	return $empleados;
});

//Ruta para guardar nuevos empleados y recibir data (fase 1)
Route::post('empleados', function(Request $request){
	//Verificamos que los datos enviados se reciban bien en la base de datos, para esto se utiliza request

	//Retornar todos los valores del array
	//return $request->all();

	//Retornar solo un parametro

	//return $request->input('estado_civil');

    //Validar datos de empleados
    $request->validate([
        'nombre' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'cedula'=> 'required|max:50',
        'email' => 'required|max:50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max:50',
        'estado_civil' => 'required|max:50',
        'telefono'=> 'required|numeric'
    ]);

	//Llenar los parametros usando Request y guardarlo en la tabla de la bd
	$empleado = new Empleado();
	$empleado->nombre = $request->input('nombre');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
	$empleado->sexo = $request->input('sexo');
	$empleado->estado_civil = $request->input('estado_civil');
	$empleado->telefono = $request->input('telefono');
	$empleado->save();

	return "Empleado creado";

});

//Ruta para actualizar empleado
Route::put('empleados/{id}',function(Request $request, $id){


	$request->validate([
		'nombre'=>'required|max:50',
		'apellidos'=>'required|max:50',
		'cedula'=>'required|max:20',
		'email'=>'required|max:50|email|unique:empleados,email,' .$id, //para que deje actualizar sin que choque con la validacion de email Ãºnico.
    	'lugar_nacimiento'=>'required|max:50',
    	'sexo'=>'required|max:50',
		'estado_civil'=>'required|max:50',
		'telefono'=>'required|numeric',
		'departamento'=>'required|max:300' 

	]);

	$empleado= Empleado::findOrFail($id);
	//return $empleado;
	
	$empleado->nombre = $request->input('nombre');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
	$empleado->sexo = $request->input('sexo');
	$empleado->estado_civil = $request->input('estado_civil');
	$empleado->telefono = $request->input('telefono');
	$empleado->departamento = $request->input('departamento');

	$empleado->save();
	return "Empleado Actualizado";
});

//Ruta para eliminar empleados
Route::delete('empleados/{id}',function($id){

	$empleado=Empleado::findOrFail($id);
	
	$empleado->delete();
	return "Empleado Eliminado";
});

//-------------DEPARTAMENTOS--------------

//Listar departamentos
Route::get('departamentos', function(){
	$departamentos = Departamento::get();
	return $departamentos;
});

//Ruta para guardar nuevos departamentos y recibir data (fase 1)
Route::post('departamentos', function(Request $request){
	//Verificamos que los datos enviados se reciban bien en la base de datos, para esto se utiliza request

	//Llenar los parametros usando Request y guardarlo en la tabla de la bd
	$departamento = new Departamento();
	$departamento->nombre = $request->input('nombre');
	$departamento->save();

	return "Departamento creado";

});

//Ruta para actualizar departamento
Route::put('departamentos/{id}',function(Request $request, $id){
	$departamento=Departamento::findOrFail($id);
	//return $departamento;
	$departamento->nombre = $request->input('nombre');
	$departamento->save();
	return "Departamento Actualizado";
});

//Ruta para eliminar departamentos
Route::delete('departamentos/{id}',function($id){

	$departamento=Departamento::findOrFail($id);
	
	$departamento->delete();
	return "Departamento Eliminado";
});