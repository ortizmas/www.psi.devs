<?php

namespace App\Http\Controllers;

use App\Career;
use App\Trainee;
use App\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home()
    {
        $user =Auth::user();
        $role = $user->roles[0]->name;
        
        switch ($role) {
            case 'super-admin':
                    return $this->superAdmin();
                break;

            case 'teacher':
                    return $this->teacher();
                break;

            case 'student':
                    //Item selecionado por o cliente que deseja comprar 
                    $item_carrinho = session()->get('item_buy');
                    
                    if ($item_carrinho != null) {
                        return redirect()->route('profiles.create');
                    } else {
                        return $this->student($item_carrinho);
                    }                    
                break;
            
            default:
                    return $this->default();
                break;
        }

        
    }

    public function superAdmin()
    {
        $careers = Career::get()->where('status', 1);
        $trainees = Trainee::get()->where('have_job', 0)->where('enabled', 1);
        $young_employees = Trainee::get()->where('have_job', 1)->where('enabled', 1);
        $allJT = Trainee::get()->where('enabled', 1);

        return view('dashboard.v2', compact('careers', 'trainees', 'young_employees', 'allJT'));
    }

    public function teacher()
    {
        $careers = Career::get()->where('status', 1);
        $trainees = Trainee::get()->where('have_job', 0)->where('enabled', 1);
        $young_employees = Trainee::get()->where('have_job', 1)->where('enabled', 1);
        $allJT = Trainee::get()->where('enabled', 1);

        return view('dashboard.v2', compact('careers', 'trainees', 'young_employees', 'allJT'));
    }

    public function student($item_carrinho)
    {
        return view('dashboard.student');
        
    }

    public function default()
    {
        $careers = Career::get()->where('status', 1);
        $trainees = Trainee::get()->where('have_job', 0)->where('enabled', 1);
        $young_employees = Trainee::get()->where('have_job', 1)->where('enabled', 1);
        $allJT = Trainee::get()->where('enabled', 1);

        return view('dashboard.v2', compact('careers', 'trainees', 'young_employees', 'allJT'));
    }

    public function versiontwo()
    {
        return view('dashboard.v1');
    }
    
    public function versionthree()
    {
        return view('dashboard.v3');
    }
}
