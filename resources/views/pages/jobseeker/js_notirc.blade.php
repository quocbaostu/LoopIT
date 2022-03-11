@extends('layout.jobseeker.main')
@section('content')

<div class="clearfix"></div>

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
        <div class="col-sm-12">
            <div class="card mb-3 nav-tab-job">
                <div class="card-header myjob-header">THÔNG BÁO VIỆC LÀM</div>
                <div class="tabs">
                    {{-- Tabs --}}
                    <button class="tablinks active" data-electronic="rcsave">
                            Nhà tuyển dụng đã lưu
                    </button>
                    <a href="{{route('js_jobnotifilter')}}" class="tablinks btn btn-light" data-electronic="notifilter">
                        <div>Bộ lọc gợi ý</div>
                    </a>
                </div>
                <div id="rcsave" class="tabcontent active">
                    <div class="card-deck row">
                        <div class="card">
                            @if (count($ntddaluu) > 0)
                                @foreach ($ntddaluu as $ntd)
                                <div class="myjob">
                                    <div class="row">
                                        <div class="col-2 mt-4">
                                            <div class="job-logo myjob-logo">
                                                <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntd->id_hosontd])}}">
                                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$ntd->logo)}}" class="job-logo-ima" alt="job-logo">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-5 mt-4">
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
                                        <div class="col-5 mt-5">
                                            <a href="{{route('js_getcheckrcnewjob', ['id_ntddaluu'=>$ntd->id_ntddaluu])}}" class="btn btn-newjob-rc">
                                                <i class="fa fa-bell" aria-hidden="true"></i> Công việc mới
                                                @if ($ntd->trangthaixem > 0)
                                                <span class="badge" style="background-color: #f62424">{{$ntd->trangthaixem}}</span>
                                                @else
                                                <span class="badge" style="background-color: #b4afaf">0</span>
                                                @endif
                                            </a>
                                            <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntd->id_hosontd])}}" class="btn btn-detail ml-2">
                                                <i class="fa fa-info" aria-hidden="true"></i> Chi tiết
                                            </a>
                                            <a href="#" data-target="#unsave-{{ $ntd->id_hosontd }}" data-toggle="modal" class="btn btn-unsave-rc ml-2">
                                                <i class="fa fa-close" aria-hidden="true"></i> Bỏ lưu
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal bỏ lưu Nhà tuyển dụng --}}
                                <div class="modal fade" id="unsave-{{ $ntd->id_hosontd }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    {{ csrf_field() }}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">BỎ LƯU NHÀ TUYỂN DỤNG</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    Bạn có chắc chắn muốn bỏ lưu Nhà tuyển dụng này?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                                <a href="{{route('js_getunsaverc', ['id_hosontd'=>$ntd->id_hosontd])}}" class="btn btn-danger">Bỏ lưu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            @elseif (count($ntddaluu) == 0)
                                <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/empty/rcsave.jpg')}})"></div>
                            @endif
                            <div>
                                {!! $ntddaluu->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="notifilter" class="tabcontent">
                    <div class="card-deck row">
                        <div class="card">
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/loading.jpg')}})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




















