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
        $user = User::findOrFail($id)->load('inscriptions');
        $this->authorize('update', $user);

        if (collect($user->inscriptions)->isEmpty()) {
            return redirect()->route('profiles.create')
                    ->with('warning', 'Ainda não completou seu cadastro!!');
        }

        return view('dashboard.profiles.show', ['user' => $user]);
        
    }

    public function create(Request $request)
    {

        $user = Auth::user();
        $inscription = Inscription::where('user_id', $user->id)->first();

        if ($inscription) {
            //return redirect()->route('profiles.inscription.edit', $inscription->id);
            return $this->editPerfil($inscription->id);
        }

        $programs = Course::all();

        return view('dashboard.profiles.create', compact('user', 'programs'));
    }

    public function store(Request $request)
    {
        if ($request->has('program_session')) {
            $idCourse = decrypt($request->program_session);
        } else {
            $idCourse = $request->program;
        }
        
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

        $inscription = Inscription::findOrFail($inscriptionId)->load('courses');

        $programs = Course::all();

        if ($inscription->status == 0 || $inscription->status == 1) {
            return view('dashboard.profiles.edit-and-buy', compact('inscription', 'programs'));
        } else {
            return view('dashboard.profiles.inscription-edit', compact('inscription', 'programs'));
        }
    }

    public function updatePerfil(Request $request, $inscriptionId)
    {

        if ($request->has('program_session')) {
            $idCourse = decrypt($request->program_session);
        } else {
            $idCourse = $request->program;
        }

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

        /*if ($inscription) {
            $course = Course::findOrFail($idCourse);
            $amount = 1;
            $price = onlyNumbers($course->price)  / 100;
            $subtotal = $amount * $price;
            $inscriptionUpdate->courses()->sync($idCourse, ['course' => $course->name, 'amount' => $amount, 'price' => $price, 'subtotal' => $subtotal]);
        }*/

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