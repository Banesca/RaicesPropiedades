<?php

use Illuminate\Database\Seeder;

class TipoLocalSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoLocal::create([
            'idTipoLocal' => '1',
            'descripcion' => 'Vía Pública',
        ]);
        \App\TipoLocal::create([
            'idTipoLocal' => '2',
            'descripcion' => 'Shopping',
        ]);
        \App\TipoLocal::create([
            'idTipoLocal' => '3',
            'descripcion' => 'Galería',
        ]);

    }
}
