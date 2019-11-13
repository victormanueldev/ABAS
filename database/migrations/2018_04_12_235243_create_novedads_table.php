<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedads', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->text('descripcion');  
            $table->string('estado', 15)->default('publicada');
            $table->integer('user2_id')->nullable();
            $table->string('prioridad')->default('Normal');
            $table->integer('user_id');
            $table->string('tipo')->default('Novedad');
            $table->integer('area_id');
            $table->integer('cliente_id')->nullable();
            $table->integer('sede_id')->nullable();
            $table->text('comentario', 60)->nullable();
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
        Schema::dropIfExists('novedads');
    }
}
