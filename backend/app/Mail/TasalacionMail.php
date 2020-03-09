<?php

namespace App\Mail;

use App\Transacciones;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TasalacionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $transaccion; //al hacer public la variable no hace falta usar with en la vista
    public function __construct(Transacciones $transaccion)
    {
        $this->transaccion = $transaccion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.tasalacion')
            ->subject('Gracias por contactarse con RAICES Propiedades');
    }
}
