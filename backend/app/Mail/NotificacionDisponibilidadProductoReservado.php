<?php

namespace App\Mail;

use App\Producto;
use App\RedesSocial;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionDisponibilidadProductoReservado extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $p;

    public function __construct(Producto $p)
    {
        $this->p = $p;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $redes = RedesSocial::first();
        if (! $redes) {

            $redes = new RedesSocial([
                'url_face' => 'www.facebook.com',
                'url_twit' => 'https://www.twitter.com',
                'url_inst' => 'https://www.instagram.com',
                'url_what' => 'https://www.whatsapp.com',
            ]);
        }

        return $this->view('correos.NotificacionDiponibilidadReservados')
            ->with('producto', $this->p)
            ->with('redes', $redes);
    }
}
