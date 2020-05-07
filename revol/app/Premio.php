<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kejojedi\Crudify\Traits\FillsColumns;
use Kejojedi\Crudify\Traits\SerializesDates;

class Premio extends Model
{
    use FillsColumns, SerializesDates;
}
