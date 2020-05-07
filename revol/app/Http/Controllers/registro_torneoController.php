<?php

namespace App\Http\Controllers;

use App\registro_torneo;
use App\Gamer;
use App\Torneo;
use App\Http\Datatables\registro_torneoDatatable;
use App\Http\Requests\registro_torneoRequest;
use Illuminate\Http\Request;

class registro_torneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = registro_torneo::query();
        $datatables = registro_torneoDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('registro_torneos.index', $datatables->html());
    }

    public function create()
    {
        $torneo = Torneo::all();
        $gamer = Gamer::all();
        return view('registro_torneos.create', compact('torneo', 'gamer'));
    }

    public function store(registro_torneoRequest $request)
    {
        registro_torneo::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('registro_torneos.create')
            : redirect()->route('registro_torneos.index');
    }

    public function show(registro_torneo $registro_torneo)
    {
        return view('registro_torneos.show', compact('registro_torneo'));
    }

    public function edit(registro_torneo $registro_torneo)
    {
        $torneo = Torneo::all();
        $gamer = Gamer::all();
        return view('registro_torneos.edit', compact('registro_torneo', 'torneo', 'gamer'));
    }

    public function update(registro_torneoRequest $request, registro_torneo $registro_torneo)
    {
        $registro_torneo->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('registro_torneos.edit', $registro_torneo->id)
            : redirect()->route('registro_torneos.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(registro_torneo $registro_torneo)
    {
        $registro_torneo->delete();

        return redirect()->route('registro_torneos.index');
    }
}
