<?php

namespace App\Http\Controllers;

use App\Annotation;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeStudentNotes(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        //$request['classroom_id'] = 0;
        
        //dd($request->all());
        $annotation = Annotation::updateOrCreate($request->except('_token'));

        return redirect()->back()->with('success', 'Anotação foi salva');
    }

    public function axiosStoreCourse(Request $request)
    {
        $annotation = Annotation::where('user_id', auth()->user()->id)
            ->where('course_id', $request->course_id)->whereNull('classroom_id')->first();
        if ($annotation) {
            $data = $annotation->update($request->all());
        } else {
            $request['user_id'] = auth()->user()->id;
            $data = Annotation::create($request->all());
        }
        
        return response()->json($data);
    }

    public function axiosStoreClassroom(Request $request)
    {
        $annotation = Annotation::where('user_id', auth()->user()->id)
            ->where('course_id', $request->course_id)->where('classroom_id', $request->classroom_id)->first();
        if ($annotation) {
            $data = $annotation->update($request->all());
        } else {
            $request['user_id'] = auth()->user()->id;
            $data = Annotation::create($request->all());
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annotation  $annotation
     * @return \Illuminate\Http\Response
     */
    public function show(Annotation $annotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annotation  $annotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Annotation $annotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annotation  $annotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annotation $annotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annotation  $annotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annotation $annotation)
    {
        //
    }
}
