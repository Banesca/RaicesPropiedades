<?php

use Illuminate\Database\Seeder;

class TipoBalconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TipoBalcon::create([
            'idBalcon'    => '1',
            'descripcion' => 'Francés',
        ]);  \App\TipoBalcon::create([
            'idBalcon'=>'2',
            'descripcion'=>'Corrido'
        ]);  \App\TipoBalcon::create([
            'idBalcon'=>'3',
            'descripcion'=>'Terraza'
        ]);

    }
}
