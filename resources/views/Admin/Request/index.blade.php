@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        <label>{{ Session::get('success') }}</label>
        </div>
        @endif
      <div class="row">
          <h2 class="display-3">วินิจฉัย</h2>
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
                <th scope="col">การบริการ</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">โรคประจำตัว</th>
                <th scope="col">แพ้ยา</th>
                <th scope="col">คำอธิบาย</th>
                <th scope="col">วันที่และเวลา</th>
                <th scope="col">วินิจฉัย</th>
                {{-- <th colspan= 2>Actions</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($Request as $index => $data)
                <tr>
                  <td>{{$data->id }}</td>
                  <td>{{$data->type_}}</td>
                  <td>{{$data->user['name']}}</td>
                  <td>{{$data->congenital_disease}}</td>
                  <td>{{$data->drug_allergies}}</td>
                  <td>{{$data->description}}</td>
                  <td>{{ date_format($data->created_at , 'd-M-Y ,H:i:s')}}</td>
                  <td>
                    <a href="{{ route('Request.show' , $data->id)}}" >
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
