<?php

use Illuminate\Database\Seeder;

class MetodoEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        \App\metodoEntregaValues::create([
            'descripcion' => 'En tienda'
        ]);

        \App\metodoEntregaValues::create([
            'descripcion' => 'Delivery'
        ]);

        \App\metodoEntregaValues::create([
            'descripcion' => 'Interior'
        ]);
    }
}
