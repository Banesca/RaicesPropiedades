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
            'idModulo'         => 1,
            'modulo'      => 'Gestión se Usuarios',
            'descripcion' => 'Gestión se Usuarios',
            'url'         => '/gestionar-usuarios',
            'iconomodulo' => 'fa fa-users',
        ]);

        \App\Modulo::create([
            'idModulo'         => 2,
            'modulo'      => 'Gestión de Módulos',
            'descripcion' => 'Gestión de Módulos',
            'url'         => '/modulos',
            'iconomodulo' => 'fa fa-cogs',
        ]);

        \App\Modulo::create([
            'idModulo'         => 3,
            'modulo'      => 'Galería Home',
            'descripcion' => 'Galería Home',
            'url'         => '/galeria-home',
            'iconomodulo' => 'fa fa-users',
        ]);

        \App\Modulo::create([
            'idModulo'         => 4,
            'modulo'      => 'Sucursales',
            'descripcion' => 'Gestion de Sucursales',
            'url'         => '/sucursales',
            'iconomodulo' => 'fas fa-building',
        ]);

        \App\Modulo::create([
            'idModulo'         => 5,
            'modulo'      => 'Suscriptores',
            'descripcion' => 'Suscriptores',
            'url'         => '/suscribers',
            'iconomodulo' => 'fas fa-send',
        ]);

        \App\Modulo::create([
            'idModulo'         => 6,
            'modulo'      => 'Mails a Suscriptores',
            'descripcion' => 'Mails a Suscriptores',
            'url'         => '/mail-suscribers',
            'iconomodulo' => 'fas fa-envelope',
        ]);

        \App\Modulo::create([
            'idModulo'         => 7,
            'modulo'      => 'Gestión de Publicaciones',
            'descripcion' => 'Gestión de Publicaciones',
            'url'         => '/gestionar-publicaciones',
            'iconomodulo' => 'fas fa-building',
        ]);

        \App\Modulo::create([
            'idModulo'         => 8,
            'modulo'      => 'Publicaciones en Facebook',
            'descripcion' => 'Publicaciones en Facebook',
            'url'         => '/publicaciones-facebook',
            'iconomodulo' => 'fas fa-send',
        ]);

        \App\Modulo::create([
            'idModulo'         => 9,
            'modulo'      => 'Tasaciones',
            'descripcion' => 'Tasaciones',
            'url'         => '/transacciones',
            'iconomodulo' => 'fas fa-building',
        ]);

        \App\Modulo::create([
            'idModulo'         => 10,
            'modulo'      => 'Configuración General',
            'descripcion' => 'Configuración General',
            'url'         => '/config-footer',
            'iconomodulo' => 'fas fa-tools',
        ]);

        // Se asigana el mogulo gentionde usuario al admin
        \App\ModulosDelUser::create([
            'idModuloUser'         => 1,
            'fk_idUser'      => '1',
            'fk_idModulo' => '1',
        ]);
       
    }
   
}
