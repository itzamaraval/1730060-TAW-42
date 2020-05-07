<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentasTable extends Migration
{
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gamer_id');
            $table->foreignId('consola_id');
            $table->decimal('nhoras');
            $table->decimal('monedas_gastadas');

            $table->decimal('total');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rentas');
    }
}
