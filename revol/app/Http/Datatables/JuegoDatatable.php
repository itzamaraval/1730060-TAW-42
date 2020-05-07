<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class JuegoDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('titulo'),
            Column::make('plataformas'),
            //Column::make('imagen'),
            

            Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['titulo', 'asc'];
    }

    protected function actions($juego)
    {
        return view('juegos.actions', compact('juego'));
    }
}
