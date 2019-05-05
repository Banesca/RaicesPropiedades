<?php

use Illuminate\Database\Seeder;

class TipoAscensorSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoAscensor::create([
            'idTipoAscensor' => '1',
            'descripcion'    => 'No tiene',
        ]);
        \App\TipoAscensor::create([
            'idTipoAscensor' => '2',
            'descripcion'    => 'Semiautomático',
        ]);
        \App\TipoAscensor::create([
            'idTipoAscensor' => '3',
            'descripcion'    => 'Memoria Selectiva',
        ]);
        \App\TipoAscensor::create([
            'idTipoAscensor' => '4',
            'descripcion'    => 'Automático',
        ]);
        \App\TipoAscensor::create([
            'idTipoAscensor' => '5',
            'descripcion'    => 'Alta Velocidad',
        ]);

    }
}
