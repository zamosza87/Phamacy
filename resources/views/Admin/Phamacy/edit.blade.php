@extends('layouts.app')

@section('content')
<span class="container">
    <span class="row justify-content-center">
        <span class="col-md-12">
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                <label>{{ Session::get('success') }}</label>
                </div>
            @endif
            <span class="card">
                <span class="row">
                    <span class="col-sm-8 offset-sm-2">
                       <h1 class="display-3">แก้ไขยาคงคลัง</h1>
                     <span>
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
                             <span class="form-group">
                                 <label for="thai_name">ชื่อไทย:</label>
                                 <input type="text" class="form-control @error('thai_name') is-invalid @enderror" name="thai_name" value="{{ $Phamacy->thai_name }}"/>
                                 @error('thai_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                             </span>

                             <div class="form-group">
                                 <label for="generic_name">ชื่อสามัญทางยา:</label>
                                 <input type="text" class="form-control @error('generic_name') is-invalid @enderror" name="generic_name" value="{{ $Phamacy->generic_name }}"/>
                                 @error('generic_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                             </div>

                             <div class="form-group">
                                    <label for="trade_name">ชื่อทางการค้า:</label>
                                    <input type="text" class="form-control @error('trade_name') is-invalid @enderror" name="trade_name" value="{{ $Phamacy->trade_name }}"/>
                                    @error('trade_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                                </div>

                             <div class="form-group">
                                <label for="company_Name">ชื่อบริษัท:</label>
                                <input type="text" class="form-control @error('company_Name') is-invalid @enderror" name="company_Name" value="{{ $Phamacy->company_Name }}"/>
                                @error('company_Name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="drug_type">ชนิดยา:</label>
                                <input type="text" class="form-control @error('drug_type') is-invalid @enderror" name="drug_type" value="{{ $Phamacy->drug_type }}"/>
                                @error('drug_type')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="package">ประเภท:</label>
                                <input type="text" class="form-control @error('package') is-invalid @enderror" name="package" value="{{ $Phamacy->package }}"/>
                                @error('package')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">ปริมาณ:</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $Phamacy->amount }}"/>
                                @error('amount')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                    <label for="timeuse">วิธีการใช้:</label>
                                    <select name="timeuse" class="form-control @error('timeuse') is-invalid @enderror">
                                            <option></option>
                                            <option value="รับประทานก่อนอาหาร" {{ $Phamacy->timeuse == 'รับประทานก่อนอาหาร' ? 'selected' : '' }}>รับประทานก่อนอาหาร</option>
                                            <option value="รับประทานหลังอาหาร"{{ $Phamacy->timeuse == 'รับประทานหลังอาหาร' ? 'selected' : '' }}>รับประทานหลังอาหาร</option>
                                            <option value="ยาใช้ภายนอก"{{ $Phamacy->timeuse == 'ยาใช้ภายนอก' ? 'selected' : '' }}>ยาใช้ภายนอก</option>
                                    </select>
                                    @error('timeuse')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="properties">สรรพคุณ:</label>
                                <input type="text" class="form-control @error('properties') is-invalid @enderror" name="properties" value="{{ $Phamacy->properties }}"/>
                                @error('properties')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="expiry_date">วันที่หมดอายุ:</label>
                                <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ $Phamacy->expiry_date }}"/>
                                @error('expiry_date')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock">จำนวน:</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $Phamacy->stock }}"/>
                                @error('stock')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                             <button type="submit" class="btn btn-outline-primary">update</button>
                            <a class="btn btn-outline-dark" href="{{ route('Phamacy.index') }}">Back</a>
                         </form>
                     </span>
                   </span>
                   </span>
            </span>
        </span>
    </span>
</span>
@endsection
