<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Course;
use App\Module;
use App\Classroom;
use App\Assignment;
use App\User;
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

        $classromId = Assignment::where('user_id', $userId)->get()->pluck('classroom_id')->toArray();

        //$classromId = array_pluck($classes, 'classroom_id');
        
        $count = 0;
        foreach ($modules as $key => $value) {
            $countClasses = Classroom::where('module_id', $value->id)->get()->count();
            $count = $count + $countClasses;
        }

        return view('dashboard.assignments.assign-modules', compact('modules', 'count', 'userId', 'classromId'));
    }

    public function create()
    {
        //
    }

    

    public function store(Request $request)
    {
        //$this->validateData($request);

        $assignment = new Assignment();

        foreach ($request->class_id as $key => $value) {
            $assignmentsId = Assignment::where('user_id', $request->user_id)->where('classroom_id', $value)->get()->pluck('id');
            $assignment->destroy($assignmentsId);
        }

        if ($request->classroom_id != null) {
            foreach ($request->classroom_id as $key => $value) {
                $ifExistData = Assignment::where('user_id', $request->user_id)->where('classroom_id', $value)->first();
                
                if ($ifExistData != null) {
                    continue;
                } else {
                    $assignment->create(['user_id' => $request->user_id, 'classroom_id' => $value]);
                }
            }
        }
        
        return redirect()->back()->with('success', 'As aulas foram assignado com successo');
    }

    public function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'classroom_id' => 'required',
        ],[
            'user_id.required' => 'O usuario não é valido',
            'classroom_id.required'  => 'Deve selecionar minimo uma aula',
        ],[
            'user_id'  => 'Usuario',
            'classroom_id'              => 'Aula',
        ]);

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
