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
                <h1 class="h3 mb-0 text-gray-800">Danh sách ứng viên</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
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
                                        <th width="5%"  class="text-center">#</th>
                                        <th class="text-center" width="15%">Tên ứng viên</th>
                                        <th class="text-center">Thông tin liên hệ</th>
                                        <!-- <th class="text-center" width="15%">Thao tác</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listJobseeker as $key => $val)
                                    <tr>
                                        <td class="text-center">
                                            @if($val->hinhanh != NULL)
                                            <img src="{{URL::asset('public/img/jobseeker/uploads/'.$val->hinhanh)}}" class="rounded-circle" width="50px" height="50px" alt="avatar-jobseeker-apply">
                                            @else
                                            <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="none-avatar-jobseeker-apply">
                                            @endif
                                        </td>
                                        <td class="text-center">{{$val->ho}} {{$val->ten}}</td>
                                        <td>
                                            {{$val->email}}<br>
                                            {{$val->sdt}}
                                        </td>
                                        <!-- <td class="text-center">
                                            <button  class="btn btn-primary" data-toggle="modal" 
                                            data-target="{{'#detail-'.$val->id_uv}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
                                            <button  class="btn btn-outline-warning" data-toggle="modal" 
                                            data-target="{{'#detail-'.$val->id_uv}}"><i class="fas fa-unlock"></i></button>
                                            <a  class="btn btn-warning" href=" 'admin.jobseeker.lock', ['id_uv' => $val->id_uv ] "><i class="fas fa-cog" aria-hidden="true"></i></a> 
                                            <button  class="btn btn-danger" data-toggle="modal" 
                                            data-target="{{'#del-'.$val->id_uv}}"><i class="far fa-trash-alt"></i></button>
                                        </td> -->
                                        <!--Modal Delete-->
                                        <div class="modal fade" id="{{'del-'.$val->id_uv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn xóa ứng viên này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <a href=" 'admin.delete_position',['id_chucvu' => $val->id_chucvu ] " class="btn btn-outline-danger">Xác nhận</a> -->
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
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


