<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            '0' => [
                'cedula' => '1061807769',
                'nombres' => 'Victor Manuel',
                'apellidos' => 'Arenas Lopez',
                'iniciales' => 'VMA',
                'telefono' => '3103195394',
                'foto' => 'default-user.jpg',
                'email' => 'victormalsx@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '1',
                'cargo_id' => '1' 
            ], 
            '1' => [
                'cedula' => '987654321',
                'nombres' => 'Yurani',
                'apellidos' => 'Calvo Ruiz',
                'iniciales' => 'YCR',
                'telefono' => '3103195394',
                'foto' => 'a6.jpg',
                'email' => 'yurani@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '2',
                'cargo_id' => '2' 
            ],
            '2' => [
                'cedula' => '123456789',
                'nombres' => 'Andres Stiven',
                'apellidos' => 'Medina Bejarano',
                'iniciales' => 'ASM',
                'telefono' => '3115552222',
                'foto' => 'a1.jpg',
                'email' => 'andres@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '1',
                'cargo_id' => '1' 
            ],
            '3' => [
                'cedula' => '987654621',
                'nombres' => 'Jhon Edward',
                'apellidos' => 'Nieto',
                'iniciales' => 'JEN',
                'telefono' => '3177777750',
                'foto' => 'a7.jpg',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '3',
                'cargo_id' => '3' 
            ],
            '4' => [
                'cedula' => '654159789',
                'nombres' => 'Jhonny',
                'apellidos' => 'Vargas Perez',
                'iniciales' => 'JVP',
                'telefono' => '3177777750',
                'foto' => 'a9.jpg',
                'email' => 'jhonny@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '3',
                'cargo_id' => '4' 
            ],
            '5' => [
                'cedula' => '951789123',
                'nombres' => 'Jhon',
                'apellidos' => 'Doe',
                'iniciales' => 'JD',
                'telefono' => '3177777750',
                'foto' => 'a10.jpg',
                'email' => 'jhon.doe@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '4',
                'cargo_id' => '5' 
            ],
            '6' => [
                'cedula' => '1062545984',
                'nombres' => 'Diego',
                'apellidos' => 'Leguizamo',
                'iniciales' => 'DLL',
                'telefono' => '321654987',
                'foto' => 'a11.jpg',
                'email' => 'diego@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '6',
                'cargo_id' => '7' 
            ],
            '7' => [
                'cedula' => '687459687',
                'nombres' => 'Sarah',
                'apellidos' => 'Jhonson',
                'iniciales' => 'SCJ',
                'telefono' => '3177777750',
                'foto' => 'a12.jpg',
                'email' => 'sarah@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '5',
                'cargo_id' => '6' 
            ],
            '8' => [
                'cedula' => '99999999',
                'nombres' => 'Fernando',
                'apellidos' => 'Serna',
                'iniciales' => 'FS',
                'telefono' => '3177777750',
                'foto' => 'default-user.jpg',
                'email' => 'fernandoserna@sanicontrol.com',
                'password' => bcrypt('daniel02mafe12'),
                'area_id' => '1',
                'cargo_id' => '1' 
            ],
            '9' => [
                'cedula' => '88888888',
                'nombres' => 'Cristian',
                'apellidos' => 'León',
                'iniciales' => 'CL',
                'telefono' => '3177777750',
                'foto' => 'default-user.jpg',
                'email' => 'cristianleon@sanicontrol.com',
                'password' => bcrypt('jackeline22'),
                'area_id' => '1',
                'cargo_id' => '1' 
            ],
            '10' => [
                'cedula' => '111111111',
                'nombres' => 'Programador',
                'apellidos' => 'Sanicontrol',
                'iniciales' => 'PS',
                'telefono' => '3177777750',
                'foto' => 'default-user.jpg',
                'email' => 'programacion@sanicontrol.com',
                'password' => bcrypt('sanicontrol2012'),
                'area_id' => '3',
                'cargo_id' => '3' 
            ],

            
        ];
        DB::table('users')-> insert($users);
    }
}
