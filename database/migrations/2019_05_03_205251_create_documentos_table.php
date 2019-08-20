<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo');               // {tipo_documento}{id_sede}{fecha_inicio}
            $table->string('tipo');                 // Abreviacion de tipos de documentos (inspeccion)
            $table->date('fecha_inicio_vigencia');  
            $table->date('fecha_fin_vigencia');
            $table->string('url');                  //URL de Google drive donde se guarda
            //Info del Cliente
            $table->integer('cliente_id');
            $table->integer('sede_id');  
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
        Schema::dropIfExists('documentos');
    }
}
