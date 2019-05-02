<?php

use Illuminate\Database\Seeder;

class TipoTechoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoTecho::create([
            'idTipoTecho' => '1',
            'descripcion' => 'Teja',
        ]);
        \App\TipoTecho::create([
            'idTipoTecho' => '2',
            'descripcion' => 'Losa',
        ]);
        \App\TipoTecho::create([
            'idTipoTecho' => '3',
            'descripcion' => 'Chapa',
        ]);
        \App\TipoTecho::create([
            'idTipoTecho' => '4',
            'descripcion' => 'Pizarra',
        ]);

    }
}
