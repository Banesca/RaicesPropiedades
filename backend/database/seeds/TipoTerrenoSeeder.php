<?php

use Illuminate\Database\Seeder;

class TipoTerrenoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoTerreno::create([
            'idTipoTerreno' => '1',
            'descripcion'   => 'Terreno',
        ]);
        \App\TipoTerreno::create([
            'idTipoTerreno' => '2',
            'descripcion'   => 'Loteo',
        ]);
        \App\TipoTerreno::create([
            'idTipoTerreno' => '3',
            'descripcion'   => 'Fracción',
        ]);

    }
}
