<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrderSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            \App\orderHeader::create([
                'Fecha_Pedido'           => $faker->date,
                'Numero_Pedido'          => $i,
                'Numero_EncabezadoVenta' => $i + 10,
                'Estado_Pedido'          => $faker->numberBetween($min = 1, $max = 5),
                'Domicilio_Entrega'      => $faker->text(10),
                'Codigo_Postal'          => $faker->randomDigit,
                'stars'                  => $faker->randomDigit,
                'comentaryClient'        => $faker->randomDigit,
                'Email_Cliente'          => $faker->email,
                'fk_idStateOrder'        => $faker->numberBetween($min = 1, $max = 5),
                'fk_idUserClient'        => 1,
                'fk_idUserDriver'        => 0,

            ]);
            for ($j = 0; $j < 10; $j++) {

                \App\orderBody::create([
                    'fk_idOrderHeader'             => $j,
                    'codeProdSys'                  => $faker->numberBetween($min = 0, $max = 100000),
                    'Cantidad_Producto'            => $j + 10 * $faker->randomDigit,
                    'PrecioUnitario_Producto'      => $faker->numberBetween($min = 0, $max = 99999),
                    'PorcentajeDescuento_Producto' => $faker->randomDigit,
                    'Devolucion_Producto'          => $faker->randomDigit,
                    'Numero_EncabezadoVenta'       => $faker->randomDigit,
                    'fk_idProducto'                => $faker->numberBetween($min = 1, $max = 4),
                ]);
            }
        }
    }
}
