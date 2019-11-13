<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
//use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create role'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read roles'], ['only' => 'index']);
        $this->middleware(['permission:update role'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete role'], ['only' => 'destroy']);
    }

    public function index()
    {
        // get logged-in user
        $user = auth()->user();
        // get all inherited permissions for that user
        $permissions = $user->getAllPermissions();

        $roles = Role::paginate();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:roles|max:20',
            'permissions' =>'required',
            ]
        );
        
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        if($request->permissions <> ''){
            //$role->permissions()->attach($request->permissions);
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('roles.index')->with('success','Roles anhadido com sucesso');
    }

    public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $role = Role::findOrFail($id);//Get role with the given id
        //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:20|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);

        $role->fill($input)->save();
        if($request->permissions <> ''){
            //$role->permissions()->sync($request->permissions);
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index')->with('success','Rol atualizado co sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success',
             'Role excluido com sucesso!');
    }
}
