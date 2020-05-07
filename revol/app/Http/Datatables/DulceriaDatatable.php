<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class DulceriaDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('nombre_articulo'),
            Column::make('costo'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['nombre_articulo', 'asc'];
    }

    protected function actions($dulceria)
    {
        return view('dulcerias.actions', compact('dulceria'));
    }
}
