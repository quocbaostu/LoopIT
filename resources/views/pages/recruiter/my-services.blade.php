@extends('layout.recruiter.main')
@section('recruiter_content')

<!-- widget recuitment  -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ads-above">
         <!-- Thông báo ở đây-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) widget recuitment  -->

<!-- published recuitment -->
<div class="published-recuitment-wrapper1">
  <div class="container published-recuitment-content">
    <div class="row">

        <!-- Side bar -->
        @include('layout.recruiter.sidebar-service')
        <!-- End Side bar -->

        <div class="col-md-8 col-sm-12 col-12  ">
            <div class="row mt-2 sizeh1 " style="width:950px;">
              <div class="col-md-5 col-5 col-sm-5 col-sm-5 col-lg-5 col-xs-5">
                <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ DỊCH VỤ </h4>
              </div>
              <div class="col-md-4 col-4 col-sm-4 col-sm-4 col-lg-4 col-xs-4">
                <div id="alertSuc" class="alert alert-success"  role="alert">
                  {{Session::get('alertSuc')}}
                </div>
                <div id="alertErr" class="alert alert-danger"  role="alert">
                  {{Session::get('alertErr')}}
                </div>
              </div>
              <div class="col-md-3 col-3 col-sm-3 col-sm-3 col-lg-3 col-xs-3">
                <a class="btn btn-success float-right" href="{{route('recruiter.list_services')}}" style="width:180px; height:40px; ">Đăng Ký Dịch Vụ Mới</a> 
              </div>
            </div>

            <div class="recuitment-form recuitment-inner">
              <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Dịch vụ của tôi
                        <span id="clickc1_advance1" class="clicksd">
                            <i class="fa fa fa-angle-up"></i>
                        </span>
                        </a>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body recuitment-body">
                        <div class="row mb-3">
                          <div class="col-4">
                            <h5 class="font-weight-light">Điểm Tìm Kiếm Hồ Sơ Ứng Viên: </h5>
                          </div>
                          <div class="col-8">
                            <p>{{$taiKhoanNTD->diem_tkuv}} điểm</p>
                          </div>
                        </div>
                        <hr>
                        <table class="table table-hover" id="tblDV">
                            <thead class="table-success">
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="30%">Tên Dịch Vụ</th>
                                    <th class="text-right">Ngày Hết Hạn</th>
                                    <th class="text-center">Loại Dịch Vụ</th>
                                    <th class="text-right">Trạng thái</th>
                                    @if($exist_DVdaDK != null)
                                    <th width="auto" class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                              @php $stt=1; @endphp
                              @if($exist_DVdaDK != null)
                              @foreach($dv_dadangky as $key => $val)  
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{$val->tendv}}</td>
                                    <td class="text-right">
                                      @if($val->ngayhethan == 0) 
                                      Không thời hạn
                                      @else
                                      {{date("d/m/Y", strtotime($val->ngayhethan));}}
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      @if($val->loaidv == 1)
                                      Đăng tuyển
                                      @elseif($val->loaidv == 2)
                                      Tìm kiếm hồ sơ
                                      @else
                                      Hỗ trợ hiển thị
                                      @endif
                                    </td>
                                    <td class="text-right">
                                      @if($val->trangthai_dvdadk == 0 && $val->ngayhethan !=0)
                                      <span class="bg-secondary radius-status">Hết hạn</span>
                                      @elseif($val->ngayhethan == 0)
                                      <span class="bg-primary radius-status">Không thời hạn</span>
                                      @elseif($val->trangthai_dvdadk == 1 && $val->ngayhethan !=0)
                                        @php
                                        $ngayhethan = new Carbon\Carbon($val->ngayhethan,'Asia/Ho_Chi_Minh');
                                        $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                        $total_Expired = $ngayhethan->diffInDays($now) + 1;
                                        @endphp
                                        <span class="bg-success radius-status">Còn {{$total_Expired}} Ngày</span>
                                      @endif
                                    </td>
                                    <td>
                                      <button  class="btn btn-primary" data-toggle="modal" data-target="{{'#detail-'.$val->id_dvdadk}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
                                      <button  class="btn btn-danger" data-toggle="modal" data-target="{{'#del-'.$val->id_dvdadk}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                     <!--Modal Details-->
                                    <div class="modal fade" id="{{'detail-'.$val->id_dvdadk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết Dịch Vụ</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Dịch vụ:</h5></div>
                                                    <div class="col-8"><p>{{$val->tendv}}.</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Giá:</h5></div>
                                                    <div class="col-8"><p>{{number_format($val->giadv)}} đ</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Ngày đăng ký:</h5></div>
                                                    <div class="col-8"><p>{{date("d/m/Y", strtotime($val->ngaydangky));}}</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Ngày hết hạn:</h5></div>
                                                    <div class="col-8"><p>@if($val->ngayhethan == 0) 
                                                                          Không thời hạn
                                                                          @else
                                                                          {{date("d/m/Y", strtotime($val->ngayhethan));}}
                                                                          @endif</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Loại:</h5></div>
                                                    <div class="col-8"><p>@if($val->loaidv == 1)
                                                                  Đăng tuyển
                                                                  @elseif($val->loaidv == 2)
                                                                  Tìm kiếm hồ sơ
                                                                  @else
                                                                  Hỗ trợ hiển thị
                                                                  @endif</p></div>
                                                  </div>
                                                  @if($val->diemtk != 0)
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Điểm tìm kiếm:</h5></div>
                                                    <div class="col-8"><p>{{$val->diemtk}} điểm</p></div>
                                                  </div>
                                                  @endif
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Trạng thái:</h5></div>
                                                    <div class="col-8"><p>
                                                      @if($val->trangthai_dvdadk == 0 && $val->ngayhethan !=0)
                                                      Hết hạn
                                                      @elseif($val->ngayhethan == 0)
                                                      Không thời hạn
                                                      @elseif($val->trangthai_dvdadk == 1 && $val->ngayhethan !=0)
                                                        @php
                                                        $ngayhethan = new Carbon\Carbon($val->ngayhethan,'Asia/Ho_Chi_Minh');
                                                        $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                        $total_Expired = $ngayhethan->diffInDays($now) + 1;
                                                        echo 'Còn '.$total_Expired.' Ngày';
                                                        
                                                        @endphp
                                                      @endif
                                                    </p></div>
                                                  </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Delete-->
                                    <div class="modal fade" id="{{'del-'.$val->id_dvdadk}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="row mt-4">
                                                    <div class="col-12"><h5>Bạn có muốn xóa dịch vụ đã đăng ký này ?</h5></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Dịch vụ:</h5></div>
                                                    <div class="col-8"><p>{{$val->tendv}}.</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Giá:</h5></div>
                                                    <div class="col-8"><p>{{number_format($val->giadv)}} đ</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Ngày đăng ký:</h5></div>
                                                    <div class="col-8"><p>{{date("d/m/Y", strtotime($val->ngaydangky));}}</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Ngày hết hạn:</h5></div>
                                                    <div class="col-8"><p>@if($val->ngayhethan == 0) 
                                                                          Không thời hạn
                                                                          @else
                                                                          {{date("d/m/Y", strtotime($val->ngayhethan));}}
                                                                          @endif</p></div>
                                                  </div>
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Loại:</h5></div>
                                                    <div class="col-8"><p>@if($val->loaidv == 1)
                                                                  Đăng tuyển
                                                                  @elseif($val->loaidv == 2)
                                                                  Tìm kiếm hồ sơ
                                                                  @else
                                                                  Hỡ trợ hiển thị
                                                                  @endif</p></div>
                                                  </div>
                                                  @if($val->diemtk != 0)
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Điểm tìm kiếm:</h5></div>
                                                    <div class="col-8"><p>{{$val->diemtk}} điểm</p></div>
                                                  </div>
                                                  @endif
                                                  <div class="row mt-4">
                                                    <div class="col-4"><h5>Trạng thái:</h5></div>
                                                    <div class="col-8"><p>
                                                      @if($val->trangthai_dvdadk == 0 && $val->ngayhethan !=0)
                                                      Hết hạn
                                                      @elseif($val->ngayhethan == 0)
                                                      Không thời hạn
                                                      @elseif($val->trangthai_dvdadk == 1 && $val->ngayhethan !=0)
                                                        @php
                                                          $ngayhethan = new Carbon\Carbon($val->ngayhethan,'Asia/Ho_Chi_Minh');
                                                          $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                          $total_Expired = $ngayhethan->diffInDays($now) + 1;
                                                          echo 'Còn '.$total_Expired.' Ngày';
                                                        @endphp
                                                      @endif
                                                    </p></div>
                                                  </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  <a href="{{route('recruiter.delete_services', ['id_dvdadk' => $val->id_dvdadk ])}}" class="btn btn-primary" >Xác nhận</a>
                                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                              @endforeach
                            </tbody>
                            @endif
                            @if($exist_DVdaDK == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Bạn chưa đăng ký dịch vụ nào.</strong></h5></td>
                              </tr>
                            </tfoot>
                            @endif
                        </table>
                      </div>
                    </div>
                </div>               
              </div> 
            </div>
      </div>
      
    </div>
  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix"></div>

<!-- job support -->
<div class="container-fluid job-support-wrapper">
 <div class="container-fluid job-support-wrap">
  <div class="container job-support">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-12">
        <ul class="spp-list">
          <li>
            <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
          </li>
          <li>
            <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-12 col-12">
        <div class="newsletter">
            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
            <div class="input-group frm1">
              <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
              <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- (end) job support -->

@if(session('alertSuc'))
  <script type="text/javascript">
    $('#alertSuc').show()
    setTimeout(function() {
      $("#alertSuc").fadeTo(1000, 300).slideUp(300, function(){
          $("#alertSuc").fadeOut();
      });
    }, 1000);
  </script>
@endif
@if(session('alertErr'))
  <script type="text/javascript">
    $('#alertErr').show()
    setTimeout(function() {
      $("#alertErr").fadeTo(1000, 300).slideUp(300, function(){
          $("#alertErr").fadeOut();
      });
    }, 1000);
  </script>
@endif

@endsection




