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

    public function show($slug = null)
    {

        if ($slug != null) {
            $career = Career::all();
            $trainees = Trainee::get();

            $trainee = Trainee::where('enabled', 1)->where('slug', $slug)->first();

            if ( $trainee->count() > 0 ) {
                return view('frontend.gestaot.show', compact('trainee', 'career', 'trainees'));
            }
            //abort(404);
            return response()->view('errors.custom', [], 404);
            
        }

        return redirect()->route('inicio');
        
    }

    public function faleconosco()
    {
        return view('frontend.gestaot.faleconosco');
        
    }

}
