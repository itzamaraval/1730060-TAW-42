<?php

namespace App\Http\Controllers;

use App\Ejemplo;
use App\Http\Datatables\EjemploDatatable;
use App\Http\Requests\EjemploRequest;
use Illuminate\Http\Request;

class EjemploController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Ejemplo::query();
        $datatables = EjemploDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('ejemplos.index', $datatables->html());
    }

    public function create()
    {
        return view('ejemplos.create');
    }

    public function store(EjemploRequest $request)
    {
        Ejemplo::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('ejemplos.create')
            : redirect()->route('ejemplos.index');
    }

    public function show(Ejemplo $ejemplo)
    {
        return view('ejemplos.show', compact('ejemplo'));
    }

    public function edit(Ejemplo $ejemplo)
    {
        return view('ejemplos.edit', compact('ejemplo'));
    }

    public function update(EjemploRequest $request, Ejemplo $ejemplo)
    {
        $ejemplo->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('ejemplos.edit', $ejemplo->id)
            : redirect()->route('ejemplos.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Ejemplo $ejemplo)
    {
        $ejemplo->delete();

        return redirect()->route('ejemplos.index');
    }
}
