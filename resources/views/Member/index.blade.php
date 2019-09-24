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
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">วันเกิด</th>
                                        <th colspan= 2>Actions</th>
                                      </tr>
                                    </thead>
                             <tbody>
                                    @foreach($Member as $data)
                                    <tr>
                                        <th>{{$data->id}}</th>
                                        <th>{{$data->first_name}}</th>
                                        <th>{{$data->last_name}}</th>
                                        <th>{{$data->email}}</th>
                                        <th>{{$data->birth}}</th>
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
