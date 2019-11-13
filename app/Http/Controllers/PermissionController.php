<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create permission'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read permissions'], ['only' => 'index']);
        $this->middleware(['permission:update permission'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete permission'], ['only' => 'destroy']);
        $this->middleware(['permission:assign permissions'], ['only' => 'assignments']);
    }

    public function index()
    {

        $permissions = Permission::orderBy('id', 'desc')->paginate();

        return view('dashboard.permissions.index', compact('permissions'));
    }

    public function assignPermission($role_id = null)
    {
        $role = Role::findById($role_id);
        $oldPermissions = $role->getAllPermissions();
        $permissions = Permission::get()->load('roles');

        return view('dashboard.permissions.assign', compact('permissions', 'oldPermissions', 'role_id'));
    }

    public function assignPermissionStore(Request $request)
    {
        $role = Role::findById($request->role_id);
        //$role->name = $request->name;
        //$role->save();
        if($request->permissions <> ''){
            //$role->permissions()->sync($request->permissions);
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index')->with('success','Permissions assignado com sucesso');
    }

    
    public function create()
    {
        $roles = Role::get(); //Get all roles
        return view('dashboard.permissions.create', compact('roles'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name'=>'required|max:40|unique:permissions,name',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        if ($request->roles <> '') { 
            foreach ($request->roles as $key => $value) {
                $role = Role::find($value); 
                //$role->permissions()->attach($permission);
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->route('permissions.index')->with('success','Permiso anhadido com sucesso');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('dashboard.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name'=>'required',
        ]);
        $permission->name=$request->name;
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success',
             'Permissão'. $permission->name.' foi atualizado com sucesso!');

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success',
             'Permissão excluída com sucesso!');
    }
}
