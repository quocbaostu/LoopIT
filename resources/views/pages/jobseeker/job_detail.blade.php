@extends('layout.jobseeker.main')
@section('content')

<div class="clearfix"></div>

<!-- job detail header -->
<div class="container-fluid job-detail-wrap">
    <div class="container job-detail" >
      <div class="job-detail-header">
        <div class="row">
          <div class="col-md-2 col-sm-12 col-12">
            <div class="job-detail-header-logo">
              <a href="#">
                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tintd->logo)}}" class="job-logo-ima" alt="job-logo">
              </a>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-12">
            <div class="job-detail-header-desc">
                <div class="job-detail-header-title">
                    <a>{{$tintd->tencongviec}}</a>
                </div>
                <div class="job-detail-header-company">
                    <a href="{{route('recruiter_detail', ['id_hosontd'=>$tintd->id_hosontd])}}">{{$tintd->tencty}}</a>
                </div>
                <div class="job-detail-header-de">
                    <ul>
                      <li><i class="fa fa-map-marker icn-jd"></i><span style="font-weight:bold">Khu vực: </span><span>{{$tintd->thanhpho}}</span></li>
                      <li><i class="fa fa-usd icn-jd"></i><span style="font-weight:bold">Mức lương: </span><span>{{$tintd->mucluong_toithieu}}$ - {{$tintd->mucluong_toida}}</span></li>
                      <li><i class="fa fa-calendar icn-jd"></i><span style="font-weight:bold">Hạn nộp: </span><span>{{$tintd->ngayhethan}}</span></li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-12">
            <div class="jd-header-wrap-right">
              <div class="jd-center">
                    @if (Session::get('js_id') == null)
                        <a href="#" class="btn btn-apply" data-toggle="modal" data-target="#loginReq">
                            <i class="fa fa-send" aria-hidden="true"></i>
                            <span>NỘP ĐƠN</span>
                        </a>
                        <a href="#" class="btn btn-save" data-toggle="modal" data-target="#loginReq">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <span>LƯU NGAY</span>
                        </a>
                        <a href="#" class="btn btn-report" data-toggle="modal" data-target="#loginReq">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <span>BÁO CÁO</span>
                        </a>
                    @elseif(Session::get('js_id') != null)
                        @if($check_apply == 1)
                        <a class="btn btn-primary btn-apply">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span>ĐÃ NỘP</span>
                        </a>
                        @else
                        <a href="#" class="btn btn-primary btn-apply" data-toggle="modal" data-target="#send-cv">
                            <i class="fa fa-send" aria-hidden="true"></i>
                            <span>NỘP ĐƠN</span>
                        </a>
                        @endif

                        @if (isset($check_save))
                        <a href="{{route('js_getunsavejob', ['id_tintd'=>$tintd->id_tintd])}}" class="btn btn-saved" style="color: #f62424;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <span>ĐÃ LƯU </span>
                        </a>
                        @else
                        <a href="{{route('js_savejob', ['id_tintd'=>$tintd->id_tintd])}}" class="btn btn-save">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <span>LƯU NGAY</span>
                        </a>
                        @endif

                        <a href="#" class="btn btn-report" data-toggle="modal" data-target="#report-send">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <span>BÁO CÁO</span>
                        </a>
                    @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- (end) job detail header -->

<div class="clearfix"></div>

