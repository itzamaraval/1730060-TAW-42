<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class VentaDatatable extends Datatable
{
    protected function columns()
    {
        return [
            Column::make('id'),
            Column::make('gamer'),
            Column::make('articulo'),
            Column::make('cantidad'),
            Column::make('monto_total'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['id', 'desc'];
    }

    protected function actions($venta)
    {
        return view('ventas.actions', compact('venta'));
    }
}