<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Course;
use App\Http\Requests\StoreUpdateModuleFormRequest;

class ModuleController extends Controller
{
    private $module, $totalPage = 50;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function index(Request $request, $idCourse = null)
    {
        $request['course_id'] = $idCourse;
        $modules = $this->module->getResults($request->all(), $this->totalPage);
        $request->session()->put('idCourse', $idCourse);

        return view('dashboard.modules.index', compact('modules'));
    }

    public function create(Request $request)
    {
        $request->session()->put('idCourse', $request->get('idCourse'));

        if ($request->get('idCourse') != null) {
            $courses = Course::findOrFail($request->get('idCourse'));
        } else {
            $courses = Course::get();
        }

        return view('dashboard.modules.create', compact('courses'));
    }

    public function show($id)
    {
        $module = $this->module->find($id);
        if (!$module)            
            return response()->json(['error' => 'Not found'], 404);

        return response()->json($module);
    }

    public function store(StoreUpdateModuleFormRequest $request)
    {
        $module = $this->module->create($request->all());

        //return response()->json($module, 201);
        return redirect()->route('modules.index.param', $request['course_id'])
            ->with('success', 'Modulo cadastrado com sucesso!!');
    }

    public function edit(Module $module)
    {
        $courses = Course::get();
        return view('dashboard.modules.edit', compact('module', 'courses'));
    }

    public function update(StoreUpdateModuleFormRequest $request, $id)
    {
        $module = $this->module->find($id);

        if (!$module)            
            return response()->json(['error' => 'Not found'], 404);

        $module->update($request->all());
        
        return redirect()->route('modules.index.param', $request['course_id'])->with('success', 'Modulo alterado com sucesso!!');
    }

    public function destroy($id)
    {
        $module = $this->module->find($id);

        if (!$module)            
            return response()->json(['error' => 'Not found'], 404);

        $module->delete();

        return response()->json(['success' => 'true'], 204);
    }
}
