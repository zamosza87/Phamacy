@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

                <div class="row">
                        <div class="col-sm-12">
                            <h2 class="display-3">สมาชิก</h2>
                            <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ชื่อ นามสกุล </th>
                                        {{-- <th scope="col">นามสกุล</th> --}}
                                        <th scope="col">Email</th>
                                        <th scope="col">วันเกิด</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">เวลาที่สมัคร</th>
                                        {{-- <th colspan= 2>Actions</th> --}}
                                      </tr>
                                    </thead>
                             <tbody>
                                    @foreach($Member as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        {{-- <td>{{$data->first_name}}</td> --}}
                                        {{-- <td>{{$data->last_name}}</td> --}}
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->birth}}</td>
                                        <td>{{$data->role->role_name}}</td>
                                        <td>{{ date_format($data->created_at , 'd-M-Y')}}</td>
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
