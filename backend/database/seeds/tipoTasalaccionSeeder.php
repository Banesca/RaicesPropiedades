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

        \App\TipoTasacion::create([
            'idTipoTasaccion' => '3',
            'descripcion' => 'Alquiler por temporada',
        ]);

        \App\TipoTasacion::create([
            'idTipoTasaccion' => '4',
            'descripcion' => 'Tiempo Compartido',
        ]);
    }
}
