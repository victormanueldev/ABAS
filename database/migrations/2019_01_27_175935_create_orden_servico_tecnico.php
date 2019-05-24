<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenServicoTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicio_tecnico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_servicio_id');
            $table->integer('tecnico_id');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_servicio_tecnico');
    }
}
