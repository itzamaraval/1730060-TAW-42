<?php

namespace App\Http\Controllers;

use App\Renta;
use App\Gamer;
use App\Consola;
use DB;

use App\Http\Datatables\RentaDatatable;
use App\Http\Requests\RentaRequest;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //$query = Renta::query();
        $query = DB::table('rentas')
            ->join('gamers', 'gamers.id', '=', 'rentas.gamer_id')
            ->join('consolas', 'consolas.id', '=', 'rentas.consola_id')
            ->join('plataformas', 'plataformas.id', '=', 'rentas.consola_id')
            ->select('rentas.*', DB::raw("CONCAT(gamers.nombre,' ',gamers.apellidos,' (',gamers.gamertag,')' ) AS gamer"),DB::raw("CONCAT(consolas.numero,' - ',plataformas.nombre) AS consola"))
            ->get();

        $datatables = RentaDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('rentas.index', $datatables->html());
    }

    public function create()
    {
        $gamersQuery = Gamer::all();

        $consolasQuery = DB::table('consolas')
            ->join('plataformas', 'plataformas.id', '=', 'consolas.plataforma_id')
            ->select('consolas.*', 'plataformas.nombre AS plataforma', 'plataformas.costo_monedas AS monedas_plat')
            ->get();

        return view('rentas.create', compact('gamersQuery','consolasQuery'));
    }

    public function store(RentaRequest $request)
    {
        Renta::create($request->all());

        $gamer = $request->input('gamer_id');
        $monedas_gamer = $request->input('monedas_gamer');
        $monedas = DB::table('gamers')
                    ->where('gamers.id', $gamer)
                    ->update(['monedas' => $monedas_gamer]);

        return $request->input('submit') == 'reload'
            ? redirect()->route('rentas.create')
            : redirect()->route('rentas.index');
    }

    public function show(Renta $renta)
    {
        return view('rentas.show', compact('renta'));
    }

    public function edit(Renta $renta)
    {
        $gamersQuery = Gamer::all();

        $consolasQuery = DB::table('consolas')
            ->join('plataformas', 'plataformas.id', '=', 'consolas.plataforma_id')
            ->select('consolas.*', 'plataformas.nombre AS plataforma', 'plataformas.costo_monedas AS monedas_plat')
            ->get();
        
        return view('rentas.edit', compact('renta','gamersQuery','consolasQuery'));
    }

    public function update(RentaRequest $request, Renta $renta)
    {
        $gamer = $request->input('gamer_id');
        $monedas_gamer = $request->input('monedas_gamer');
        $monedas = DB::table('gamers')
                    ->where('gamers.id', $gamer)
                    ->update(['monedas' => $monedas_gamer]);

        $renta->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('rentas.edit', $renta->id)
            : redirect()->route('rentas.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Renta $renta)
    {
        $renta->delete();

        return redirect()->route('rentas.index');
    }


    public function getTotalRenta(Request $request)
    {
        //error_log("ENTRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");

        $consola_id = $request->input('consola_id');
        $nhoras = $request->input('nhoras');

        $query = DB::table('consolas')
            ->join('plataformas', 'plataformas.id', '=', 'consolas.plataforma_id')
            ->select('plataformas.costo')
            ->where('consolas.id', $consola_id)->first();
        
        $costo = $query->costo;
        $total =  $costo * $nhoras;
        //error_log($costo);

        return response()->json(
            [
                'total'=>$total
            ]
        );

    }

    public function getMonedas (Request $request)
    {
        $gamer = $request->input('gamer_id');

        $query = DB::table('gamers')
                ->select('gamers.monedas')
                ->where('gamers.id', $gamer)->first();
        $monedas = $query->monedas;

        return response()->json(
            [
                'monedas'=>$monedas
            ]
        );
    }

    public function getPlatMonedas(Request $request)
    {
        $plataforma = $request->input('consola_id');
        $horas = $request->input('horas_monedas');
        $gamer = $request->input('gamer_id');
        $horas_renta = $request->input('nhoras');

        $monedas = DB::table('gamers')
                ->select('gamers.monedas')
                ->where('gamers.id', $gamer)->first();
                
        $monedas_gamer = $monedas->monedas;
        $monedas_gastadas = 0;

        $query = DB::table('plataformas')
                ->join('consolas', 'consolas.plataforma_id', 'plataformas.id')
                ->select('plataformas.costo_monedas', 'plataformas.costo')
                ->where('consolas.id', $plataforma)->first();

        if ($horas > $horas_renta) {
            $horas = $horas_renta;
        }
        $costo = $query->costo * ($horas_renta - $horas);
        if ($monedas_gamer - $monedas_gastadas < 0 ) {
            error_log('AAAAAAAAAAA');
            $horas_totales = intval($monedas_gamer/$query->costo_monedas);
            $monedas_gastadas = $horas_totales * $query->costo_monedas;
            $monedas_gamer = $monedas_gamer - $monedas_gastadas;
        } else {
            $monedas_gastadas = $query->costo_monedas * $horas;
            $monedas_gamer = $monedas_gamer - $monedas_gastadas;
            $horas_totales = $horas;
        }

        return response()->json(
            [
                'monedas_gastadas'=>$monedas_gastadas,
                'monedas_gamer'=>$monedas_gamer,
                'horas_totales'=>$horas_totales,
                'costo'=>$costo
            ]
        );
    }
}
