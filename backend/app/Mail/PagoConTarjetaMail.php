<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PagoConTarjetaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $titulo, $descripcion;

    public function __construct($titulo, $descripcion)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.formato-email')->with('titulo', $this->titulo)->with('descripcion', $this->descripcion);
    }
}
