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
                <h1 class="h3 mb-0 text-gray-800">Danh sách nhà tuyển dụng</h1>
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
                                        <th class="text-center" >Tên công ty</th>
                                        <th class="text-center">Thông tin liên hệ</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" width="15%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listRecruiter as $key => $val)
                                    @php 
                                        $hoSoNTD = App\Models\recruiter\HoSoNTD::where('id_ntd', $val->id_ntd)->first();
                                    @endphp
                                    <tr>
                                        <td class="text-center">
                                            @if($hoSoNTD->logo != NULL)
                                            <img src="{{URL::asset('public/img/recruiter/uploads/'.$hoSoNTD->logo)}}" class="rounded-circle" width="50px" height="50px">
                                            @else
                                            <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px">
                                            @endif
                                        </td>
                                        <td class="text-center">{{$hoSoNTD->tencty ?? '(Chưa cập nhật)'}}</td>
                                        <td>
                                           Người đại diện: <span class="font-weight-bold">{{$val->tennlh}}</span><br>
                                           Email: <span class="font-weight-bold">{{$val->email}}</span><br>
                                           SĐT: <span class="font-weight-bold">{{$val->sdt}}</span>
                                        </td>
                                        <td class="text-center">
                                            @if($val->trangthaitk == -1)
                                            <span class="bg-gradient-secondary radius-status">
                                            <i class="fas fa-lock"></i> Bị khóa</span>
                                            @elseif($val->trangthaitk == 0)
                                            <span class="bg-gradient-warning radius-status">
                                            <i class="fas fa-spinner"></i> Chưa xác thực email</span>
                                            @else
                                            <span class="bg-gradient-success radius-status">
                                            <i class="fas fa-check"></i> Đã xác thực</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button  class="btn btn-primary" data-toggle="modal" 
                                            data-target="{{'#detail-'.$val->id_ntd}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
                                            @if($val->trangthaitk == -1)
                                            <button  class="btn btn-secondary" data-toggle="modal" 
                                            data-target="{{'#unlock-'.$val->id_ntd}}"><i class="fas fa-lock"></i></button>
                                            @else
                                            <button  class="btn btn-warning" data-toggle="modal" 
                                            data-target="{{'#lock-'.$val->id_ntd}}"><i class="fas fa-unlock"></i></button>
                                            @endif
                                            <button  class="btn btn-danger" data-toggle="modal" 
                                            data-target="{{'#del-'.$val->id_ntd}}"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                        <!--Modal Details-->
                                     <div class="modal fade" id="{{'detail-'.$val->id_ntd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-gradient-primary">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết hồ sơ nhà tuyển dụng</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                  <div class="row mt-4">
                                                    <div class="col-6 text-center" >
                                                        @if($hoSoNTD->logo != NULL)
                                                        <img src="{{URL::asset('public/img/recruiter/uploads/'.$hoSoNTD->logo)}}" class="rounded-circle" width="100px" height="100px">
                                                        @else
                                                        <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="100px" height="100px">
                                                        @endif
                                                    </div>
                                                    <div class="col-6 text-left" >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="font-weight-light">{{$hoSoNTD->tencty ?? '(Chưa cập nhật)'}}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5" ><strong  class="font-weight-bold">Người đại diện:</strong></div>
                                                            <div class="col-7" >{{$val->tennlh}}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="row ">
                                                            <div class="col-3" ><strong class="font-weight-bold">Liên hệ:</strong></div>
                                                            <div class="col-9">
                                                            {{$val->email}}<br>
                                                            {{$val->sdt}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Lĩnh vực:</strong></div>
                                                    <div class="col-4"> {{$hoSoNTD->linhvuchd ?? '(Chưa cập nhật)'}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Quy mô:</strong></div>
                                                    <div class="col-4" >{{$hoSoNTD->quymo ?? '(Chưa cập nhật)'}}</div>
                                                  </div>

                                                  <hr>  
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Địa chỉ:</strong></div>
                                                    @if($hoSoNTD->thanhpho == null || $hoSoNTD->diachicty == null)
                                                    <div class="col-10" >(Chưa cập nhật)</div>
                                                    @else
                                                    <div class="col-10" >{{$hoSoNTD->diachicty}}, {{$hoSoNTD->thanhpho}}</div>
                                                    @endif
                                                  </div>

                                                  <hr>  
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Website:</strong></div>
                                                    <div class="col-10" >{{$hoSoNTD->website ?? '(Chưa cập nhật)'}}</div>
                                                  </div>
                                                 
                                                  <hr>
                                                  <div class="row">
                                                    <div class="col-12 mt-2" >
                                                      <strong class="font-weight-bold">Mô tả:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $hoSoNTD->mota ?? '(Chưa cập nhật)' !!}
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!--Modal Lock-->
                                        <div class="modal fade" id="{{'lock-'.$val->id_ntd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body scroll-content">
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn khóa tài khoản nhà tuyển dụng này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.recruiter.lock')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id_ntd" value="{{$val->id_ntd}}" />
                                                            <button type="submit" class="btn btn-outline-warning">Xác nhận</button>
                                                        </form>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal Unlock-->
                                        <div class="modal fade" id="{{'unlock-'.$val->id_ntd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-secondary">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body scroll-content">
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn mở khóa tài khoản nhà tuyển dụng này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.recruiter.unlock')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id_ntd" value="{{$val->id_ntd}}" />
                                                            <button type="submit" class="btn btn-outline-secondary">Xác nhận</button>
                                                        </form>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal Delete-->
                                        <div class="modal fade" id="{{'del-'.$val->id_ntd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                    <h4 class="text-center font-weight-light">Bạn thật sự muốn xóa tài khoản nhà tuyển dụng này?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.recruiter.delete')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id_ntd" value="{{$val->id_ntd}}" />
                                                            <button type="submit" class="btn btn-outline-danger">Xác nhận</button>
                                                        </form>
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


