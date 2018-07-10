<?php

use Illuminate\Database\Seeder;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $solicitudes = [
            '0' => [
                'codigo' => 'FS001',
                'fecha' => '2018-04-19 15:21:00',
                'frecuencia' => 7,
                'observaciones' => "Observacion FS01",
                'cliente_id' => 1,
                'sede_id' => 1,
                'created_at' => '2018-04-19 15:21:00',
                'updated_at' => '2018-04-20 20:21:00'
            ],

            '1' => [
                'codigo' => 'FS003',
                'fecha' => '2018-04-19 15:21:00',
                'frecuencia' => 15,
                'observaciones' => "Observacion FS03",
                'cliente_id' => 2,
                'sede_id' => 0,
                'created_at' => '2018-05-19 15:21:00',
                'updated_at' => '2018-05-20 20:21:00'
            ],

            '2' => [
                'codigo' => 'FS004',
                'fecha' => '2018-04-19 15:21:00',
                'frecuencia' => 30,
                'observaciones' => "Observacion FS04",
                'cliente_id' => 3,
                'sede_id' => 0,
                'created_at' => '2018-02-19 15:21:00',
                'updated_at' => '2018-02-20 20:21:00'
            ],

            '3' => [
                'codigo' => 'FS005',
                'cliente_id' => 4,
                'fecha' => '2018-04-19 15:21:00',
                'frecuencia' => 90,
                'observaciones' => "Observacion FS05",
                'sede_id' => 3,
                'created_at' => '2018-02-19 15:21:00',
                'updated_at' => '2018-02-20 20:21:00'
            ]
        ];
        DB::table('solicitudes')->insert($solicitudes);
    }
}
