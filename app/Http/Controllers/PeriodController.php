<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;
use App\Http\Requests\Periods\StorePeriodRequest;
use App\Http\Requests\Periods\UpdatePeriodRequest;

class PeriodController extends Controller
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
        $periods = Period::get();
        return view('dashboard.periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        $period = Period::create([
            'year' => $request['year'],
            'enabled' => $request['enabled']
        ]);

        return redirect()->route('periods.index')->with('success', 'Periodo cadastrado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('dashboard.periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        $periodUpdate = Period::find($period->id);

        $period = $periodUpdate->update([
            'year' => $request['year'],
            'enabled' => $request['enabled']
        ]);

        return redirect()->route('periods.index')->with('success', 'Periodo alterado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        return Period::destroy($period->id);
    }
}
