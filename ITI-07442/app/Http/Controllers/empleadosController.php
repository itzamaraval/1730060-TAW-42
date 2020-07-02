<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::all();
        return view('empleados.admin_empleados', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.alta_empleado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $empleado = request()->except('_token');
        Empleado::insert($empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*$validar = $request->validate(['email'=>'required|max:50|unique:empleados,email,' . $id]);
        if ($validar->fails()) {
            $empleado = ["email" => "Correo ocupado"];
            return view('empleados.edit', compact('empleado'));
        } else {
            $empleado = request()->except(['_token', '_method']);
            Empleados::where('id', '=', $id)->update($empleado);
            return redirect('empleados');
        }*/

        $empleado = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($empleado);
        return redirect('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleados');

    }
}