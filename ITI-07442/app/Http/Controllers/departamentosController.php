<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departamentos = Departamento::all();
        return view('departamentos.admin_departamentos', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departamentos.alta_departamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = request()->except('_token');
        Departamento::insert($departamento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departamento  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.edit', compact('departamento'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departamento = request()->except(['_token', '_method']);
        Departamento::where('id', '=', $id)->update($departamento);
        return redirect('departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamento  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Departamento::destroy($id);
        return redirect('departamentos');

    }
}