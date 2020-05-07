<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolasTable extends Migration
{
    public function up()
    {
        Schema::create('consolas', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->foreignId('plataforma_id');
            $table->string('serial')->nullable(); //opcional

            $table->boolean('disponible')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consolas');
    }
}
