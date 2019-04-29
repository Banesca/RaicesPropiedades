<?php

use Illuminate\Database\Seeder;

class OrientacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Orientacion::create([
            'idOrientacion' => 1,
            'descripcion'   => 'NORTE',
        ]); \App\Orientacion::create([
            'idOrientacion' => 2,
            'descripcion'   => 'NORESTE',
        ]); \App\Orientacion::create([
            'idOrientacion' => 3,
            'descripcion'   => 'NOROESTE',
        ]); \App\Orientacion::create([
            'idOrientacion' => 4,
            'descripcion'   => 'SUR',
        ]); \App\Orientacion::create([
            'idOrientacion' => 5,
            'descripcion'   => 'SUDESTE',
        ]); \App\Orientacion::create([
            'idOrientacion' => 6,
            'descripcion'   => 'SUDOESTE',
        ]); \App\Orientacion::create([
            'idOrientacion' => 7,
            'descripcion'   => 'ESTE',
        ]);










    }
}
