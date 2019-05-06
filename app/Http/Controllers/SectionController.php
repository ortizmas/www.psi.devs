<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Requests\Sections\StoreSection;
use App\Http\Requests\Sections\UpdateSection;

use Illuminate\Http\Request;

class SectionController extends Controller
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
        $sections = Section::get();
        return view('dashboard.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nova Seção';
        return view('dashboard.sections.create', compact('title'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:sections,slug|max:191',
            'enabled' => 'required|string',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSection $request)
    {
        //$request['slug'] = str_slug($request->slug, '-');
        //$this->validator($request->all())->validate();

        $section = Section::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'enabled' => $request['enabled'],
        ]);
        // $request['slug'] = str_slug($request->slug, '-');

        // $this->validate($request,[
        //     'name' => 'required|string|max:255',
        //     'slug' => "required|unique:sections,slug|max:191",
        //     'enabled' => 'required|string',
        // ]);
        // $db_filed = new Section;
        // $db_filed->name = $request->name; 
        // $db_filed->slug = $request->slug;
        // $db_filed->enabled = $request->enabled;  

        // $db_filed->save();

        return redirect()->route('sections.index')->with('success', 'Seção cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('dashboard.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSection $request, Section $section)
    {
        $sectionUpdate = Section::find($section->id);

        $sectionUpdate->name = $request->get('name');
        $sectionUpdate->slug = $request->get('slug');
        $sectionUpdate->enabled = $request->get('enabled');
        $sectionUpdate->save();

        return redirect()->route('sections.index')->with('success', 'Seção alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $deleteSection = Section::destroy($section->id);
    }

}
