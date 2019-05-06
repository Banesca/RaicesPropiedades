<?php

use Illuminate\Database\Seeder;

class TipoTechoIndustrialseeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $as = [
            'Cabriada',
            'Fibrocemento',
            'Parabólico',
            'Dos Aguas',
            'Bovedilla',
            'Galvanizado',
            'Hormigón',
            'Tinglado',
            'Zinc',
            'Chapa',
            'Losa',
            'Astori',
        ];

        foreach ($as as $key => $a) {
            \App\TipoTechoIndustrial::create([
                'idTipoTechoIndustrial' => $key + 1,
                'descripcion'           => $a,
            ]);
        }

    }
}
