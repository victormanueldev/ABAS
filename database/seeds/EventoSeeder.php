<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = [
            '0' => [
                'fecha_inicio' => '2018-04-15 14:00:00',
                'fecha_fin' => '2018-04-15 15:00:00',
                'dia_completo' => '0',
                'color' => 'rgb(219, 165, 37)',
                'asunto' => 'Llamar al cliente 03219689',
                'tipo' => 'Llamada',
                'user_id' => '1'
            ],
            '1' => [
                'fecha_inicio' => '2018-04-14 14:00:00',
                'fecha_fin' => '2018-04-14 17:00:00',
                'dia_completo' => '0',
                'color' => 'rgb(92, 174, 39)',
                'asunto' => 'Visita al cliente 03219689',
                'tipo' => 'Visita',
                'user_id' => '1'
            ],
            '2' => [
                'fecha_inicio' => '2018-04-03 14:00:00',
                'fecha_fin' => '2018-04-03 17:00:00',
                'dia_completo' => '0',
                'color' => 'rgb(219, 165, 37)',
                'asunto' => 'Llamar al cliente 9865465',
                'tipo' => 'Llamada',
                'user_id' => '2'
            ],
            '3' => [
                'fecha_inicio' => '2018-04-14 14:00:00',
                'fecha_fin' => '2018-04-18 17:00:00',
                'dia_completo' => '0',
                'color' => 'rgb(92, 174, 39)',
                'asunto' => 'Visita al cliente 96546ASD',
                'tipo' => 'Visita',
                'user_id' => '2'
            ]
        ];
        DB::table('eventos')->insert($eventos);
    }
}
