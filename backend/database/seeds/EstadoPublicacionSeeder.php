<?php

use Illuminate\Database\Seeder;

class EstadoPublicacionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\EstadoPublicacion::create([
            'idEstadoPublicaion' => 1,
            'descripcion'        => 'Activa',
        ]);

        \App\EstadoPublicacion::create([
            'idEstadoPublicaion' => 2,
            'descripcion'        => 'Suspendida',
        ]);

        \App\EstadoPublicacion::create([
            'idEstadoPublicaion' => 3,
            'descripcion'        => 'Eliminada',
        ]);
    }
}
