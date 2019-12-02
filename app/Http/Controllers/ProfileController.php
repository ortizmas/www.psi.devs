<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Role;
use App\Inscription;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('dashboard.profiles.show', ['user' => User::findOrFail($id)]);
    }

    public function create(Request $request)
    {

        $user = Auth::user();
        $inscription = Inscription::where('user_id', $user->id)->first();

        if ($inscription) {
            //return redirect()->route('profiles.inscription.edit', $inscription->id);
            return $this->editPerfil($inscription->id);
        }

        return view('dashboard.profiles.create', compact('user'));
    }

    public function store(Request $request)
    {
        $idCourse = decrypt($request->program);

        $inscription = Inscription::create([
            'user_id' => (Auth::user()->id) ? Auth::user()->id : '',
            'name' => $request['name'],
            'cpf' => $request['cpf'],
            'cep' => $request['cep'],
            'street' => $request['street'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city'],
            'state' => $request['state'],
            'ibge' => $request['ibge'],
            'email_inscription' => $request['email_inscription'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'company_phone' => $request['company_phone']
        ]);

        if ($inscription) {
            $course = Course::findOrFail($idCourse);
            $amount = 1;
            $price = onlyNumbers($course->price)  / 100;
            $subtotal = $amount * $price;
            $inscription->courses()->attach($idCourse, ['course' => $course->name, 'amount' => $amount, 'price' => $price, 'subtotal' => $subtotal]);
        }

        return redirect()->route('profiles.index')->with('success', 'Seus dados foram cadastrados!!');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $roles = Role::get();
        return view('dashboard.profiles.edit', compact('user', 'roles'));
    }

    public function editPerfil($inscriptionId)
    {
        $inscription = Inscription::where('id', $inscriptionId)->firstOrFail();
        $this->authorize('update', $inscription);

        $inscription = Inscription::findOrFail($inscriptionId);
        if (session()->has('item_buy')) {
            return view('dashboard.profiles.edit-and-buy', compact('inscription'));
        } else {
            return view('dashboard.profiles.inscription-edit', compact('inscription'));
        }
    }

    public function updatePerfil(Request $request, $inscriptionId)
    {
        $idCourse = decrypt($request->program);
        $inscriptionUpdate = Inscription::find($inscriptionId);

        $inscription = $inscriptionUpdate->update([
            'user_id' => (Auth::user()->id) ? Auth::user()->id : '',
            'name' => $request['name'],
            'cpf' => $request['cpf'],
            'cep' => $request['cep'],
            'street' => $request['street'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city'],
            'state' => $request['state'],
            'ibge' => $request['ibge'],
            'email_inscription' => $request['email_inscription'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'company_phone' => $request['company_phone'],
            'status' => ($request['status']) ? 1 : 0,
        ]);

        if ($inscription) {
            $course = Course::findOrFail($idCourse);
            $amount = 1;
            $price = onlyNumbers($course->price)  / 100;
            $subtotal = $amount * $price;
            $inscriptionUpdate->courses()->sync($idCourse, ['course' => $course->name, 'amount' => $amount, 'price' => $price, 'subtotal' => $subtotal]);
        }

        return redirect()->route('profiles.inscription.edit', $inscriptionId)->with('success', 'Dados alterado com sucesso!!');
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => ($request['password'] ? 'required|string|min:6|confirmed' : 'nullable')
        ]);

        $input = $request->except('roles');
        $user->fill($input)->save();

        /*if ($request->roles <> '') {
            $user->syncRoles($request->roles);       
        }        
        else {
            $user->roles()->detach();
        }*/
        return redirect()->route('profiles.show', $user->id)->with(
            'success',
            'Seus dados foram alterados com sucesso!.'
        );
    }
}