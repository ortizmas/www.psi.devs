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
        $classroom = new Classroom();
        //$classrooms = $classrooms = $classroom->getResults($request->all(), $this->totalPage);
        $classrooms = Classroom::where('module_id', $module_id)->get();
        return view('dashboard.assignments.classrooms', compact('classrooms'));
    }

    public function assignCourses(Request $request, $userId)
    {
        $course = new Course();
        $courses = $course->getResults($request->all(), $this->totalPage);
        return view('dashboard.assignments.courses', compact('courses', 'userId'));
    }

    public function assignModules(Request $request, $course_id, $userId)
    {
        $module = new Module();
        $modules = Module::where('course_id', $course_id)->get()->load('course', 'classrooms');
        
        $count = 0;
        foreach ($modules as $key => $value) {
            $countClasses = Classroom::where('module_id', $value->id)->get()->count();
            $count = $count + $countClasses;
        }

        return view('dashboard.assignments.assign-modules', compact('modules', 'count'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Assignment $assignment)
    {
        dd($assignment);
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        //
    }
}
