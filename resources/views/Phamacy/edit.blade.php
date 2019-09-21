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
                       <h1 class="display-3">แก้ไขยาคงคลัง</h1>
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
                         <form method="post" action="{{ route('Phamacy.update' , $Phamacy->pha_id) }}">
                                @method('PATCH')
                                @csrf
                             <div class="form-group">
                                 <label for="thai_name">ชื่อไทย:</label>
                                 <input type="text" class="form-control" name="thai_name" value="{{ $Phamacy->thai_name }}"/>
                             </div>

                             <div class="form-group">
                                 <label for="generic_name">ชื่อสามัญทางยา:</label>
                                 <input type="text" class="form-control" name="generic_name" value="{{ $Phamacy->generic_name }}"/>
                             </div>

                             <div class="form-group">
                                 <label for="trade_name">ชื่อทางการค้า:</label>
                                 <input type="number" class="form-control" name="trade_name" value="{{ $Phamacy->trade_name }}"/>
                             </div>

                             <div class="form-group">
                                <label for="company_Name">ชื่อบริษัท:</label>
                                <input type="text" class="form-control" name="company_Name" value="{{ $Phamacy->company_Name }}"/>
                            </div>

                            <div class="form-group">
                                <label for="drug_type">ชนิดยา:</label>
                                <input type="text" class="form-control" name="drug_type" value="{{ $Phamacy->drug_type }}"/>
                            </div>

                            <div class="form-group">
                                <label for="package">บรรจุภัณฑ์:</label>
                                <input type="text" class="form-control" name="package" value="{{ $Phamacy->package }}"/>
                            </div>

                            <div class="form-group">
                                <label for="amount">ปริมาณ:</label>
                                <input type="text" class="form-control" name="amount" value="{{ $Phamacy->amount }}"/>
                            </div>

                            <div class="form-group">
                                <label for="properties">สรรพคุณ:</label>
                                <input type="text" class="form-control" name="properties" value="{{ $Phamacy->properties }}"/>
                            </div>

                            <div class="form-group">
                                <label for="expiry_date">วันที่หมดอายุ:</label>
                                <input type="text" class="form-control" name="expiry_date" value="{{ $Phamacy->expiry_date }}"/>
                            </div>

                            <div class="form-group">
                                <label for="stock">คงคลัง:</label>
                                <input type="text" class="form-control" name="stock" value="{{ $Phamacy->stock }}"/>
                            </div>
                             <button type="submit" class="btn btn-outline-primary">update</button>
                            <a class="btn btn-outline-dark" href="{{ route('Phamacy.index') }}">Back</a>
                         </form>
                     </div>
                   </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
