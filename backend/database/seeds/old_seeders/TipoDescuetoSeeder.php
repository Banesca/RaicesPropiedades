<?php

use Illuminate\Database\Seeder;

class TipoDescuetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TipoDescuento::create([
            'descripcion'=>'Porcentual'
        ]);

        \App\TipoDescuento::create([
            'descripcion'=>'Promocional'
        ]);
    }
}
