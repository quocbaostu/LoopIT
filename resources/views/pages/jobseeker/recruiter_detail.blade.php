@extends('layout.jobseeker.main')
@section('content')

<div class="clearfix"></div>


<div class="container-fluid job-detail-wrap">
    <div class="container">
        <h4 style="font-style: #147259" class="mb-3">Thông tin Nhà tuyển dụng</h4>
        <hr>
        <div class="card card-recruiter">
            <div class="recruiter-logo">
                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$hosontd->logo)}}" class="job-logo-ima" alt="job-logo">
            </div>
            <div class="recruiter-name">
                {{$hosontd->tencty}}
            </div>
            <div class="recruiter-location">
                <span class="tp">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    {{$hosontd->thanhpho}}
                </span>
                <span class="diachi"> - {{$hosontd->diachicty}}</span>
            </div>
            <div class="recruiter-button-follow">
                @if ($check_save_ntd != null)
                <a href="{{route('js_getunsaverc', ['id_hosontd'=>$hosontd->id_hosontd])}}" class="btn btn-followed-rc">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    <span>Đã theo dõi </span>
                </a>
                @else
                <a href="{{route('js_getsaverc', ['id_hosontd'=>$hosontd->id_hosontd])}}" class="btn btn-follow-rc">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <span>Theo dõi</span>
                </a>
                <p>(Theo dõi và nhận thông báo công việc mới nhất từ Nhà tuyển dụng này)</p>
                @endif
            </div>
            <hr>
            <div class="col-md-12 mt-3">
                <div class="row">
                    <div class="col-6 recruiter-subinfo">
                        <div class="title">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                            Lĩnh vực hoạt động
                        </div>
                        <div class="detail">
                            {{$hosontd->linhvuchd}}
                        </div>
                    </div>
                    <div class="col-6 recruiter-subinfo">
                        <div class="title">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Quy mô
                        </div>
                        <div class="detail">
                            {{$hosontd->quymo}}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="recruiter-des">
                <h4 class="title">Mô tả</h4>
                {!! $hosontd->mota !!}
            </div>
        </div>
        <div class="card mt-3 mb-5">
            <div class="card-header myjob-header mb-3">CÔNG VIỆC ĐANG TUYỂN DỤNG</div>
            @foreach ($cviec as $cv)
            <div class="myjob">
                <div class="row">
                    <div class="col-md-2">
                        <div class="job-logo myjob-logo">
                            <a href="#">
                                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$hosontd->logo)}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="job-desc myjob-desc">
                            <div class="job-title">
                                <a href="#">{{$cv->tencongviec}}</a>
                            </div>
                            <div class="job-company myjob-inf">
                                <a href="#">{{$hosontd->tencty}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$cv->thanhpho}}</a>
                            </div>
                            <div class="job-inf myjob-inf">
                                <div class="job-main-skill">
                                    <i class="fa fa-circle-o-notch"></i><a href="#"> {{$cv->loaicongviec}}</a>
                                </div>
                                <div class="job-salary">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <span class="salary-min">15<em class="salary-unit">triệu</em></span>
                                    <span class="salary-max">35 <em class="salary-unit">triệu</em></span>
                                </div>
                                <div class="job-deadline">
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>  Hạn nộp: <strong>31/12/2019</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <a href="{{route('job_detail', ['id_tintd'=>$cv->id_tintd])}}" class="btn btn-detail">
                                <i class="fa fa-info" aria-hidden="true"></i> Chi tiết
                            </a>
                        </div>
                        <div>
                            @if (in_array($cv->id_tintd, $savejob_id_tintd))
                            <a href="{{route('js_getunsavejob', ['id_tintd'=>$cv->id_tintd])}}" class="btn btn-saved-list" style="color: #f62424;">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <span>Đã lưu </span>
                            </a>
                            @else
                            <a href="{{route('js_savejob', ['id_tintd'=>$cv->id_tintd])}}" class="btn btn-save-list">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <span>Lưu</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            <div>
                {!! $cviec->links() !!}
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>




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






<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
{{------ Script Login Require ------}}
@if(Session::pull('loginReq'))
<script type="text/javascript">
    $(window).load(function(e) {
        $("#loginReq").modal('show');
    });
</script>
@endif



@endsection
