<?php

namespace App\Http\Controllers\Students;

use App\Assignment;
use App\Classroom;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $course;

    public function __constructor(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $course = new Course();
        $courses = $course->getMyCourses();
        
        return view('student.index', compact('courses'));
    }

    public function myCourse($url, $id)
    {
        $data['user_id'] = Auth::id();
        $data['url'] = $url;
        $data['module_id'] = 23;

        $course = $this->course->getMyCourse($data);

        dd($course);

        if (!$course)
            return response()->json(['error' => 'Not found'], 404);

        return response()->json($course, 201);

    }
}
