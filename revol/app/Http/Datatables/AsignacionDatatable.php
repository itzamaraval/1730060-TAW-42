<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class AsignacionDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('numero'),
            Column::make('titulo'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['consola_id', 'asc'];
    }

    protected function actions($asignacion)
    {
        return view('asignacions.actions', compact('asignacion'));
    }
}
