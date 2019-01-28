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
            $table->integer('servicio_id');
            $table->text('areas_plagas')->nullable();
            $table->text('nivel_actividad');
            $table->boolean('realizo_inspeccion')->default(false);
            $table->boolean('tratamiento_correctivo')->default(false);
            $table->boolean('tratamiento_preventivo')->default(false);
            $table->boolean('requiere_refuerzo')->default(false);
            $table->boolean('mejorar_frecuencia')->default(false);
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
