<?php

use Illuminate\Database\Seeder;

class ModulosDelSistemaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Modulo::create([
            'idM'         => 1,
            'modulo'      => 'Usuarios',
            'descripcion' => 'Gestion se Usuarios',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 2,
            'modulo'      => 'Publicaciones',
            'descripcion' => 'Gestion de Publicaciones',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);
    }
}
