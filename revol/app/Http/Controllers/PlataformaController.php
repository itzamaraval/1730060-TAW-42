<?php

namespace App\Http\Controllers;

use App\Plataforma;
use App\Http\Datatables\PlataformaDatatable;
use App\Http\Requests\PlataformaRequest;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Plataforma::query();
        $datatables = PlataformaDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('plataformas.index', $datatables->html());
    }

    public function create()
    {
        return view('plataformas.create');
    }

    public function store(PlataformaRequest $request)
    {
        Plataforma::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('plataformas.create')
            : redirect()->route('plataformas.index');
    }

    public function show(Plataforma $plataforma)
    {
        return view('plataformas.show', compact('plataforma'));
    }

    public function edit(Plataforma $plataforma)
    {
        return view('plataformas.edit', compact('plataforma'));
    }

    public function update(PlataformaRequest $request, Plataforma $plataforma)
    {
        $plataforma->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('plataformas.edit', $plataforma->id)
            : redirect()->route('plataformas.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Plataforma $plataforma)
    {
        $plataforma->delete();

        return redirect()->route('plataformas.index');
    }
}
