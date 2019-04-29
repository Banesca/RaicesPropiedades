<?php

use Illuminate\Database\Seeder;

class TipoExpensasSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoExpensas::create([
            'idTipoExpensa' => '1',
            'descripcion'   => 'No Incluidas',
        ]);
        \App\TipoExpensas::create([
            'idTipoExpensa' => '2',
            'descripcion'   => 'Incluidas',
        ]);
        \App\TipoExpensas::create([
            'idTipoExpensa' => '3',
            'descripcion'   => 'A Convenir',
        ]);
        \App\TipoExpensas::create([
            'idTipoExpensa' => '4',
            'descripcion'   => 'No Paga',
        ]);

    }
}
