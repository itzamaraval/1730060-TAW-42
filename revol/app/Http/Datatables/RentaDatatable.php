<?php

namespace App\Http\Datatables;

use Kejojedi\Crudify\Http\Datatable;
use Yajra\DataTables\Html\Column;

class RentaDatatable extends Datatable
{
    protected function columns()
    {
        return [
            //Column::make('id'),
            Column::make('consola'),
            Column::make('nhoras'),
            Column::make('gamer'),

            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function orderBy()
    {
        return ['id', 'desc'];
    }

    protected function actions($renta)
    {
        return view('rentas.actions', compact('renta'));
    }
}
