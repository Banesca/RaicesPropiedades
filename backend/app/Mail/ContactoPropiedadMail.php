<?php

namespace App\Mail;

use App\ContactoDePropiedad;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoPropiedadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $con;
    public function __construct(ContactoDePropiedad $c)
    {
        $this->con=$c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.contactoDePropiedadMail')->with('contacto',$this->con)
            ->subject('Recibimos tu consulta');
    }
}
