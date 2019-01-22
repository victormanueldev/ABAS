<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            '0' => [
                'nombre' => 'comercial',
                'descripcion' => 'Área Comercial'
            ],
            '1' => [
                'nombre' => 'contabilidad',
                'descripcion' => 'Área de Contabilidad'
            ],
            '2' => [
                'nombre' => 'programacion',
                'descripcion' => 'Área de Programación'
            ],
            '3' => [
                'nombre' => 'calidad',
                'descripcion' => 'Área de Calidad'
            ]
        ];
        DB::table('areas')->insert($areas);
    }
}
