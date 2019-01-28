<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productos = [
            '0' => [
                'nombre_comercial' => 'Polvo',
                'tipo' => 'insecticida',
                'presentacion' => 'po',
                'unidad_medida' => 'gr',
                'total_unidades' => 15000.0,
                'valor_unidad' => 2.01,
                'costo_total' => 30000
            ],
            '1' => [
                'nombre_comercial' => 'Gel',
                'tipo' => 'insecticida',
                'presentacion' => 'gel',
                'unidad_medida' => 'gr',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.08,
                'costo_total' => 30000
            ],
            '2' => [
                'nombre_comercial' => 'Fosfuro de Aluminio',
                'tipo' => 'insecticida',
                'presentacion' => 'bp',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.5,
                'costo_total' => 30000
            ],
            '3' => [
                'nombre_comercial' => 'Cebo Café',
                'tipo' => 'insecticida',
                'presentacion' => 'bp',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.8,
                'costo_total' => 30000
            ],
            '4' => [
                'nombre_comercial' => 'Cebo Verde',
                'tipo' => 'insecticida',
                'presentacion' => 'bp',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.0,
                'costo_total' => 30000
            ],
            '5' => [
                'nombre_comercial' => 'Trampa Rata',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.22,
                'costo_total' => 30000
            ],
            '6' => [
                'nombre_comercial' => 'Trampa Raton',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.14,
                'costo_total' => 30000
            ],
            '7' => [
                'nombre_comercial' => 'Tram. Impacto',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.9,
                'costo_total' => 30000
            ],
            '8' => [
                'nombre_comercial' => 'Bromadiolona',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 0.4,
                'costo_total' => 30000
            ],
            '9' => [
                'nombre_comercial' => 'Brodifacoum',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.1,
                'costo_total' => 30000
            ],
            '10' => [
                'nombre_comercial' => 'Lam. Lampara',
                'tipo' => 'insecticida',
                'presentacion' => 'bp',
                'unidad_medida' => 'un',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.2,
                'costo_total' => 30000
            ],
            '11' => [
                'nombre_comercial' => 'Sani-T 10',
                'tipo' => 'insecticida',
                'presentacion' => 'bp',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.7,
                'costo_total' => 30000
            ],
            '12' => [
                'nombre_comercial' => 'Alfa-cipermetrina SC',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.3,
                'costo_total' => 30000
            ],
            '13' => [
                'nombre_comercial' => 'Beta-cipermetrina SC',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.8,
                'costo_total' => 30000
            ],
            '14' => [
                'nombre_comercial' => 'Deltametrina SC',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.6,
                'costo_total' => 30000
            ],
            '15' => [
                'nombre_comercial' => 'Cyfluthrin EC',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.65,
                'costo_total' => 30000
            ],
            '16' => [
                'nombre_comercial' => 'Deltametrina EC',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.44,
                'costo_total' => 30000
            ],
            '17' => [
                'nombre_comercial' => 'Piretrina Natural',
                'tipo' => 'insecticida',
                'presentacion' => 'ec',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.21,
                'costo_total' => 30000
            ],
            '18' => [
                'nombre_comercial' => 'Fipronil SC',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'ml',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.30,
                'costo_total' => 30000
            ],
            '19' => [
                'nombre_comercial' => 'Tiametoxan',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'gr',
                'total_unidades' => 10000.0,
                'valor_unidad' => 1.96,
                'costo_total' => 30000
            ],
            '20' => [
                'nombre_comercial' => 'Temephos',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'gr',
                'total_unidades' => 10000.0,
                'valor_unidad' => 2.1,
                'costo_total' => 30000
            ],
            '21' => [
                'nombre_comercial' => 'Bacillus Thuringiensis',
                'tipo' => 'insecticida',
                'presentacion' => 'sc',
                'unidad_medida' => 'gr',
                'total_unidades' => 10000.0,
                'valor_unidad' => 3.2,
                'costo_total' => 30000
            ],
        ];
        DB::table('productos')->insert($productos);
    }
}
