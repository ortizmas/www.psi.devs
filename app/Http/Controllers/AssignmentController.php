<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Course;
use App\Module;
use App\Classroom;
use App\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    private $totalPage = 8;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$assignments = Assignment::with(['user', 'classroom'])->get();

        //$assignments = collect($assignments->where('user_id', Auth::user()->id))->all();

        $course = new Course();
        $courses = $course->getResults($request->all(), $this->totalPage);
        return view('dashboard.assignments.index', compact('courses'));
    }

    public function getModules(Request $request, $course_id)
    {
        $module = new Module();
        //$modules = $modules = $module->getResults($request->all(), $this->totalPage);
        $modules = Module::where('course_id', $course_id)->get();
        return view('dashboard.assignments.modules', compact('modules'));
    }

    public function getClassrooms(Request $request, $module_id)
    {
        dd($request);
        $classroom = new Classroom();
        //$classrooms = $classrooms = $classroom->getResults($request->all(), $this->totalPage);
        $classrooms = Classroom::where('module_id', $module_id)->get();
        return view('dashboard.assignments.classrooms', compact('classrooms'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        dd($assignment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
