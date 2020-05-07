<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('juego');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('modalidad');
            $table->decimal('forma');
            $table->decimal('max_jugadores');
            $table->string('descripcion');
            $table->foreignId('premios');
            $table->decimal('estatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('torneos');
    }
}
