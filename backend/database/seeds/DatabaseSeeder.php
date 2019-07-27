<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(StatusDelUserSeeder::class);
        $this->call(StatusSistemaSeeder::class);
        $this->call(TipoTechoIndustrialseeder::class);
        $this->call(TipoMultimediaSeeder::class);
        $this->call(TipoAscensorSeeder::class);
        $this->call(TipoCocheraSeeder::class);
        $this->call(TipoHotelSeeder::class);
        $this->call(OrientacionSeeder::class);
        $this->call(DisposicionSeeder::class);
        $this->call(TipoAccesoSeeder::class);
        $this->call(TipoCalefaccionSeeder::class);
        $this->call(TipoUnidadCasaSeeder::class);
        $this->call(MonedasSeeder::class);
        $this->call(TipoTechoSeeder::class);
        $this->call(TipoPortonSeeder::class);
        $this->call(ModulosDelSistemaSeeder::class);
        $this->call(TipoPendienteSeeder::class);
        $this->call(EstadoPropiedadSeeder::class);
        $this->call(TipoBañoSeeder::class);
        $this->call(TipoCoberturaSeeder::class);
        $this->call(TipoFondoComercioSeeder::class);
        $this->call(EstadoPublicacionSeeder::class);
        $this->call(TipoPropiedadSeeder::class);
        $this->call(TipoCamppSeeder::class);
        $this->call(TipoOperacionSeeder::class);
        $this->call(TipoFrenteSeeder::class);
        $this->call(TipoCocheSeeder::class);
        $this->call(TipoEdidificioSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipoUnidadDepartamentoSeeder::class);
        $this->call(TipoCostaSeeder::class);
        $this->call(TipoVistaSeeder::class);
        $this->call(TipoTerrenoSeeder::class);
        $this->call(TipoBalconSeeder::class);
        $this->call(TipoExpensasSeeder::class);
        $this->call(TipoPisoSeeder::class);
        $this->call(TipoLocalSeeder::class);
        $this->call(PublicacionesSeeder::class);
        $this->call(UbicacionesSeeder::class);
    }
}
