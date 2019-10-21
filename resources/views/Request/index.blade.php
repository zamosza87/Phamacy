@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

                <div class="row">
                        <div class="col-sm-12">
                            <h2 class="display-3">สอบถามอาการเบื้องต้น</h2>
                            <div class="row">
                                {{-- <a href="/Admin/Request/create"></a> --}}
                                <a href="{{ route('Request.create') }}" ><button class="btn btn-outline-info"> Create </button></a>
                                </div>
                            <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">คำอธิบาย</th>
                                        <th scope="col">วันที่และเวลา</th>
                                        {{-- <th colspan= 2>Actions</th> --}}
                                      </tr>
                                    </thead>
                             <tbody>
                                    @foreach($Request as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{ date_format($data->created_at , 'd-M-Y ,H:i:s')}}</td>
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
