<?php

use Illuminate\Database\Seeder;

class MonedasSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Moneda::create([
            'idMonedas' => 1,
            'moneda'    => 'Pesos',
        ]);
        \App\Moneda::create([
            'idMonedas' => 2,
            'moneda'    => 'Dolar',
        ]);
        /*\App\Moneda::create([
            'idMonedas' => 3,
            'moneda'    => 'Peso Uruguayo',
        ]);*/
    }
}
