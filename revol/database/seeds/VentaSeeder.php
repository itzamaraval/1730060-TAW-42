<?php

use App\Venta;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    public function run()
    {
        factory(Venta::class, 25)->create();
    }
}
