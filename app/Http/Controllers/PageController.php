<?php

namespace App\Http\Controllers;

use App\Page;
use App\Section;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Pages\StorePage;
use App\Http\Requests\Pages\UpdatePage;

class PageController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:create page'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read pages'], ['only' => 'index']);
        $this->middleware(['permission:update page'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete page'], ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get()->load('section');
        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$pagesParents = Page::pluck('title','id')->all(); //Laravelcolective
        $pagesParents = Page::get(['id', 'title']);
        $sections = Section::get(['id', 'name']);

        return view('dashboard.pages.create', compact('pagesParents', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {

        $page = Page::create([
            'parent_id' => $request['parent_id'],
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'content' => $request['content'],
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'target' => $request['target'],
            'order' => $request['order'],
            'enabled' => $request['enabled'],
            'section_id' => $request['section_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('pages.index')->with('success', 'Pagina cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //$pagesParents = Page::pluck('title','id')->all(); //Laravelcolective
        $pagesParents = Page::get(['id', 'title']);
        $sections = Section::get(['id', 'name']);

        return view('dashboard.pages.edit', compact('pagesParents', 'sections', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $pageUpdate = Page::find($page->id);

        $page = $pageUpdate->update([
            'parent_id' => $request['parent_id'],
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'content' => $request['content'],
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'target' => $request['target'],
            'order' => $request['order'],
            'enabled' => $request['enabled'],
            'section_id' => $request['section_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('pages.index')->with('success', 'Pagina alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        return Page::destroy($page->id);
    }
}
