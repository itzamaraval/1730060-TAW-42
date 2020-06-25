<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use DB;

class empleadosController extends Controller
{
    public function index(){
        //Obtener todos los empleados de la tabla de la BD
        $empleados = Empleado::all();
        //Mostrar vista de la consulta empleados
        return view('empleados.admin_empleados', compact('empleados'));
    }

    //creación de nuevo empleado
    public function create(){
        //mostrar formulario para crear empleado
        return view('empleados.alta_empleado', compact('empleados'));
    }

    //almacenar empleados
    public function store(Request $request){
        //retirar los datos del Request
        $datosEmpleado = request()->except('empleado');

        //insertar en la tabla empleado los datos para la creación de un nuevo registro
        $id = DB::table('empleados')->insertGetId($datosEmpleado);
        Alert::success('Datos guardados con éxito.');
        return redirect ('empleados');
    }

    //editar empleados
    public function edit($id){
        //editar empleados y mandar a la vista la información
        $empleados = Empleado::findOrFail($id);

        //mostrar vista
        return view('empleados.editar_empleado', compact('empleado'));
    }

    //eliminar empleado
    public function destroy($id){
        Alert::success('Datoss eliminados de la base de datos.');
        return redirect ('empleados');
    }

}
