<?php

namespace App\Mail;

use App\RedesSocial;
use App\Suscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarTokenMail extends Mailable implements ShouldQueue{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $tokenActivacion;

    protected $tockenCancelarSuscripcion;

    public $PerAccUserAprobAdmin;

    public function __construct($tokenActivacion, Suscripcion $sus, $PerAccUserAprobAdmin) {
        $this->tokenActivacion           = $tokenActivacion;
        $this->tockenCancelarSuscripcion = $sus->tocken;
        $this->PerAccUserAprobAdmin      = $PerAccUserAprobAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build() {
        $redes = RedesSocial::first();
        if (! $redes) {

            $redes = new RedesSocial([
                'url_face' => 'www.facebook.com',
                'url_twit' => 'https://www.twitter.com',
                'url_inst' => 'https://www.instagram.com',
                'url_what' => 'https://www.whatsapp.com',
            ]);
        }

        return $this->view('correos.activar-cuenta')
            ->subject('Gracias por Registrarte')
            ->with('token', $this->tokenActivacion)
            ->with('tockenCancelarSuscripcion', $this->tockenCancelarSuscripcion)
            ->with('redes', $redes);
    }
}
