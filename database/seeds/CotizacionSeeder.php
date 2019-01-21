<?php

use Illuminate\Database\Seeder;

class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cotizaciones = [
            '0' => [
                'codigo' => 'CT-VMA-1',
                'estado' => 'Final',
                'valor' => 756000,
                'cliente_id' => '1',
                'created_at' => '2019-11-29 15:21:00',
                'updated_at' => '2019-11-29 20:21:00'
            ],
            '1' => [
                'codigo' => 'CT-VMA-2',
                'estado' => 'Final',
                'valor' => 350000,
                'cliente_id' => '2',
                'created_at' => '2019-10-29 15:21:00',
                'updated_at' => '2019-10-29 20:21:00'
            ],
            '2' => [
                'codigo' => 'CT-VMA-4',
                'estado' => 'Final',
                'valor' => 875000,
                'cliente_id' => '4',
                'created_at' => '2019-09-29 15:21:00',
                'updated_at' => '2019-09-29 20:21:00'
            ],
            '3' => [
                'codigo' => 'CT-VMA-3',
                'estado' => 'Final',
                'valor' => 450000,
                'cliente_id' => '3',
                'created_at' => '2019-11-29 15:21:00',
                'updated_at' => '2019-11-29 20:21:00'
            ],
            '4' => [
                'codigo' => 'CT-JVP-5',
                'estado' => 'Final',
                'valor' => 640000,
                'cliente_id' => '5',
                'created_at' => '2019-11-29 15:21:00',
                'updated_at' => '2019-11-29 20:21:00'
            ],
            '5' => [
                'codigo' => 'CT-JVP-6',
                'estado' => 'Final',
                'valor' => 710000,
                'cliente_id' => '6',
                'created_at' => '2019-11-29 15:21:00',
                'updated_at' => '2019-11-29 20:21:00'
            ],
        ];
        DB::table('cotizaciones')->insert($cotizaciones);
    }
}
