<?php

use Illuminate\Database\Seeder;

class SectionAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\SectionApp::create([
            'idSecctionApp' => '1',
            'tag'=>'home'
        ]);

        \App\SectionApp::create([
            'idSecctionApp' => '2',
            'tag'=>'notificacion'
        ]);

        \App\SectionApp::create([
            'idSecctionApp' => '3',
            'tag'=>'cupones'
        ]);

        \App\SectionApp::create([
            'idSecctionApp' => '4',
            'tag'=>'pedidos'
        ]);

        \App\SectionApp::create([
            'idSecctionApp' => '5',
            'tag'=>'perfil'
        ]);
    }
}
