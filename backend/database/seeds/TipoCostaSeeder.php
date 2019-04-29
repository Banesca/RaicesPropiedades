<?php

use Illuminate\Database\Seeder;

class TipoCostaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoCosta::create([
            'idTipoCosta' => '1',
            'descripcion' => 'Costa mar',
        ]);
        \App\TipoCosta::create([
            'idTipoCosta' => '2',
            'descripcion' => 'Costa lago',
        ]);
        \App\TipoCosta::create([
            'idTipoCosta' => '3',
            'descripcion' => 'Costa rio',
        ]);

    }
}
