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
    public function index($user)
    {
        $userDetail = User::find($user);
        $data = HistoryModel::where('id_user' , $user)->with('doc');
        // return $data[0];
        return view('Admin.History.index' , ['history' => $data->paginate(5) , 'user' => $userDetail]);
        // return ['history' => $data->paginate(5) , 'user' => $user];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        $userDetail = User::find($user);
        return view('Admin.History.create' , ['user' => $userDetail]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $user)
    {
        $data = new HistoryModel();
        $data->id_user = $user ;
        $data->id_doc = Auth::user()->id ;
        $data->note = $request->note ;
        $data->diagnose = $request->diagnose ;
        $data->treatment = $request->treatment ;
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
    public function show($user , $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user , $id)
    {
        $data = HistoryModel::with('users')->find($id);
        return view('Admin.History.edit' , [ 'data'=>$data ]);
        // return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user, $id)
    {
        $request->validate([
            'note'=>'required',
            'diagnose'=>'required',
            'treatment'=>'required'
        ]);

        $data = HistoryModel::find($id);
        $data->id_user = $user ;
        $data->id_doc = Auth::user()->id ;
        $data->note = $request->note ;
        $data->diagnose = $request->diagnose ;
        $data->treatment = $request->treatment ;
        $data->save();
        $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
        return redirect(route('ht.index' , $user));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user , $id)
    {
        //
    }
}
