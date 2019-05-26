<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
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
        $posts = Post::paginate();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::get(['id', 'name']);
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        
        if ($request->date_start != null) {
            $date_start =  Carbon::createFromFormat('d/m/Y', $request->date_start)->toDateString();
        } else {
            $date_start = Carbon::now('America/Bahia')->subDay()->format('Y-m-d');
        }
        

        if ($request->date_end != null) {
            $date_end =  Carbon::createFromFormat('d/m/Y', $request->date_end)->toDateString();
        } else {
            $date_end = Carbon::now('America/Bahia')->subDay()->format('Y-m-d');
        }

        if ( $request->image != null ) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $updload = request()->image->move(public_path('uploads/images'), $imageName); //local
            //$updload = request()->image->move(('../public_html/uploads/images'), $imageName); //server
        } else {
            $imageName = $request['image'];
        }
        
        $post = Post::create([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'image' => $imageName,
            'description' => $request['description'],
            'content' => $request['content'],
            'date_start' => $date_start,
            'date_end' => $date_end,
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'target' => $request['target'],
            'author' => $request['author'],
            'order' => $request['order'],
            'status' => $request['status'],
            'category_id' => $request['category_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::get(['id', 'name']);
        return view('dashboard.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->date_start != null) {
            $date_start =  Carbon::createFromFormat('d/m/Y', $request->date_start)->toDateString();
        } else {
            $date_start = Carbon::now('America/Bahia')->subDay()->format('Y-m-d');
        }
        

        if ($request->date_end != null) {
            $date_end =  Carbon::createFromFormat('d/m/Y', $request->date_end)->toDateString();
        } else {
            $date_end = Carbon::now('America/Bahia')->subDay()->format('Y-m-d');
        }


        if ( $request->image != null ) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $updload = request()->image->move(public_path('uploads/images'), $imageName); //local
            //$updload = request()->image->move(('../public_html/uploads/images'), $imageName); //server
        } else {
            $image = $post->findOrFail($post->id);
            $image = collect($image)->all();
            $imageName = $image['image'];
        }
        
        $postUpdate = Post::find($post->id);

        $post = $postUpdate->update([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'image' => $imageName,
            'description' => $request['description'],
            'content' => $request['content'],
            'date_start' => $date_start,
            'date_end' => $date_end,
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'target' => $request['target'],
            'author' => $request['author'],
            'order' => $request['order'],
            'status' => $request['status'],
            'category_id' => $request['category_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
