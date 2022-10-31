<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $comentario_respuesta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comentario_respuesta)
    {
        $this->comentario_respuesta = $comentario_respuesta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->view('mails.mailTicket');
    }
}
