<?php

use Illuminate\Database\Seeder;

class TipoAccesoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoAcceso::create([
            'idTipoAcceso' => '1',
            'descripcion'  => 'Horizontal',
        ]);
        \App\TipoAcceso::create([
            'idTipoAcceso' => '2',
            'descripcion'  => 'Rampa Fija',
        ]);
        \App\TipoAcceso::create([
            'idTipoAcceso' => '3',
            'descripcion'  => 'Rampa móvil',
        ]);
        \App\TipoAcceso::create([
            'idTipoAcceso' => '4',
            'descripcion'  => 'Ascensor',
        ]);

    }
}
