<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            '0' => [
                'nombre' => 'asesorcom',
                'descripcion' => 'Inspector Comercial'
            ],
            '1' => [
                'nombre' => 'contabilidad',
                'descripcion' => 'Auxiliar Contable'
            ],
            '2' => [
                'nombre' => 'programacion',
                'descripcion' => 'Programador'
            ],
            '3' => [
                'nombre' => 'directorcom',
                'descripcion' => 'Director Comercial'
            ],
            '4' => [
                'nombre' => 'auditor',
                'descripcion' => 'Auditor General'
            ],
            '5' => [
                'nombre' => 'agentedeservicio',
                'descripcion' => 'Representante de Servicio al Cliente'
            ],
            '6' => [
                'nombre' => 'jefetecnico',
                'descripcion' => 'Jefe Técnico'
            ]
        ];
        DB::table('cargos')->insert($cargos);
    }
}
