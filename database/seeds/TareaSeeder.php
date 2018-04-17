<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tareas = [
            '0' => [
                'asunto' => 'Llamar al cliente #0321498',
                'completado' => '0',
                'user_id' => '1'
            ],
            '1' => [
                'asunto' => 'Pagar recibo de Energia',
                'completado' => '1',
                'user_id' => '1'
            ],
            '2' => [
                'asunto' => 'LLamar a Jhon',
                'completado' => '0',
                'user_id' => '1'
            ],
            '3' => [
                'asunto' => 'Pasar lso clientes a ABAS',
                'completado' => '0',
                'user_id' => '2'
            ],
            '4' => [
                'asunto' => 'Poner en el calendario algo',
                'completado' => '1',
                'user_id' => '2'
            ]
        ];

        DB::table('tareas')->insert($tareas);
    }
}
