<?php
namespace App\Http\Controllers\Frontend;

use App\Course;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreRegisterController extends Controller
{

    public function create($url = null)
    {
        $course = Course::ofUrl($url)->status()->firstOrFail();

        $slug = encrypt($course->id);

        //Session para usar depois de fazer login
        session(['item_buy' => $slug]);

        if (Auth::check()) {
            $inscription = Inscription::where('user_id', Auth::id())->firstOrFail('id');
            $data['user_id'] = Auth::id();
            $data['url'] = $url;
            $data['course_id'] = $course->id;

            if ($course->checkCourse($data)) {
                session()->flash('success', 'O curso já existe na sua lista');
                return redirect()->route('my.courses');
            } else {
                if ($inscription) {
                    return $this->createCourseInscription($course, $inscription);
                }
            }
        }

        session(['url' => $url]);
        return view('frontend.prematriculas.create', compact('slug'));
    }

    public function createCourseInscription($course, $inscription)
    {
        $amount = 1;
        $price = onlyNumbers($course->price)  / 100;
        $subtotal = $amount * $price;
        // 1:Aprovada, 2:Cancelada, 3:Em análise, 4:Aguardando pagto., 5:Paga
        $inscription->courses()->attach($course->id, [
            'course' => $course->url,
            'amount' => $amount,
            'price' => $price,
            'subtotal' => $subtotal,
            'status' => 4
        ]);

        return redirect()->route('profiles.course.details', $course->url);
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

        return redirect()->route('profiles.create');
    }
}
