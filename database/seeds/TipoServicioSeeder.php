<?php

use Illuminate\Database\Seeder;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos = [
            '0' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO SIN ROEDORES'
            ],
            '1' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO Y ROEDORES'
            ],
            '2' => [
                'nombre' => 'CONTROL SOLO ROEDORES' 
            ],
            '3' => [
                'nombre' => 'CONTROL INSECTOS RASTREROS'
            ],
            '4' => [
                'nombre' => 'CONTROL INSECTOS VOLADORES'
            ],
            '5' => [
                'nombre' => 'CONTROL CHINCHES'
            ],
            '6' => [
                'nombre' => 'CONTROL GARRAPATAS'
            ],
            '7' => [
                'nombre' => 'CONTROL PULGAS'
            ],
            '8' => [
                'nombre' => 'CONTROL TERMITAS'
            ],
            '9' => [
                'nombre' => 'CONTROL ABEJAS'
            ],
            '10' => [
                'nombre' => 'CONTROL AVISPAS'
            ],
            '11' => [
                'nombre' => 'DESINFECCION'
            ],
            '12' => [
                'nombre' => 'ESPOLVOREO ELECTRICO'
            ],
            '13' => [
                'nombre' => 'NEBULIZACION'
            ],
            '14' => [
                'nombre' => 'TERMONEBULIZACION'
            ],
            '15'  => [
                'nombre' => 'GASIFICACION'
            ],
            '16' => [
                'nombre' => 'RETIRO DE RESIDUOS / DESCARPADO'
            ],
            '17' => [
                'nombre' => 'INSTALACION ESTACIONES ROEDOR'
            ],
            '18' => [
                'nombre' => 'CONTROL DE PLAGAS EN ZONAS COMUNES'
            ],
            '19' => [
                'nombre' => 'CONTROL EN CASAS Y/O APARTAMENTOS'
            ],
            '20' => [
                'nombre' => 'CONTROL EN CAJAS DE ALCANTARILLA'
            ],
            '21' => [
                'nombre' => 'RUTA LAMPARAS CONTROL INSECTOS VOLADORES'
            ],
            '22' => [
                'nombre' => 'RUTA ESTACIONES CONTROL ROEDORES'
            ],
            '22' => [
                'nombre' => 'CONTROL CARACOLES'
            ],
            '23' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO RESIDENCIAL'
            ]
        ];

            DB::table('tipo_servicios')->insert($tipos);
    }
}
