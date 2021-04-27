<?php

namespace App\Http\Controllers;

use App\Models\Queans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class QueansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Queans::where('user_id',Auth::id())->get();
        return view('queans')->with('queans',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'answer1' => 'required',
            'answer2' => 'required',
        ]);

        $queans = new Queans;
        $queans->user_id = Auth::id();
        $queans->question1 = $request->question1;
        $queans->answer1 = $request->answer1;
        $queans->question2 = $request->question2;
        $queans->answer2 = $request->answer2;
        $queans->save(); // it will INSERT a new record

        return redirect()->back()->withSuccess('Question Answer added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queans  $queans
     * @return \Illuminate\Http\Response
     */
    public function show(Queans $queans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queans  $queans
     * @return \Illuminate\Http\Response
     */
    public function edit(Queans $queans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queans  $queans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queans $queans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queans  $queans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queans $queans)
    {
        //
    }
}
