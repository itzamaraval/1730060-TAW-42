<?php

namespace App\Http\Controllers;

use App\Consola;
use App\Plataforma;
use DB;

use App\Http\Datatables\ConsolaDatatable;
use App\Http\Requests\ConsolaRequest;
use Illuminate\Http\Request;

class ConsolaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$query = Consola::query();

        $query = DB::table('consolas')
            ->join('plataformas', 'plataformas.id', '=', 'consolas.plataforma_id')
            ->select('consolas.*', 'plataformas.nombre AS plataforma')
            ->get();

        //$datatables = ConsolaDatatable::make($query);
        $datatables = ConsolaDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('consolas.index', $datatables->html());
    }

    public function create()
    {
        // Obtener todas las plataformas de la DB
        $plataformas = Plataforma::all();
        
        return view('consolas.create', compact('plataformas'));
    }

    public function store(ConsolaRequest $request)
    {
        Consola::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('consolas.create')
            : redirect()->route('consolas.index');
    }

    public function show(Consola $consola)
    {
        return view('consolas.show', compact('consola'));
    }

    public function edit(Consola $consola)
    {
        // Obtener todas las plataformas de la DB
        $plataformas = Plataforma::all();
        
        return view('consolas.edit', compact('consola','plataformas'));
    }

    public function update(ConsolaRequest $request, Consola $consola)
    {
        $consola->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('consolas.edit', $consola->id)
            : redirect()->route('consolas.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Consola $consola)
    {
        $consola->delete();

        return redirect()->route('consolas.index');
    }
}
