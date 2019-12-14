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
                       <h1 class="display-3">เพิ่มยาคงคลัง</h1>
                     <div>
                       {{-- @if ($errors->any())
                         <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                         </div><br />
                       @endif --}}
                         <form method="post" action="{{ route('Phamacy.store') }}">
                             @csrf
                             <div class="form-group">
                                 <label for="thai_name">ชื่อไทย:</label>
                                 <input type="text" class="form-control @error('thai_name') is-invalid @enderror" name="thai_name"/>
                                 @error('thai_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                 <label for="generic_name">ชื่อสามัญทางยา:</label>
                                 <input type="text" class="form-control @error('generic_name') is-invalid @enderror" name="generic_name"/>
                                 @error('generic_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                             </div>

                             <div class="form-group">
                                 <label for="trade_name">ชื่อทางการค้า:</label>
                                 <input type="text" class="form-control @error('trade_name') is-invalid @enderror" name="trade_name"/>
                                 @error('trade_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                             </div>
                             <div class="form-group">
                                <label for="company_Name">ชื่อบริษัท:</label>
                                <input type="text" class="form-control @error('company_Name') is-invalid @enderror" name="company_Name"/>
                                @error('company_Name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="drug_type">ชนิดยา:</label>
                                <input type="text" class="form-control @error('drug_type') is-invalid @enderror" name="drug_type"/>
                                @error('drug_type')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="package">ประเภท:</label>
                                <input type="text" class="form-control @error('package') is-invalid @enderror" name="package"/>
                                @error('package')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="amount">ปริมาณ:</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"/>
                                @error('amount')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="timeuse">วิธีการใช้:</label>
                                    <select name="timeuse" class="form-control @error('timeuse') is-invalid @enderror">
                                        <option ></option>
                                        <option value="รับประทานก่อนอาหาร">รับประทานก่อนอาหาร</option>
                                        <option value="รับประทานหลังอาหาร">รับประทานหลังอาหาร</option>
                                        <option value="ยาใช้ภายนอก">ยาใช้ภายนอก</option>
                                    </select>
                                    @error('timeuse')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="properties">สรรพคุณ:</label>
                                <input type="text" class="form-control @error('properties') is-invalid @enderror" name="properties"/>
                                @error('properties')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="expiry_date">วันที่หมดอายุ:</label>
                                <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date"/>
                                @error('expiry_date')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock">จำนวน:</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock"/>
                                @error('stock')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                             <button type="submit" class="btn btn-outline-primary">เพิ่ม</button>
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
