<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HistoryModel;
use App\User;
use Auth;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
        //     $userDetail = User::find($user);
        //     $data = HistoryModel::where('id_user' , $user)->with('doc');
        //     return view('Admin.History.index' , ['history' => $data->paginate(5) , 'user' => $userDetail]);
        // }
        // return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
        //     $userDetail = User::find($user);
        //     return view('Admin.History.create' , ['user' => $userDetail]);
        // }
        // return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
        //     $data = new HistoryModel();
        //     $data->id_user = $user ;
        //     $data->id_doc = Auth::user()->id ;
        //     $data->note = $request->note ;
        //     $data->diagnose = $request->diagnose ;
        //     $data->treatment = $request->treatment ;
        //     $data->save();
        //     $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
        //     return back();
        // }
        // return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = HistoryModel::with(['HistoryDetail.pha' ,'HistoryDetail.nurse' , 'user' , 'doc'])->find($id);
        // return $data;
        $display = view('Admin.History.info' ,[
            'data' => $data
        ])->render();
        return response()->json(['display' => $display], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
        //     $data = HistoryModel::with('user')->find($id);
        //     return view('Admin.History.edit' , [ 'data'=>$data ]);
        //     // return $data;
        // }
        // return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
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
        // if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
        //     $request->validate([
        //         'note'=>'required',
        //         'diagnose'=>'required',
        //         'treatment'=>'required'
        //     ]);

        //     $data = HistoryModel::find($id);
        //     $data->id_user = $user ;
        //     $data->id_doc = Auth::user()->id ;
        //     $data->note = $request->note ;
        //     $data->diagnose = $request->diagnose ;
        //     $data->treatment = $request->treatment ;
        //     $data->save();
        //     $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
        //     return redirect(route('ht.index' , $user));
        // }
        // return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
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
