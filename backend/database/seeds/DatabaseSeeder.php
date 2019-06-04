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
        $this->call(StatusSistemaSeeder::class);
    }
}
