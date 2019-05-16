<?php

namespace App\Http\Controllers\Frontend;

use App\Career;
use App\Trainee;
use App\Page;
use App\Menu;

use App\Http\Requests\Site\StoreInscriptionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GtalentosController extends Controller
{
    public function index()
    {
    	$career = Career::all();
    	$trainees = Trainee::get();
        // Used to get the menu items into the blade template
    	return view('frontend.gestaot.index', compact('career', 'trainees'));
    }

    public function vacancies()
    {
        $pages = Page::where('slug', 'processos-seletivos')->first();
        return view('frontend.gestaot.vacancies', compact('pages'));
        
    }

    public function show($slug = null)
    {
    	//dd($slug);
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

    public static function filter()
    {
    	return view('tests.filter');
    }

    public function inscription(StoreInscriptionRequest $request)
    {
    	dd($request);
    }

}
