<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\StoreCategory;
use App\Http\Requests\Categories\UpdateCategory;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'enabled' => $request['enabled'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Seção cadastrado com sucesso!!');
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
            'redirect_url' => url('laravel-crud-search-sort-ajax-modal-form')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $categoryUpdate = Category::find($category->id);

        $categoryUpdate->name = $request->get('name');
        $categoryUpdate->slug = $request->get('slug');
        $categoryUpdate->enabled = $request->get('enabled');
        $categoryUpdate->save();

        return redirect()->route('categories.index')->with('success', 'Categoria alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return Category::destroy($category->id);
    }
}
