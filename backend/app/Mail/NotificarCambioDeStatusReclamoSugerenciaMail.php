<?php

namespace App\Mail;

use App\ReclamosYSugerencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarCambioDeStatusReclamoSugerenciaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $r;

    public function __construct(ReclamosYSugerencia $r)
    {
        $this->r=$r;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.cambiar-status-reclamoSugerencia')
            ->subject('Cambio de Estatus de su Reclamo / Sugerencia');
    }
}
