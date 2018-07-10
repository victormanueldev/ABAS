<?php

use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tecnicos = [
            '0' => [
                'nombre' => 'Carlos Antonio Pérez',
                'color' => 'rgb(69,130,29)'
            ],
            '1' => [
                'nombre' => 'Luis Alejandro Rojas',
                'color' => 'rgb(219,165,37)'
            ],
            '2' => [
                'nombre' => 'Fernando López',
                'color' => 'rgb(92,174,39)'
            ],
            '3' => [
                'nombre' => 'Andrés Stiven Bejarano',
                'color' => 'rgb(255,130,0)'
            ],
            '4' => [
                'nombre' => 'Jhon Alex Barrios',
                'color' => 'rgb(2,112,192)'
            ],
        ];

        DB::table('tecnicos')->insert($tecnicos);
    }
}
