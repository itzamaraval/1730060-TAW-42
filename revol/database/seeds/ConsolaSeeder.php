<?php

use App\Consola;
use Illuminate\Database\Seeder;

class ConsolaSeeder extends Seeder
{
    public function run()
    {
        factory(Consola::class, 25)->create();
    }
}
