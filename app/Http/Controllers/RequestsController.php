<?php

namespace App\Http\Controllers;

use App\Model\RequestModel;
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
        return view('Request.index' , ['Request' => $data]);
        // return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new RequestModel();
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
    public function show(RequestModel $requestModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestModel $requestModel)
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
    public function update(Request $request, RequestModel $requestModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestModel $requestModel)
    {
        //
    }
}
