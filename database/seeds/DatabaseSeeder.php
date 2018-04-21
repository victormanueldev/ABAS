<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(EventoSeeder::Class);
        $this->call(TareaSeeder::class);
        $this->call(NovedadSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
