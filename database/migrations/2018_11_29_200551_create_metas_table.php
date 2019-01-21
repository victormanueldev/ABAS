<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meta_clientes_nuevos');
            $table->string('tipo_meta', 15);
            $table->integer('meta_equipo_clientes_nuevos')->default(0)->nullable();
            $table->integer('meta_recompras');
            $table->integer('meta_equipo_recompras')->default(0)->nullable();
            $table->integer('mes_vigencia');
            $table->integer('meta_anual_inpector')->default(0)->nullable();
            $table->integer('meta_anual_equipo')->default(0)->nullable();
            $table->integer('anio_vigencia');
            $table->integer('user_id');
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
        Schema::dropIfExists('metas');
    }
}
