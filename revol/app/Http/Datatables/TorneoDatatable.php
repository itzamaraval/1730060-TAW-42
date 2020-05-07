<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class TorneoDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('titulo'),
            Column::make('juego'),
            Column::make('fecha'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['titulo', 'asc'];
    }

    protected function actions($torneo)
    {
        return view('torneos.actions', compact('torneo'));
    }
}
