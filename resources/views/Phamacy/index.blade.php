@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">

                <div class="row">
                        <div class="col-sm-12">
                            <h2 class="display-3">คลังยา</h2>
                            <div class="row">
                            {{-- <a href="/Admin/Phamacy/create"></a> --}}
                            <a href="{{ route('Phamacy.create') }}" ><button class="btn btn-outline-info"> Create </button></a>
                            </div>
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>Name</td>
                                  <td>Analgesic</td>
                                  <td>Stock</td>
                                  <td colspan = 2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Phamacy as $data)
                                <tr>
                                    <td>{{$data->pha_id}}</td>
                                    <td>{{$data->pha_name}}</td>
                                    <td>{{$data->analgesic}}</td>
                                    <td>{{$data->stock}}</td>
                                    <td>
                                        <a href="{{ route('Phamacy.edit',$data->pha_id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('Phamacy.destroy', $data->pha_id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        <div>
                        </div>
        </div>
    </div>
</div>
@endsection
