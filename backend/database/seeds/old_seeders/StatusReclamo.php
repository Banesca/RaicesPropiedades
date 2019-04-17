<?php

use Illuminate\Database\Seeder;

class StatusReclamo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StatusReclamo::create([
            'descripcion'=>'Abierto'
        ]);

        \App\StatusReclamo::create([
            'descripcion'=>'Cerrado'
        ]);

        \App\StatusReclamo::create([
            'descripcion'=>'Recibida'
        ]);
    }
}
