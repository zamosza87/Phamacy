<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PhamacyModel;

class PhamacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhamacyModel::all();
        return view('Phamacy.index' , ['Phamacy' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Phamacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PhamacyModel();
        $data->pha_name = $request->Phamacy_Name ;
        $data->analgesic = $request->Analgesic ;
        $data->stock = $request->Stock ;
        $data->save();
        $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
        return back();
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
        $data = PhamacyModel::find($id);
        return view('Phamacy.edit' , ['Phamacy' => $data]);
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
        $request->validate([
            'Phamacy_Name'=>'required',
            'Analgesic'=>'required',
            'Stock'=>'required'
        ]);

        $data = PhamacyModel::find($id);
        $data->pha_name = $request->Phamacy_Name ;
        $data->analgesic = $request->Analgesic ;
        $data->stock = $request->Stock ;
        $data->save();
        $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhamacyModel::destroy($id);
        return back();
    }
}
