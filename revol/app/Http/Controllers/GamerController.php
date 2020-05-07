<?php

namespace App\Http\Controllers;

use App\Gamer;

use DB;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Datatables\GamerDatatable;
use App\Http\Requests\GamerRequest;
use Illuminate\Http\Request;

class GamerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => ['create','store']]);
    }

    public function index(Request $request)
    {
        //$this->middleware('auth');

        $query = Gamer::query();
        $datatables = GamerDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('gamers.index', $datatables->html());
    }

    public function create()
    {
        return view('gamers.create');
    }

    public function store(GamerRequest $request)
    {
        Gamer::create($request->all());

        // Asignarle un usuario
        $user = User::create([
            'name' => $request->nombre." ".$request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->contrasena),
        ]);

        // Asignación del rol
        $user->assignRole('gamer');

        return $request->input('submit') == 'reload'
            ? redirect()->route('gamers.create')
            : redirect()->route('gamers.index');
    }

    public function show(Gamer $gamer)
    {
        return view('gamers.show', compact('gamer'));
    }

    public function edit(Gamer $gamer)
    {
        return view('gamers.edit', compact('gamer'));
    }

    public function update(GamerRequest $request, Gamer $gamer)
    {
        // Actualizar la cuenta de usuario
        $usuario = DB::table('users')
            ->select('id')
            ->where('email', $gamer->email )->first();

        $affected = DB::table('users')
              ->where('id', $usuario->id)
              ->update([
                  'name' => $request->nombre." ".$request->apellidos,
                  'email' => $request->email,
                  'password' => Hash::make($request->contrasena),
                ]);
        
        // Actualizar datos de gamer
        $gamer->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('gamers.edit', $gamer->id)
            : redirect()->route('gamers.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Gamer $gamer)
    {
        $gamer->delete();

        return redirect()->route('gamers.index');
    }
}
