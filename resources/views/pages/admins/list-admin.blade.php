@extends('layout.admins.main')
@section('admin_content')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('layout.admins.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Danh sách quản trị viên</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
                @if(Session::get('id_chucvu') == 'admin')
                <a class="btn btn-success float-right" href="{{route('admin.create_admin_acc')}}"><i class="fas fa-plus"></i> Thêm quản trị viên</a>
                @endif
            </div>
            

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th width="5%"  class="text-center">STT</th>
                                        <th class="text-center" width="15%">Ảnh đại diện</th>
                                        <th class="text-center">Tên quản trị viên</th>
                                        <th class="text-center">Thông tin liên hệ</th>
                                        <th class="text-center">Quyền hạn</th>
                                        @if(Session::get('id_chucvu') == 'admin')
                                        <th class="text-center" width="15%">Thao tác</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($listAdmin))
                                        @php
                                            $stt = 1;
                                        @endphp
                                    @foreach($listAdmin as $key => $val)
                                    <tr>
                                        <td class="text-center">{{$stt++}}</td>
                                        <td class="text-center">
                                            @if($val->hinhanh != null)
                                            <img class="img-profile rounded-circle" height="50px" width="50px"              
                                                src="{{ URL::asset( 'public/img/admin/uploads/'.$val->hinhanh ) }}">
                                            @else 
                                            <img class="img-profile rounded-circle" height="50px" width="50px"       
                                                src="{{ URL::asset('public/img/undraw_profile.svg') }}">
                                            @endif
                                        </td>
                                        <td>{{$val->tenqtv}}</td>
                                        <td>
                                            <span class="font-weight-bold">{{$val->email}}</span>
                                            <br>
                                            <span class="font-weight-bold">{{$val->sdt}}</span>
                                        </td>
                                        <td class="text-center">
                                        @if($val->id_chucvu == 'admin' && $val->id_qtv == 'qtv1')
                                        <span class="bg-gradient-warning radius-status"><i class="fas fa-user-cog"></i> Senior {{$val->tenchucvu}}</span>
                                        @elseif($val->id_chucvu == 'admin')
                                        <span class="bg-gradient-info radius-status"><i class="fas fa-users-cog"></i> {{$val->tenchucvu}}</span>
                                        @else 
                                        <span class="bg-gradient-secondary radius-status"><i class="fas fa-user-shield"></i> {{$val->tenchucvu}}</span>
                                        @endif
                                        </td>
                                        @if(Session::get('id_chucvu') == 'admin')
                                        <td class="text-center">
                                            <a  class="btn btn-warning" href="{{route('admin.update_admin_acc', ['id_qtv' => $val->id_qtv ])}}"><i class="fas fa-cog" aria-hidden="true"></i></a>
                                            @if($val->tenchucvu == 'Admin Page' && $val->id_qtv == 'qtv1')
                                            @elseif(Session::get('admin_id') == $val->id_qtv)
                                            @else
                                            <button  class="btn btn-danger" data-toggle="modal" 
                                            data-target="{{'#del-'.$val->id_qtv}}"><i class="far fa-trash-alt"></i></button>
                                            @endif
                                        </td>
                                        <!--Modal Delete-->
                                        <div class="modal fade" id="{{'del-'.$val->id_qtv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body scroll-content">
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn quản trị viên này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('admin.delete_admin_acc',['id_qtv' => $val->id_qtv ])}}" class="btn btn-outline-danger">Xác nhận</a>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection


