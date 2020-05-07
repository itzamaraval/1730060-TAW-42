<?php

use App\Promocion;
use Illuminate\Database\Seeder;

class PromocionSeeder extends Seeder
{
    public function run()
    {
        factory(Promocion::class, 25)->create();
    }
}
