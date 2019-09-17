<?php

namespace App\Mail;

use App\Contacto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $con;
    public function __construct(Contacto $c)
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
        return $this->view('correos.contactoMail')->with('contacto',$this->con)
            ->subject('Información de Nuevo contacto');
    }
}
