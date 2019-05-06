<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use App\Http\Requests\Universities\StoreUniversityRequest;
use App\Http\Requests\Universities\UpdateUniversityRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::get();

        return view('dashboard.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniversityRequest $request)
    {
        $university = University::create([
            'initials' => $request['initials'],
            'title' => $request['title'],
            'address' => $request['address'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);

        return redirect()->route('universities.index')->with('success', 'Universidade cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        return view('dashboard.universities.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniversityRequest $request, University $university)
    {
        $universityUpdate = University::find($university->id);

        $university = $universityUpdate->update([
            'initials' => $request['initials'],
            'title' => $request['title'],
            'address' => $request['address'],
            'description' => $request['description'],
            'status' => $request['status']
        ]);

        return redirect()->route('universities.index')->with('success', 'Universidade alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
    }
}
