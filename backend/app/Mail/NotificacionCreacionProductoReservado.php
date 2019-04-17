<?php

namespace App\Mail;

use App\RedesSocial;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionCreacionProductoReservado extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return $this->view('correos.NotificacionDeProductosReservados')->with('redes', $redes);
    }
}
