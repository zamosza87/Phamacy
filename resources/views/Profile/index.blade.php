@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                <label>{{ Session::get('success') }}</label>
                </div>
                @ENDIF
                <div class="row">
                        <div class="col-sm-12">
                            <h2 class="display-3">Profile</h2>
                            <div class="row">
                            {{-- <a href="/Admin/Phamacy/create"></a> --}}
                            <a href="{{ route('Profile.edit', Auth::user()->id ) }}" ><button class="btn btn-outline-info"> edit </button></a>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">ชื่อ</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->first_name }}">
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">นามสกุล</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->last_name }}">
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">วันเกิด</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->birth }}">
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->email }}">
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">โรคประจำตัว</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->congenital_disease }}">
                                    </div>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default">แพ้ยา</span>
                                            </div>
                                        <input type="text" class="form-control" readonly aria-label="Sizing example input" value="{{ $data->drug_allergies }}">
                                    </div>
                                </div>
                            </div>
                        <div>
                        </div>
        </div>
    </div>
</div>
@endsection
