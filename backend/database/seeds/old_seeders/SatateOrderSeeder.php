<?php

use Illuminate\Database\Seeder;

class SatateOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StateOrder::create([
            'StateOrder'=>'Creado'
        ]);

        \App\StateOrder::create([
            'StateOrder'=>'Enviado'
        ]);

        \App\StateOrder::create([
            'StateOrder'=>'Cancelado'
        ]);

        \App\StateOrder::create([
            'StateOrder'=>'Entregado'
        ]);

        \App\StateOrder::create([
            'StateOrder'=>'Pre Entregado'
        ]);
    }
}
