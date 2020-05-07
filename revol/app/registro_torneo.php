<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kejojedi\Crudify\Traits\FillsColumns;
use Kejojedi\Crudify\Traits\SerializesDates;

class registro_torneo extends Model
{
    use FillsColumns, SerializesDates;
}
