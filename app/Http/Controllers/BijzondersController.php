<?php

namespace App\Http\Controllers;
use App\Bijzonder;
use DB;

use Illuminate\Http\Request;

class BijzondersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $bijzonder                  = new Bijzonder;
        $bijzonder->tijd            = DB::raw('now()');
        $bijzonder->bijzonderheden  = $request->Input('bijzonderheden');

        $bijzonder->Save();
        

        //redirect naar juiste DAG jounaal
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
        $bijzonderheid = Bijzonder::find($id);
        return view('dag.bijzonderEdit')->with('bijzonderheid', $bijzonderheid);
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
        $update                 = Bijzonder::find($id);
        $update->tijd           = $request->Input('tijd');
        $update->bijzonderheden = $request->Input('bijzonderheden');

        $update->Save();
        
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
        $post = Bijzonder::find($id);

        $post->delete();
        
        return redirect('archief/create');
    }
}