<!-- Phần thân -->
<div class="wrapper">
<div class="container">
    <div class="row">
        <!-- Main wrapper -->
        <div class="col-md-8 col-sm-12 col-12 clear-left">
            <div class="main-wrapper" >
                <h2 class="widget-title">
                    <i class="fa fa-gift" aria-hidden="true" ></i>
                    <span>Phúc lợi</span>
                </h2>
                <hr>
                <div class="jd-content">
                    {!! $tintd->quyenloi !!}
                </div>
                <div style="height: 30px"></div>
                <h2 class="widget-title">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>Mô tả công việc</span>
                </h2>
                <hr>
                <div class="jd-content">
                    {!! $tintd->motacongviec !!}
                </div>
                <div style="height: 30px"></div>
                <h2 class="widget-title">
                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <span>Yêu cầu công việc</span>
                </h2>
                <hr>
                <div class="jd-content">
                    {!! $tintd->yeucaucongviec !!}
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4 col-sm-12 col-12 clear-right">
            <div class="side-bar mb-3" >
                <h2 class="widget-title">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span>Thông tin thêm</span>
                </h2>
                <hr>
                <div class="job-info-wrap">
                    <div class="job-info-list">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="ji-title">Địa điểm làm việc:</span>
                            </div>
                            <div class="col-sm-6">
                            <span class="ji-main">{{$tintd->diadiemlamviec}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-info-list">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="ji-title">Cấp bậc:</span>
                            </div>
                            <div class="col-sm-6">
                            <span class="ji-main">{{$tintd->capbac}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-info-list">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="ji-title">Loại công việc:</span>
                            </div>
                            <div class="col-sm-6">
                            <span class="ji-main">{{$tintd->loaicongviec}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-info-list">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="ji-title">Trình độ yêu cầu:</span>
                            </div>
                            <div class="col-sm-6">
                            <span class="ji-main">{{$tintd->trinhdo}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="job-info-list">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="ji-title">Kinh nghiệm yêu cầu:</span>
                            </div>
                            <div class="col-sm-6">
                            <span class="ji-main">{{$tintd->kinhnghiem}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="side-bar mb-3" >
                <h2 class="widget-title">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span>NGÀNH NGHỀ</span>
                </h2>
                <hr>
                <div class="job-info-wrap">
                    {{$tintd->nganhnghe}}
                </div>
            </div>

            <div class="side-bar mb-3" >
                <h2 class="widget-title">
                    <i class="fa fa-building aria-hidden="true"></i>
                    <span>Giới thiệu công ty</span>
                </h2>
                <hr>
                <div class="company-intro">
                    <a href="#">
                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tintd->logo)}}" class="job-logo-ima" alt="job-logo">
                    </a>
                </div>
                <h2 class="company-intro-name">{{$tintd->tencty}}</h2>
                <ul class="job-add">
                <li>
                    <i class="fa fa-map-marker ja-icn"></i>
                    <span>Trụ sở: {{$tintd->diachicty}} - {{$tintd->tpcty}} </span>
                </li>
                <li>
                    <i class="fa fa-bar-chart ja-icn"></i>
                    <span>{{$tintd->quymo}}</span>
                </li>
                </ul>

                <div class="wrap-comp-info mb-2">
                <a href="{{route('recruiter_detail', ['id_hosontd'=>$tintd->id_hosontd])}}" class="btn btn-primary btn-company">Xem thêm</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- (end) Phần thân -->


{{-- Modal Login Require --}}
<div class="modal fade" id="loginReq" tabindex="-1" role="dialog" style="z-index: 10000">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-err">
          <h5 class="modal-title">CHỨC NĂNG KHÔNG KHẢ DỤNG</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Bạn cần
            <span style="font-weight: bold">"Đăng nhập"</span>
            Hoặc
            <span style="font-weight: bold">Đăng ký</span>
            để có thể sử dụng chức năng này!
            <div class="mt-3" style="text-align: center">
                <a href="{{route('js_getLogin')}}" class="btn btn-login-req" style="background-color: #6995f3; color: #fff">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Đến trang Đăng Nhập
                </a>
            </div>
            <div class="mt-3" style="text-align: center">
                <a href="{{route('js_getSignup')}}" class="btn btn-login-req" style="background-color: #5deb58; color: #fff">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Đến trang Đăng Ký
                </a>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #aaaaaaa6; color: #fff">Đóng</button>
        </div>
      </div>
    </div>
</div>

{{-- Modal Send Report --}}
<div class="modal fade" id="report-send" tabindex="-1" role="dialog" style="z-index: 10000">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <h5 class="modal-title">BÁO CÁO CÔNG VIỆC NÀY</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if (Session::get('errreport') != null)
            <div class="alert alert-danger" role="alert">
                Yêu cầu bổ xung nội dung chi tiết cho phiếu báo cáo.
            </div>
            @endif
            <form method="POST" action="{{route('js_postsendreport', ['id_tintd'=>$tintd->id_tintd])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <span style="font-weight: bold">Quản Trị Viên</span>
                sẽ tiếp nhận phản hồi của bạn về công việc này. Bạn hãy bổ sung chi tiết báo cáo của mình bên dưới:
                <div class="custom-control custom-checkbox mt-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="baocao[]" value="Tin tuyển dụng chứa các nội dung công kích hoặc phân biệt đối xử">
                    <label class="custom-control-label" for="customCheck" style="font-size: 15px; padding-top:3px">
                        Tin tuyển dụng chứa các nội dung công kích hoặc phân biệt đối xử
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="baocao[]" value="Tin tuyển dụng chứa các nội dung đả kích chính trị, văn hoá">
                    <label class="custom-control-label" for="customCheck2" style="font-size: 15px; padding-top:3px">
                        Tin tuyển dụng chứa các nội dung đả kích chính trị, văn hoá
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="baocao[]" value="Tin tuyển dụng giả mạo, lừa đảo hoặc không chính xác">
                    <label class="custom-control-label" for="customCheck3" style="font-size: 15px; padding-top:3px">
                        Tin tuyển dụng giả mạo, lừa đảo hoặc không chính xác
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="khac" value="Khác">
                    <label class="custom-control-label" for="customCheck4" style="font-size: 15px; padding-top:3px">
                        Khác
                    </label>
                </div>
                <label class="mt-4">Mô tả thêm:</label>
                <textarea  style="width: 100%" class="form-control" name="motathem" id="motathem" cols="30" rows="10" value="{{old('mota')}}" disabled>
                </textarea>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #aaaaaaa6; color: #fff">Đóng</button>
                    <button type="submit" class="btn btn-danger">Gửi</button>
                 </div>
            </form>
        </div>

      </div>
    </div>
</div>

@if (Session::get('js_id'))
{{-- Modal Send CV--}}
<div class="modal fade" id="send-cv" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">NỘP CV ỨNG TUYỂN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postsendcv', ['id_tintd'=>$tintd->id_tintd])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    {{-- Yêu cầu thông tin chung --}}
                    @if ($check_profile->ngaysinh != null)
                    <div class="row">
                        <div class="alert alert-success" role="alert" style="width: 100%">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            <strong>"Thông tin chung"</strong> đã được cập nhật! Bạn có thể Nộp CV Ứng tuyển ngay bây giờ!
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="alert alert-danger" role="alert" style="width: 100%;">
                            Bạn cần cập nhật <strong>"Thông tin chung"</strong> tại
                            <span style="font-style: italic">Quản Lý Hồ Sơ</span>
                            để tiếp tục Nộp CV Ứng tuyển!
                            <a class="btn btn-danger ml-2" href="{{route('js_editprofile')}}">
                                Đến cập nhật
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    @endif

                    {{--Upload New CV File --}}
                    <div class="row">
                        <div class="form-group">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="RadioSendCV" value="0">
                            <h6 style="display:inline">CHỌN NỘP FILE CV MỚI</h6>
                        </div>
                        <div class="form-group" style="width :100%; display:none" id="upfilecv">
                            <input name="filecv" id="filecv" type="file" class="file" accept=".pdf, .doc, .docx">
                            <small style="font-style: italic;">Vui lòng chọn định dạng file *pdf, *doc, *docx</small>
                            <div class="edit-vali-error">
                                @foreach ($errors->get('filecv') as $message)
                                    <div class="error">{{$message}}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group" style="width :100%;" id="upfilecv2">
                            <input disabled id="filecv2" type="file" class="file" accept=".pdf, .doc, .docx">
                            <small style="font-style: italic;">Vui lòng chọn định dạng file *pdf, *doc, *docx</small>
                        </div>
                    </div>
                    {{-- Select CV File --}}
                    @if (count($cvfile) > 0)
                    <div class="row mb-1">
                        <div class="form-group">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="RadioSendCV2" value="1">
                            <h6 style="display:inline">CHỌN NỘP FILE CV ĐÃ LƯU TRỮ</h6>
                        </div>
                        <div class="form-group" style="width: 100%">
                            <select disabled id="selectCVFile" name="selectCVFile" class="form-control">
                              <option value="0" selected>Chọn file CV của bạn</option>
                              @foreach ($cvfile as $cv)
                              <option value="{{$cv->id_cv}}">{{$cv->tenfile}}</option>
                              @endforeach
                            </select>
                            <div class="edit-vali-error">
                                @foreach ($errors->get('selectCVFile') as $message)
                                    <div class="error">{{$message}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row mb-1">
                        <div class="form-group">
                            <input disabled class="form-check-input" type="radio">
                            <h6 style="display:inline">CHỌN NỘP FILE CV ĐÃ LƯU TRỮ</h6>
                        </div>
                        <div class="form-group" style="width: 100%; color:#f62424">
                            Bạn chưa lưu trữ File CV nào!
                        </div>
                    </div>
                    @endif


                    <hr style="border-top:solid 1px #147259" class="mb-4">

                    {{-- CV Onl --}}
                    @if (count($cvonl) > 0)
                    <div class="row">
                        <div class="form-group" style="width: 100%">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="RadioSendCV3" value="2">
                            <h6 style="display:inline">CHỌN NỘP CV ONLINE ĐÃ TẠO</h6>
                        </div>
                        <div class="form-group" style="width: 100%">
                            <select disabled id="selectCVOnl" name="selectCVOnl" class="form-control">
                              <option value="0" selected>Chọn CV của bạn</option>
                              @foreach ($cvonl as $cv)
                              <option value="{{$cv->id_cv}}">{{$cv->tieudecv}}</option>
                              @endforeach
                            </select>
                            <div class="edit-vali-error">
                                @foreach ($errors->get('selectCVOnl') as $message)
                                    <div class="error">{{$message}}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{route('js_getcvonlmanage')}}" style="color: #147259; font-size:15px;">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo CV Online Mới
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="form-group" style="width: 100%">
                            <input disabled class="form-check-input" type="radio">
                            <h6 style="display:inline">CHỌN NỘP CV ONLINE ĐÃ TẠO</h6>
                        </div>
                        <div class="form-group" style="width: 100%; color:#f62424">
                            Bạn chưa có CV Online nào!
                            <a class="btn btn-success ml-2" href="{{route('js_getcvonlmanage')}}" >
                                Tạo CV Online ngay
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="btn-edit mt-4">
                    <button disabled type="submit" class="btn button-save" id="btnSendCV">Nộp đơn</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>
@endif

<!-- Modal Apply Success-->
<div class="modal fade" id="apply-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            NỘP CV ỨNG TUYỂN THÀNH CÔNG!
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
             <h6>NHÀ TUYỂN DỤNG SẼ NHẬN ĐƯỢC HỒ SƠ CV VÀ PHẢN HỒI CHO BẠN SỚM NHẤT</h6>
             <hr>
             Đến quản lý Công việc đã Ứng tuyển <br>
             <a style="width: 100%" href="{{route('js_jobmana')}}" class="btn btn-primary mt-2">
                <i class="fa fa-suitcase" aria-hidden="true"></i>
                Công việc của tôi
            </a>
            <hr>
            Đến quản lý CV<br>
            <a style="width: 100%" href="{{route('js_getcvmanage')}}" class="btn btn-info mt-2">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                Quản lý CV
           </a>
            <hr>
            Tìm kiếm thêm các công viêc khác<br>
            <a style="width: 100%" href="{{route('job_search')}}" class="btn btn-warning mt-2">
                <i class="fa fa-search" aria-hidden="true"></i>
                Tìm kiếm công việc
           </a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal Reported job-->
<div class="modal fade" id="reported-job" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            Đã gửi báo cáo thành công.
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
             <h6 style="text-align: center">HỆ THỐNG ĐÃ GHI NHẬN BÁO CÁO VÀ SẼ GỬI ĐẾN QUẢN TRỊ VIÊN TRONG THỜI GIAN SỚM NHẤT</h6>
             <h5 style="text-align: center" class="mt-3">CẢM ƠN SỰ HỖ TRỢ CỦA BẠN!</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>




<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
{{------ Script Login Require ------}}
@if(Session::pull('loginReq'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#loginReq").modal('show');
    });
</script>
@endif
{{-- Validate Upload New File CV --}}
@if(Session::pull('errupfile'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#send-cv").modal('show');
        $('#RadioSendCV').click();
    });
</script>
@endif
{{-- Validate Select File CV --}}
@if(Session::pull('errsendcvfile'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#send-cv").modal('show');
        $('#RadioSendCV2').click();
    });
</script>
@endif
{{-- Validate Select CV Onl --}}
@if(Session::pull('errsendcvfile'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#send-cv").modal('show');
        $('#RadioSendCV3').click();
    });
</script>
@endif
{{-- Validate Report job --}}
@if (Session::get('errreport') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#report-send").modal('show');
    });
</script>
@endif


{{-- Modal Apply Success --}}
@if(Session::pull('applysuccess'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#apply-success").modal('show');
    });
</script>
@endif
{{-- Reported job --}}
@if(Session::pull('reported'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#reported-job").modal('show');
    });
</script>
@endif


{{------ Script Toggle ------}}
<link href="{{ URL::asset('public/jQueryPlugin/jQuery-Toggle/css/switcher.css')}}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
</script>
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Toggle/js/jquery.switcher.js')}}"></script>
<script>
    $.switcher('input[type=radio]');
</script>



{{---- Script Send CV Modal (Profile updated) ----}}
@if ($check_profile->ngaysinh != null)
    @if (count($cvonl) == 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker2 = document.getElementById('RadioSendCV2');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVFile = document.getElementById('selectCVFile');
        var btnSendCV = document.getElementById('btnSendCV');
        checker.onchange = function() {
            btnSendCV.disabled = false;
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVFile.disabled = true;
        };
        checker2.onchange = function() {
            btnSendCV.disabled = false;
            selectCVFile.disabled = false;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @elseif (count($cvfile) == 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker3 = document.getElementById('RadioSendCV3');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVOnl= document.getElementById('selectCVOnl');
        var btnSendCV = document.getElementById('btnSendCV');
        checker.onchange = function() {
            btnSendCV.disabled = false;
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVOnl.disabled = true;
        };
        checker3.onchange = function() {
            btnSendCV.disabled = false;
            selectCVOnl.disabled = false;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @elseif (count($cvfile) > 0 && count($cvonl) > 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker2 = document.getElementById('RadioSendCV2');
        var checker3 = document.getElementById('RadioSendCV3');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVOnl= document.getElementById('selectCVOnl');
        var selectCVFile= document.getElementById('selectCVFile');
        var btnSendCV = document.getElementById('btnSendCV');
        checker.onchange = function() {
            btnSendCV.disabled = false;
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVFile.disabled = true;
            selectCVOnl.disabled = true;
        };
        checker2.onchange = function() {
            btnSendCV.disabled = false;
            selectCVFile.disabled = false;
            selectCVOnl.disabled = true;
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
        };
        checker3.onchange = function() {
            btnSendCV.disabled = false;
            selectCVOnl.disabled = false;
            selectCVFile.disabled = true;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @endif
@endif



{{---- Script Send CV Modal (Profile non update) ----}}
@if ($check_profile->ngaysinh == null)
    @if (count($cvonl) == 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker2 = document.getElementById('RadioSendCV2');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVFile = document.getElementById('selectCVFile');
        checker.onchange = function() {
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVFile.disabled = true;
        };
        checker2.onchange = function() {
            selectCVFile.disabled = false;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @elseif (count($cvfile) == 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker3 = document.getElementById('RadioSendCV3');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVOnl= document.getElementById('selectCVOnl');
        checker.onchange = function() {
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVOnl.disabled = true;
        };
        checker3.onchange = function() {
            selectCVOnl.disabled = false;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @elseif (count($cvfile) > 0 && count($cvonl) > 0)
    <script>
        var checker = document.getElementById('RadioSendCV');
        var checker2 = document.getElementById('RadioSendCV2');
        var checker3 = document.getElementById('RadioSendCV3');
        var upfilecv = document.getElementById('upfilecv');
        var upfilecv2 = document.getElementById('upfilecv2');
        var selectCVOnl= document.getElementById('selectCVOnl');
        var selectCVFile= document.getElementById('selectCVFile');
        checker.onchange = function() {
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
            selectCVFile.disabled = true;
            selectCVOnl.disabled = true;
        };
        checker2.onchange = function() {
            selectCVFile.disabled = false;
            selectCVOnl.disabled = true;
            upfilecv.style.display = "block";
            upfilecv2.style.display = "none";
        };
        checker3.onchange = function() {
            selectCVOnl.disabled = false;
            selectCVFile.disabled = true;
            upfilecv.style.display = "none";
            upfilecv2.style.display = "block"
        };
    </script>
    @endif
@endif

{{---- Script Report ----}}
<script>
    var checker_rp = document.getElementById('customCheck4');
    var checker_rp2 = document.getElementById('customCheck2');
    var motathem = document.getElementById('motathem');
    checker_rp.onchange = function(){
        if(this.checked){
            motathem.disabled = false;
        }
        if(!this.checked){
            motathem.disabled = true;
        }
    }
</script>

@endsection
