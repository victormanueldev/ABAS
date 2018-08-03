<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clientes = [
            '0' => [
                'tipo_cliente' => 'Persona Juridica',
                'nombre_cliente' => 'Fruver los Paisas',
                'razon_social' => 'Fruver Colombia S.A.S.',
                'nit_cedula' => '135246849-7',
                'sector_economico' => 'Comercial',
                'municipio' => 'Santiago de Cali',
                'direccion' => 'CRA 2D # 62 - 39',
                'barrio' => 'Guayacanes',
                'zona' => 'Suroriente',
                'nombre_contacto' => 'Jenny Molina',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Gerente General',
                'email' => 'jenny@gmail.com',
                'celular' => '3154874545',
                'empresa_actual' => 'Plagas S.A.S.',
                'razon_cambio' => 'Mal servicio',
                'user_id' => 2,
                'created_at' => '2018-05-07 08:50:00',
                'updated_at' => '2018-05-08 10:31:00'
            ],
            '1' => [
                'tipo_cliente' => 'Persona Natural',
                'nombre_cliente' => 'Luis Felipe Cortéz',
                'razon_social' => null,                
                'nit_cedula' => 32135686,
                'sector_economico' => 'indefinido',
                'municipio' => 'Santiago de Cali',
                'direccion' => 'CRA 4 # 12A - 399',
                'barrio' => 'Caldas',
                'zona' => 'Suroccidente',
                'nombre_contacto' => 'Luis Felipe Cortéz',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Independiente',
                'email' => 'luis@gmail.com',
                'celular' => '311565468',
                'empresa_actual' => 'indefinido',
                'razon_cambio' => 'indefinido',
                'user_id' => 1,
                'created_at' => '2018-05-07 08:50:00',
                'updated_at' => '2018-05-08 10:31:00'
            ],
            '2' => [
                'tipo_cliente' => 'Persona Natural',
                'nombre_cliente' => 'Lina Maria Chavez',
                'razon_social' => null,                
                'nit_cedula' => 987656546,
                'sector_economico' => 'indefinido',
                'municipio' => 'indefinido',
                'direccion' => 'CRA 4A # 45A - 34',
                'barrio' => 'La Campiña',
                'zona' => 'Norte',
                'nombre_contacto' => 'Lina Maria Chavez',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Independiente',
                'email' => 'lian@gmail.com',
                'celular' => '318546813',
                'empresa_actual' => 'indefinido',
                'razon_cambio' => 'indefinido',
                'user_id' => 1,
                'created_at' => '2018-05-07 08:50:00',
                'updated_at' => '2018-05-08 10:31:00'
            ],
            '3' => [
            'tipo_cliente' => 'Persona Juridica',
                'nombre_cliente' => 'Supermercado Super Inter',
                'razon_social' => 'Exito S.A.',
                'nit_cedula' => '654984651-7',
                'sector_economico' => 'Comercial',
                'municipio' => 'Santiago de Cali',
                'direccion' => 'CRA 2D # 62 - 39',
                'barrio' => 'Guayacanes',
                'zona' => 'Suroriente',
                'nombre_contacto' => 'Jenny Molina',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Gerente General',
                'email' => 'jenny@gmail.com',
                'celular' => '3154874545',
                'empresa_actual' => 'Plagas S.A.S.',
                'razon_cambio' => 'Mal servicio',
                'user_id' => 2,
                'created_at' => '2018-05-07 08:50:00',
                'updated_at' => '2018-05-08 10:31:00'
            ],
        ];
        DB::table('clientes')->insert($clientes);
    }
}
