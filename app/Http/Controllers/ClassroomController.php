<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classroom;
use App\Module;
use App\Http\Requests\StoreUpdateClassroomFormRequest;

class ClassroomController extends Controller
{
    private $classroom, $totalPage = 15;
    

    public function __construct(Classroom $classroom)
    {
        $this->classroom = $classroom;
        // $this->middleware('auth:api')->except([
            
        // ]);
    }

    public function index(Request $request, $idModule = null)
    {
        
        //$request['module_id'] = $request->get('idModule');
        $request['module_id'] = $idModule;
        $classrooms = $this->classroom->getResults($request->all(), $this->totalPage);
        //dd($classrooms[0]->module->course_id);
        $request->session()->put('idModule', $idModule);

        //return response()->json($classroom);
        return view('dashboard.classrooms.index', compact('classrooms'));
    }

    public function create(Request $request)
    {
        if ($request->get('idModule')) {
            $modules = Module::findOrFail($request->get('idModule'));
        } else {
            $modules = Module::get();
        }
        return view('dashboard.classrooms.create', compact('modules'));
    }

    public function show($id)
    {
        $classroom = $this->classroom->find($id);
        if (!$classroom)            
            return response()->json(['error' => 'Not found'], 404);

        return response()->json($classroom);
    }

    public function store(StoreUpdateClassroomFormRequest $request)
    {
        $classroom = $this->classroom->create($request->all());

        //return response()->json($classroom, 201);
        return redirect()->route('classrooms.index.param', $request->get('module_id'))->with('success', 'Aula cadastrada com sucesso!!');
    }

    public function edit(Classroom $classroom)
    {
        $modules = Module::get();
        return view('dashboard.classrooms.edit', compact('classroom', 'modules'));
    }

    public function update(StoreUpdateClassroomFormRequest $request, $id)
    {
        $classroom = $this->classroom->find($id);

        if (!$classroom)            
            return response()->json(['error' => 'Not found'], 404);

        $classroom->update($request->all());
        
        //return response()->json($classroom);
        return redirect()->route('classrooms.index')->with('success', 'Aula alterado com sucesso!!');
    }

    public function destroy($id)
    {
        $classroom = $this->classroom->find($id);

        if (!$classroom)            
            return response()->json(['error' => 'Not found'], 404);

        $classroom->delete();

        return response()->json(['success' => 'true'], 204);
    }
}
