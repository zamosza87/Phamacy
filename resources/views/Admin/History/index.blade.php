@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                <h2 class="display-3">ประวัติ {{ $user->name }}</h2>
                    <div class="row" style="margin-bottom: 20px;">
                        {{-- <a href="/Admin/Phamacy/create"></a> --}}
                        <div class="col-auto mr-auto">
                            {{-- <a href="{{ route('ht.create' , $user->id) }}">
                                <button class="btn btn-outline-info">
                                    Create
                                </button>
                            </a> --}}
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
                                            <th scope="col" class="text-nowrap">ผู้ตรวจ</th>
                                            <th scope="col" class="text-nowrap">อาการป่วย</th>
                                            <th scope="col" class="text-nowrap">วินิจฉัย</th>
                                            <th scope="col" class="text-nowrap">วิธีการรักษา</th>
                                            <th scope="col" class="text-nowrap">วันที่ตรวจ</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $data)
                                        <tr>
                                            <td>{{$data->doc['name']}}</td>
                                            <td>{{$data->note}}</td>
                                            <td>{{$data->diagnose}}</td>
                                            <td>{{$data->treatment}}</td>
                                            <td>{{ date_format($data->created_at , 'd-M-Y ,H:i:s')}}</td>
                                            <td>
                                                <button class="btn btn-primary show-his" id="{{$data->id}}">
                                                    Show
                                                </button>
                                            </td>
                                            {{-- <td>
                                            <a href="{{ route('History.edit' , $data->id) }}" class="btn btn-primary">
                                                    แก้ไข
                                                </a>
                                                </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                    {{ $history->links() }}
                    <div></div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-info-his" tabindex="-1" role="dialog" aria-labelledby="plusPhama" id="info" aria-hidden="true">
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
        $('.show-his').click(function(){
            var his_id = $(this).attr('id');
            var action_url = '{{ route("History.show" , "his_id") }}'.replace('his_id' , his_id);
            var info_result = $("#info-result")
            axios.get(action_url)
            .then(function (response) {
                console.log(response)
                if(info_result != null){
                    info_result.remove();
                }
                $('#modal-content').append(response.data.display);
                $(".modal-info-his").modal();
            })
            .catch(function (error) {

            });
        });
    </script>
@endsection
