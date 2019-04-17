<?php

use Illuminate\Database\Seeder;

class StatusNotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\StatusNotificacion::create([
            'descripcion'=>'Sin Leer'
        ]);

         \App\StatusNotificacion::create([
            'descripcion'=>'Leido'
        ]);

         \App\StatusNotificacion::create([
            'descripcion'=>'Eliminado'
        ]);
    }
}
