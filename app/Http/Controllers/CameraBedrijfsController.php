<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CamBedrijf;
use DB;

class CameraBedrijfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedrijven = CamBedrijf::orderBy('bedrijf')->get();

        return view('cameratoezicht.index')->with('bedrijven', $bedrijven);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cameratoezicht.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bedrijf                = new CamBedrijf;
        $bedrijf->bedrijf       = $request->input('bedrijf');
        $bedrijf->info          = $request->input('info');
        $bedrijf->opmerkingen   = $request->input('opmerkingen');

        $bedrijf->Save();

        $bedrijven = CamBedrijf::orderBy('bedrijf')->get();

        return view('cameratoezicht.index')->with('bedrijven', $bedrijven);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bedrijf = CamBedrijf::find($id);
        return view('cameratoezicht.cameras')->with('bedrijf', $bedrijf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bedrijf = CamBedrijf::find($id);
        return view('cameratoezicht.edit')->with('bedrijf', $bedrijf);
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
        $bedrijf                = CamBedrijf::find($id);
        $bedrijf->bedrijf       = $request->input('bedrijf');
        $bedrijf->info          = $request->input('info');
        $bedrijf->opmerkingen   = $request->input('opmerkingen');

        $bedrijf->Save();

        return redirect('cameratoezicht/'.$bedrijf->id)->with('bedrijf', $bedrijf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bedrijf = CamBedrijf::find($id);
        
        $bedrijf->delete();
        
        return redirect('cameratoezicht');
    }
}
