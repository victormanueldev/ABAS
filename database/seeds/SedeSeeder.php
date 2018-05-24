<?php

use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sedes = [
            '0' => [
                'nombre' => 'Fruver Santa Librada',
                'direccion' => 'CRA 46 #54 - 44',
                'ciudad' => 'Cali',
                'barrio' => 'Santa Librada',
                'zona_ruta' => 'Centro',
                'nombre_contacto' => 'Ricardo',
                'telefono_contacto' => '126456',
                'celular_contacto' => '31321898',
                'email' => 'ricardo@gmail.com',
                'cliente_id'=> '1'
            ],
            '1' => [
                'nombre' => 'Fruver Chipichape',
                'direccion' => 'CRA 6 #51 - 44',
                'ciudad' => 'Cali',
                'barrio' => 'Chipichape',
                'zona_ruta' => 'Norte',
                'nombre_contacto' => 'Francisco',
                'telefono_contacto' => '126456',
                'celular_contacto' => '31321898',
                'email' => 'francisco@gmail.com',
                'cliente_id'=> '1'
            ],
            '2' => [
                'nombre' => 'Super Inter La  Flora',
                'direccion' => 'CRA 5 #65 - 44',
                'ciudad' => 'Cali',
                'barrio' => 'La Flora',
                'zona_ruta' => 'Norte',
                'nombre_contacto' => 'juan',
                'telefono_contacto' => '126456',
                'celular_contacto' => '31321898',
                'email' => 'juan@gmail.com',
                'cliente_id'=> '4'
            ],
            '3' => [
                'nombre' => 'Super Inter San Fernando',
                'direccion' => 'CRA 46 #54 - 44',
                'ciudad' => 'Cali',
                'barrio' => 'San Fernando',
                'zona_ruta' => 'Centro',
                'nombre_contacto' => 'Jorge',
                'telefono_contacto' => '126456',
                'celular_contacto' => '31321898',
                'email' => 'Jorge@gmail.com',
                'cliente_id'=> '4'
            ]
        ];
        DB::table('sedes')->insert($sedes);
    }
}
