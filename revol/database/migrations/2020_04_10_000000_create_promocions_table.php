<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionsTable extends Migration
{
    public function up()
    {
        Schema::create('promocions', function (Blueprint $table) {
            $table->id();
            $table->decimal("porcentaje_ventas")->default(0);

            $table->decimal('cantidad_invitacion')->default(0);
            $table->decimal('monedas_invitacion')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promocions');
    }
}
