<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NovedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $novedades = [
            '0' => [
                'id' => 3,
                'descripcion' => 'Cliente No. 20316 no ha pagado el servicio',
                'estado' => 'publicada',
                'user2_id' => null,
                'user_id' => 1,
                'area_id' => 1,
                'comentario' => null,
                'created_at' => '2018-04-19 15:21:00',
                'updated_at' => null
                
            ],
            '1' => [
                'id' => 2,
                'descripcion' => 'La factura 00565468 no ha sido pagada',
                'estado' => 'publicada',
                'user2_id' => null,
                'user_id' => 2,
                'area_id' => 2,
                'comentario' => null,
                'created_at' => '2018-04-17 15:58:00',
                'updated_at' => null
            ],
            '2' => [
                'id' => 1,
                'descripcion' => 'Cliente 04456 presenta plaga de ratas en la sede principal',
                'estado' => 'publicada',
                'user2_id' => null,
                'user_id' => 1,
                'area_id' => 3,
                'comentario' => 'Novedad resuleta con éxito',
                'created_at' => '2018-04-18 16:58:00',
                'updated_at' => null
            ]
        ];

        DB::table('novedads')->insert($novedades);
    }
}
