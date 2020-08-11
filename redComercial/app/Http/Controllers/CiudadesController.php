<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    // 
    public function index()
    {
        //
        $ciudades = Ciudad::all();
       
    }

    public function store(Request $request)
    {
        $ciudad = request()->except('_token');
        Ciudad::insert($ciudad);
    }

    public function show(Ciudades $ciudades)
    {
        //
    }
}
