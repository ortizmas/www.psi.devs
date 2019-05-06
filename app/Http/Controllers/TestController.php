<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        if ($validator->fails())
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
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
}
