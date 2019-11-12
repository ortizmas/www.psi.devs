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
        /*$permission = Permission::create(['name' => 'assign permissions']);
        $role = Role::findById(1);
        $role->givePermissionTo($permission);*/

        $permissions = Permission::paginate();

        return view('dashboard.permissions.index', compact('permissions'));
    }

    public function assignPermission($role_id = null)
    {
        $permissions = Permission::all();

        return view('dashboard.permissions.assign', compact('permissions', 'role_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
