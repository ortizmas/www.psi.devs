<?php

namespace App\Http\Controllers\Students;

use App\Course;
use App\Http\Controllers\Controller;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if ($course) {
            return $this->getCourseByUser($data);
        } else {
            return $this->waitingCoursePayment($url);
        }
    }

    public function getCourseByUser($data)
    {
        $courses = $this->course->getCoursesByUser($data);
        return view('student.classrooms', compact('courses'));
    }

    public function waitingCoursePayment($url)
    {
        $message = "Estamos aguardando o pagamento, se já realizou o pagamento desconsidere essa mensagem,
        em breve seu curso será ativado.";
        session()->flash('checkPayment', $message);
        return redirect()->route('profiles.course.details', $url);
    }

    public function hasManyThrough()
    {
        $course = Course::find(3);
        return $course->classrooms->count();
    }
}
