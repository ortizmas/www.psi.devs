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
        //$user = User::find(3);
        /*$post = $user->posts()->where('status', 1)->get();
        $post = $user->posts()
                        ->where('status', 2)
                        ->orWhere('author', '=', 'Eber')
                        ->get();
        $query = $user->posts()
                        ->where(function (Builder $query) {
                            return $query->where('status', 2)
                                         ->orWhere('author', '=', 'Eber');
                        })
                        ->get();*/
        //$query = Post::has('user')->get();
        //$query = Post::has('user', '=', 'admin')->get();
        //$query = Post::select(['title', 'slug'])->withCount('user')->get();

        //$query = Category::find(8);
        // $query->loadCount('posts')
        /*$query = $query->loadCount(['posts' => function ($query) {
            $query->where('enabled', 1);
        }]);*/

        //$query = Post::with('category')->get();
        $query = Category::with(['posts' => function ($query) {
            $query->where('title', 'like', '%Programas%');
        }])
        ->where('name', 'Destaque')
        ->get();

        return $query;

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

    public function hasManyThrough()
    {
        $course = Course::find(3);
        return $course->classrooms->count();
    }
}
