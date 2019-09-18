@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Profile</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="POST" action="{{ route('Profile.update', $data->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="{{ $data->first_name }}" />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $data->last_name }}" />
            </div>

            <div class="form-group">
                <label for="birth">Birth:</label>
                <input type="date" class="form-control" name="birth" value="{{ $data->birth }}" />
            </div>
            <div class="form-group">
                <label for="congenital_disease">Congenital Disease:</label>
                <input type="text" class="form-control" name="congenital_disease" value="{{ $data->congenital_disease }}"/>
            </div>
            <div class="form-group">
                <label for="drug_allergies">Drug Allergies:</label>
                <input type="text" class="form-control" name="drug_allergies" value="{{ $data->drug_allergies }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
