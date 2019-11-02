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
                       <h1 class="display-3">แก้ไขประวัติ</h1>
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
                         <form method="post" action="{{ route('ht.update' , [ $data->id_user , $data->id]) }}">
                                @method('PATCH')
                                @csrf
                             <div class="form-group">
                                 <label for="user">ชื่อผู้ป่วย:</label>
                                 <input type="text" class="form-control" name="user" value="{{ $data->users->name }}" readonly/>
                             </div>

                             <div class="form-group">
                                    <label for="note">อาการป่วย:</label>
                                    <input type="text" class="form-control" name="note" value="{{ $data->note }}"/>
                                </div>

                            <div class="form-group">
                                    <label for="diagnose">วินิจฉัย:</label>
                                    <input type="text" class="form-control" name="diagnose" value="{{ $data->diagnose }}"/>
                                 </div>

                            <div class="form-group">
                                    <label for="treatment">วิธีการรักษา:</label>
                                    <input type="text" class="form-control" name="treatment" value="{{ $data->treatment }}"/>
                                </div>

                             <button type="submit" class="btn btn-outline-primary">update</button>
                            <a class="btn btn-outline-dark" href="{{ route('ht.index' , $data->id_user) }}">Back</a>
                         </form>
                     </div>
                   </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
