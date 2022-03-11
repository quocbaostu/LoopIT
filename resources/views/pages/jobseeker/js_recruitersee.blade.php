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
            <li>
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
            <li class="nav-active">
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
        <div class="col-sm-12">
            <div class="card-deck mb-3" style="height: 730px;">
                <div class="card" >
                    <div class="card-header rec-see-header">
                        <div class="rec-see-title">Nhà tuyển dụng xem hồ sơ</div>
                    </div>
                    @if (count($ntd_daxemhs) > 0)
                    @foreach ($ntd_daxemhs as $ntd)
                    <div class="myjob">
                        <div class="row">
                            <div class="col-2 mt-4">
                                <div class="job-logo myjob-logo">
                                    <a href="#">
                                        <img src="{{ URL::asset('public/img/recruiter/uploads/'.$ntd->logo)}}" class="job-logo-ima" alt="job-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 mt-4">
                                <div class="row job-title mb-1">
                                    <a href="#">{{$ntd->tencty}}</a>
                                </div>
                                <div class="row job-company mb-3">
                                    <a href="#">{{$ntd->thanhpho}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$ntd->diachicty}}</a>
                                </div>
                                <div class="row mb-2">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                    Lĩnh vực:&nbsp;<span style="font-weight:bold">{{$ntd->linhvuchd}}</span>
                                </div>
                                <div class="row">
                                    <i class="fa fa-users " aria-hidden="true"></i>&nbsp;
                                    Quy mô:&nbsp;<span style="font-weight:bold">{{$ntd->quymo}}</span>
                                </div>
                            </div>
                            <div class="col-2 mt-5">
                                <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntd->id_hosontd])}}" class="btn btn-detail ml-2">
                                    <i class="fa fa-info" aria-hidden="true"></i> Chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @elseif(count($ntd_daxemhs) == 0)
                        <div class="empty-recruiter-see">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            NHÀ TUYỂN DỤNG CHƯA XEM HỒ SƠ CỦA BẠN!
                        </div>
                    @endif
                    <div>
                        {!! $ntd_daxemhs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
