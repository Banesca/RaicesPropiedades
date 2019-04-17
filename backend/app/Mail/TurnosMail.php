<?php

namespace App\Mail;

use App\Suscripcion;
use App\turno;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TurnosMail extends Mailable implements ShouldQueue{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $turno;

    public function __construct(turno $turno) {
        $this->turno = $turno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('correos.turnos.add_turno');
    }
}
