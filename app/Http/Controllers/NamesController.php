<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use App\Bijzonder;
use DB;


class NamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$namen = Name::all();
        $namen = Name::orderBy('created_at', 'desc')->paginate(14);
        return view('dag.archief')->with('namen', $namen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        date_default_timezone_set('Europe/Amsterdam');
        //Haalt datum op van laaste entry en kijk of er nieuwe gemaakt moet worden of als er al 1 is voor vandaag.
        $datum          = DB::table('names')->orderBy('created_at', 'desc')->pluck('created_at')->first();
        $datumFormat    = Date('d-m-Y', strtotime($datum));
        $id             = DB::table('names')->orderBy('created_at', 'desc')->pluck('id')->first();
        $nu             = Date('d-m-Y');

        if($datumFormat != $nu){
            return view('dag.create');
        }else{
            return redirect('archief/'.$id.'/edit');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $namen          = new Name;
            $namen->nacht   = $request->Input('nachtdienst');
            $namen->ochtend = $request->Input('ochtenddienst');
            $namen->middag  = $request->Input('middagdienst');
            $namen->Save();
            
            $id = DB::table('names')->orderBy('created_at', 'desc')->pluck('id')->first();

            return redirect('archief/'.$id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datum          = DB::table('bijzonders')->orderBy('created_at', 'desc')->pluck('created_at')->first();
        $datumFormat    = Date('Y-m-d', strtotime($datum));

        $bijzonder      = DB::table('bijzonders')->where('created_at', $datumFormat)->get();
        
        $naam           = Name::find($id);

        return view('dag.show')->with(['naam' => $naam, 'bijzonder' => $bijzonder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $naam = Name::find($id);

        return view('dag.edit')->with('naam', $naam);
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
        $namen          = Name::find($id);
        $namen->nacht   = $request->Input('nachtdienst');
        $namen->ochtend = $request->Input('ochtenddienst');
        $namen->middag  = $request->Input('middagdienst');
        $namen->tien    = $request->input('tien');
        $namen->twee    = $request->input('twee');

        $namen->touch();
        $namen->Save();
        
        return redirect('archief/'.$id.'/edit')->with('success', 'Opgeslagen.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
