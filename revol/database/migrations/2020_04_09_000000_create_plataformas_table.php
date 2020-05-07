<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlataformasTable extends Migration
{
    public function up()
    {
        Schema::create('plataformas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('costo', 4, 2);
            $table->decimal('costo_monedas');
            $table->decimal('monedas_hora');


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plataformas');
    }
}
