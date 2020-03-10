<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Course;
use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\Courses\UpdateCourseRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    private $course, $totalPage = 8;
    private $path = 'courses';

    public function __construct(Course $course)
    {
        $this->course = $course;
        
        // $this->middleware('auth:api')->except([
        //     'index',
        //     'show',
        //     //'myCourse'
        // ]);
    }

    public function index(Request $request)
    {

        $courses = $this->course->getResults($request->all(), $this->totalPage);
        //return response()->json($course);
        return view('dashboard.courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = $this->course->find($id);
        
        if(!$course)            
            return response()->json(['error' => 'Not found'], 404);

        return response()->json($course);
    }

    public function create(Request $request)
    {
        $categories = Category::where('section', 'course')->get();
        return view('dashboard.courses.create', compact('categories'));
    }

    public function store(StoreCourseRequest $request, Course $course)
    {
        $data = $request->all();
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = kebab_case($request->name);
            $extension = $request->image->extension();

            $fileName = "{$name}.{$extension}";
            $data['image'] = $fileName;

            $upload = $request->image->storeAs($this->path, $fileName);

            if (!$upload)
                return response()->json(['error' => 'Fail_Upload'], 500);
        }

        $data['user_id'] = Auth::id();
        //$data['url'] = str_slug($request->name,'-');

        $course = $this->course->create($data);

        //return response()->json($course, 201);
        return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!!');
    }

    public function edit(Course $course)
    {
        $categories = Category::where('section', 'course')->get();
        $course = Course::findOrFail($course->id);

        return view('dashboard.courses.edit', compact('course', 'categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        //dd($request->price);
        $course = $this->course->find($course->id);

        if(!$course)            
            return response()->json(['error' => 'Not found'], 404);

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($course->image) {
                if(Storage::exists("{$this->path}/{$course->image}"))
                    Storage::delete("{$this->path}/{$course->image}");
            }
    
            $name = kebab_case($request->url);
            $extension = $request->image->extension();
    
            $fileName = "{$name}.{$extension}";
            $data['image'] = $fileName;
    
            $upload = $request->image->storeAs($this->path, $fileName);
    
            if(!$upload)
                return response()->json(['error' => 'Fail_Upload'], 500);

        } else {
            $data['image'] = $course->image;
        }

        $course->update($data);

        //$data['url'] = str_slug($request->name,'-');
        return redirect()->route('courses.index')->with('success', 'Curso alterado com sucesso!!');

    }

    public function destroy($id)
    {
        $course = $this->course->find($id);

        if (!$course)            
            return response()->json(['error' => 'Not found'], 404);

        if ($course->delete())
            if ($course->image) {
                if (Storage::exists("{$this->path}/{$course->image}"))
                    Storage::delete("{$this->path}/{$course->image}");
            }

        return response()->json(['success' => 'true'], 204);
    }

    public function myCourse($url)
    {
        $data['user_id'] = Auth::id();
        $data['url'] = $url;

        $course = $this->course->getMyCourse($data);

        if (!$course)
            return response()->json(['error' => 'Not found'], 404);

        return response()->json($course, 201);

    }
}
