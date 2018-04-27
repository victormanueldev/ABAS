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
                'nombre_cliente' => 'Fruver los Paisas',
                'razon_social' => 'Fruver los Paisas',
                'nit_cedula' => '135246849-7',
                'sector_economico' => 'Comercial',
                'municipio' => 'Santiago de Cali',
                'direccion' => 'CRA 2D # 62 - 39',
                'barrio' => 'Guayacanes',
                'nombre_contacto' => 'Jenny Molina',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'telefono' => '4565495',
                'telefono2' => '6548784',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Gerente General',
                'email' => 'jenny@gmail.com',
                'celular' => '3154874545',
                'empresa_actual' => 'Plagas S.A.S.',
                'razon_cambio' => 'Mal servicio',
                'user_id' => 2
            ],
            '1' => [
                'nombre_cliente' => 'Luis Felipe Cortéz',
                'razon_social' => 'indefinido',
                'nit_cedula' => 32135686,
                'sector_economico' => 'indefinido',
                'municipio' => 'indefinido',
                'direccion' => 'CRA 4 # 12A - 399',
                'barrio' => 'indefinido',
                'nombre_contacto' => 'Luis Felipe Cortéz',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'telefono' => 'indefinido',
                'telefono2' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Independiente',
                'email' => 'luis@gmail.com',
                'celular' => '311565468',
                'empresa_actual' => 'indefinido',
                'razon_cambio' => 'indefinido',
                'user_id' => 1
            ],
            '2' => [
                'nombre_cliente' => 'Lina Maria Chavez',
                'razon_social' => 'indefinido',
                'nit_cedula' => 987656546,
                'sector_economico' => 'indefinido',
                'municipio' => 'indefinido',
                'direccion' => 'CRA 4A # 45A - 34',
                'barrio' => 'indefinido',
                'nombre_contacto' => 'Lina Maria Chavex',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'telefono' => 'indefinido',
                'telefono2' => 'indefinido',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Independiente',
                'email' => 'lian@gmail.com',
                'celular' => '318546813',
                'empresa_actual' => 'indefinido',
                'razon_cambio' => 'indefinido',
                'user_id' => 1
            ],
            '3' => [
                'nombre_cliente' => 'Supermercado Super Inter',
                'razon_social' => 'Super Inter',
                'nit_cedula' => '654984651-7',
                'sector_economico' => 'Comercial',
                'municipio' => 'Santiago de Cali',
                'direccion' => 'CRA 2D # 62 - 39',
                'barrio' => 'Guayacanes',
                'nombre_contacto' => 'Jenny Molina',
                'contacto_tecnico' => 'indefinido',
                'cargo_contacto_tecnico' => 'indefinido',
                'cargo_contacto' => 'indefinido',
                'telefono' => '4565495',
                'telefono2' => '6548784',
                'extension' => 'indefinido',
                'cargo_contacto' => 'Gerente General',
                'email' => 'jenny@gmail.com',
                'celular' => '3154874545',
                'empresa_actual' => 'Plagas S.A.S.',
                'razon_cambio' => 'Mal servicio',
                'user_id' => 2
            ],
        ];
        DB::table('clientes')->insert($clientes);
    }
}
