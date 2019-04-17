<?php

use Illuminate\Database\Seeder;

class StatusSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StatusSistema::create([
            'idStatusSistema'=>'1',
            'descripcion'=>'Activo'
        ]);

        \App\StatusSistema::create([
            'idStatusSistema'=>'2',
            'descripcion'=>'Inactivo'
        ]);

        \App\StatusSistema::create([
            'idStatusSistema'=>'3',
            'descripcion'=>'Eliminado'
        ]);
    }
}
