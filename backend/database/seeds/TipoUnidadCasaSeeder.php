<?php

use Illuminate\Database\Seeder;

class TipoUnidadCasaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '1',
            'descripcion'      => 'Casa',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '2',
            'descripcion'      => 'Chalet',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '3',
            'descripcion'      => 'Dúplex',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '4',
            'descripcion'      => 'Triple',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '5',
            'descripcion'      => 'Casa Quinta',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '6',
            'descripcion'      => 'Cabaña',
        ]);
        \App\TipoUnidadCasa::create([
            'idTipoUnidadCasa' => '7',
            'descripcion'      => 'Departamento',
        ]);

    }
}
