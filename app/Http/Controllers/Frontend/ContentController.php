<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use App\Post;

use App\Http\Requests\Site\StoreInscriptionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }

    public function quemSomos()
    {
        return view('frontend.quem_somos');
        
    }

    public function treinamento(Request $request, $slug = null)
    {

    	if ($slug != null) {
    		$post = Post::where('category_id', 3)->where('status', 1)->where('slug', $slug)->first();
            $post = collect($post)->all();
            $post = (object)$post;

    		if ( $post != '' ) {
    			return view('frontend.treinamento', compact('post'));
    		}
    		//abort(404);
    		return response()->view('errors.custom', [], 404);
    		
    	}

    	return redirect()->route('inicio');
    	
    }

    public function palestra(Request $request, $slug = null)
    {

        if ($slug != null) {
            $post = Post::where('category_id', 4)->where('status', 1)->where('slug', $slug)->first();

            if ( $post != null ) {
                $post = collect($post)->all();
                $post = (object)$post;
                return view('frontend.palestra', compact('post'));
            }
            //abort(404);
            return response()->view('errors.custom', [], 404);
            
        }

        return redirect()->route('inicio');
        
    }

    public function getPage(Request $request, $slug = null)
    {
        if ($slug != null) {
            $page = Page::where('slug', $slug)->where('enabled', 1)->first();

            if ( $page != null ) {
                $page = collect($page)->all();
                $page = (object)$page;
                return view('frontend.page', compact('page'));
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
