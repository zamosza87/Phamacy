@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                        <label>{{ Session::get('success') }}</label>
                        </div>
                         @endif
                    <h2 class="display-3">คลังยา</h2>
                    <div class="row" style="margin-bottom: 20px;">
                        {{-- <a href="/Admin/Phamacy/create"></a> --}}
                        <div class="col-auto mr-auto">
                            <a href="{{ route('Phamacy.create') }}">
                                <button class="btn btn-outline-info">
                                    Create
                                </button>
                            </a>
                        </div>
                        <div class="col-auto">
                            <form class="form-inline my-2 my-lg-0" action="{{ URL::current() }}">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" value="{{ Request::get('search')}}">
                               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                            <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-nowrap">ID</th>
                                            {{-- <th scope="col" class="text-nowrap">ชื่อไทย</th> --}}
                                            <th scope="col" class="text-nowrap">ชื่อสามัญทางยา</th>
                                            <th scope="col" class="text-nowrap">ชื่อทางการค้า</th>
                                            <th scope="col" class="text-nowrap">ชื่อบริษัท</th>
                                            {{-- <th scope="col" class="text-nowrap">ชนิดยา</th>
                                            <th scope="col" class="text-nowrap">ปริมาณ</th> --}}
                                            <th scope="col" class="text-nowrap">จำนวน</th>
                                            <th scope="col" class="text-nowrap">ประเภท</th>
                                            {{-- <th scope="col" class="text-nowrap">สรรพคุณ</th> --}}
                                            <th scope="col" class="text-nowrap">วันที่หมดอายุ</th>
                                            <th colspan="3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Phamacy as $data)
                                        <tr>
                                            <td>{{$data->pha_id}}</td>
                                            {{-- <td>{{$data->thai_name}}</td> --}}
                                            <td>{{$data->generic_name}}</td>
                                            <td>{{$data->trade_name}}</td>
                                            <td>{{$data->company_Name}}</td>
                                            {{-- <td>{{$data->drug_type}}</td>
                                            <td>{{$data->amount}}</td> --}}
                                            <td>{{$data->stock}}</td>
                                            <td>{{$data->package}}</td>
                                            {{-- <td>{{$data->properties}}</td> --}}
                                            <td>{{$data->expiry_date}}</td>
                                            <td>
                                                <button class="btn btn-success b-info" id="{{$data->pha_id}}">
                                                    Info
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('Phamacy.edit',$data->pha_id)}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('Phamacy.destroy', $data->pha_id)}}"
                                                    method="post">
                                                    @csrf @method('DELETE')
                                                    <button
                                                        class="btn btn-danger"
                                                        type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                    {{ $Phamacy->links() }}
                    <div></div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-info-pha" tabindex="-1" role="dialog" aria-labelledby="plusPhama" id="info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ค้นหายา</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-content">

                    </div>
                    <div class="modal-footer">
                        .........
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.b-info').click(function(){
        var id = $(this).attr('id');

        var action_url = "{{ route('Phamacy.show' , 'phaid' )}}".replace("phaid" , id);
        var info_result = $("#info-result")

        axios.get(action_url)
        .then(function (response) {
            if(info_result != null){
                info_result.remove();
            }
            $('#modal-content').append(response.data.display);
            $(".modal-info-pha").modal();
        })
        .catch(function (error) {

        });
    });
</script>
@endsection
