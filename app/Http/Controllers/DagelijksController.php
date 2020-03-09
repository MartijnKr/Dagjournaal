<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dagelijk;

class DagelijksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dag.dagelijks');
    }

    public function tabs()
    {
        $dagelijkseBezigheden = Dagelijk::orderBy('tijd', 'asc')->get();

        return view('dag.dagelijksIndex')->with('dagelijkseBezigheden', $dagelijkseBezigheden);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dag.nieuwdagelijks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dagelijks          = new Dagelijk;

        $dagelijks->Mon     = $request->has('Mon');
        $dagelijks->Tue     = $request->has('Tue');
        $dagelijks->Wed     = $request->has('Wed');
        $dagelijks->Thu     = $request->has('Thu');
        $dagelijks->Fri     = $request->has('Fri');
        $dagelijks->Sat     = $request->has('Sat');
        $dagelijks->Sun     = $request->has('Sun');
        $dagelijks->tijd    = $request->input('tijd');
        $dagelijks->title   = $request->input('title');
        $dagelijks->msg     = $request->input('boodschap');

        $dagelijks->Save();

        return view('dag.dagelijks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bezig = Dagelijk::find($id);
        return view('dag.dagelijksEdit')->with('bezig', $bezig);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bezig          = Dagelijk::find($id);
        $bezig->Mon     = $request->has('Mon');
        $bezig->Tue     = $request->has('Tue');
        $bezig->Wed     = $request->has('Wed');
        $bezig->Thu     = $request->has('Thu');
        $bezig->Fri     = $request->has('Fri');
        $bezig->Sat     = $request->has('Sat');
        $bezig->Sun     = $request->has('Sun');
        $bezig->tijd    = $request->input('tijd');
        $bezig->title   = $request->input('title');
        $bezig->msg     = $request->input('boodschap');

        $bezig->Save();

        return redirect('dagelijks/tabs')->with('success', 'Dagelijkse bezigheid aangepast.');
    }

    public function updateFromEdit(Request $request, $id)
    {
        $bezig          = Dagelijk::find($id);
        $bezig->done    = $request->input('done');

        $bezig->Save();

        return redirect('archief/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Dagelijk::find($id);

        $post->delete();
        
        return redirect('dagelijks/tabs')->with('error', 'Dagelijkse bezigheid verwijderd.');
    }
}
