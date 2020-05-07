<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class PlataformaDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('nombre'),
            Column::make('costo'),
            Column::make('costo_monedas'),
            Column::make("monedas_hora"),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['name', 'asc'];
    }

    protected function actions($plataforma)
    {
        return view('plataformas.actions', compact('plataforma'));
    }
}
