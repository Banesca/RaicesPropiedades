<?php

namespace App\Console\Commands;

use App\Http\Controllers\SincroniceArgenController;
use App\Propiedad;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SincronizarUrlPropiedadArgen extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sin:urlargen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincroniza las url de las propiedades';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $PropiedadesSinUrl = Propiedad::whereNull('UrlPropiedadArgen')->get();

        foreach ($PropiedadesSinUrl as $key=>$propiedad) {
            $status = SincroniceArgenController::buscarURLdePropiedadArgen($propiedad->idPropiedad);

            if ($status['status']) {
                $PropiedadesSinUrl[$key]->update([ 'UrlPropiedadArgen' => $status['msj']]);
            }
        }
        Log::info('Comando sin:urlargen ejecutado correctamente');
    }
}
