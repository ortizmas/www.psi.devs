<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function session()
    {
        echo "<h1>Test session</h1>";

        echo "<pre>";
        session(['name' => 'Eber Ortiz']);
        echo session('name');

        session()->put('lastname', 'Ortiz');
        echo Session()->get('lastname');

        Session::put('email', 'ortiz mas');
        echo Session::get('email');

        Session::put(['cart_product' => 1, 'cart_quantity' => 2, 'price' => 200]);

        Session::forget('price');

        if (Session::has('email')) {
            echo "O email e valido";
        } else {
            echo 'O email nao e valido';
        }


        if (Session::exists('email')) {
            echo "O email e valido";
        } else {
            echo 'O email nao e valido';
        }

        Session::flash('message', 'Seu usuario foi cadastrado!!');
        echo Session::get('message');

        var_dump(Session::all());

        echo "</pre>";
    }
}
