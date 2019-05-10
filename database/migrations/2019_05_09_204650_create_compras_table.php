<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_factura');
            $table->string('unidad_medida', 2); //Ej: gr, ml o un
            $table->string('total_unidades'); // Ej: 1500 (Multiplicacion del sistema)
            $table->decimal('valor_unidad',10,2); // Ej: 0.01 -> $ 2
            $table->unsignedBigInteger('costo_total');
            $table->integer('producto_id');
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
        Schema::dropIfExists('compras');
    }
}
