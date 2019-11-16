<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RequestModel;
use App\Model\HistoryModel;
use App\Model\HistoryDetailModel;
use App\Model\PhamacyModel;
use Auth;
use Illuminate\Http\Request;
use Redirect;


class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = RequestModel::where('type_' , 'พบแพทย์')->with('user')->get();
        // $data = RequestModel::first();
        return view('Admin.Request.index' , ['Request' => $data]);
        // return response()->json($data, 200);
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            return view('Admin.Request.create');
            }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            if($request->_type == "เบิกยา"){
                $data = new RequestModel;
                $data->user_iden = $request->user_id ;
                $data->description = $request->description ;
                $data->type_ = 'เบิกยา' ;
                $data->save();

                HistoryModel::create([
                    'id_user' => $data->user->id ,
                    'id_doc' => Auth::user()->id ,
                    'note' => $data->description ,
                    'type_' => 'เบิกยา'
                ]);

                $data->delete();
            } else {
                $data = new RequestModel;
                $data->user_iden = $request->user_id ;
                $data->description = $request->description ;
                $data->type_ = 'พบแพทย์' ;
                $data->save();
            }

            $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
            return back();
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RequestModel  $requestModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            try{
                $data = RequestModel::with('user')->findOrfail($id);
                return view('Admin.Request.dia' , ['data' => $data]);
            } catch (\Exception $th) {
                return redirect(route('Request.index'));
            }
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){

            $req = RequestModel::findOrfail($id);
            $data = HistoryModel::firstOrCreate([
                'id_user' => $req->user->id ,
                'id_doc' => Auth::user()->id ,
                'note' => $request->note ,
                'diagnose' => $request->diagnose ,
                'treatment' => $request->treatment ,
                'type_' => 'จ่ายยา'
            ]);
            $req->delete();
            // $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
            return redirect(route('Request.index'));
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');


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
