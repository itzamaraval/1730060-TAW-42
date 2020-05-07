<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class ConsolaDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('numero'),
            Column::make('plataforma'),

            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['plataforma', 'asc'];
    }

    protected function actions($consola)
    {
        return view('consolas.actions', compact('consola'));
    }
}
