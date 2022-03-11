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
        @include('layout.recruiter.sidebar-recruitment')
        <!-- End Side bar -->

        <div class="col-md-8 col-sm-12 col-12  ">
            <div class="row mt-2 sizeh1 " style="width:950px;">
              <div class="col-md-4 col-4 col-sm-4 col-sm-4 col-lg-4 col-xs-4">
                <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ ĐĂNG TUYỂN</h4>
              </div>
              <div class="col-md-5 col-5 col-sm-5 col-sm-5 col-lg-5 col-xs-5 ">
                <div id="msgSucc" class="alert alert-success"  role="alert">
                  {{Session::get('msg_success')}}
                </div>
                @if(session('msg_error'))
                <div  class="alert alert-danger"  role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h5 class="text-center">{{Session::get('mess_h5')}}</h5>
                  <hr>
                  <p>{{Session::get('mess_p1')}}</p>
                  <p class="mt-1">Đăng ký dịch vụ cao cấp hơn <a href="{{route('recruiter.list_services')}}"> tại đây</a></p>
                </div>
                @elseif(session('msg_error1'))
                <div  class="alert alert-danger"  role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h5 class="text-center">{{Session::get('mess_h5')}}</h5>
                  <hr>
                  <p>{{Session::get('mess_p1')}}</p>
                  <p class="mt-1">Xin cập nhật hồ sơ công ty <a href="{{route('recruiter.company_info')}}"> tại đây</a></p>
                </div>
                @endif
                @error('ngayhethan')
                <div class="alert alert-danger form-control-user" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  {{$message}}
                </div>
                @enderror
              </div>
              
            </div>

            <div class="recuitment-form recuitment-inner">
              <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Danh sách ứng viên ứng tuyển
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
                                    <th width="20%" class="text-center">Tên Công Việc</th>
                                    <th class="text-center">Thời gian gửi</th>
                                    <th class="text-center">Trạng thái</th>
                                    @if($listJobseekerApply != null)
                                    <th  class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                
                            @if($listJobseekerApply != null)
                                @foreach($listJobseekerApply as $key => $val)
                                <tr>
                                    <td class="text-center">
                                      @if($val->hinhanh != null)
                                      <img src="{{URL::asset('public/img/jobseeker/uploads/'.$val->hinhanh)}}" class="rounded-circle" width="50px" height="50px" alt="avatar-jobseeker-apply">
                                      @else
                                      <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="none-avatar-jobseeker-apply">
                                      @endif
                                    </td>
                                    <td>{{$val->ho}} {{$val->ten}}</td>
                                    <td class="text-center" style="overflow: hidden;">{{$val->tencongviec}}</td>
                                    <td class="text-center">
                                        @php 
                                            $thoigiannop = new Carbon\Carbon($val->thoigiannop,'Asia/Ho_Chi_Minh');
                                            $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            if($thoigiannop->diffInDays($now) != 0){
                                                echo $thoigiannop->diffInDays($now).' ngày trước';
                                            } else if($thoigiannop->diffInHours($now) != 0) {
                                                echo $thoigiannop->diffInHours($now).' giờ trước';
                                            } else  if($thoigiannop->diffInMinutes($now) != 0){
                                                echo $thoigiannop->diffInMinutes($now).' phút trước';
                                            } else if($thoigiannop->diffInSeconds($now) != 0){
                                                echo $thoigiannop->diffInSeconds($now).' giây trước';
                                            }
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                      @if($val->trangthai_danhgia == 0)
                                      <span class="bg-danger radius-status">Từ chối</span>
                                      @elseif($val->trangthai_danhgia == 1)
                                      <span class="bg-secondary radius-status">Hồ sơ mới tiếp nhận</span>
                                      @elseif($val->trangthai_danhgia == 2)
                                      <span class="bg-primary radius-status">Đã tiếp nhận hồ sơ và xem xét sau</span>
                                      @elseif($val->trangthai_danhgia == 3)
                                      <span class="bg-warning radius-status">Hẹn phỏng vấn</span>
                                      @elseif($val->trangthai_danhgia == 4)
                                      <span class="bg-success radius-status">Nhận việc</span>
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      <a  class="btn btn-primary" href="{{route('recruiter.detail_cv_jobseeker',['id_uv' => $val->id_uv ,'id_cv' => $val->id_cv,'id_CVdaut' => $val->id_CVdaut])}}"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @if($listJobseekerApply == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có ứng viên nào ứng tuyển tin tuyển dụng của bạn</strong></h5></td>
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




