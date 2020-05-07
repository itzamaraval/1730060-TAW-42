<?php

use App\Ejemplo;
use Illuminate\Database\Seeder;

class EjemploSeeder extends Seeder
{
    public function run()
    {
        factory(Ejemplo::class, 25)->create();
    }
}
