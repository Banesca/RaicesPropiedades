<?php

use Illuminate\Database\Seeder;

class StatusDelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StatusUser::create([
            'idStatus'=>'1',
            'descripcion'=>'Activo'
        ]);

        \App\StatusUser::create([
            'idStatus'=>'2',
            'descripcion'=>'Inactivo'
        ]);
    }
}
