<?php

namespace App\Http\Controllers\Students;

use App\Assignment;
use App\Classroom;
use App\Course;
use App\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $course;

    public function __construct(Course $course)
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
        $data['course_id'] = $id;

        $courses = $this->course->getCoursesByUser($data);

        return view('student.classrooms', compact('courses'));

    }
}
