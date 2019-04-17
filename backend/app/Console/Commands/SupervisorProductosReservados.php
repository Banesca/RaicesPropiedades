<?php

namespace App\Console\Commands;

use App\Mail\NotificacionDisponibilidadProductoReservado;
use App\Producto;
use App\ProductoReservado;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SupervisorProductosReservados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supervisor:pro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Supervisa cada 5 min los productos Reservados de los usuarios y actualiza su estatus';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $reservados = ProductoReservado::all();


        foreach ($reservados as $reservado) {
            $productoDisponoble = Producto::find($reservado->fk_idProducto);

            if ($productoDisponoble->stockActual > 0) {

                $user = User::find($reservado->fk_idUser);

                Mail::to($user->email)->send(new NotificacionDisponibilidadProductoReservado($productoDisponoble));

                $reservado->update(['status' => 'Ya con stock disponible']);
                $reservado->delete();

                $msj='El producto reservado: ' . $productoDisponoble->nombre . ' ' . $productoDisponoble->titulo . ' del usuario ' . $user->name . ' ' . $user->userName . ' ya posse stock, fue enviado un correo de notificación';

                Log::info('Ejecutando supervisor:pro , retorna el mensaje: '.$msj);

                echo 'Ejecutado correctamente: '.$msj;
            }
        }
         Log::info('Comando supervisor:pro ejecutado correctamente');
    }
}
