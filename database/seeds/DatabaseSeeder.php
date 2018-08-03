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
        $this->call(EventoSeeder::class);
        $this->call(TareaSeeder::class);
        $this->call(NovedadSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(SolicitudSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(TecnicoSeeder::class);
        $this->call(TipoServicioSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
