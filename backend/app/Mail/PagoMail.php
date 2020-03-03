<?php

namespace App\Mail;

use App\Pago;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PagoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pago; //al hacer public la variable no hace falta usar with en la vista
    public function __construct(Pago $pago)
    {
        $this->pago = $pago;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.pago')
            ->subject('Se ha creado su pago correctamente');
    }
}
