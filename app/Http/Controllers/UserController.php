<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'show']);
        //$this->authorizeResource('post');
        
        $this->middleware(['permission:create user'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read users'], ['only' => 'index']);
        $this->middleware(['permission:update user'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete user'], ['only' => 'destroy']);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get logged-in user
        $user = auth()->user();

        // get all inherited permissions for that user
        $permissions = $user->getAllPermissions();

        //dd($permissions);
        //$conn = $this->checkInternetConnection();

        $title = 'Usuarios';
        $users = User::get();
        return view('dashboard.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', User::class); //Validation em cada função
        $title = 'Novo usuario';
        $roles = Role::all();
        return view('dashboard.users.create', compact('title', 'roles'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required'
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::create($request->except('roles'));
        
        if($request->roles <> ''){
            //$user->roles()->attach($request->roles);
            $user->assignRole($request->roles);
        }
        return redirect()->route('users.index')->with('success','Usuario cadastrado com sucesso!!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('dashboard.users.show', ['user' => User::findOrFail($id)]);
    }

    public function edit($id) {

        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $roles = Role::get(); 
        return view('dashboard.users.edit', compact('user', 'roles')); 
    }

    public function update(Request $request, $id) {

        $user = User::findOrFail($id);   
        $this->authorize('update', $user);

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password' => ($request['password'] ? 'required|string|min:6|confirmed' : 'nullable')  
        ]);

        $input = $request->except('roles');
        $user->fill($input)->save();

        if ($request->roles <> '') {
            //$user->roles()->sync($request->roles);
            $user->syncRoles($request->roles);       
        }        
        else {
            $user->roles()->detach();
        }
        return redirect()->route('users.index')->with('success',
             'Usuario altedado com sucesso.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('dashboard.users.index')->with('success',
             'User successfully deleted.');
    }

    public function checkInternetConnection()
    {
        $connected = @fsockopen("www.google.com", 80, $iErrno, $sErrStr, 5);
        if ($connected) {
            fclose($connected);
            return true; //action when connected
        }

        exit(json_encode([
            'connected' => false,
            'data' => []
        ]));
    }
}
