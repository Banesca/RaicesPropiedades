<?php

use Illuminate\Database\Seeder;

class TipoBañoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoBaño::create([
            'idTipoBaño'  => '1',
            'descripcion' => 'Independientes',
        ]);
        \App\TipoBaño::create([
            'idTipoBaño'  => '2',
            'descripcion' => 'Comunes',
        ]);

    }
}
