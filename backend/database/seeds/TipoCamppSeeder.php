<?php

use Illuminate\Database\Seeder;

class TipoCamppSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $as = [
            'Agrícola',
            'Ganadero',
            'Mixto',
            'Cría',
            'Turístico',
            'Coto de Caza',
            'Haras',
            'Invernada',
            'Frutícola',
            'Tambo',
            'Chacra',
            'Floricultura',
            'Granja',
            'Forestal',
            'Minería',
            'Industrialización',
        ];

        foreach ($as as $key => $a) {
            \App\TipoCampo::create([
                'idTipoCampo' => $key + 1,
                'descripcion' => $a,
            ]);
        }

    }
}
