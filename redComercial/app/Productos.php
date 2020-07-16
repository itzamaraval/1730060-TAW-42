<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'id_categoria', 'id_empresa'];
}
