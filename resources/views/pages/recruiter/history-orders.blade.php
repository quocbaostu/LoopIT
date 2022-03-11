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
            </div>

            <div class="recuitment-form recuitment-inner">
              <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Lịch sử đơn hàng
                        <span id="clickc1_advance1" class="clicksd">
                            <i class="fa fa fa-angle-up"></i>
                        </span>
                        </a>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body recuitment-body">
                          <table class="table table-hover" id="tblDV">
                            <thead class="table-success">
                                <tr>
                                    <th width="5%">STT</th>
                                    <th class="text-center">Ngày Mua Dịch vụ</th>
                                    <th class="text-center">Hình Thức Thanh Toán</th>
                                    <th class="text-center">Trạng thái</th>
                                    @if($exist_DH != null)
                                    <th width="auto" class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                              @php $stt=1; @endphp
                              @if($exist_DH != null)
                              @foreach($listDH as $key => $val)  
                                <tr>
                                    <td class="text-center">{{$stt++}}</td>
                                    <td class="text-center">{{date("d/m/Y", strtotime($val->ngaymua));}}</td>
                                    <td class="text-center">
                                      @if($val->hinhthucthanhtoan == 1)
                                        Cổng thanh toán online
                                      @else
                                        Chuyển khoản
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      @if($val->trangthaidh == 1)
                                        <span class="bg-success radius-status">Đã thanh toán</span>
                                      @elseif($val->trangthaidh == 2)
                                        <span class="bg-warning radius-status">Chờ thanh toán</span>
                                      @elseif($val->trangthaidh == 0)
                                        <span class="bg-danger radius-status">Bị hủy</span>
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      <button  class="btn btn-primary" data-toggle="modal" data-target="{{'#detail-'.$val->id_donhang}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
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
                                                  @php $total = 0; @endphp
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
                                </tr>
                              @endforeach
                            </tbody>
                            @endif
                            @if($exist_DH == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Bạn chưa có đơn hàng nào.</strong></h5></td>
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




