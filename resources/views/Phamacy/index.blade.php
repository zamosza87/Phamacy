@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

                <div class="row">
                        <div class="col-sm-12">
                            <h2 class="display-3">คลังยา</h2>
                            <div class="row">
                            {{-- <a href="/Admin/Phamacy/create"></a> --}}
                            <a href="{{ route('Phamacy.create') }}" ><button class="btn btn-outline-info"> Create </button></a>
                            </div>
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>ชื่อไทย</td>
                                  <td>ชื่อสามัญทางยา</td>
                                  <td>ชื่อทางการค้า</td>
                                  <td>ชื่อบริษัท</td>
                                  <td>ชนิดยา</td>
                                  <td>บรรจุภัณฑ์</td>
                                  <td>ปริมาณ</td>
                                  <td>สรรพคุณ</td>
                                  <td>วันที่หมดอายุ</td>
                                  <td>คงคลัง</td>
                                  <td colspan = 2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Phamacy as $data)
                                <tr>
                                    <td>{{$data->pha_id}}</td>
                                    <td>{{$data->thai_name}}</td>
                                    <td>{{$data->generic_name}}</td>
                                    <td>{{$data->trade_name}}</td>
                                    <td>{{$data->company_Name}}</td>
                                    <td>{{$data->drug_type}}</td>
                                    <td>{{$data->package}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->properties}}</td>
                                    <td>{{$data->expiry_date}}</td>
                                    <td>{{$data->stock}}</td>

                                    <td>
                                        <a href="{{ route('Phamacy.edit',$data->pha_id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Phamacy.destroy', $data->pha_id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        <div>
                        </div>
        </div>
    </div>
</div>
@endsection
