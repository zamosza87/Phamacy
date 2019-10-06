@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="display-3">คลังยา</h2>
                    <div class="row">
                        {{-- <a href="/Admin/Phamacy/create"></a> --}}
                        <a href="{{ route('Phamacy.create') }}"
                            ><button class="btn btn-outline-info">
                                Create
                            </button></a
                        >
                    </div>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-nowrap">ID</th>
                                <th scope="col" class="text-nowrap">ชื่อไทย</th>
                                <th scope="col" class="text-nowrap">ชื่อสามัญทางยา</th>
                                <th scope="col" class="text-nowrap">ชื่อทางการค้า</th>
                                <th scope="col" class="text-nowrap">ชื่อบริษัท</th>
                                <th scope="col" class="text-nowrap">ชนิดยา</th>
                                <th scope="col" class="text-nowrap">บรรจุภัณฑ์</th>
                                <th scope="col" class="text-nowrap">ปริมาณ</th>
                                <th scope="col" class="text-nowrap">สรรพคุณ</th>
                                <th scope="col" class="text-nowrap">วันที่หมดอายุ</th>
                                <th scope="col" class="text-nowrap">คงคลัง</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Phamacy as $data)
                            <tr>
                                <td>{{$data->pha_id}}</td>
                                <td>{{$data->thai_name}}</td>
                                <td>{{$data->generic_name}}</td>
                                <td>{{$data->trade_name}}</td>
                                <td>{{$data->company_Name}}</td>
                                <td>{{$data->drug_type}}</td>
                                <td>{{$data->package}}</td>
                                <td>{{$data->amount}}</td>
                                <td>{{$data->properties}}</td>
                                <td>{{$data->expiry_date}}</td>
                                <td>{{$data->stock}}</td>

                                <td>
                                    <a
                                        href="{{ route('Phamacy.edit',$data->pha_id)}}"
                                        class="btn btn-primary"
                                        >Edit</a
                                    >
                                </td>
                                <td>
                                    <form
                                        action="{{ route('Phamacy.destroy', $data->pha_id)}}"
                                        method="post"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            class="btn btn-danger"
                                            type="submit"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $Phamacy->links() }}
                    <div></div>
                </div>
            </div>
        </div>
        @endsection
    </div>
</div>
