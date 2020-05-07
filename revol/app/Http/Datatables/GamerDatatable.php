<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class GamerDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('nombre'),
            Column::make('apellidos'),
            Column::make('gamertag'),
            
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['apellidos', 'asc'];
    }

    protected function actions($gamer)
    {
        return view('gamers.actions', compact('gamer'));
    }
}
