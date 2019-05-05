<?php

use Illuminate\Database\Seeder;

class TipoCocheSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoCoche::create([
            'idTipoCoche' => '1',
            'descripcion' => 'Chico',
        ]);
        \App\TipoCoche::create([
            'idTipoCoche' => '2',
            'descripcion' => 'Mediano',
        ]);
        \App\TipoCoche::create([
            'idTipoCoche' => '3',
            'descripcion' => 'Grande',
        ]);
        \App\TipoCoche::create([
            'idTipoCoche' => '4',
            'descripcion' => 'Doble',
        ]);
    }
}
