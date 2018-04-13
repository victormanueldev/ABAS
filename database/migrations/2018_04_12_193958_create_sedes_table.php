<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');//Identificador BD
            //Informacion de la Sede
            $table->string('nombre', 100);
            $table->string('direccion', 100);
            $table->string('ciudad', 100);
            $table->string('barrio', 100);
            $table->string('zona_ruta', 100);
            //Informacion del Contacto
            $table->string('nombre_contacto', 100);
            $table->string('telefono_contacto', 15);
            $table->string('celular_contacto', 20);
            $table->string('email', 100);
            //Informacion del Cliente
            $table->integer('cliente_id');
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
        Schema::dropIfExists('sedes');
    }
}
