<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class videogameMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $asunto;
    public $mensaje;

    public function __construct($nombre, $email, $asunto, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->asunto,  // El asunto que recibes por parámetro
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.envioCorreo', // La vista que mostrarás
            with: [
                'nombre' => $this->nombre,
                'email' => $this->email,
                'asunto' => $this->asunto,
                'mensaje' => $this->mensaje,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
