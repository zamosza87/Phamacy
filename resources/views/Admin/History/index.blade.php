@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                <h2 class="display-3">ประวัติ {{ $user->name }}</h2>
                    <div class="row" style="margin-bottom: 20px;">
                        {{-- <a href="/Admin/Phamacy/create"></a> --}}
                        <div class="col-auto mr-auto">
                            <a href="{{ route('ht.create' , $user->id) }}">
                                <button class="btn btn-outline-info">
                                    Create
                                </button>
                            </a>
                        </div>
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
                                            <th scope="col" class="text-nowrap">ผู้ตรวจ</th>
                                            <th scope="col" class="text-nowrap">อาการป่วย</th>
                                            <th scope="col" class="text-nowrap">วินิจฉัย</th>
                                            <th scope="col" class="text-nowrap">วิธีการรักษา</th>
                                            <th scope="col" class="text-nowrap">วันที่ตรวจ</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $data)
                                        <tr>
                                            <td>{{$data->doc->name}}</td>
                                            <td>{{$data->note}}</td>
                                            <td>{{$data->diagnose}}</td>
                                            <td>{{$data->treatment}}</td>
                                            <td>{{ date_format($data->created_at , 'd-M-Y ,H:i:s')}}</td>
                                            <td>
                                                <a href="" class="btn btn-primary">
                                                    Show
                                                </a>
                                            </td>
                                            <td>
                                            <a href="{{ route('ht.edit' , [$user->id , $data->id]) }}" class="btn btn-primary">
                                                    แก้ไข
                                                </a>
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                    {{ $history->links() }}
                    <div></div>
                </div>
            </div>
        </div>
        @endsection
    </div>
</div>
