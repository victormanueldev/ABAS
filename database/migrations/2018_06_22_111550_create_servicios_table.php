<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 30);
            $table->unsignedSmallInteger('frecuencia');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin')->nullable();
            $table->unsignedMediumInteger('duracion');//Minutos
            $table->string('color', 25);
            $table->integer('tecnico_id')->nullable();
            $table->integer('solicitud_id');
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
        Schema::dropIfExists('servicios');
    }
}
