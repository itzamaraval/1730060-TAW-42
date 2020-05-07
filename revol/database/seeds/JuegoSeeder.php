<?php

use App\Juego;
use Illuminate\Database\Seeder;

class JuegoSeeder extends Seeder
{
    public function run()
    {
        factory(Juego::class, 25)->create();
    }
}
