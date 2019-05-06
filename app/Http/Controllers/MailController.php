<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Mail;
use App\Mail\ContactMail;
use App\Mail\FaleConoscoMail;

class MailController extends Controller
{
    public function sendemail(Request $request)
    {

    	$this->validate($request, [
    		"email" => "required",
    		"message" => "required",
    	]);

        $nome = $request->name;
    	$email = $request->email;
    	$subject = "Documentação para processos seletivos";
        $perfil = $request->perfil;
        $interesse = $request->interesse;
    	$message = $request->message;
    	$file = $request->arquivo;

    	Mail::to('ortizmas14@gmail.com')->send( new ContactMail($nome, $email, $subject, $perfil, $interesse, $message, $file) );

    	return redirect()->route('processo.seletivo')->with('success', 'Message enviado com sucesso !!');
    }

    public function faleconoscoemail(Request $request)
    {

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "message" => "required",
        ]);

        $nome = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = "Fale conosco";
        $message = $request->message;

        Mail::to('ortizmas14@gmail.com')->send( new FaleConoscoMail($nome, $email, $phone, $subject, $message) );

        return redirect()->route('fale.conosco')->with('success', 'Message enviado com sucesso !!');
    }
}
