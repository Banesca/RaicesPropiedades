<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker::create();

        $imageLinks = [
            'https://www.purina-latam.com/img/dog_chow/venezuela/familia-de-productos/cachorros_pequenos_pack.png?v=cf37e46b',
            'https://static.condisline.com/resize_395x416/images/catalog/large/109234.jpg',
            'https://www.mascotaplanet.com/55741-large_default/prestige-tropical-comida-para-exoticos.jpg',
            'https://shop-cdn-m.shpp.ext.zooplus.io/bilder/verselelaga/prestige/premium/comida/para/loros/1/400/12993_PLA_Versele_Laga_Prestige_Premium_Papagei_15kg_1.jpg' ];


        foreach ($imageLinks as $imageLink) {

            \App\Producto::create([
                'nombre'             => $faker->name,
                'titulo'             => $faker->lastName,
                'urlImage'           => $imageLink,
                'promocion'          => $faker->text(10),
                'fk_idSatate'        => $faker->numberBetween($min = 1, $max = 3),
                'isOutstanding'      => $faker->randomDigit,
                'fechaIsOutstanding' => $faker->date,
                'codeProdSys'        => $faker->randomDigit,
                'kiloProdcuto'       => $faker->numberBetween($min = 0, $max = 50),
                'rubro'              => $faker->text(10),
                'marca'              => $faker->name,
                'SubRubro1'          => $faker->text(10),
                'SubRubro2'          => $faker->text(10),
                'precioL1'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL2'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL3'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL4'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL5'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL6'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL7'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL8'           => $faker->numberBetween($min = 0, $max = 100000),
                'precioL9'           => $faker->numberBetween($min = 0, $max = 100000),
            ]);

        }
    }
}
