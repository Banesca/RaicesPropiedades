<?php

use Illuminate\Database\Seeder;

class TipoPropiedadSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $as = [
            'Departamento',
            'Departamento Tipo Casa',
            'Casa',
            'Quinta',
            'Cochera',
            'Local',
            'Hotel',
            'Terreno',
            'Oficina',
            'Campo',
            'Fondo de Comercio',
            'Galpón',
            'Negocio Especial'
        ];

        foreach ($as as $a){
            \App\TipoPropiedad::create([
                'descripcion' => $a,
            ]);
        }

    }
}
