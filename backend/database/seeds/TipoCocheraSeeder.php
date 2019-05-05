<?php

use Illuminate\Database\Seeder;

class TipoCocheraSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoCochera::create([
            'idTipoCochera' => '1',
            'descripcion'   => 'Fija',
        ]);
        \App\TipoCochera::create([
            'idTipoCochera' => '2',
            'descripcion'   => 'Móvil',
        ]);
        \App\TipoCochera::create([
            'idTipoCochera' => '3',
            'descripcion'   => 'Espacio',
        ]);
        \App\TipoCochera::create([
            'idTipoCochera' => '4',
            'descripcion'   => 'Cubierta',
        ]);
        \App\TipoCochera::create([
            'idTipoCochera' => '5',
            'descripcion'   => 'Semicubierta',
        ]);
        \App\TipoCochera::create([
            'idTipoCochera' => '6',
            'descripcion'   => 'Entrada Coche',
        ]);
    }
}
