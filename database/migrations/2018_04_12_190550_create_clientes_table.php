<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');//Identificacion BD
            //Datos del Cliente
            $table->string('tipo_cliente', 20)->nullable();
            $table->string('nit_cedula', 20)->nullable();
            $table->string('nombre_cliente', 100)->nullable();
            $table->string('razon_social', 40)->nullable();
            $table->string('sector_economico', 100)->nullable();
            $table->string('municipio', 45)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('barrio', 100)->nullable();
            $table->string('zona', 100)->nullable();
            $table->string('estado_negociacion', 20)->default('Prospecto');
            $table->string('estado_facturacion', 10)->default('Normal');
            $table->string('estado_agendamiento', 10)->default('Activo');
            $table->string('estado_registro', 50);
            //Datos de Contacto Inicial
            $table->string('nombre_contacto_inicial', 100)->nullable();
            $table->string('cargo_contacto_inicial', 100)->nullable();
            $table->string('celular_contacto_inicial', 100)->nullable();
            $table->string('email_contacto_inicial', 100)->nullable();
            //Datos de Contacto Tecnico
            $table->string('nombre_contacto_tecnico', 100)->nullable();
            $table->string('cargo_contacto_tecnico', 100)->nullable();
            $table->string('celular_contacto_tecnico', 100)->nullable();
            $table->string('email_contacto_tecnico', 100)->nullable();
            //Datos de Contacto Facturacion
            $table->string('nombre_contacto_facturacion', 100)->nullable();
            $table->string('cargo_contacto_facturacion', 100)->nullable();
            $table->string('celular_contacto_facturacion', 100)->nullable();
            $table->string('email_contacto_facturacion', 100)->nullable();
            //Informacion de otros servicios
            $table->string('empresa_actual', 100)->nullable();//Empresa que le prestaba al cliente el servicio (fumigacion)
            $table->string('razon_cambio', 100)->nullable();//Porqué quiere empezar con Sanicontrol
            $table->string('medio_contacto', 100)->nullable();//Medio por el cual se entero de Sanicontrol
            $table->string('otro_medio', 100)->nullable();
            //Documentos entregados
            $table->boolean('doc_rut')->default(false);
            $table->boolean('doc_identidad')->default(false);
            $table->boolean('doc_camara_comercio')->default(false);
            // Datos de inicio de sesion VIP
            $table->string('usuario')->unique()->nullable();
            $table->string('password')->nullable();
            //Informacion del Asesor que registra al cliente
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
        Schema::dropIfExists('clientes');
    }
}
