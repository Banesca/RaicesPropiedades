<?php

use Illuminate\Database\Seeder;

class TipoVistaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoVista::create([
            'idTipoVista' => '1',
            'descripcion' => 'Vista mar',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '2',
            'descripcion' => 'Vista lago',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '3',
            'descripcion' => 'Vista rio',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '4',
            'descripcion' => 'Vista montaña',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '5',
            'descripcion' => 'Vista bosque',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '6',
            'descripcion' => 'Vista golf',
        ]);
        \App\TipoVista::create([
            'idTipoVista' => '7',
            'descripcion' => 'Vista ciudad',
        ]);

    }
}
