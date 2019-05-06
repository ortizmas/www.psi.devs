<?php

namespace App\Http\Controllers;

use App\Trainee;
use App\Course;
use App\Period;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Trainees\StoreTraineeRequest;
use App\Http\Requests\Trainees\UpdateTraineeRequest;

class TraineeController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainees = Trainee::paginate();
        return view('dashboard.trainees.index', compact('trainees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::get(['id', 'name']);
        $periods = Period::get(['id', 'year']);
        return view('dashboard.trainees.create', compact('courses', 'periods') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTraineeRequest $request)
    {

        if ( $request->hasFile('image') ) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $updload = request()->image->move(public_path('uploads/trainees'), $imageName);
        } else {
            $imageName = $request['image'];
        }
        
        $trainee = Trainee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'slug' => $request['slug'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'marital_status' => $request['marital_status'],
            'some_charges' => $request['some_charges'],
            'image' => $imageName,
            'description' => $request['description'],
            'content' => $request['content'],
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'author' => $request['author'],
            'order' => $request['order'],
            'have_job' => $request['have_job'],
            'office' => $request['office'],
            'company' => $request['company'],
            'enabled' => $request['enabled'],
            'course_id' => $request['course_id'],
            'period_id' => $request['period_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('trainees.index')->with('success', 'O trainee foi cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainee)
    {
        $courses = Course::get(['id', 'name']);
        $periods = Period::get(['id', 'year']);
        return view('dashboard.trainees.edit', compact('courses', 'periods', 'trainee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTraineeRequest $request, Trainee $trainee)
    {
        //dd( $trainee->image );
        $traineeUpdate = Trainee::find($trainee->id);
        if ( $request->hasFile('image') != false) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $updload = request()->image->move(public_path('uploads/trainees'), $imageName);
        } else {
            $imageName = $trainee->image;
        }

        
        
        $trainee = $traineeUpdate->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'slug' => $request['slug'],
            'age' => $request['age'],
            'gender' => $request['gender'],
            'marital_status' => $request['marital_status'],
            'some_charges' => $request['some_charges'],
            'image' => $imageName,
            'description' => $request['description'],
            'content' => $request['content'],
            'redirect' => $request['redirect'],
            'external_url' => $request['external_url'],
            'author' => $request['author'],
            'order' => $request['order'],
            'have_job' => $request['have_job'],
            'office' => $request['office'],
            'company' => $request['company'],
            'enabled' => $request['enabled'],
            'course_id' => $request['course_id'],
            'period_id' => $request['period_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('trainees.index')->with('success', 'O trainee foi alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        return Trainee::destroy($trainee->id);
    }
}
