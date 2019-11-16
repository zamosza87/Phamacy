<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PhamacyModel;
use DB;
use Auth;

class PhamacyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = PhamacyModel::orderBy('pha_id');
            if($search = $request->get('search')){
                $data->where('pha_id' , 'LIKE', '%'.$search.'%')->orWhere('thai_name' , 'LIKE', '%'.$search.'%');
            }
            return view('Admin.Phamacy.index' , ['Phamacy' => $data->paginate(10)]);
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
            return view('Admin.Phamacy.create');
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    public function search(Request $request)
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = new PhamacyModel();
            $data->thai_name = $request->thai_name ;
            $data->generic_name = $request->generic_name ;
            $data->trade_name = $request->trade_name ;
            $data->company_Name = $request->company_Name ;
            $data->drug_type = $request->drug_type ;
            $data->package = $request->package ;
            $data->amount = $request->amount ;
            $data->properties = $request->properties ;
            $data->expiry_date = $request->expiry_date ;
            $data->stock = $request->stock ;
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
        $data = PhamacyModel::find($id);
        $display = view('Admin.Phamacy.info' ,[
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            $data = PhamacyModel::find($id);
            return view('Admin.Phamacy.edit' , ['Phamacy' => $data]);
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
            $request->validate([
                'thai_name'=>'required',
                'generic_name'=>'required',
                'trade_name'=>'required',
                'company_Name'=>'required',
                'drug_type'=>'required',
                'package'=>'required',
                'amount'=>'required',
                'timeuse'=>'required',
                'properties'=>'required',
                'expiry_date'=>'required',
                'stock'=>'required'
            ]);

            $data = PhamacyModel::find($id);
            $data->thai_name = $request->thai_name ;
            $data->generic_name = $request->generic_name ;
            $data->trade_name = $request->trade_name ;
            $data->company_Name = $request->company_Name ;
            $data->drug_type = $request->drug_type ;
            $data->package = $request->package ;
            $data->amount = $request->amount ;
            $data->timeuse = $request->timeuse ;
            $data->properties = $request->properties ;
            $data->expiry_date = $request->expiry_date ;
            $data->stock = $request->stock ;
            $data->save();
            $request->session()->flash('success', "เปลี่ยนข้อมูลเรียบร้อย");
            return back();
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
        if(Auth::user()->is_admin() || Auth::user()->is_doc() || Auth::user()->is_nurse() ){
            PhamacyModel::destroy($id);
            return back();
        }
        return redirect('home')->with('warning' , 'จำกัดสิทธิ์การเข้าถึง');
    }

    public function ajaxSearch(Request $request){
        $data = PhamacyModel::orderBy('pha_id');
        if($search = $request->search){
            $data->where('pha_id' , 'LIKE', '%'.$search.'%')->orWhere('thai_name' , 'LIKE', '%'.$search.'%');
        }

        $display = view('Admin.Request.searchPha' ,[
            'data' => $data->get()
        ])->render();
        return response()->json(['display' => $display], 200);
    }

    public function InsertPhaRequest(Request $request){
        $data = PhamacyModel::find($request->pha_id);

        $display = view('Admin.Request.addPha' ,[
            'data' => $data
        ])->render();

        return response()->json(['display' => $display], 200);
    }
}
