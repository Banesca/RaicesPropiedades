<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusDelUserSeeder::class);
        $this->call(ModulosDelSistemaSeeder::class);
        $this->call(TipoPropiedadSeeder::class);
        $this->call(EstadoPublicacionSeeder::class);
        $this->call(TipoOperacionSeeder::class);
        $this->call(MonedasSeeder::class);
        $this->call(DisposicionSeeder::class);
        $this->call(OrientacionSeeder::class);
        $this->call(TipoBalconSeeder::class);
        $this->call(TipoExpensasSeeder::class);
        $this->call(TipoVistaSeeder::class);
        $this->call(TipoCostaSeeder::class);
        $this->call(TipoUnidadDepartamentoSeeder::class);
        $this->call(EstadoPropiedadSeeder::class);
        $this->call(TipoEdidificioSeeder::class);
        $this->call(TipoFrenteSeeder::class);
        $this->call(TipoTechoSeeder::class);
        $this->call(TipoUnidadCasaSeeder::class);
        $this->call(TipoPisoSeeder::class);
        $this->call(TipoPendienteSeeder::class);
        $this->call(TipoCoberturaSeeder::class);
        $this->call(TipoCocheSeeder::class);
        $this->call(TipoCocheraSeeder::class);
        $this->call(TipoAccesoSeeder::class);
        $this->call(TipoLocalSeeder::class);
        $this->call(TipoHotelSeeder::class);
        $this->call(TipoTerrenoSeeder::class);
        $this->call(TipoBañoSeeder::class);
        $this->call(TipoAscensorSeeder::class);
        $this->call(TipoCamppSeeder::class);
        $this->call(TipoFondoComercioSeeder::class);
    }
}
