<?php

use Illuminate\Database\Seeder;

class StatusTurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StatusTurno::create([
            'descripcion'=>'Solicitado'
        ]);

        \App\StatusTurno::create([
            'descripcion'=>'Cancelado'
        ]);

        \App\StatusTurno::create([
            'descripcion'=>'Rechazado'
        ]);
    }
}
