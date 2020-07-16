<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $fillable = ['nombre', 'direccion', 'url', 'giro', 'rfc', 'status'];
}
