<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\RequestModel;
use App\Model\HistoryModel;
use App\Model\HistoryDetailModel;
use App\Model\PhamacyModel;
use App\Http\Requests\ReqRequest;
use App\Http\Requests\DiaRequest;
use Auth;
use Illuminate\Http\Request;
use App\User;
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
            $data = RequestModel::where('type_' , 'พบแพทย์')->with('user')->paginate(15);
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
    public function store(ReqRequest $request)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){

            $user = User::where('identification_number', $request->user_id)->first();
            if($request->_type == "เบิกยา"){
                $data = new RequestModel;
                $data->user_iden = $request->user_id ;
                $data->description = $request->description ;
                $data->congenital_disease = $user->congenital_disease;
                $data->drug_allergies = $user->drug_allergies ;
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
                $data->congenital_disease = $user->congenital_disease;
                $data->drug_allergies = $user->drug_allergies ;
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
    public function update(DiaRequest $request, $id)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){

            $req = RequestModel::findOrfail($id);
            $user = User::where('identification_number', $req->user_iden)->first();
            $data = HistoryModel::firstOrCreate([
                'id_user' => $req->user->id ,
                'id_doc' => Auth::user()->id ,
                'note' => $request->note ,
                'congenital_disease' => $user->congenital_disease,
                'drug_allergies' => $user->drug_allergies,
                'diagnose' => $request->diagnose ,
                'treatment' => $request->treatment ,
                'type_' => 'จ่ายยา'
            ]);
            if(count($request->pha) > 0){
                foreach ($request->pha as $key => $value) {
                    $Phama = PhamacyModel::find($key);
                    $amount = (int)$Phama->stock - $value;
                    if($amount < 0){
                        $request->session()->flash('error', $Phama->generic_name." จำนวนยาน้อยกว่าความต้องการ");
                        return Redirect::back()->withInput();
                    }
                    $Phama->stock = $amount;
                    $Phama->save();
                }
                foreach ($request->pha as $key => $value) {
                    $detailHis =  HistoryDetailModel::firstOrCreate([
                        'pha_id' => $key,
                        'user_id' => Auth::user()->id,
                        'amount' => $value,
                        'his_id' => $data->id
                    ]);
                    // $data->HistoryDetail()->save($detailHis);
                }
            }

            $data->type_ = 'รอจ่าย';
            $data->save();
            $req->delete();
            $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
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
