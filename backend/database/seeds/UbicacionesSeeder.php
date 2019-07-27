<?php

use Illuminate\Database\Seeder;

class UbicacionesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($region = 1; $region <3; $region++) {
            \App\Region::create([
                'descripcion' => "Region_".$region,
            ]);
            for ($partido = 1; $partido < 3; $partido++) {
                \App\Partido::create([
                    'descripcion' => "Partido_".$partido."_".$region,
                    'fk_idRegion' => $region,
                ]);
                for ($localidad = 1; $localidad < 3; $localidad++) {
                    \App\Localidad::create([
                        'descripcion'  => "Localidad_".$localidad."_".$partido,
                        'fk_idPartido' => $partido+$localidad-1,
                    ]);
                    for ($barrio = 1; $barrio < 3; $barrio++) {
                        \App\Barrio::create([
                            'descripcion'    => "Barrio_".$barrio."_".$localidad,
                            'fk_idLocalidad' => $localidad+$barrio-1,
                        ]);

                    }
                }

            }
        }
    }

}
