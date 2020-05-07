<?php

use App\Plataforma;
use Illuminate\Database\Seeder;

class PlataformaSeeder extends Seeder
{
    public function run()
    {
        factory(Plataforma::class, 25)->create();
    }
}
