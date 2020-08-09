<?php

namespace App\Http\Controllers\students;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePdf($courseID)
    {
        $userId = auth()->id();
        $course = new Course();
        $courses = $course->getCoursesByAnnotations($userId, $courseID);
        //$data_course = Course::select('id', 'name', 'url', 'image', 'video')->findOrFail($courseID);
        
        //return view('student.pdf-annotations', compact('courses'));

        $pdf = PDF::loadView('student.pdf-annotations', compact('courses'));

        return $pdf->setPaper('a4')->stream('anotacoes-course-'. $courseID . '.pdf');
    }
}
