<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::find(Auth::user()->id);
        return view('Profile.index' , [ 'data'=>$data]);
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
    public function edit()
    {
        $data = User::find(Auth::user()->id);
        return view('Profile.edit' , [ 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'birth'=>'required'
        ]);

        $data = User::find(Auth::user()->id);
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
        return redirect(route('Profile.index'));
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
