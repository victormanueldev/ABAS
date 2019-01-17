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
            $table->unsignedSmallInteger('frecuencia')->nullable();
            $table->string('frecuencia_str', 10)->nullable();
            $table->string('serie', 10)->nullable();
            $table->string('tipo')->default('Normal');
            $table->date('fecha_inicio');
            $table->time('hora_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->time('hora_fin')->nullable();
            $table->unsignedMediumInteger('duracion')->nullable();//Minutos
            $table->boolean('confirmado')->default(false);
            $table->string('color', 25);
            $table->string('observaciones', 120);
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
