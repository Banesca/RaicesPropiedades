<?php

use Illuminate\Database\Seeder;

class TipoHotelSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\TipoHotel::create([
            'idTipoHotel' => '1',
            'descripcion' => 'Pasajeros',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '2',
            'descripcion' => 'Alojamiento',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '3',
            'descripcion' => 'Familiar',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '4',
            'descripcion' => 'Hostería',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '5',
            'descripcion' => 'Posada',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '6',
            'descripcion' => 'Resort',
        ]);
        \App\TipoHotel::create([
            'idTipoHotel' => '7',
            'descripcion' => 'Hotel',
        ]);

    }
}
