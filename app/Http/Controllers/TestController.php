<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Course;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Collection;
// use Illuminate\Support\Str;

class TestController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.tests.index', compact('categories'));
    }

    public function ajaxCreate(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|max:191|unique:categories,slug',
            'enabled' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }
            
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->enabled = $request->enabled;
        $category->save();
        return response()->json([
            'fail' => false,
            'category_id' => $category->id,
            'category_name' => $category->name,
            'redirect_url' => url('ajax-test-create-form')
        ]);
    }

    public function precing()
    {
        return view('tests.prescing');
    }

    public function cleanCode()
    {
        $users = User::all();
        $userAdmin = $users->filter(function ($user, $key) {
            return $user->name === 'admin';
        });
        //return $userAdmin;

        $collection = collect([1, 2, 3, 4]);

        $filtered = $collection->filter(function ($value, $key) {
            return $value > 2;
        });

        $filtered->all();

        $collection = collect([1, 2, 3, null, false, '', 0, []]);

        return $collection->filter()->all();

        // [1, 2, 3]
        
        /*$userAdmin = [];
        foreach ($users as $key => $user) {
            if ($user->name == 'admin') {
                $userAdmin = $user;
            }
        }
        return $userAdmin;*/
    }

    public function refactorization(Course $course)
    {
        $course = $course->studentsAverageScore();

        //Contains
        
        //$module = new Module();
        //Module::whereIn('id', [1, 2, 3])->get()->dump();
        $users = \App\User::all();
        
        //$users = $users->diff(\App\User::whereIn('id', [24, 2, 3])->get())->dump();
        //dd($users->contains(25));
        $users->except([24, 25, 26])->dump();

        // crossJoin
        $collection = collect([1, 2]);

        $matrix = $collection->crossJoin(['a', 'b']);

        return $matrix->all();

        /*
            [
                [1, 'a'],
                [1, 'b'],
                [2, 'a'],
                [2, 'b'],
            ]
        */


        return view('tests.refactorization');
    }
}
