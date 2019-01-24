<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTipoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_tipo_servicio', function (Blueprint $table) {
            $table->increments('id_servicio_tipo');
            $table->integer('servicio_id');
            $table->integer("tipo_servicio_id");
            $table->string('numero_factura')->nullable();
            $table->integer('valor')->nullable();
            $table->string('estado')->default('na');
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
        Schema::dropIfExists('servicio_tipo_servicio');
    }
}
