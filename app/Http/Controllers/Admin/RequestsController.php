<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RequestModel;
use App\Model\HistoryModel;
use Auth;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RequestModel::where('status' , '0')->with('user')->get();
        // $data = RequestModel::first();
        return view('Admin.Request.index' , ['Request' => $data]);
        // return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new RequestModel;
        $data->user_iden = $request->user_id ;
        $data->description = $request->description ;
        $data->save();
        $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = RequestModel::with('user')->findOrfail($id);
            return view('Admin.Request.dia' , ['data' => $data]);
        } catch (\Exception $th) {
            return redirect(route('Request.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $req = RequestModel::findOrfail($id);
            $data = new HistoryModel;
            $data->id_user = $req->user->id;
            $data->id_doc = Auth::user()->id ;
            $data->note = $request->note ;
            $data->diagnose = $request->diagnose ;
            $data->treatment = $request->treatment ;
            $data->save();
            $req->delete();
            $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
            return redirect(route('ht.index' , $req->user->id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
