<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusDelUserSeeder::class);
        $this->call(ModulosDelSistemaSeeder::class);
       /* $this->call(PerfilesSeeder::class);
        $this->call(SatateOrderSeeder::class);
        $this->call(SectionAppSeeder::class);
        $this->call(StatusReclamo::class);
        $this->call(StatusSistemaSeeder::class);

        //$this->call(ProductosSeeder::class);
        //$this->call(OrderSeed::class);
        $this->call(TipoDeFacturaSeeder::class);
        $this->call(StatusTurnoSeeder::class);
        $this->call(TipoDescuetoSeeder::class);
        $this->call(TipoOrdenSeeder::class);
        $this->call(MetodoEntregaSeeder::class);
        $this->call(SeccionesPaginaSeed::class);        
        $this->call(footerInicialSeeder::class);
        $this->call(StatusNotificacionSeeder::class);*/
    }
}
