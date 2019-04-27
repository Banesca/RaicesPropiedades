<?php

use Illuminate\Database\Seeder;

class DisposicionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Disposicion::create([
            'idDisposicion' => 1,
            'descripcion'   => 'Frente',
        ]);
        \App\Disposicion::create([
            'idDisposicion' => 2,
            'descripcion'   => 'Contra frente',
        ]);
        \App\Disposicion::create([
            'idDisposicion' => 3,
            'descripcion'   => 'Lateral',
        ]);
        \App\Disposicion::create([
            'idDisposicion' => 4,
            'descripcion'   => 'Interno',
        ]);
    }
}

