<?php

namespace App\Mail;

use App\SuscripcionUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuscripcionMail extends Mailable /*implements ShouldQueue*/
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sus; //al hacer public la variable no hace falta usar with en la vista
    public $email;


    public function __construct(SuscripcionUser $sus,$email)
    {
        $this->sus = $sus;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.suscripcion')
            ->subject($this->sus->titulo);
    }
}
