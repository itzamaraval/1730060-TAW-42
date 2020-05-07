<?php

namespace App\Http\Controllers;

use App\Historial;
use App\Http\Datatables\HistorialDatatable;
use App\Http\Requests\HistorialRequest;
use Illuminate\Http\Request;

use DB;

class HistorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {  
        $user = auth()->user();
        $gamer_email = $user->email;

        //$query = Historial::query();
        $query = DB::table('rentas')
            ->join('gamers', 'gamers.id', '=', 'rentas.gamer_id')
            ->join('consolas', 'consolas.id', '=', 'rentas.consola_id')
            ->join('plataformas', 'plataformas.id', '=', 'rentas.consola_id')
            ->select('rentas.*', DB::raw("CONCAT(consolas.numero,' - ',plataformas.nombre) AS consola"))
            ->where('gamers.email', $gamer_email)->get();
        
        $queryMonedas = DB::table('gamers')
            ->select('monedas')
            ->where('email', $gamer_email)->first();
        
        $monedas = $queryMonedas->monedas;
        
        $datatables = HistorialDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('historials.index', $datatables->html(), compact('monedas'));
    }

    public function create()
    {
        return view('historials.create');
    }

    public function store(HistorialRequest $request)
    {
        Historial::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('historials.create')
            : redirect()->route('historials.index');
    }

    public function show(Historial $historial)
    {
        return view('historials.show', compact('historial'));
    }

    public function edit(Historial $historial)
    {
        return view('historials.edit', compact('historial'));
    }

    public function update(HistorialRequest $request, Historial $historial)
    {
        $historial->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('historials.edit', $historial->id)
            : redirect()->route('historials.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Historial $historial)
    {
        $historial->delete();

        return redirect()->route('historials.index');
    }
}
