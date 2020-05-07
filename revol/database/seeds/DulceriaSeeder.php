<?php

use App\Dulceria;
use Illuminate\Database\Seeder;

class DulceriaSeeder extends Seeder
{
    public function run()
    {
        factory(Dulceria::class, 25)->create();
    }
}
