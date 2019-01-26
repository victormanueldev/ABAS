<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 20);
            $table->string('areas_plagas')->nullable();
            $table->string('nivel_actividad');
            $table->boolean('realizo_inspeccion')->default(false);
            $table->boolean('tratamiento_correctivo')->default(false);
            $table->boolean('tratamiento_preventivo')->default(false);
            $table->boolean('requiere_refuerzo')->default(false);
            $table->boolean('mejorar_frecuencia')->default(false);
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
        Schema::dropIfExists('orden_servicios');
    }
}
