<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Inscription;
use App\CourseInscription;
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
        $users = User::all();
        return view('dashboard.inscriptions.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $verifyInscription = Inscription::where('user_id', $request->user_id)->first();

        if ($verifyInscription ) {
            return redirect()->route('inscriptions.create')
                ->with('error', 'O usuario já posui uma inscrição, vai na lista de inscritos para assignar aulas!!');
        }

        $inscription = Inscription::create([
            'user_id' => $request['user_id'],
            'name' => $request['name'] ? $request['name'] : $user->name,
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
            'program' => $request['program']
        ]);

        return redirect()->route('inscriptions.index')->with('success', 'Inscrição cadastrado com sucesso!!');
    }

    public function show(Inscription $inscription)
    {
        
        $inscriptions = Inscription::all();
        $courses = Course::all();
        
        return view('dashboard.inscriptions.show', compact('inscription', 'inscriptions', 'courses'));
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

    public function assignEnrollmentCourse(Request $request)
    {
        $course = Course::find($request->course_id);

        CourseInscription::create([
            'course_id' => $course->id,
            'inscription_id' => $request->inscription_id,
            'course' =>$course->name,
            'amount' => 1,
            'price' => $course->price,
            'subtotal' => $course->price,
            'status' => 4,
            'code' => '123ABC'
        ]);

        return redirect()->route('inscriptions.show', $request->inscription_id)
            ->with('message', "O curso foi assignado com sucesso!! ");
    }

    public function destroy(Inscription $inscription)
    {
        return Inscription::destroy($inscription->id);
    }
}
