<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDulceriasTable extends Migration
{
    public function up()
    {
        Schema::create('dulcerias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_articulo');
            $table->decimal('costo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dulcerias');
    }
}
