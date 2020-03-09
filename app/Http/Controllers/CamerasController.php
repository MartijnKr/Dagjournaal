<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camera;
use DB;

class CamerasController extends Controller
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
        $cam            = new Camera;

        $cam->nr        = $request->input('nr');
        $cam->straat    = $request->input('straat');
        $cam->plaats    = $request->input('plaats');
        $cam->bedrijf   = $request->input('bedrijf');

        $cam->Save();

        return back()->withInput();
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
        $camera = Camera::find($id);

        return view('cameratoezicht.editCamera')->with('camera', $camera);
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
        $cam            = Camera::find($id);
        $cam->nr        = $request->input('nr');
        $cam->straat    = $request->input('straat');
        $cam->plaats    = $request->input('plaats');
        $cam->bedrijf   = $request->input('bedrijf');
        $cam->Save();

        $bedrijf = DB::table('cam_bedrijfs')->where('bedrijf', $cam->bedrijf)->get();

        return redirect('cameratoezicht/'.$bedrijf->first()->id)->with('bedrijf', $bedrijf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camera = Camera::find($id);
        
        $camera->delete();
        
        //bedrijf id
        $bedrijf = DB::table('cam_bedrijfs')->where('bedrijf', $camera->bedrijf)->get();

        return redirect('cameratoezicht/'.$bedrijf->first()->id)->with(['bedrijf' => $bedrijf, 'error' => 'Camera vewijderd.']);
    }
}
