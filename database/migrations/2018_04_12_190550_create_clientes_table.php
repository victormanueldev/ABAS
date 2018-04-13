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
            $table->string('nombre_cliente', 100);
            $table->string('razon_social', 100)->nullable();
            $table->string('nit_cedula', 20)->unique()->nullable();
            $table->string('sector_economico', 100)->nullable();
            $table->string('municipio', 45)->nullable();
            $table->string('direccion', 100);
            $table->string('barrio', 100)->nullable();
            //Datos de Contacto
            $table->string('nombre_contacto', 100);
            $table->string('contacto_tecnico', 100)->nullable();//Verificar
            $table->string('cargo_contacto_tecnico', 100)->nullable();//Verificar
            $table->string('cargo_contacto', 100);
            $table->string('email');
            $table->string('telefono', 15);
            $table->string('telefono2', 15)->nullable();
            $table->string('extension',15)->nullable();
            $table->string('celular', 20);
            //Informacion de otros servicios
            $table->string('empresa_actual')->nullable();//Empresa que le presta al cliente el servicio (fumigacion)
            $table->string('razon_cambio')->nullable();//Porqué quiere empezar con Sanicontrol
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
