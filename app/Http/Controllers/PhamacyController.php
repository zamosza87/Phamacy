<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PhamacyModel;

class PhamacyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhamacyModel::paginate(5);
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
        $data->thai_name = $request->thai_name ;
        $data->generic_name = $request->generic_name ;
        $data->trade_name = $request->trade_name ;
        $data->company_Name = $request->company_Name ;
        $data->drug_type = $request->drug_type ;
        $data->package = $request->package ;
        $data->amount = $request->amount ;
        $data->properties = $request->properties ;
        $data->expiry_date = $request->expiry_date ;
        $data->stock = $request->stock ;
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
            'thai_name'=>'required',
            'generic_name'=>'required',
            'trade_name'=>'required',
            'company_Name'=>'required',
            'drug_type'=>'required',
            'package'=>'required',
            'amount'=>'required',
            'properties'=>'required',
            'expiry_date'=>'required',
            'stock'=>'required'
        ]);

        $data = PhamacyModel::find($id);
        $data->thai_name = $request->thai_name ;
        $data->generic_name = $request->generic_name ;
        $data->trade_name = $request->trade_name ;
        $data->company_Name = $request->company_Name ;
        $data->drug_type = $request->drug_type ;
        $data->package = $request->package ;
        $data->amount = $request->amount ;
        $data->properties = $request->properties ;
        $data->expiry_date = $request->expiry_date ;
        $data->stock = $request->stock ;
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
