<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdenMailAviso extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public function __construct($nOrden)
    {
        $this->order=$nOrden;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pdf.VentaOrden')
            ->subject('Gracias por su compra')
            ->attach(public_path('storage/pdf/pdfOrden.pdf', [
                'as' => 'Orden_'.$this->order.'.pdf',
                'mime' => 'application/pdf',
            ]));
    }
}
