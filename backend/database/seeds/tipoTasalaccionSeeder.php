<?php

use Illuminate\Database\Seeder;

class tipoTasalaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TipoTasacion::create([
            'idTipoTasaccion' => '1',
            'descripcion' => 'Venta',
        ]);
        \App\TipoTasacion::create([
            'idTipoTasaccion' => '2',
            'descripcion' => 'Alquier',
        ]);
    }
}
