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
            <div class="card">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                       <h1 class="display-3">เพิ่มประวัติ</h1>
                     <div>
                       @if ($errors->any())
                         <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                         </div><br />
                       @endif
                         <form method="post" action="{{ route('ht.store' , $user->id) }}">
                             @csrf
                            <div class="form-group">
                                <label for="user_id">ชื่อผู้ป่วย:</label>
                                <input type="text" class="form-control" name="user" value="{{ $user->name }}" readonly/>
                            </div>

                            <div class="form-group">
                                <label for="description">อาการป่วย:</label>
                                <input type="text" class="form-control" name="note"/>
                            </div>

                            <div class="form-group">
                                <label for="description">วินิจฉัย:</label>
                                <input type="text" class="form-control" name="diagnose"/>
                            </div>

                            <div class="form-group">
                                <label for="description">วิธีการรักษา:</label>
                                <input type="text" class="form-control" name="treatment"/>
                            </div>


                             <button type="submit" class="btn btn-outline-primary">เพิ่ม</button>
                            <a class="btn btn-outline-dark" href="{{ route('ht.index' , $user->id) }}">Back</a>
                         </form>
                     </div>
                   </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
