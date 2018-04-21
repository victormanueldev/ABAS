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
                'descripcion' => 'Área Contabilidad'
            ]
        ];
        DB::table('areas')->insert($areas);
    }
}
