<?php

namespace App\Mail;

use App\Suscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuscripcionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sus; //al hacer public la variable no hace falta usar with en la vista


    public function __construct(Suscripcion $sus)
    {
        $this->sus = $sus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.suscripcion');
    }
}
