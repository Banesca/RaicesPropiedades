<?php

use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Sucursal::create([
            'idSucursal'=>'1',
            'nombreSucursal'=>'Pilar'
        ]);

        \App\Sucursal::create([
            'idSucursal'=>'2',
            'nombreSucursal'=>'Open Door'
        ]);

       
    }
}
