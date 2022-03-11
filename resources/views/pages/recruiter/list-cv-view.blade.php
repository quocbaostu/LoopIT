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
        @include('layout.recruiter.sidebar-list-cv')
        <!-- End Side bar -->

        <div class="col-md-8 col-sm-12 col-12  ">
            <div class="row mt-2 sizeh1 " style="width:950px;">
              <div class="col-md-4 col-4 col-sm-4 col-sm-4 col-lg-4 col-xs-4">
                <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >CV ỨNG VIÊN ĐÃ XEM</h4>
              </div>
              <div class="col-md-5 col-5 col-sm-5 col-sm-5 col-lg-5 col-xs-5 ">
                <div id="msgSucc" class="alert alert-success"  role="alert">
                  {{Session::get('msg_success')}}
                </div>
              </div>
              
            </div>

            <div class="recuitment-form recuitment-inner">
              <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Danh sách cv ứng viên đã dùng điểm để xem
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
                                    <th width="2%">#</th>
                                    <th class="text-center">Tên Ứng Viên</th>
                                    <th width="20%" class="text-center">Tiêu đề CV</th>
                                    <th class="text-center" width="20%">Chức danh hiện tại</th>
                                    <th class="text-center">Trạng thái</th>
                                    @if($listCVDaXem != null)
                                    <th  class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @if($listCVDaXem != null)
                                @foreach($listCVDaXem as $key => $val)
                                <tr>
                                    <td class="text-center">
                                      @if($val->hinhdaidien != null)
                                      <img src="{{URL::asset('public/img/jobseeker/uploads/avt_cv/'.$val->hinhdaidien)}}" class="rounded-circle" width="50px" height="50px" alt="avatar-jobseeker-apply">
                                      @else
                                      <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="none-avatar-jobseeker-apply">
                                      @endif
                                    </td>
                                    <td>{{$val->ho}} {{$val->ten}}
                                        <p><small class="text-muted font-weight-lighter">{{$val->email}}</small></p>
                                        <p><small class="text-muted font-weight-lighter">{{$val->sdt}}</small></p>
                                    </td>
                                    <td class="text-center">{{$val->tieudecv}}</td>
                                    <td class="text-center">{{$val->chucdanhht}}</td>
                                    <td class="text-center">
                                        @if($val->trangthaicv == 1)
                                        <span class="bg-secondary radius-status">Đã bị ẩn</span>
                                        @elseif($val->trangthaicv == 0)
                                        <span class="bg-secondary radius-status">Đã bị ứng viên xóa</span>
                                        @elseif($val->trangthaicv != 0)
                                            @php 
                                                $thoigiancapnhat = new Carbon\Carbon($val->thoigiancapnhat,'Asia/Ho_Chi_Minh');
                                                $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                if($thoigiancapnhat->diffInDays($now) != 0){
                                                    echo 'Cập nhật '.$thoigiancapnhat->diffInDays($now).' ngày trước';
                                                } else if($thoigiancapnhat->diffInHours($now) != 0) {
                                                    echo 'Cập nhật '.$thoigiancapnhat->diffInHours($now).' giờ trước';
                                                } else  if($thoigiancapnhat->diffInMinutes($now) != 0){
                                                    echo 'Cập nhật '.$thoigiancapnhat->diffInMinutes($now).' phút trước';
                                                } else if($thoigiancapnhat->diffInSeconds($now) != 0){
                                                    echo 'Cập nhật '.$thoigiancapnhat->diffInSeconds($now).' giây trước';
                                                }
                                            @endphp
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($val->trangthaicv == 1 || $val->trangthaicv == 0)
                                        <button data-toggle="modal" data-target="{{'#del-'.$val->id_CVdaluu}}"
                                        class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        @elseif($val->trangthaicv != 0)
                                        <a class="btn btn-primary" href="{{route('recruiter.detail_cv_search', ['id_cv' => $val->id_cv ])}}"><i class="fa fa-list-ul" aria-hidden="true"></i></a> 
                                        <button data-toggle="modal" data-target="{{'#del-'.$val->id_CVdaluu}}"
                                        class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        @endif
                                    </td> 
                                    <!--Modal Delete-->
                                    <div class="modal fade" id="{{'del-'.$val->id_CVdaluu}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                  <h4 class="text-center font-weight-light">Bạn thật sự muốn xóa cv đã dùng điểm để xem này?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('recruiter.remove_save_jobseeker_cv', ['id_cv' => $val->id_cv ])}}" class="btn btn-outline-danger">Xác nhận</a>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @if($listCVDaXem == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có CV đã dùng điểm để xem nào</strong></h5></td>
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
<!-- Alert Success-->
@if(session('msg_success'))
<script type="text/javascript">
  $('#msgSucc').show()
  setTimeout(function() {
    $("#msgSucc").fadeTo(700, 200).slideUp(200, function(){
        $("#msgSucc").fadeOut();
    });
  }, 700);
</script>
@endif

@endsection




