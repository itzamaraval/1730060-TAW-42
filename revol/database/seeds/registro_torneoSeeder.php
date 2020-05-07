<?php

use App\registro_torneo;
use Illuminate\Database\Seeder;

class registro_torneoSeeder extends Seeder
{
    public function run()
    {
        factory(registro_torneo::class, 25)->create();
    }
}
