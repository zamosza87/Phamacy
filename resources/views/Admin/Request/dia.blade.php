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
                        <form method="post" action="{{ route('Request.update' , $data->id ) }}" id="formRequest">
                                @method('PATCH')
                                @csrf
                             <div class="form-group">
                                <label for="user">ชื่อผู้ป่วย:</label>
                                <input type="text" class="form-control" name="user" value="{{ $data->user->name }}" readonly/>
                             </div>

                             <div class="form-group">
                                    <label for="note">อาการป่วย:</label>
                                    <input type="text" class="form-control" name="note" value="{{ $data->description }}" readonly/>
                                </div>

                            <div class="form-group">
                                    <label for="diagnose">วินิจฉัย:</label>
                                    <input type="text" class="form-control" name="diagnose" value=""/>
                                 </div>

                            <div class="form-group">
                                <label for="treatment">วิธีการรักษา:</label>
                                <input type="text" class="form-control" name="treatment" value=""/>
                            </div>
                            <div class="form-group">
                                <label for="note">จ่ายยา</label>
                                <button type="button" class="btn btn-outline-success" style="margin-left: 10px;" data-toggle="modal" data-target=".addPhama">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>                                      
                            </div>
                         </form>
                     
                         <div class="row justify-content-center">
                            <button type="submit" class="btn btn-outline-primary" form="formRequest" >บันทึก</button>
                            <a class="btn btn-outline-dark" href="{{ route('Request.index') }}">Back</a>
                        </div>
                     </div>
                   </div>
                </div>
            </div>

            <div class="modal fade addPhama" tabindex="-1" role="dialog" aria-labelledby="plusPhama" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ค้นหายา</h5>

                            <form class="form-inline my-2 my-lg-0" action="#" id="searchPha" style="margin-left: 10px;">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" value="{{ Request::get('search')}}">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ชื่อยา</th>
                                        <th>วันหมด</th>
                                        <th>เลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            .........
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#btn-plus").click(function(){
            $('#formRequest').append('<p>Test</p>');
        });
    </script>
@endsection
