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
                'email_contacto' => 'ricardo@gmail.com',
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
                'email_contacto' => 'francisco@gmail.com',
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
                'email_contacto' => 'juan@gmail.com',
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
                'email_contacto' => 'Jorge@gmail.com',
                'cliente_id'=> '4'
            ],
            '5' => [
                'nombre' => 'California La Rivera',
                'direccion' => 'CLL 70 #35 - 44',
                'ciudad' => 'Cali',
                'barrio' => 'La Rivera',
                'zona_ruta' => 'Norte',
                'nombre_contacto' => 'Alfredo',
                'telefono_contacto' => '9516546',
                'celular_contacto' => '31321800',
                'email_contacto' => 'alfredo@gmail.com',
                'cliente_id'=> '5'
            ]
        ];
        DB::table('sedes')->insert($sedes);
    }
}
