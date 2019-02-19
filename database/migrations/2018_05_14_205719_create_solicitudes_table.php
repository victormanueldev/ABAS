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
            $table ->string('nombre_usuario')->nullable();
            $table->date('fecha');
            $table->string('frecuencia',15);
            $table->string('contacto_name_factura', 20)->nullable();
            $table->string('contacto_telefono_factura', 20)->nullable();
            $table->string('contacto_celular_factura', 20)->nullable();
            $table->string('observaciones')->nullable();
            $table->string('total_plan', 20)->nullable();
            $table->string('instrucciones', 20)->nullable();
            $table->string('estaciones_roedor', 20)->nullable();
            $table->string('lamparas_control', 20)->nullable();
            $table->string('cajas_alcantarilla', 20)->nullable();
            $table->string('trampas_plasticas', 20)->nullable();
            $table->string('numero_casas', 20)->nullable();
            $table->string('numero_aptos', 20)->nullable();
            $table->string('numero_bodegas', 20)->nullable();
            $table->string('contrato', 20)->nullable();
            $table->string('forma_pago', 20)->nullable();
            $table->string('facturacion', 20)->nullable();
            $table->string('servicios_1', 20)->nullable();
            $table->string('frecuencia_servicios_1', 20)->nullable();
            $table->string('valor_servicios_1', 20)->nullable();
            $table->string('servicios_2', 20)->nullable();
            $table->string('frecuencia_servicios_2', 20)->nullable();
            $table->string('valor_servicios_2', 20)->nullable();
            $table->string('servicios_3', 20)->nullable();
            $table->string('frecuencia_servicios_3', 20)->nullable();
            $table->string('valor_servicios_3', 20)->nullable();
            $table->string('total_servicios', 20)->nullable();
            $table->string('dispositivos_1', 20)->nullable();
            $table->string('cantidad_dispositivos_1', 20)->nullable();
            $table->string('unidad_dispositivos_1', 20)->nullable();
            $table->string('total_dispositivos_1', 20)->nullable();
            $table->string('dispositivos_2', 20)->nullable();
            $table->string('cantidad_dispositivos_2', 20)->nullable();
            $table->string('unidad_dispositivos_2', 20)->nullable();
            $table->string('total_dispositivos_2', 20)->nullable();
            $table->string('dispositivos_3', 20)->nullable();
            $table->string('cantidad_dispositivos_3', 20)->nullable();
            $table->string('unidad_dispositivos_3', 20)->nullable();
            $table->string('total_dispositivos_3', 20)->nullable();
            $table->string('observaciones_dispositivos', 20)->nullable();
            $table->string('dispositivos_comodato_1', 20)->nullable();
            $table->string('cantidad_dispositivos_comodato_1', 20)->nullable();
            $table->string('unidad_dispositivos_comodato_1', 20)->nullable();
            $table->string('total_dispositivos_comodato_1', 20)->nullable();
            $table->string('dispositivos_comodato_2', 20)->nullable();
            $table->string('cantidad_dispositivos_comodato_2', 20)->nullable();
            $table->string('unidad_dispositivos_comodato_2', 20)->nullable();
            $table->string('total_dispositivos_comodato_2', 20)->nullable();
            $table->string('dispositivos_comodato_3', 20)->nullable();
            $table->string('cantidad_dispositivos_comodato_3', 20)->nullable();
            $table->string('unidad_dispositivos_comodato_3', 20)->nullable();
            $table->string('total_dispositivos_comodato_3', 20)->nullable();
            $table->string('observaciones_dispositivos_comodato', 20)->nullable();
            $table->string('medio_contacto', 20)->nullable();
            $table->string('otro', 20)->nullable();

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
        Schema::dropIfExists('solicitudes');
    }
}
