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
        DB::table('users')-> insert([
            'cedula' => '1061807769',
            'nombres' => 'Victor Manuel',
            'apellidos' => 'Arenas Lopez',
            'telefono' => '3103195394',
            'foto' => 'default-user.jpg',
            'email' => 'victormalsx@gmail.com',
            'password' => bcrypt('1234567'),
            'area_id' => '1',
            'cargo_id' => '1' 
        ]);
    }
}
