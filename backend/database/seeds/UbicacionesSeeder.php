<?php

use Illuminate\Database\Seeder;

class UbicacionesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 1; $i < 20; $i++) {
            \App\Region::create([

                'descripcion' => "Region_".$i,
            ]);
            for ($u = 1; $u < 15; $u++) {
                \App\Partido::create([

                    'descripcion' => "Partido_".$u,
                    'fk_idRegion' => $i,
                ]);
                for ($h = 1; $h < 10; $h++) {
                    \App\Localidad::create([

                        'descripcion'  => "Localidad_".$h,
                        'fk_idPartido' => $u,
                    ]);
                    for ($k = 1; $k < 3; $k++) {
                        \App\Barrio::create([

                            'descripcion'    => "Barrio_".$k,
                            'fk_idLocalidad' => $h,
                        ]);
                    }
                }
            }
        }
    }
}
