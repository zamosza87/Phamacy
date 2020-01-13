@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                    <label>{{ Session::get('success') }}</label>
                    </div>
                    @endif
                <h2 class="display-3">สมาชิก</h2>
                <div class="row" style="margin-bottom: 20px;">
                        {{-- <a href="/Admin/Phamacy/create"></a> --}}
                        {{-- <div class="col-auto mr-auto">
                            <a href="{{ route('Member.create') }}">
                                <button class="btn btn-outline-info">
                                    Create
                                </button>
                            </a>
                        </div> --}}
                    <div class="col-auto">
                        <form class="form-inline my-2 my-lg-0" action="{{ URL::current() }}">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" value="{{ Request::get('search')}}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ชื่อ นามสกุล </th>
                                <th scope="col">คณะ/สังกัด</th>
                                <th scope="col">โรคประจำตัว</th>
                                <th scope="col">แพ้ยา</th>
                                {{-- <th scope="col">Email</th> --}}
                                <th scope="col">วันเกิด</th>
                                <th scope="col">Role</th>
                                <th scope="col">เวลาที่สมัคร</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Member as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->faculty}}</td>
                                <td>{{$data->congenital_disease }}</td>
                                <td>{{$data->drug_allergies}}</td>
                                {{-- <td>{{$data->email}}</td> --}}
                                <td>{{$data->birth}}</td>
                                <td>{{$data->role->role_name}}</td>
                                <td>{{ date_format($data->created_at , 'd-M-Y')}}</td>
                                <td>
                                    <a href="{{ route('Member.show' ,$data->id) }}" class="btn btn-primary">
                                        ประวัติ
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('Member.edit' ,$data->id) }}" class="btn btn-primary">
                                        แก้ไข
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
