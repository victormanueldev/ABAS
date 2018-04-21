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
                'descripcion' => 'Asesor Comercial'
            ],
            '1' => [
                'nombre' => 'auxcontable',
                'descripcion' => 'Auxiliar Contable'
            ]
        ];
        DB::table('cargos')->insert($cargos);
    }
}
