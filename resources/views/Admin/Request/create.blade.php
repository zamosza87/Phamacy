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
                       <h1 class="display-3">สอบถามอาการเบื้องต้น</h1>
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
                         <form method="post" action="{{ route('Request.store') }}">
                             @csrf
                             <div class="form-group">
                                 <label for="user_id">รหัสประจำตัว:</label>
                             <input type="text" class="form-control" name="user_id" />
                             </div>

                             <div class="form-group">
                                 <label for="description">คำอธิบาย:</label>
                                 <input type="text" class="form-control" name="description"/>
                             </div>
                             <div class="form-group">
                                <label for="select1">การใช้บริการ</label>
                                <select class="form-control" id="select1" name="_type">
                                  <option value="พบแพทย์">พบแพทย์</option>
                                  <option value="เบิกยา">เบิกยา</option>
                                </select>
                              </div>
                             <button type="submit" class="btn btn-outline-primary">เพิ่ม</button>
                            <a class="btn btn-outline-dark" href="{{ route('Request.index') }}">Back</a>
                         </form>
                     </div>
                   </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
