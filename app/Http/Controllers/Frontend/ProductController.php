<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use App\Post;
use App\Category;
use App\Inscription;
use Illuminate\Http\Request;
use App\Http\Requests\Inscriptions\InscriptionRequest;
use App\Http\Controllers\Controller;
//use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
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
                $products = Post::where('category_id', 6)->where('status', 1)->get();
                $products = collect($products)->all();
                $products = (object)$products;
                break;
            
            default:
                $id = 8;
                $title = 'TODOS OS PRODUTOS';
                $products = Post::where('category_id', 8)->where('status', 1)->get();
                $products = collect($products)->all();
                $products = (object)$products;
                break;
        }

    	if ($slug != null) {
            $post = Post::where('category_id', $id)->where('status', 1)->where('slug', $slug)->first();
            $post = collect($post)->all();
            $post = (object)$post;

            if ( $post != '' ) {
                return view('frontend.products.show', compact('post'));
            }
            //abort(404);
            return response()->view('errors.custom', [], 404);
    	} else {
    		return view('frontend.products.index', compact('products', 'title'));
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
        
        $inscription = Inscription::create([
            'name' => $request['name'],
            'cpf' => $request['cpf'],
            'cep' => $request['cep'],
            'street' => $request['street'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city'],
            'state' => $request['state'],
            'ibge' => $request['ibge'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'company_phone' => $request['company_phone'],
            'program' => $request['program']
        ]);

        return redirect()->away($payment_link );

        //return redirect()->route('inscription.create', $request['program'] )->with('success', 'Seu cadastro foi realizado com sucesso!!');
    }
}
