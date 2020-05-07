<?php

use App\Premio;
use Illuminate\Database\Seeder;

class PremioSeeder extends Seeder
{
    public function run()
    {
        factory(Premio::class, 25)->create();
    }
}
