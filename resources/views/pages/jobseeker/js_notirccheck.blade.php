@extends('layout.jobseeker.main')
@section('content')


{{-- Get new job noti --}}
@foreach ($rcnoti as $rc)
    @if($rc->id_uv == Session::get('js_id'))
        @php
            $rc_newjob += $rc->trangthaixem;
        @endphp
    @endif
@endforeach

@foreach ($filternoti as $ft)
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
            <li>
                <a href="{{route('js_dasboard')}}">Quản Lý Hồ Sơ</a>
            </li>
            <li>
                <a href="{{route('js_getcvmanage')}}">CV Của Tôi</a>
            </li>
            <li>
                <a href="{{route('js_jobmana')}}">Việc Làm Của Tôi</a>
            </li>
            <li class="nav-active">
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

<div class="container-fluid published-recuitment-wrapper" style="padding-bottom: 100px">
    <div class="container published-recuitment-content">
        <div style="padding-bottom: 10px">
            <a href="{{route('js_jobnotirc')}}" class="back-dashboard-link">
                <i class="fa fa-arrow-left"></i>
                <span>Trở về trang Thông báo việc làm</span>
            </a>
        </div>

        <div class="card" >
            <div class="myjob">
                <div class="row">
                    <div class="col-2 mt-2">
                        <div class="job-logo myjob-logo">
                            <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntddaluu->id_hosontd])}}">
                                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$ntddaluu->logo)}}" class="job-logo-ima" alt="job-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-5 mt-4">
                        <div class="row job-title mb-1">
                            <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntddaluu->id_hosontd])}}">{{$ntddaluu->tencty}}</a>
                        </div>
                        <div class="row job-company mb-3">
                            <a>{{$ntddaluu->thanhpho}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$ntddaluu->diachicty}}</a>
                        </div>
                    </div>
                    <div class="col-5 mt-4">
                        <div class="row mb-2">
                            <i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                            Lĩnh vực:&nbsp;<span style="font-weight:bold">{{$ntddaluu->linhvuchd}}</span>
                        </div>
                        <div class="row">
                            <i class="fa fa-users " aria-hidden="true"></i>&nbsp;
                            Quy mô:&nbsp;<span style="font-weight:bold">{{$ntddaluu->quymo}}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mt-4 mb-3">
            <div class="card-header myjob-header">Công việc mới từ nhà tuyển dụng này</div>
            @if (count($tintd_ntddaluu) > 0)
                <div class="myjob" style="height: 500px; overflow-y: auto;">
                    @foreach ($tintd_ntddaluu as $tinmoi)
                    <div class="row mt-4 mb-4">
                        <div class="col-2">
                            <div class="job-logo myjob-logo">
                                <a href="{{route('job_detail', ['id_tintd'=>$tinmoi->id_tintd])}}">
                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tinmoi->logo)}}" class="job-logo-ima" alt="job-logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-8 mt-2">
                            <div class="job-title">
                                <a href="{{route('job_detail', ['id_tintd'=>$tinmoi->id_tintd])}}">{{$tinmoi->tencongviec}}</a>
                            </div>
                            <div class="job-company myjob-inf">
                                <a href="{{route('recruiter_detail', ['id_hosontd'=>$tinmoi->id_hosontd])}}">
                                    {{$tinmoi->tencty}}</a>
                                <a class="job-address">
                                    <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{$tinmoi->thanhpho}}" name="thanhpho">
                                        <button class="btn-info-job" type="submit">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            {{$tinmoi->thanhpho}}
                                        </button>
                                    </form>
                                </a>
                            </div>
                            <div>
                                <div class="job-main-skill">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i><a> {{$tinmoi->loaicongviec}}</a>
                                </div>
                                <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$tinmoi->nganhnghe}}" name="nganhnghe">
                                    <button class="btn-info-job" type="submit">
                                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                                        {{$tinmoi->nganhnghe}}
                                    </button>
                                </form>
                            </div>
                            <div class="job-inf myjob-inf">
                                <div class="job-salary">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <span>{{$tinmoi->mucluong_toithieu}}$</span>
                                    <span> - {{$tinmoi->mucluong_toida}}$</span>
                                </div>
                                <div class="job-deadline">
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> Hạn nộp: <strong>{{$tinmoi->ngayhethan}}</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="btn-job-detail">
                                <a href="{{route('job_detail', ['id_tintd'=>$tinmoi->id_tintd])}}" class="btn"><i class="fa fa-info" aria-hidden="true"></i> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            @elseif(count($tintd_ntddaluu) == 0)
                <div class="empty-dashboard-job">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Nhà tuyển dụng này chưa có công việc mới!
                </div>
            @endif
        </div>

        <div class="card mt-4 mb-3">
            <div class="card-header myjob-header">Các công việc khác từ nhà tuyển dụng này</div>
            <div class="col-md-12 job-board2-wrap">
                <div class="owl-carousel owl-theme job-board2-contain">
                    @foreach ($tintd_ntddaluu_old as $tinhd_old)
                    <div class="item job-latest-item">
                        <a href="{{route('job_detail', ['id_tintd'=>$tinhd_old->id_tintd])}}" class="job-latest-group">
                            <div class="job-lt-logo">
                                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tinhd_old->logo)}}">
                            </div>
                            <div class="job-lt-info">
                                <h3>{{$tinhd_old->tencongviec}}</h3>
                                <a class="company" href="{{route('recruiter_detail', ['id_hosontd'=>$tinhd_old->id_hosontd])}}">{{$tinhd_old->tencty}}</a>
                                <p class="address" ><i class="fa fa-map-marker pr-1" aria-hidden="true"></i> {{$tinhd_old->thanhpho}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true,
                            slideBy: 2,
                            dots: false
                        },
                        600:{
                            items:4,
                            nav:false,
                            slideBy: 2,
                            dots: false
                        },
                        1000:{
                            items: 6,
                            nav:true,
                            loop:false,
                            slideBy: 2
                        }
                    }
                });
            })
        </script>

    </div>
</div>

@endsection
