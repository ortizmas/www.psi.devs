<?php

namespace App\Http\Controllers;

use App\Annotation;
use App\Classroom;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Course;

class AnnotationController extends Controller
{
    private $course;
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
        
        // session()->flash("success", "Anotação salva com sucesso");
        // return View::make("partials/flash-messages");
        
        return response()->json(['status' => 200, 'data' => $data]);
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

        // session()->flash("success", "Anotação salva com sucesso");
        // return View::make("partials/flash-messages");
        return response()->json(['status' => 200, 'data' => $data]);
    }

    public function getList($id)
    {
        $data['user_id'] = auth()->id();
        $data['course_id'] = $id;

        $userId = auth()->id();

        //$courses = $this->course->getCoursesByUser($data);

        $data_course = Course::select('id', 'name', 'url', 'image', 'video')->findOrFail($data['course_id']);

        $classrooms = Classroom::select('*', 'annotations.*')
            ->join('annotations', 'classrooms.id', '=', 'annotations.classroom_id')
            ->where('annotations.user_id', $userId)
            ->where('annotations.course_id', $id)
            ->get();
        
        $annotation = $data_course->annotation()->where('user_id', auth()->user()->id)
            ->whereNull('classroom_id')->first();
       // $annotations = Annotation::where('user_id', auth()->user()->id)->get();
        return view('student.annotations', compact('annotation', 'data_course', 'classrooms'));
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
