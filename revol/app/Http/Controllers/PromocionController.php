<?php

namespace App\Http\Controllers;

use App\Promocion;
use App\Http\Datatables\PromocionDatatable;
use App\Http\Requests\PromocionRequest;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Promocion::query();
        $datatables = PromocionDatatable::make($query);

        return $request->ajax()
            ? $datatables->json()
            : view('promocions.index', $datatables->html());
    }

    public function create()
    {
        return view('promocions.create');
    }

    public function store(PromocionRequest $request)
    {
        Promocion::create($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('promocions.create')
            : redirect()->route('promocions.index');
    }

    public function show(Promocion $promocion)
    {
        return view('promocions.show', compact('promocion'));
    }

    public function edit(Promocion $promocion)
    {
        return view('promocions.edit', compact('promocion'));
    }

    public function update(PromocionRequest $request, Promocion $promocion)
    {
        $promocion->update($request->all());

        return $request->input('submit') == 'reload'
            ? redirect()->route('promocions.edit', $promocion->id)
            : redirect()->route('promocions.index');
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function destroy(Promocion $promocion)
    {
        $promocion->delete();

        return redirect()->route('promocions.index');
    }
}
