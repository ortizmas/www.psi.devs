<?php

namespace App\Http\Controllers\Students;

use App\Annotation;
use App\Classroom;
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

    public function getClassroom($url, $id)
    {
        $data['user_id'] = Auth::id();
        $data['url'] = $url;
        $data['course_id'] = $id;
        
        $course = $this->course->checkPayment($data);

        if ($course) {
            return $this->getClassByUser($data);
        } else {
            return $this->waitingCoursePayment($url);
        }
    }

    public function getCourseByUser($data)
    {
        $courses = $this->course->getCoursesByUser($data);
        $data_course = Course::select('id', 'name', 'url', 'image', 'video')->findOrFail($data['course_id']);
        
        return view('student.classrooms', compact('courses', 'data_course'));
    }

    public function getClassByUser($data)
    {
        $courses = $this->course->getCoursesByUser($data);

        $data_course = Course::select('id', 'name', 'url', 'image', 'video')->findOrFail($data['course_id']);
        $annotations = Annotation::where('user_id', auth()->user()->id)->get();
        return view('student.course-play', compact('courses', 'annotations', 'data_course'));
    }

    public function getClassroomBySlugAndId($url, $id)
    {
        $data['user_id'] = Auth::id();
        $data['url'] = $url;
        $data['course_id'] = $id;

        $courses = $this->course->getCoursesByUser($data);
        $data_course = Course::select('id', 'name', 'url', 'image', 'video')->findOrFail($data['course_id']);
        $classroom = Classroom::where('slug', $url)->firstOrFail();
        //$annotations = Annotation::where('user_id', auth()->user()->id)->get();

        return view('student.classrooms-play', compact('courses', 'classroom', 'data_course'));
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
