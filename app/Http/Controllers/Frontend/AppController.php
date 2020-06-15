<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use App\Menu;

use App\Http\Requests\Site\StoreInscriptionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;

class AppController extends Controller
{
    public function index()
    {
        $encrypted = Crypt::encryptString('BAIXE ARQUIVO TRANSFORME SEU SONHO EM OBJETIVO');
        $decrypted = Crypt::decryptString($encrypted);

        return view('frontend.index');
    }

    public function quemSomos()
    {
        return view('frontend.quem_somos');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
