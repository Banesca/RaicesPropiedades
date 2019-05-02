<?php

use Illuminate\Database\Seeder;

class TipoPendienteSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoPendiente::create([
            'idTipoPendiente' => '1',
            'descripcion'     => 'Plana',
        ]);
        \App\TipoPendiente::create([
            'idTipoPendiente' => '2',
            'descripcion'     => 'Moderada',
        ]);
        \App\TipoPendiente::create([
            'idTipoPendiente' => '3',
            'descripcion'     => 'Empinada',
        ]);
        \App\TipoPendiente::create([
            'idTipoPendiente' => '4',
            'descripcion'     => 'Muy Empinada',
        ]);

    }
}
