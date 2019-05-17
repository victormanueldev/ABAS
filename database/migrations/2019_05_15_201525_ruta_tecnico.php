<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RutaTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta_tecnico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruta_id');
            $table->integer('tecnico_id');
            $table->time('hora_entrada');
            $table->time('hora_salida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruta_tecnico');
    }
}
