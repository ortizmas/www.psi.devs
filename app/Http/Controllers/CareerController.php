<?php

namespace App\Http\Controllers;

use App\Career;
use App\University;
use Illuminate\Http\Request;
use App\Http\Requests\Careers\StoreCareerRequest;
use App\Http\Requests\Careers\UpdateCareerRequest;

class CareerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::get();
        return view('dashboard.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::get(['id', 'title']);

        return view('dashboard.careers.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerRequest $request)
    {
        $course = Career::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'status' => $request['status'],
            'university_id' => $request['university_id'],
        ]);

        return redirect()->route('careers.index')->with('success', 'Carreira cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        $universities = University::get(['id', 'title']);

        return view('dashboard.careers.edit', compact('universities', 'career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        $careerUpdate = Career::find($career->id);

        $career = $careerUpdate->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'status' => $request['status'],
            'university_id' => $request['university_id'],
        ]);

        return redirect()->route('careers.index')->with('success', 'Carreira alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        return Career::destroy($course->id);
    }
}
