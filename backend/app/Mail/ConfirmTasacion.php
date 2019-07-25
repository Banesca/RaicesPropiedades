<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Transacciones;

class ConfirmTasacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tasacion;


    public function __construct(Transacciones $tasacion)
    {
        $this->tasacion = $tasacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.tasacion.confirm')
            ->subject('Recibimos su tasación')
            ->with('tasacion',$this->tasacion);
    }
}
