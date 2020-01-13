<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MemRequest;
use App\User;
use Auth;

use App\Model\HistoryModel;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = user::orderBy('id');
            if($search = $request->get('search')){
                $data->where('id' , 'LIKE', '%'.$search.'%')->orWhere('first_name' , 'LIKE', '%'.$search.'%');
            }
            return view('Admin.Member.index' , ['Member' => $data->paginate(30)]);
            // return $data;
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
            return view('Admin.Member.create');
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemRequest $request)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = new User();
            $data->first_name = $request->first_name ;
            $data->last_name = $request->last_name ;
            $data->telephone_number = $request->telephone_number ;
            $data->parent_phone_number = $request->parent_phone_number ;
            $data->faculty = $request->faculty ;
            $data->birth = $request->birth ;
            $data->identification_number = $request->identification_number ;
            $data->congenital_disease = $request->congenital_disease ;
            $data->drug_allergies = $request->drug_allergies ;
            $data->save();
            $request->session()->flash('success', "เพิ่มข้อมูลเรียบร้อย");
            return back();
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $userDetail = User::find($id);
            $data = HistoryModel::where('id_user' , $id)->with('doc');
            // return $data[0];
            return view('Admin.History.index' , ['history' => $data->paginate(15) , 'user' => $userDetail]);
            // return ['history' => $data->paginate(5) , 'user' => $user];
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
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
            $data = User::find($id);
            return view('Admin.Member.edit' , [ 'data'=>$data]);
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
    public function update(MemRequest $request , $id)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){

            $data = User::find($id);
            $data->first_name = $request->first_name ;
            $data->last_name = $request->last_name ;
            $data->telephone_number = $request->telephone_number ;
            $data->parent_phone_number = $request->parent_phone_number ;
            $data->faculty = $request->faculty ;
            $data->birth = $request->birth ;
            $data->identification_number = $request->identification_number ;
            $data->congenital_disease = $request->congenital_disease ;
            $data->drug_allergies = $request->drug_allergies ;
            $data->save();
            $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
            return redirect(route('Member.index'));
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
