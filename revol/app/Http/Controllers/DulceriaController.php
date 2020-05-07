<?php

namespace App\Http\Controllers;

use App\Dulceria;
use App\Http\Datatables\DulceriaDatatable;
use App\Http\Requests\DulceriaRequest;
use Illuminate\Http\Request;

class DulceriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Dulceria::query();
        $datatables = DulceriaDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('dulcerias.index', $datatables->html());
    }

    public function create()
    {
        return view('dulcerias.create');
    }

    public function store(DulceriaRequest $request)
    {
        Dulceria::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('dulcerias.create')
            : redirect()->route('dulcerias.index');
    }

    public function show(Dulceria $dulceria)
    {
        return view('dulcerias.show', compact('dulceria'));
    }

    public function edit(Dulceria $dulceria)
    {
        return view('dulcerias.edit', compact('dulceria'));
    }

    public function update(DulceriaRequest $request, Dulceria $dulceria)
    {
        $dulceria->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('dulcerias.edit', $dulceria->id)
            : redirect()->route('dulcerias.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Dulceria $dulceria)
    {
        $dulceria->delete();

        return redirect()->route('dulcerias.index');
    }
}
