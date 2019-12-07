@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {{-- <a class="btn btn-outline-primary" href="#" style="margin-bottom: 15px;">บันทึกคำร้อง</a> --}}
                @if (Session::has('warning'))
                <div class="alert alert-warning" role="alert">
                <label>{{ Session::get('warning') }}</label>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    {{ Auth::user()->name}}<br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
