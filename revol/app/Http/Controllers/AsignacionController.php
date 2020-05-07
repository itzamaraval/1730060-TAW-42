<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Consola;
use App\Juego;
use DB;

use App\Http\Datatables\AsignacionDatatable;
use App\Http\Requests\AsignacionRequest;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$query = Asignacion::query();

        $query = DB::table('asignacions')
            ->join('consolas', 'consolas.id', '=', 'asignacions.consola_id')
            ->join('plataformas', 'consolas.plataforma_id', '=', 'plataformas.id')
            ->join('juegos', 'juegos.id', '=', 'asignacions.juego_id')
            ->select('asignacions.*', DB::raw('CONCAT(consolas.numero, " ", plataformas.nombre) AS numero'), 'juegos.titulo AS titulo')
            ->get();

        $datatables = AsignacionDatatable::make($query);

        error_log ($request->ajax());
        //dd($datatables);

        return $request->ajax()
            ? $datatables->json()
            : view('asignacions.index', $datatables->html());
    }

    public function create()
    {
        //$consolas = Consola::all();
        $consolas = DB::table('consolas')
                    ->join('plataformas', 'consolas.plataforma_id', '=', 'plataformas.id')
                    ->select('consolas.id', DB::raw('CONCAT(consolas.numero, " - ", plataformas.nombre) AS numero'))
                    ->get();
        $juegos = Juego::all();


        return view('asignacions.create', compact('consolas'), compact('juegos'));
    }

    public function store(AsignacionRequest $request)
    {
        Asignacion::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('asignacions.create')
            : redirect()->route('asignacions.index');
    }

    public function show(Asignacion $asignacion)
    {
        return view('asignacions.show', compact('asignacion'));
    }

    public function edit(Asignacion $asignacion)
    {
        $consolas = DB::table('consolas')
                    ->join('plataformas', 'consolas.plataforma_id', '=', 'consolas.id')
                    ->select('consolas.id', DB::raw('CONCAT(consolas.numero, " ", plataformas.nombre) AS numero'))
                    ->get();
        $juegos = Juego::all();

        return view('asignacions.edit', compact('asignacion', 'consolas', 'juegos'));
    }

    public function update(AsignacionRequest $request, Asignacion $asignacion)
    {
        $asignacion->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('asignacions.edit', $asignacion->id)
            : redirect()->route('asignacions.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Asignacion $asignacion)
    {
        $asignacion->delete();

        return redirect()->route('asignacions.index');
    }
}
