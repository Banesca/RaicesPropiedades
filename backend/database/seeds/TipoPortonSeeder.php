<?php

use Illuminate\Database\Seeder;

class TipoPortonSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoPorton::create([
            'idTipoPorton' => '1',
            'descripcion'  => 'Levadizo',
        ]);
        \App\TipoPorton::create([
            'idTipoPorton' => '2',
            'descripcion'  => 'Corredizo',
        ]);
    }
}
