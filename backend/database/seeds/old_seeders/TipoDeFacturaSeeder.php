<?php

use Illuminate\Database\Seeder;

class TipoDeFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TipoDeFactura::create([
            'descripcion'=>'Factura A'
        ]);

        \App\TipoDeFactura::create([
            'descripcion'=>'Factura B'
        ]);

        /*\App\TipoDeFactura::create([
            'descripcion'=>'Factura C'
        ]);

        \App\TipoDeFactura::create([
            'descripcion'=>'Factura D'
        ]);

        \App\TipoDeFactura::create([
            'descripcion'=>'Sin Factura'
        ]);*/
    }
}
