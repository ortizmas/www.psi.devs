<?php
namespace App\Http\Controllers\Frontend;

use App\Course;
use App\User;
//use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreRegisterController extends Controller
{
    public function create($url = null)
    {
        $course = Course::ofUrl($url)->status()->firstOrFail(['id']);

        //$encrypted = Crypt::encryptString('Hello world.');
        //$decrypted = Crypt::decryptString($encrypted);
        $slug = encrypt($course->id);

        //Session para usar depois de fazer login
        session(['item_buy' => $slug]);
        //$slug = decrypt($slug);
        if (Auth::check()) {
            return redirect()->route('profiles.create');
        }
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
}
