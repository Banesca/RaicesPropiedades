<?php

namespace App\Mail;

use App\Correo;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Prueba extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    protected $clave;


    public function __construct(User $user,$clave)
    {
        $this->user = $user;
        $this->clave = $clave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.informacion')
            ->subject('Recuperación de clave')
            ->with('clave',$this->clave);
    }
}
