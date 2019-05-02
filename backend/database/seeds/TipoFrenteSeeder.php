<?php

use Illuminate\Database\Seeder;

class TipoFrenteSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoFrente::create([
            'idTipoFrente' => '1',
            'descripcion'  => 'Cemento',
        ]);
        \App\TipoFrente::create([
            'idTipoFrente' => '2',
            'descripcion'  => 'Courting Wall',
        ]);
        \App\TipoFrente::create([
            'idTipoFrente' => '3',
            'descripcion'  => 'Ladrillo',
        ]);
        \App\TipoFrente::create([
            'idTipoFrente' => '4',
            'descripcion'  => 'Otro',
        ]);


    }
}
