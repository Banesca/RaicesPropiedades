<?php

use Illuminate\Database\Seeder;

class EstadoPropiedadSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\EstadoPropiedad::create([
            'idEstadoPropiedad' => 1,
            'descripcion'       => 'Excelente',
        ]);
        \App\EstadoPropiedad::create([
            'idEstadoPropiedad' => 2,
            'descripcion'       => 'Muy Bueno',
        ]);
        \App\EstadoPropiedad::create([
            'idEstadoPropiedad' => 3,
            'descripcion'       => 'Bueno',
        ]);
        \App\EstadoPropiedad::create([
            'idEstadoPropiedad' => 4,
            'descripcion'       => 'Regular',
        ]);
        \App\EstadoPropiedad::create([
            'idEstadoPropiedad' => 5,
            'descripcion'       => 'A Refaccionar',
        ]);
    }
}
