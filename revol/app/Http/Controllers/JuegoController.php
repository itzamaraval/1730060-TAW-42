<?php

namespace App\Http\Controllers;

use App\Juego;
use App\Http\Datatables\JuegoDatatable;
use App\Http\Requests\JuegoRequest;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Juego::query();
        $datatables = JuegoDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('juegos.index', $datatables->html());
    }

    public function create()
    {
        return view('juegos.create');
    }

    public function store(JuegoRequest $request) //public function store(JuegoRequest $request)
    {
        $request->validate([

            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'imagen' => 'required'

        ]);

        if($request->hasFile('imagen')){

            $file = $request->imagen;
            $extension = $file->getClientOriginalExtension();
            // Renombrar imagen para evitar duplicados
            $imgNombre = time().'.'.$extension;
            //$imgNombre = time().'.'.$request->imagen->extension();
            
            $request->imagen->move(public_path('images'), $imgNombre);

            $request->imagen = $imgNombre;
            
        }
        
        //Juego::create($request->all());
        Juego::create(
            array(
                'titulo' => $request->titulo, 
                'plataformas' => $request->plataformas,
                'imagen' => $request->imagen,
            )
        );
        

        return $request->input('submit') == 'reload'
            ? redirect()->route('juegos.create')
            : redirect()->route('juegos.index');
    }

    public function show(Juego $juego)
    {
        return view('juegos.show', compact('juego'));
    }

    public function edit(Juego $juego)
    {
        return view('juegos.edit', compact('juego'));
    }

    public function update(JuegoRequest $request, Juego $juego)
    {
        $request->validate([

            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'imagen' => 'required'

        ]);

        if($request->hasFile('imagen')){

            $file = $request->imagen;
            $extension = $file->getClientOriginalExtension();
            // Renombrar imagen para evitar duplicados
            $imgNombre = time().'.'.$extension;
            //$imgNombre = time().'.'.$request->imagen->extension();
            
            $request->imagen->move(public_path('images'), $imgNombre);

            $request->imagen = $imgNombre;
            
        }
        
        //Juego::create($request->all());

        //$juego->update($request->all());
        $juego->update(array(
            'titulo' => $request->titulo, 
            'plataformas' => $request->plataformas,
            'imagen' => $request->imagen,
        ));

        return $request->input('submit') == 'reload'
            ? redirect()->route('juegos.edit', $juego->id)
            : redirect()->route('juegos.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Juego $juego)
    {
        $juego->delete();

        return redirect()->route('juegos.index');
    }
}
