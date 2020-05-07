<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiosTable extends Migration
{
    public function up()
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->id();
            $table->string('primer_lugar');
            $table->string('segundo_lugar');
            $table->string('tercer_lugar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('premios');
    }
}
