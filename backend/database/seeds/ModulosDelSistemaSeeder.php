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

        \App\Modulo::create([
            'idM'         => 3,
            'modulo'      => 'Sucursales',
            'descripcion' => 'Gestion de Sucursales',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 4,
            'modulo'      => 'Editar Perfil',
            'descripcion' => 'Gestion del Perfil',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 5,
            'modulo'      => 'Config General',
            'descripcion' => 'Gestion Config General',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 6,
            'modulo'      => 'Envio de Email',
            'descripcion' => 'Gestion del Email',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 7,
            'modulo'      => 'Galeria del Home',
            'descripcion' => 'Gestion de Galeria del Home',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);

        \App\Modulo::create([
            'idM'         => 8,
            'modulo'      => 'Tasación',
            'descripcion' => 'Gestion de Tasación',
            'url'         => 'www.google.co.ve',
            'iconomodulo' => '',
        ]);
    }
}
