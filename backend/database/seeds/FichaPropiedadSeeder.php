<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichaPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_fichas_propiedad')->insert([
            'titulo' => Str::random(10),
            'ubicacion' => Str::random(10),
            'caracteristica' => Str::random(10),
            'valor' => Str::random(10),
            'comision' => Str::random(10),
            'img1fa' => 'prueba1.'.'img',
            'img2pr' => 'prueba2.'.'img',
            'img3pl' => 'prueba3.'.'img',
            'img4pl' => 'prueba4.'.'img',
            'img5sa' => 'prueba5.'.'img',
            'img6sa' => 'prueba6.'.'img',
            'fk_idPropiedad' => 1
        ]);
    }
}
