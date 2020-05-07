<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionsTable extends Migration
{
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consola_id');
            $table->foreignId('juego_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignacions');
    }
}
