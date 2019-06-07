<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index(Request $request, $slug = null)
    {
    	if ($slug != null) {

    	} else {
    		$programs = Post::where('category_id', 5)->where('status', 1)->get();
            $programs = collect($programs)->all();
            $programs = (object)$programs;
    		return view('frontend.programs.index', compact('programs'));
    	}
    }
}
