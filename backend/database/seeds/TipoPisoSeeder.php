<?php

use Illuminate\Database\Seeder;

class TipoPisoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoPiso::create([
            'idTipoPiso'  => '1',
            'descripcion' => 'Alfombra',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '2',
            'descripcion' => 'Baldosa',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '3',
            'descripcion' => 'Goma',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '4',
            'descripcion' => 'Parquet',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '5',
            'descripcion' => 'Vinilo',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '6',
            'descripcion' => 'Pinotea',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '7',
            'descripcion' => 'Cerámicos y Baldosas',
        ]);
        \App\TipoPiso::create([
            'idTipoPiso'  => '8',
            'descripcion' => 'Madera',
        ]);

    }
}
