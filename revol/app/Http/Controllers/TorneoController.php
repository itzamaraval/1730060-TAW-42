<?php

namespace App\Http\Controllers;

use App\Torneo;
use App\Juego;
use App\Premio;
use App\Http\Datatables\TorneoDatatable;
use App\Http\Requests\TorneoRequest;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Torneo::query();
        $datatables = TorneoDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('torneos.index', $datatables->html());
    }

    public function create()
    {
        $juego = Juego::all();
        $premio = Premio::all();
        return view('torneos.create', compact('juego', 'premio'));
    }

    public function store(TorneoRequest $request)
    {
        Torneo::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('torneos.create')
            : redirect()->route('torneos.index');
    }

    public function show(Torneo $torneo)
    {
        return view('torneos.show', compact('torneo'));
    }

    public function edit(Torneo $torneo)
    {
        $juego = Juego::all();
        $premio = Premio::all();
        return view('torneos.edit', compact('torneo', 'juego', 'premio'));
    }

    public function update(TorneoRequest $request, Torneo $torneo)
    {
        $torneo->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('torneos.edit', $torneo->id)
            : redirect()->route('torneos.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Torneo $torneo)
    {
        $torneo->delete();

        return redirect()->route('torneos.index');
    }
}
