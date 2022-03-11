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
                <h1 class="h3 mb-0 text-gray-800">Danh sách chức vụ quyền hạn</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
                @if(Session::get('id_chucvu') == 'admin')
                <a class="btn btn-success float-right" href="{{route('admin.create_position')}}"><i class="fas fa-plus"></i> Thêm chức vụ</a>
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
                                        <th class="text-center" width="15%">Mã chức vụ</th>
                                        <th class="text-center">Tên chức vụ</th>
                                        @if(Session::get('id_chucvu') == 'admin')
                                        <th class="text-center" width="15%">Thao tác</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($listPosition))
                                        @php
                                            $stt = 1;
                                        @endphp
                                    @foreach($listPosition as $key => $val)
                                    <tr>
                                        <td class="text-center">{{$stt++}}</td>
                                        <td class="text-center">{{$val->id_chucvu}}</td>
                                        <td>{{$val->tenchucvu}}</td>
                                        @if(Session::get('id_chucvu') == 'admin')
                                        <td class="text-center">
                                            <a  class="btn btn-warning" href="{{route('admin.update_position', ['id_chucvu' => $val->id_chucvu ])}}"><i class="fas fa-cog" aria-hidden="true"></i></a>
                                            @php 
                                            $check_del= App\Models\admin\TaiKhoanAdmin::where('id_chucvu','=',$val->id_chucvu)->exists();
                                            @endphp 
                                            @if($val->id_chucvu == 'admin')
                                            @elseif($check_del)
                                            <button  class="btn btn-outline-danger" data-toggle="modal" 
                                            data-target="{{'#deldis-'.$val->id_chucvu}}"><i class="far fa-trash-alt"></i></button>
                                            @else
                                            <button  class="btn btn-danger" data-toggle="modal" 
                                            data-target="{{'#del-'.$val->id_chucvu}}"><i class="far fa-trash-alt"></i></button>
                                            @endif
                                        </td>
                                        <!--Modal Delete-->
                                        <div class="modal fade" id="{{'del-'.$val->id_chucvu}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn xóa chức vụ này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('admin.delete_position',['id_chucvu' => $val->id_chucvu ])}}" class="btn btn-outline-danger">Xác nhận</a>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal Delete Disabled-->
                                        <div class="modal fade" id="{{'deldis-'.$val->id_chucvu}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                    <h4 class="text-center font-weight-light">Vì có quản trị viên đang thuộc chức vụ này nên không thể xóa</h4>
                                                    </div>
                                                    <div class="modal-footer">
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


