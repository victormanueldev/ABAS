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
                'codigo' => 'AM001',
                'cliente_id' => '1',
                'created_at' => '2018-04-19 15:21:00',
                'updated_at' => '2018-04-20 20:21:00'
            ],

            '1' => [
                'codigo' => 'YC001',
                'cliente_id' => '2',
                'created_at' => '2018-05-19 15:21:00',
                'updated_at' => '2018-05-20 20:21:00'
            ],

            '2' => [
                'codigo' => 'VA001',
                'cliente_id' => '3',
                'created_at' => '2018-02-19 15:21:00',
                'updated_at' => '2018-02-20 20:21:00'
            ]
        ];
        DB::table('solicitudes')->insert($solicitudes);
    }
}
