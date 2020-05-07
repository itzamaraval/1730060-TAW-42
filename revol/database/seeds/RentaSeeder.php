<?php

use App\Renta;
use Illuminate\Database\Seeder;

class RentaSeeder extends Seeder
{
    public function run()
    {
        factory(Renta::class, 25)->create();
    }
}
