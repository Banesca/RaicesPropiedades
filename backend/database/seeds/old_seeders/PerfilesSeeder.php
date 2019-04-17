<?php

use Illuminate\Database\Seeder;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Perfil::create([
            'nombre' => 'Administrador',
            'descripcion'=>'Administrador del Sistema'
        ]);

        \App\Perfil::create([
            'nombre' => 'Cliente',
            'descripcion'=>'Cliente del Sistema'
        ]);

        \App\Perfil::create([
            'nombre' => 'Chofer',
            'descripcion'=>'Chofer para la tienda'
        ]);
    }
}
