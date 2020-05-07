<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamersTable extends Migration
{
    public function up()
    {
        Schema::create('gamers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nac');
            $table->integer('genero');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('gamertag')->nullable();
            $table->string('contrasena')->nullable();
            $table->string('redes_sociales')->nullable();
            $table->integer('monedas')->default(0)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gamers');
    }
}
