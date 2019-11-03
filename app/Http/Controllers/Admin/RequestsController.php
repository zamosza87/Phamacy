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
        // dd($request->all());
        foreach ($request->pha as $key => $value) {
            $Phama = PhamacyModel::find($key);
            $amount = (int)$Phama->stock - $value;
            if($amount < 0){
                $request->session()->flash('error', $Phama->trade_name." จำนวนยาน้อยกว่าความต้องการ");
                return Redirect::back()->withInput();
            }
            $Phama->stock = $amount;
            $Phama->save();
        }
            $req = RequestModel::findOrfail($id);
            $data = HistoryModel::firstOrCreate([
                'id_user' => $req->user->id ,
                'id_doc' => Auth::user()->id ,
                'note' => $request->note ,
                'diagnose' => $request->diagnose ,
                'treatment' => $request->treatment ,
            ]);

            foreach ($request->pha as $key => $value) {
                $detailHis =  new HistoryDetailModel;
                $detailHis->pha_id = $key;
                $detailHis->amount = $value;
                $data->HistoryDetail()->save($detailHis);
            }


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
