<?php

namespace App\Http\Controllers;

use App\User;
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
        
        //$this->middleware('auth');
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
        return view('dashboard.users.create', compact('title'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.users.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.users.edit', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        //$this->validator($request->all())->validate();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed'
        ]);

        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ( ! $request->get('password') == '')
        {
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario alterado com sucesso!!');
    }

    public function destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();
        return redirect()->route('users.index')->with('success', 'Usuario excluido com sucesso!!');
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
