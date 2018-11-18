<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('certificados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_tratada');
            $table->string('frecuencia');
            $table->json('tratamientos');
            $table->json('productos');
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
        //
        Schema::dropIfExists('certificados');
    }
}
