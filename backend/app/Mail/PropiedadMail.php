<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropiedadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $descipcion, $numero;

    public function __construct($email, $descipcion, $numero)
    {
        $this->email      = $email;
        $this->descipcion = $descipcion;
        $this->numero     = $numero;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.propiedad');
    }
}
