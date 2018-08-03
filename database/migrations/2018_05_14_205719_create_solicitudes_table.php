<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('solicitudes', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('codigo', 20);
            $table->date('fecha');
            $table->unsignedTinyInteger('frecuencia');
            #Verificar
            // $table->string('contacto_factura', 50)->nullable();
            // $table->string('telefono', 10)->nullable();
            // $table->string('celular', 10)->nullable();
            $table->string('observaciones', 100)->nullable();
            
            $table->integer('cliente_id');
            $table->integer('sede_id')->default(0)->nullable();
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
    }
}
