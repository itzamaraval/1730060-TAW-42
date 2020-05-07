<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateregistrotorneosTable extends Migration
{
    public function up()
    {
        Schema::create('registro_torneos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('torneo');
            $table->foreignId('gamer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_torneos');
    }
}
