<?php

namespace App\Mail;

use App\ReclamosYSugerencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReclamosSugerenciasMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $reclamoSugerencia;

    public function __construct(ReclamosYSugerencia $reclamoSugerencia)
    {
        $this->reclamoSugerencia = $reclamoSugerencia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correos.reclamoSugerencia')
                    ->with('reclamoSugerencia',$this->reclamoSugerencia);
    }
}
