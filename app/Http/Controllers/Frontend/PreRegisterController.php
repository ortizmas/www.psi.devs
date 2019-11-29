<?php

namespace App\Http\Controllers\Frontend;

use App\Course;
use App\User;
//use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create($url = null)
    {
        $course = Course::ofUrl($url)->status()->firstOrFail(['id']);

        //$encrypted = Crypt::encryptString('Hello world.');
        //$decrypted = Crypt::decryptString($encrypted);
        $slug = encrypt($course->id);
        //$slug = decrypt($slug);
        return view('frontend.prematriculas.create', compact('slug'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_user' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users,email',
            'password_user' => 'required|string|min:6|confirmed',
        ])->setAttributeNames(
            [
                'name_user' => '"Nome completo"',
                'email_user' => '"E-mail"',
                'password_user' => '"Senha'
            ]
        );
    }

    public function store(Request $request)
    {
        $request->session()->flash('error', 'O email já existe, faça login para continuar, ou cadastre um novo e-mail!!');
        $this->validator($request->all())->validate();

        $user = User::create([
            'name' => $request['name_user'],
            'email' => $request['email_user'],
            'password' => $request['password_user'],
        ]);

        $user->assignRole(['student']);

        auth()->login($user);

        //Session do programa de interese do cliente
        session(['item_buy' => $request->program]);

        //return redirect()->to('/home');
        return redirect()->route('profiles.create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}