<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class HistorialDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('consola'),
            Column::make('nhoras'),
            Column::make('total'),
            Column::make('created_at'),
        ];
    }

    protected function orderBy()
    {
        return ['name', 'asc'];
    }

    protected function actions($historial)
    {
        return view('historials.actions', compact('historial'));
    }
}
