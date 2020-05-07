<?php

use App\Historial;
use Illuminate\Database\Seeder;

class HistorialSeeder extends Seeder
{
    public function run()
    {
        factory(Historial::class, 25)->create();
    }
}
