<?php

use App\Torneo;
use Illuminate\Database\Seeder;

class TorneoSeeder extends Seeder
{
    public function run()
    {
        factory(Torneo::class, 25)->create();
    }
}
