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
                'telefono' => '3103195394',
                'foto' => 'a6.jpg',
                'email' => 'yurani@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '1',
                'cargo_id' => '1' 
            ],
            '2' => [
                'cedula' => '123456789',
                'nombres' => 'Andres Stiven',
                'apellidos' => 'Medina Bejarano',
                'telefono' => '3115552222',
                'foto' => 'a1.jpg',
                'email' => 'andres@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '2',
                'cargo_id' => '2' 
            ],
            '3' => [
                'cedula' => '987654621',
                'nombres' => 'Jhon Edward',
                'apellidos' => 'Nieto',
                'telefono' => '3177777750',
                'foto' => 'a7.jpg',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('1234567'),
                'area_id' => '3',
                'cargo_id' => '3' 
            ]
        ];
        DB::table('users')-> insert($users);
    }
}
