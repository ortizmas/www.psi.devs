<?php

namespace App\Mail;

use App\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nom;
    public $ema;
    public $sub;
    public $per;
    public $int;
    public $mes;
    public $fil;

    public function __construct($nome, $email, $subject, $perfil, $interesse, $message, $file)
    {
        $this->nom = $nome;
        $this->ema = $email;
        $this->sub = $subject;
        $this->per = $perfil;
        $this->int = $interesse;
        $this->mes = $message;
        $this->fil = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_nome = $this->nom;
        $e_email = $this->ema;
        $e_subject = $this->sub;
        $e_perfil = $this->per;
        $e_interesse = $this->int;
        $e_message = $this->mes;
        $e_file = $this->fil;

        return $this->view('mail.sendemail', compact("e_nome", "e_email", "e_subject", "e_perfil", "e_interesse", "e_message", "e_file") )
            ->from($e_email)
            ->subject($e_subject)
            ->attach($e_file->getRealPath(), array(
                    'as' => $e_file->getClientOriginalName(),
                    'mime' => $e_file->getMimeType())
                );
    }
}
