<?php

use Illuminate\Database\Seeder;

class TipoCoberturaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoCobertura::create([
            'idTipoCobertura' => '1',
            'descripcion'     => 'Cubierta',
        ]);
        \App\TipoCobertura::create([
            'idTipoCobertura' => '2',
            'descripcion'     => 'Descubierta',
        ]);
        \App\TipoCobertura::create([
            'idTipoCobertura' => '3',
            'descripcion'     => 'Semicubierta',
        ]);


    }
}
