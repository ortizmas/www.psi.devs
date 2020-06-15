<?php

namespace App\Mail;

use App\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FaleConoscoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nom;
    public $ema;
    public $tel;
    public $sub;
    public $mes;

    public function __construct($nome, $email, $phone, $subject, $message)
    {
        $this->nom = $nome;
        $this->ema = $email;
        $this->tel = $phone;
        $this->sub = $subject;
        $this->mes = $message;
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
        $e_phone = $this->tel;
        $e_subject = $this->sub;
        $e_message = $this->mes;

        return $this->view('mail.faleconosco', compact("e_nome", "e_email", "e_phone", "e_subject", "e_message"))
            ->from($e_email)
            ->subject($e_subject);
    }
}
