<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Page;
use App\Post;
use App\Category;
use App\Inscription;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Inscriptions\InscriptionRequest;
use App\Http\Controllers\Controller;
//use Illuminate\Http\RedirectResponse;

class ProgramsController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        //dd(explode('/', $request->url())[3]);
        //dd($request->segments()[0]);
        $url = $request->segments()[0];
        switch ($url) {
            case 'consultorias':
                $id = 6;
                $title = 'CONSULTORIAS';
                $programs = Post::where('category_id', 6)->where('status', 1)->get();
                $programs = collect($programs)->all();
                $programs = (object)$programs;
                break;

            case 'programas':
                $id = 5;
                $title = 'PROGRAMAS';
                $programs = Post::where('category_id', 5)->where('status', 1)->get();
                $programs = collect($programs)->all();
                $programs = (object)$programs;
                break;

            case 'especialidades':
                $id = 7;
                $title = 'ESPECIALIDADES';
                $programs = Post::where('category_id', 7)->where('status', 1)->get();
                $programs = collect($programs)->all();
                $programs = (object)$programs;
                break;
            
            default:
                $id = 8;
                $title = 'PRODUTOS';
                $programs = Post::where('category_id', 8)->where('status', 1)->get();
                $programs = collect($programs)->all();
                $programs = (object)$programs;
                break;
        }

    	if ($slug != null) {
            $post = Post::where('category_id', $id)->where('status', 1)->where('slug', $slug)->first();
            $post = collect($post)->all();
            $post = (object)$post;

            if ( $post != '' ) {
                return view('frontend.programs.show', compact('post'));
            }
            
            return response()->view('errors.custom', [], 404);
    	} else {
    		return view('frontend.programs.index', compact('programs', 'title'));
    	}
    }

    public function create($slug = null)
    {
        //return  new RedirectResponse("http://www.google.com?andParams=yourParams"); 
        $post = Post::where('slug', $slug)->first();
        return view('frontend.inscription', compact('post') );
    }

    public function store(InscriptionRequest $request)
    {
        $post = Post::where('slug', $request['program'])->first();
        $payment_link = $post->payment_link;

        $user = User::create([
            'name' => $request['name_user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($user) {
            $inscription = Inscription::create([
                'name' => $request['name'],
                'cpf' => $request['cpf'],
                'cep' => $request['cep'],
                'street' => $request['street'],
                'neighborhood' => $request['neighborhood'],
                'city' => $request['city'],
                'state' => $request['state'],
                'ibge' => $request['ibge'],
                'email_inscription' => $request['email_inscription'],
                'phone' => $request['phone'],
                'company' => $request['company'],
                'company_phone' => $request['company_phone'],
                'program' => $request['program']
            ]);
        } 

        auth()->login($user);
        
        return redirect()->to('/home');

        /*if ($request['program'] === 'clube-de-vantagens') {
            return redirect()->route('products.items');   
        }*/

        //return redirect()->away($payment_link );

        //return redirect()->route('inscription.create', $request['program'] )->with('success', 'Seu cadastro foi realizado com sucesso!!');
    }
}
