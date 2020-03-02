<?php

namespace App\Http\Controllers;

use App\Course;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{

    public function index()
    {
        $inscriptions = Inscription::where('status', '!=', 2)->paginate()->load('courses');
        return view('dashboard.inscriptions.index', compact('inscriptions'));
    }

    public function getInscriptionPaid()
    {
        $inscriptions = Inscription::where('status', 2)->paginate()->load('courses');
        return view('dashboard.inscriptions.paid', compact('inscriptions'));
    }

    public function create()
    {
        
        return view('dashboard.inscriptions.create');
    }

    public function store(Request $request)
    {
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
            'email' => $request['email'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'company_phone' => $request['company_phone'],
            'program' => $request['program']
        ]);

        return redirect()->route('inscriptions.index')->with('success', 'Inscrito cadastrado com sucesso!!');
    }

    public function show(Inscription $inscription)
    {
        //
    }

    public function edit(Inscription $inscription)
    {
        $courses = Course::all();

        return view('dashboard.inscriptions.edit', compact('inscription', 'courses'));
    }

    public function update(Request $request, Inscription $inscription)
    {
        $inscriptionUpdate = Inscription::find($inscription->id);

        $inscription = $inscriptionUpdate->update([
            //'user_id' => (Auth::user()->id) ? Auth::user()->id : '',
            'name' => $request['name'],
            'cpf' => $request['cpf'],
            'cep' => $request['cep'],
            'street' => $request['street'],
            'neighborhood' => $request['neighborhood'],
            'city' => $request['city'],
            'state' => $request['state'],
            //'ibge' => $request['ibge'],
            'email' => $request['email_inscription'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'company_phone' => $request['company_phone'],
            'status' => $request['status']
        ]);

        return redirect()->route('inscriptions.index')->with('success', 'Inscrição alterado com sucesso!!');
    }

    public function destroy(Inscription $inscription)
    {
        return Inscription::destroy($inscription->id);
    }
}
