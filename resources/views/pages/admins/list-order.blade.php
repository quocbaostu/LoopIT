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
                <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
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
                                        <th width="5%" class="text-center">STT</th>
                                        <th class="text-center">Thông tin đơn hàng</th>
                                        <th class="text-center" >Nhà tuyển dụng</th>
                                        <th class="text-center">Ngày mua</th>
                                        <th class="text-center" width="15%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $stt = 1; @endphp
                                    @foreach($listOrder as $key => $val)
                                    @php 
                                        $hoSoNTD = App\Models\recruiter\HoSoNTD::where('id_ntd', $val->id_ntd)->first();
                                        $tkNTD = App\Models\recruiter\TaiKhoanNTD::where('id_ntd', $val->id_ntd)->first();
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{$stt++}}</td>
                                        <td>
                                            <span class="font-weight-bold">Mã đơn hàng:</span> {{$val->id_donhang}}<br>
                                            <spa class="font-weight-bold"n>Hình thức:</spa> 
                                            @if($val->hinhthucthanhtoan == 1)
                                            Thanh toán Online
                                            @else
                                            Thanh toán Chuyển khoản
                                            @endif
                                            <br>
                                            <br>
                                            <span class="font-weight-bold">Trạng thái:</span> 
                                            @if($val->trangthaidh == 1)
                                            <span class="bg-gradient-success radius-status">
                                            <i class="fas fa-check"></i> Đã thanh toán
                                            </span> 
                                            @elseif($val->trangthaidh == 2)
                                            <span class="bg-gradient-warning radius-status">
                                            <i class="fas fa-spinner"></i> Chờ thanh toán
                                            </span> 
                                            @elseif($val->trangthaidh == 0)
                                            <span class="bg-gradient-danger radius-status">
                                            <i class="fas fa-times"></i> Bị hủy
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{$hoSoNTD->tencty}}</span><br>
                                            <span class="font-weight-light">{{$tkNTD->tennlh}}</span><br>
                                            <span class="font-weight-light">{{$tkNTD->email}}</span><br>
                                            <span class="font-weight-light">{{$tkNTD->sdt}}</span>
                                        </td>
                                        <td>
                                            {{date("d/m/Y", strtotime($val->ngaymua))}}
                                            <br>
                                            <p><small class="font-weight-bold">
                                            @php 
                                                $thoigianmua = new Carbon\Carbon($val->ngaymua,'Asia/Ho_Chi_Minh');
                                                $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                if($thoigianmua->diffInDays($now) != 0){
                                                    echo 'Đăng ký '.$thoigianmua->diffInDays($now).' ngày trước.';
                                                } else if($thoigianmua->diffInHours($now) != 0) {
                                                    echo 'Đăng ký '.$thoigianmua->diffInHours($now).' giờ trước';
                                                } else  if($thoigianmua->diffInMinutes($now) != 0){
                                                    echo 'Đăng ký '.$thoigianmua->diffInMinutes($now).' phút trước';
                                                } else if($thoigianmua->diffInSeconds($now) != 0){
                                                    echo 'Đăng ký '.$thoigianmua->diffInSeconds($now).' giây trước';
                                                }
                                            @endphp
                                            </small></p>
                                        </td>
                                        <td class="text-center">
                                            <button  class="btn btn-primary" data-toggle="modal" 
                                            data-target="{{'#detail-'.$val->id_donhang}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
                                            @if($val->trangthaidh == 2)
                                            <button  class="btn btn-outline-warning" data-toggle="modal" 
                                            data-target="{{'#apply-'.$val->id_donhang}}"><i class="fas fa-check"></i></button>
                                            <button  class="btn btn-danger" data-toggle="modal" 
                                            data-target="{{'#cancel-'.$val->id_donhang}}"><i class="fas fa-times"></i></button>
                                            @endif
                                        </td>
                                        <!--Modal Details-->
                                        <div class="modal fade" id="{{'detail-'.$val->id_donhang}}" style="z-index: 10000;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true" >
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết Đơn Hàng</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="row mt-2">
                                                        <div class="col-3"><h5>Mã đơn hàng: </h5></div>
                                                        <div class="col-3"><p>{{$val->id_donhang}}</p></div>
                                                        <div class="col-3"><h5>Ngày mua: </h5></div>
                                                        <div class="col-3"><p>{{date("d/m/Y", strtotime($val->ngaymua));}}</p></div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-3"><h5>Hình thức: </h5></div>
                                                        <div class="col-3">
                                                            <p>
                                                            @if($val->hinhthucthanhtoan == 1)
                                                                Cổng thanh toán online
                                                            @else
                                                                Chuyển khoản
                                                            @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-3"><h5>Trạng thái: </h5></div>
                                                        <div class="col-3">
                                                            <p>
                                                            @if($val->trangthaidh == 1)
                                                                Đã thanh toán
                                                            @elseif($val->trangthaidh == 2)
                                                                Chờ thanh toán
                                                            @elseif($val->trangthaidh == 0)
                                                                Bị hủy
                                                            @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-5 text-center"><h5>Dịch vụ</h5></div>
                                                        <div class="col-2 text-center"><h5>Giá</h5></div>
                                                        <div class="col-2 text-center"><h5>Số lượng</h5></div>
                                                        <div class="col-3 text-center"><h5>Thành tiền</h5></div>
                                                    </div>
                                                    <hr>
                                                    @php
                                                    $total = 0; 
                                                    @endphp
                                                    @foreach($listChiTietDH as $key_ct => $detail)
                                                        @if($detail->id_donhang == $val->id_donhang)
                                                        @php $total += $detail->thanhtien; @endphp
                                                        <div class="row mt-1">
                                                            <div class="col-5 text-left"><p>{{$detail->tendv}}</p></div>
                                                            <div class="col-2 text-center"><p>{{number_format($detail->giadv)}} đ</p></div>
                                                            <div class="col-2 text-center"><p>x{{$detail->soluong}}</p></div>
                                                            <div class="col-3 text-center"><p>{{number_format($detail->thanhtien)}} đ</p></div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <div class="row mt-2">
                                                        <div class="col-6 text-left"><h4>Tổng cộng:</h4></div>
                                                        <div class="col-6 text-right"><h4>{{number_format($total)}} đ</h4></div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal Apply-->
                                        <div class="modal fade" id="{{'apply-'.$val->id_donhang}}" style="z-index: 10000;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true" >
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-warning">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Thông báo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Xác nhận duyệt đăng ký dịch vụ đã được nhà tuyển dụng chuyển khoản.</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.apply_order')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id_donhang" value="{{$val->id_donhang}}" />
                                                            <button type="submit" class="btn btn-outline-warning">Xác nhận</button>
                                                        </form>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal Details-->
                                        <div class="modal fade" id="{{'cancel-'.$val->id_donhang}}" style="z-index: 10000;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true" >
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title text-light" id="exampleModalLabel">Thông báo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Xác nhận hủy đăng ký dịch vụ do nhà tuyển dụng chưa chuyển khoản hoặc chủ động báo hủy đơn</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.cancel_order')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id_donhang" value="{{$val->id_donhang}}" />
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


