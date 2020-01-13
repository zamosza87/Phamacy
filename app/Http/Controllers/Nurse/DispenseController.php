<?php

namespace App\Http\Controllers\Nurse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\HistoryModel;
use App\Model\PhamacyModel;
use App\Model\HistoryDetailModel;
use Auth;

class DispenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = HistoryModel::whereNotIn('type_' , ['สำเร็จ'])->with('user')->get();
            return view('Nurse.Dispense.index' , ['Request' => $data]);
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
        //
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            try{
                $data = HistoryModel::with(['user' , 'Historydetail'])->findOrfail($id);
                return view('Nurse.Dispense.update' , ['data' => $data]);
            } catch (\Exception $th) {
                return redirect(route('Dispense.index'));
            }
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = HistoryModel::findOrfail($id);
            if(count($request->pha) > 0){
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
            $data->type_ = 'สำเร็จ';
            $data->save();
            $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
            return redirect(route('Dispense.index'));
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
