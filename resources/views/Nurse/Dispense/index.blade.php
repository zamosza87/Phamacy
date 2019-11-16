@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
          <h2 class="display-3">จ่ายยา</h2>
      </div>
      {{-- <div class="row">
        <a href="/Admin/Request/create"></a>
        <a href="{{ route('Request.create') }}" ><button class="btn btn-outline-info"> Create </button></a>
      </div> --}}
        <div class="row">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">สถานะ</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">คำอธิบาย</th>
                <th scope="col">คำแนะนำ</th>
                <th scope="col">วันที่และเวลา</th>
                <th colspan= 2>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($Request as $index => $data)
                <tr>
                  <td>{{$data->id }}</td>
                  <td>{{$data->type_}}</td>
                  <td>{{$data->user->name}}</td>
                  <td>{{$data->note}}</td>
                  <td>{{$data->treatment}}</td>
                  <td>{{ date_format($data->created_at , 'd-M-Y ,H:i:s')}}</td>

                  <td>
                  <a href="{{route('Dispense.edit' , $data->id)}}" >
                      <button class="btn btn-outline-dark">
                          <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                    </a>
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
