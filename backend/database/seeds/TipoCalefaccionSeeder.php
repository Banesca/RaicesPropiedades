<?php

use Illuminate\Database\Seeder;

class TipoCalefaccionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $as = [
            'Caldera Radiante General',
            'Caldera Radiante Individual',
            'Losa Radiante General',
            'Losa Radiante Individual',
            'Estufa',
            'Aire Caliente',
            'Picos De Gas',
            'Central',
            'Individual',

        ];

        foreach ($as as $key => $a) {
            \App\TipoCalefaccion::create([
                'idTipoCalefaccion' => $key + 1,
                'descripcion'       => $a,
            ]);
        }
    }
}
