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
                <h1 class="h3 mb-0 text-gray-800">Danh sách dịch vụ của LoopIT</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
                <a class="btn btn-success float-right" href="{{route('admin.create_services')}}"><i class="fas fa-plus"></i> Thêm dịch vụ</a>
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
                                    <th width="2%">STT</th>
                                    <th class="text-center">Tên Dịch Vụ</th>
                                    <th width="20%" class="text-center">Giá Dịch Vụ</th>
                                    <th width="15%" class="text-center">Loại</th>
                                    @if($listServices != null)
                                    <th class="text-center" width="20%">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt=1; @endphp
                            @if($listServices != null)
                                @foreach($listServices as $key => $val)
                                <tr>
                                    <td class="text-center">{{$stt++}}</td>
                                    <td class="text-center">{{$val->tendv}}</td>
                                    <td class="text-right">{{number_format($val->giadv)}} VND</td>
                                    <td class="text-center">
                                        @if($val->loaidv == 1)
                                        Đăng tuyển
                                        @elseif($val->loaidv == 2)
                                        Tìm hồ sơ
                                        @else
                                        Hỗ trợ
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button  class="btn btn-primary" data-toggle="modal" data-target="{{'#detail-'.$val->id_dichvu}}"><i class="fas fa-list-ul" aria-hidden="true"></i></button>
                                        <a  class="btn btn-warning" href="{{route('admin.update_services', ['id_dichvu' => $val->id_dichvu ])}}"><i class="fas fa-cog" aria-hidden="true"></i></a>
                                        <button  class="btn btn-danger" data-toggle="modal" data-target="{{'#del-'.$val->id_dichvu}}"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                    
                                    <!--Modal Details-->
                                    <div class="modal fade" id="{{'detail-'.$val->id_dichvu}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết Dịch Vụ</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên dịch vụ:</strong></div>
                                                    <div class="col-10" >{{$val->tendv}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Loại dịch vụ: </strong></div>
                                                    <div class="col-4">
                                                    @if($val->loaidv == 1)
                                                    Đăng tuyển
                                                    @elseif($val->loaidv == 2)
                                                    Tìm hồ sơ
                                                    @else
                                                    Hỗ trợ
                                                    @endif
                                                    </div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Giá dịch vụ:</strong></div>
                                                    <div class="col-4" > {{number_format($val->giadv)}} VND</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    @if($val->songayhieuluc != 0)  
                                                    <div class="col-4" ><strong class="font-weight-bold">Số ngày hiệu lực:</strong></div>
                                                    <div class="col-8">{{$val->songayhieuluc}} ngày</div>
                                                    @endif
                                                    @if($val->diemtk != 0)
                                                    <div class="col-4" ><strong  class="font-weight-bold">Điểm tìm kiếm:</strong></div>
                                                    <div class="col-8" >{{$val->diemtk}} điểm</div>
                                                    @endif
                                                  </div>
                                                  <hr>
                                                  <div class="row">
                                                    <div class="col-12 mt-2" >
                                                      <strong class="font-weight-bold">Mô tả dịch vụ:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $val->motadv !!}
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

                                    <!--Modal Delete-->
                                    <div class="modal fade" id="{{'del-'.$val->id_dichvu}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                <h4 class="font-weight-light text-center">Bạn có muốn xóa dịch vụ này ?</h4>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên dịch vụ:</strong></div>
                                                    <div class="col-10" >{{$val->tendv}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Loại dịch vụ: </strong></div>
                                                    <div class="col-4">
                                                    @if($val->loaidv == 1)
                                                    Đăng tuyển
                                                    @elseif($val->loaidv == 2)
                                                    Tìm hồ sơ
                                                    @else
                                                    Hỗ trợ
                                                    @endif
                                                    </div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Giá dịch vụ:</strong></div>
                                                    <div class="col-4" > {{number_format($val->giadv)}} VND</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    @if($val->songayhieuluc != 0)  
                                                    <div class="col-4" ><strong class="font-weight-bold">Số ngày hiệu lực:</strong></div>
                                                    <div class="col-8">{{$val->songayhieuluc}} ngày</div>
                                                    @endif
                                                    @if($val->diemtk != 0)
                                                    <div class="col-4" ><strong  class="font-weight-bold">Điểm tìm kiếm:</strong></div>
                                                    <div class="col-8" >{{$val->diemtk}} điểm</div>
                                                    @endif
                                                  </div>
                                                  <hr>
                                                  <div class="row">
                                                    <div class="col-12 mt-2" >
                                                      <strong class="font-weight-bold">Mô tả dịch vụ:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $val->motadv !!}
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{route('admin.delete_services_post')}}">
                                                    {{csrf_field()}}
                                                        <input type="hidden" value="{{$val->id_dichvu}}" name="id_dichvu">
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
                            @endif
                            @if($listServices == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có dịch vụ nào</strong></h5></td>
                              </tr>
                            </tfoot>
                            @endif
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


