<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadTemporalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedad_temporals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->boolean('completado')->default(false);
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
        Schema::dropIfExists('novedad_temporals');
    }
}
