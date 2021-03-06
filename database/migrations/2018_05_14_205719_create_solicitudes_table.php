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
            $table->string('observaciones')->nullable(); 
            //Plan de saneamiento
            $table->text('visitas');
            $table->integer('valor_plan_saneamiento');
            $table->string('frecuencia_visitas');
            $table->string('observaciones_visitas');
            //Detalle del servicio correctivo y/o preventivo
            $table->text('detalle_servicios');
            $table->integer('total_detalle_servicios');
            //Facturacion
            $table->string('tipo_facturacion');
            $table->string('forma_pago');
            $table->boolean('contrato');
            //Numero de residencias
            $table->text('residencias');
            //Inventario inicial del cliente
            $table->integer('cant_lampara_lamina');
            $table->integer('cant_lampara_insectocutora');
            $table->integer('cant_trampas');
            $table->integer('cant_jaulas');
            $table->integer('cant_estaciones_roedor');
            $table->string('observaciones_estaciones');
            $table->integer('cant_cajas_alca_elec');
            $table->integer('sumideros');
            //Compra de dispositivos
            $table->text('compra_dispositivos');
            //Dispositivos comodato para la propuesta
            $table->text('dispositivos_comodato');
            //Gestion de calidad
            $table->text('gestion_calidad');
            //Descripcion de las Areas
            $table->text('areas');
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
