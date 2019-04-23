<?php

use Illuminate\Database\Seeder;

class TipoOperacionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $as = [
            'Venta',
            'Alquiler',
            'AlquilerPorTemporada',
            'TiempoCompartido',
        ];

        foreach ($as as $a) {
            \App\TipoOperacion::create([
                'descripcion' => $a,
            ]);
        }
    }
}
