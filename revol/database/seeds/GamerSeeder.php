<?php

use App\Gamer;
use Illuminate\Database\Seeder;

class GamerSeeder extends Seeder
{
    public function run()
    {
        factory(Gamer::class, 25)->create();
    }
}
