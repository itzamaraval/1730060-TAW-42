<?php

namespace App\Http\Controllers;

use App\Premio;
use App\Http\Datatables\PremioDatatable;
use App\Http\Requests\PremioRequest;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Premio::query();
        $datatables = PremioDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('premios.index', $datatables->html());
    }

    public function create()
    {
        return view('premios.create');
    }

    public function store(PremioRequest $request)
    {
        Premio::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('premios.create')
            : redirect()->route('premios.index');
    }

    public function show(Premio $premio)
    {
        return view('premios.show', compact('premio'));
    }

    public function edit(Premio $premio)
    {
        return view('premios.edit', compact('premio'));
    }

    public function update(PremioRequest $request, Premio $premio)
    {
        $premio->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('premios.edit', $premio->id)
            : redirect()->route('premios.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Premio $premio)
    {
        $premio->delete();

        return redirect()->route('premios.index');
    }
}
