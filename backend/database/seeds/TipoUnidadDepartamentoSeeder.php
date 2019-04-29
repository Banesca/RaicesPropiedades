<?php

use Illuminate\Database\Seeder;

class TipoUnidadDepartamentoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '1',
            'descripcion'              => 'Departamento',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '2',
            'descripcion'              => 'Piso',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '3',
            'descripcion'              => 'Semipiso',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '4',
            'descripcion'              => 'Dúplex',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '5',
            'descripcion'              => 'Triple',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '6',
            'descripcion'              => 'Loft',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '7',
            'descripcion'              => 'Penthouse',
        ]);
        \App\TipoUnidadDepartamento::create([
            'idTipoUnidadDepartamento' => '8',
            'descripcion'              => 'PH',
        ]);


    }
}
