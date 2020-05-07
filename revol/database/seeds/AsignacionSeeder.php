<?php

use App\Asignacion;
use Illuminate\Database\Seeder;

class AsignacionSeeder extends Seeder
{
    public function run()
    {
        factory(Asignacion::class, 25)->create();
    }
}
