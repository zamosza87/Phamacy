<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = user::orderBy('id');
        if($search = $request->get('search')){
            $data->where('id' , 'LIKE', '%'.$search.'%')->orWhere('first_name' , 'LIKE', '%'.$search.'%');
        }
        return view('Admin.Member.index' , ['Member' => $data->paginate(10)]);
        // return $data;
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
        $data = User::find($id);
        return view('Admin.Member.edit' , [ 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'birth'=>'required'
        ]);

        $data = User::find($id);
        $data->first_name = $request->first_name ;
        $data->last_name = $request->last_name ;
        $data->telephone_number = $request->telephone_number ;
        $data->parent_phone_number = $request->parent_phone_number ;
        $data->birth = $request->birth ;
        $data->identification_number = $request->identification_number ;
        $data->congenital_disease = $request->congenital_disease ;
        $data->drug_allergies = $request->drug_allergies ;
        $data->save();
        $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
        return redirect(route('Member.index'));
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
