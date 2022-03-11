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
            <a href="{{route('js_jobnotifilter')}}" class="back-dashboard-link">
                <i class="fa fa-arrow-left"></i>
                <span>Trở về trang Thông báo việc làm</span>
            </a>
        </div>

        <div class="card">
            <h5 style="padding: 20px;">THÔNG TIN BỘ LỌC</h5>
            <div class="row no-gutters">
                <div class="col-6">
                    <div class="card-body profile-card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Địa điểm: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->thanhpho == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->thanhpho}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Cấp bậc: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->capbac == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->capbac}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Kinh nghiệm: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->kinhnghiem == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->kinhnghiem}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Loại công việc: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->loaicongviec == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->loaicongviec}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-body profile-card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Ngành nghề: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->nganhnghe == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->nganhnghe}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Trình độ: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->trinhdo == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->trinhdo}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-title">
                                        <span>Mức lương tối thiểu: </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="sub-text sub-text-content">
                                        @if ($boloc->mucluong == null)
                                       (Không lựa chọn)
                                        @else
                                        {{$boloc->mucluong}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Form method="GET" action="{{route('job_search')}}" class="mt-3">
            <input type="hidden" value="{{$boloc->thanhpho}}" name="thanhpho">
            <input type="hidden" value="{{$boloc->nganhnghe}}" name="nganhnghe">
            <input type="hidden" value="{{$boloc->capbac}}" name="capbac">
            <input type="hidden" value="{{$boloc->trinhdo}}" name="trinhdo">
            <input type="hidden" value="{{$boloc->kinhnghiem}}" name="kinhnghiem">
            <input type="hidden" value="{{$boloc->loaicongviec}}" name="loaicongviec">
            <input type="hidden" value="{{$boloc->mucluong}}" name="mucluong">
            <button type="submit" class="btn btn-success">Xem các công việc phù hợp với bộ lọc</button>
        </form>

        <div class="card mt-4 mb-3">
            <div class="card-header myjob-header">Công việc mới từ bộ lọc này</div>
            @if (count($tintdgoiy) > 0)
                <div class="myjob" style="height: 500px; overflow-y: auto;">
                    @foreach ($tintdgoiy as $tinmoi)
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
            @elseif(count($tintdgoiy) == 0)
                <div class="empty-dashboard-job">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Chưa có công tìm thấy việc mới cho bộ lọc này!
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
