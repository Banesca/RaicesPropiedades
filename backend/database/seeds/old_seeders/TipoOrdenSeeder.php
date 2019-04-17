<?php

use Illuminate\Database\Seeder;

class TipoOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TipoOrden::create([
            'descripcion'=>'Retiro en tienda'
        ]);

        \App\TipoOrden::create([
            'descripcion'=>'Delivery'
        ]);

        \App\TipoOrden::create([
            'descripcion'=>'Despachos al interior'
        ]);
    }
}
