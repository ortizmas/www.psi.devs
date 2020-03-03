<?php

namespace App\Http\Controllers\Students;

use App\Assignment;
use App\Category;
use App\Classroom;
use App\Course;
use App\Module;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $courses = Inscription::getCourses();
        return view('student.index', compact('courses'));
    }

    public function myCourse($url, $id)
    {
        $data['user_id'] = Auth::id();
        $data['url'] = $url;
        $data['course_id'] = $id;

        $course = $this->course->checkPayment($data);

        $courses = $this->course->getCoursesByUser($data);

        return view('student.classrooms', compact('courses'));

    }

    public function hasManyThrough()
    {
        $course = Course::find(3);
        return $course->classrooms->count();
    }
}
