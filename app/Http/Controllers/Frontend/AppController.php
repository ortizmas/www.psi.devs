<?php

namespace App\Http\Controllers\Frontend;

use App\Course;
use App\Trainee;
use App\Http\Requests\Site\StoreInscriptionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function index()
    {
    	$cursos = Course::all();
    	$trainees = Trainee::get()->where('have_job', 0)->where('enabled', 1);
        $young_employees = Trainee::get()->where('have_job', 1)->where('enabled', 1);
    	return view('frontend.jovenst.index', compact('cursos', 'trainees', 'young_employees'));
    }

    public function show($slug = null)
    {
    	//dd($slug);
    	if ($slug != null) {
    		$cursos = Course::all();
    		$trainees = Trainee::get()->where('have_job', 0)->where('enabled', 1);

    		$trainee = Trainee::where('enabled', 1)->where('slug', $slug)->first();

    		if ( $trainee->count() > 0 ) {
    			return view('frontend.jovenst.show', compact('trainee', 'cursos', 'trainees'));
    		}
    		//abort(404);
    		return response()->view('errors.custom', [], 404);
    		
    	}

    	return redirect()->route('inicio');
    	
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
