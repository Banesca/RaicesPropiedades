<?php

use Illuminate\Database\Seeder;

class TipoEdidificioSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoEdificio::create([
            'idTipoEdificio' => '1',
            'descripcion'    => 'Entre Medianeras',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '2',
            'descripcion'    => 'Torre',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '3',
            'descripcion'    => 'Tipo Block',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '4',
            'descripcion'    => 'Esquina',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '5',
            'descripcion'    => 'Antiguo',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '6',
            'descripcion'    => 'Inteligente',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '7',
            'descripcion'    => 'Primera Categoría',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '8',
            'descripcion'    => 'Standard',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '9',
            'descripcion'    => 'Bajo',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '10',
            'descripcion'    => 'Condominio',
        ]);
        \App\TipoEdificio::create([
            'idTipoEdificio' => '11',
            'descripcion'    => 'Monobloc',
        ]);
    }
}
