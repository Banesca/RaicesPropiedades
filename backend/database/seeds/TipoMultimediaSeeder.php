<?php

use Illuminate\Database\Seeder;

class TipoMultimediaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $as = [
            'Foto',
            'Video',
            'Foto 360',
            'Video 360',
            'Tour',
            'Adjunto',
        ];

        foreach ($as as $a) {
            \App\TipoMultimedia::create([
                'descripcion' => $a,
            ]);
        }

    }
}
