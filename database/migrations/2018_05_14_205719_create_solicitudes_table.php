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
            $table->date('fecha');
            $table->unsignedTinyInteger('frecuencia');
            // $table->string('contacto_factura', 50)->nullable();
            // $table->string('telefono', 10)->nullable();
            // $table->string('celular', 10)->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->string('contacto_telefono_factura',100)->nullable();
            $table->string('contacto_name_factura',100)->nullable();
            $table->string('contacto_celular_factura',100)->nullable();
            $table->string('observaciones_tecnico',100)->nullable();
            $table->string('diagnostico_inicial',100)->nullable();
            $table->string('cronograma_servicios',100)->nullable();
            $table->string('visita_calidad',100)->nullable();
            $table->string('frecuencia_calidad',100)->nullable();
            $table->string('frecuencia_visitas',100)->nullable();
            $table->string('visita_1',100)->nullable();
            $table->string('visita_2',100)->nullable();
            $table->string('visita_3',100)->nullable();
            $table->string('visita_4',100)->nullable();
            $table->string('total_horas_visita',100)->nullable();
            $table->string('valor_hora',100)->nullable();
            $table->string('valor_facturar',100)->nullable();
            $table->string('instrucciones',100)->nullable();
            $table->string('servicios_contratados',100)->nullable();
            $table->string('frecuencia_plagas',100)->nullable();
            $table->string('tipo_cliente',100)->nullable();
            $table->string('tapa_alcantarilla',100)->nullable();
            $table->string('numero_tapas',100)->nullable();
            $table->string('numero_residencias',100)->nullable();
            $table->string('horas_semanales',100)->nullable();
            $table->string('horas_mensuales',100)->nullable();
            $table->string('horas_trimestrales',100)->nullable();
            $table->string('horas_semestrales',100)->nullable();
            $table->string('horas_quincenales',100)->nullable();
            $table->string('horas_bimensuales',100)->nullable();
            $table->string('horas_4meses',100)->nullable();
            $table->string('horas_anuales',100)->nullable();
            $table->string('total_horas_cotizadas',100)->nullable();
            $table->string('valor_hora_antes',100)->nullable();
            $table->string('valor_inicia_antes',100)->nullable();
            $table->string('forma_pago',100)->nullable();
            $table->string('facturacion',100)->nullable();
            $table->string('contrato',100)->nullable();
            $table->string('numero_contrato',100)->nullable();
            $table->string('actividad_economica',100)->nullable();
            $table->string('medio_contacto',100)->nullable();
            $table->string('otro',100)->nullable();
            $table->string('nombre_usuario',100)->nullable();
            $table->string('nombre_usuario_revisado',100)->nullable();

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
