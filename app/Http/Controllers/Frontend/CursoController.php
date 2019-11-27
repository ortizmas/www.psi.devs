<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\User;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $title = "Cursos e Treinamentos";
        $category = Category::where('slug', 'cursos-e-treinamentos')->firstOrFail(['id']);
        $courses = Course::where('category_id', $category->id)->where('status', 1)->get();
        $courses = collect($courses)->all();
        $courses = (object) $courses;
        return view('frontend.cursos.index', compact('courses', 'title'));
    }

    public function show($url)
    {
        $courses = new Course();
        $category = Category::where('slug', 'cursos-e-treinamentos')->firstOrFail(['id']);
        $courses = $courses->where('category_id', $category->id)->where('status', 1)->get();
        $course = $courses->where('url', $url)->first();

        return view('frontend.cursos.show', compact('courses', 'course'));
    }
}