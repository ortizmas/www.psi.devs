<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('dashboard.profiles.show', ['user' => User::findOrFail($id)]);
    }

    public function edit($id) {

        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $roles = Role::get(); 
        return view('dashboard.profiles.edit', compact('user', 'roles')); 
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

        /*if ($request->roles <> '') {
            $user->syncRoles($request->roles);       
        }        
        else {
            $user->roles()->detach();
        }*/
        return redirect()->route('profiles.show', $user->id)->with('success',
             'Seus dados foram alterados com sucesso!.');
    }
}
