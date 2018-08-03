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
            '2' =>[
                'nombre' => 'CONTROL DE PLAGAS BASICO EN OFICINA'
            ],
            '3' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO VEHICULOS'
            ],
            '4' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO CONTAINER'
            ],
            '5' => [
                'nombre' => 'CONTROL SOLO ROEDORES' 
            ],
            '6' => [
                'nombre' => 'CONTROL INSECTOS RASTREROS'
            ],
            '7' => [
                'nombre' => 'CONTROL INSECTOS VOLADORES'
            ],
            '8' => [
                'nombre' => 'CONTROL CHINCHES'
            ],
            '9' => [
                'nombre' => 'CONTROL GARRAPATAS'
            ],
            '10' => [
                'nombre' => 'CONTROL PULGAS'
            ],
            '11' => [
                'nombre' => 'CONTROL TERMITAS'
            ],
            '12' => [
                'nombre' => 'CONTROL ABEJAS'
            ],
            '13' => [
                'nombre' => 'CONTROL AVISPAS'
            ],
            '14' => [
                'nombre' => 'DESINFECCION'
            ],
            '15' => [
                'nombre' => 'ESPOLVOREO ELECTRICO'
            ],
            '16' => [
                'nombre' => 'NEBULIZACION'
            ],
            '17' => [
                'nombre' => 'TERMONEBULIZACION'
            ],
            '18'  => [
                'nombre' => 'GASIFICACION'
            ],
            '19' => [
                'nombre' => 'RETIRO DE RESIDUOS / DESCARPADO'
            ],
            '20' => [
                'nombre' => 'INSTALACION ESTACIONES ROEDOR'
            ],
            '21' => [
                'nombre' => 'CONTROL DE PLAGAS EN ZONAS COMUNES'
            ],
            '22' => [
                'nombre' => 'CONTROL EN CASAS Y/O APARTAMENTOS'
            ],
            '23' => [
                'nombre' => 'CONTROL EN CAJAS DE ALCANTARILLA'
            ],
            '24' => [
                'nombre' => 'RUTA LAMPARAS CONTROL INSECTOS VOLADORES'
            ],
            '25' => [
                'nombre' => 'RUTA ESTACIONES CONTROL ROEDORES'
            ],
            '26' => [
                'nombre' => 'CONTROL CARACOLES'
            ],
            '27' => [
                'nombre' => 'CONTROL DE PLAGAS BASICO RESIDENCIAL'
            ]
        ];

            DB::table('tipo_servicios')->insert($tipos);
    }
}
