@extends('layout.jobseeker.main')
@section('content')

<div class="clearfix"></div>

{{-- Get new job noti --}}
@foreach($rcnoti as $rc)
    @if($rc->id_uv == Session::get('js_id'))
    @php
        $rc_newjob += $rc->trangthaixem;
    @endphp
    @endif
@endforeach

@foreach($filternoti as $ft)
    @if($ft->id_uv == Session::get('js_id'))
    @php
        $ft_newjob += $ft->trangthaixem;
    @endphp
    @endif
@endforeach

@php
    $noti_newjob_all = $rc_newjob + $ft_newjob;
@endphp

<!-- recuiter Nav -->
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment">
    <div class="collapse navbar-collapse container nav-js" id="navbarNava">
        <ul class="navbar-nav">
            <li>
                <a href="{{route('Home')}}">Trang chủ</a>
            </li>
            <li class="nav-active">
                <a href="{{route('js_dasboard')}}">Quản Lý Hồ Sơ</a>
            </li>
            <li>
                <a href="{{route('js_getcvmanage')}}">CV Của Tôi</a>
            </li>
            <li>
                <a href="{{route('js_jobmana')}}">Việc Làm Của Tôi</a>
            </li>
            <li>
                <a href="{{route('js_jobnotirc')}}">
                    Thông Báo Việc làm
                    @if ($noti_newjob_all > 0)
                        <span class="badge" style="color: #fff; background-color: rgb(255, 7, 7);">
                            {{$noti_newjob_all}}
                        </span>
                    @elseif($noti_newjob_all == 0)
                        <span class="badge" style="color: rgb(0, 0, 0); background-color: rgb(141, 140, 140);">
                            0
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{route('js_rcsee')}}">Nhà tuyển dụng xem hồ sơ</a>
            </li>
            <li>
                <a href="{{route('js_security')}}">Bảo mật tài khoản</a>
            </li>
        </ul>
    </div>
</nav>
<!--  recuiter Nav -->


<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-12">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                              <div class="avatar-profile">
                                  <div class="avatar-preview">
                                    @if (isset($ungvien->hinhanh))
                                    <div id="imagePreview" style="background-image: url('{{ URL::asset('public/img/jobseeker/uploads/'.$ungvien->hinhanh)}}">
                                    </div>
                                    @else
                                    <div id="imagePreview" style="background-image: url('{{ URL::asset('public/img/jobseeker/user.jpg')}}">
                                    </div>
                                    @endif
                                  </div>
                              </div>
                        </div>
                        <div class="col-md-9">
                          <div class="card-body profile-card">
                            <h3 class="card-title">
                                {{$ungvien->ho}} {{$ungvien->ten}}
                            </h3>
                            <p class="card-content">
                                <h5 class="sub-text">
                                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    <span>Số lượng thông tin Kinh nghiệm làm việc: </span>
                                </h5>
                                <h4 class="sub-text">{{$countexp}}</h4>
                            </p>
                            <p class="card-content">
                                <h5 class="sub-text">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    <span>Số lượng thông tin Học vấn: </span>
                                </h5>
                                <h4 class="sub-text">{{$countstudy}} </h4>
                            </p>
                            <p class="card-content">
                                <h5 class="sub-text">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    <span>Số lượng thông tin Ngoại ngữ: </span>
                                </h5>
                                <h4 class="sub-text">{{$countlang}}</h4>
                            </p>
                            <hr>
                            <div class="card-content">
                                <p style="height: 10px"></p>
                                <a href="{{route('js_editprofile')}}" class="btn btn-outline-success">Cập nhật hồ sơ</a>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-12">
                <div class="card stats-card-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img class="stats-icon" src="{{ URL::asset('public/img/jobseeker/icon/recruitment.png')}}">
                            </div>
                            <div class="col-6">
                                <p class="stats-title"> Nhà tuyển dụng xem hồ sơ </p>
                            </div>
                            <div class="col-3">
                                <p class="stats-number">{{$countrcsee}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card stats-card-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img class="stats-icon" src="{{ URL::asset('public/img/jobseeker/icon/notification.png')}}">
                            </div>
                            <div class="col-6">
                                <p class="stats-title"> Thông báo công việc  </p>
                            </div>
                            <div class="col-3">
                                <p class="stats-number">{{$count_jobnoti}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card stats-card-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img class="stats-icon" src="{{ URL::asset('public/img/jobseeker/icon/work.png')}}">
                            </div>
                            <div class="col-6">
                                <p class="stats-title"> Công việc của tôi </p>
                            </div>
                            <div class="col-3">
                                <p class="stats-number">{{$countmyjob_all}}</p>
                            </div>
                        </div>
                        <hr class="stats">
                        <div class="row">
                            <div class="col stats-small">
                                Đã gửi: {{$countmyjob_sended}}
                            </div>
                            <div class="col stats-small">
                                Đã lưu: {{$countmyjob_saved}}
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-header myjob-header">Công việc phù hợp với bạn</div>
                    @if (count($tintd_goiy) > 0)
                        <div class="myjob" style="height: 500px; overflow-y: auto;">
                            @foreach ($tintd_goiy as $tingoiy)
                            <div class="row mt-4 mb-4">
                                <div class="col-2">
                                    <div class="job-logo myjob-logo">
                                        <a href="{{route('job_detail', ['id_tintd'=>$tingoiy->id_tintd])}}">
                                            <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tingoiy->logo)}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 mt-2">
                                    <div class="job-title">
                                        <a href="{{route('job_detail', ['id_tintd'=>$tingoiy->id_tintd])}}">{{$tingoiy->tencongviec}}</a>
                                    </div>
                                    <div class="job-company myjob-inf">
                                        <a href="{{route('recruiter_detail', ['id_hosontd'=>$tingoiy->id_hosontd])}}">
                                            {{$tingoiy->tencty}}</a>
                                        <a class="job-address">
                                            <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$tingoiy->thanhpho}}" name="thanhpho">
                                                <button class="btn-info-job" type="submit">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{$tingoiy->thanhpho}}
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="job-main-skill">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i><a> {{$tingoiy->loaicongviec}}</a>
                                        </div>
                                        <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$tingoiy->nganhnghe}}" name="nganhnghe">
                                            <button class="btn-info-job" type="submit">
                                                <i class="fa fa-suitcase" aria-hidden="true"></i>
                                                {{$tingoiy->nganhnghe}}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="job-inf myjob-inf">
                                        <div class="job-salary">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>{{$tingoiy->mucluong_toithieu}}$</span>
                                            <span> - {{$tingoiy->mucluong_toida}}$</span>
                                        </div>
                                        <div class="job-deadline">
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> Hạn nộp: <strong>{{$tingoiy->ngayhethan}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="btn-job-detail">
                                        <a href="{{route('job_detail', ['id_tintd'=>$tingoiy->id_tintd])}}" class="btn"><i class="fa fa-info" aria-hidden="true"></i> Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    @elseif(count($tintd_goiy) == 0)
                        <div class="empty-dashboard-job">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Chưa tìm thấy công việc phù hợp cho bạn
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
