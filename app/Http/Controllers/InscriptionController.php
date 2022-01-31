<?php

namespace App\Http\Controllers;

use App\Course;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{

    public function index(Request $request)
    {

        $inscriptions = Inscription::with('courses')
            ->where(function ($query) use ($request) {
                if ($request->has('search')) {
                    $query->where('name', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('cpf', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('email_inscription', 'LIKE', '%'.$request->search.'%');
                }
            })
            ->where('status', '!=', 2)
            ->orderBy('id', 'desc')
            ->paginate(40);

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
        return view('dashboard.inscriptions.show', compact('inscription'));
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

    public function inscriptionCourseUpdate(Request $request, Inscription $inscription)
    {
        $data = $request->except(['_token', '_method']);
        $inscription->updatePivoteTable($data);
        return back()->with('success', "Status alterado com sucesso");
    }

    public function destroy(Inscription $inscription)
    {
        return Inscription::destroy($inscription->id);
    }
}
