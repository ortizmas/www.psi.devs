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
        //dd($permissions);
        //dd($user->can('create role'));
        
        /*$permission = Permission::create(['name' => 'create roles']);
        $role = Role::findById(1);
        $role->givePermissionTo($permission);*/

        $roles = Role::paginate();
        return view('dashboard.roles.index', compact('roles'));
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
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
