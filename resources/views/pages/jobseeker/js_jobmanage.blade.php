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
            <li  class="nav-active">
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
        <div class="col-sm-12">
            <div class="card mb-3 nav-tab-job">
                <div class="card-header myjob-header">Công việc của tôi</div>
                <div class="tabs">
                    <button class="tablinks active" data-electronic="savedjob">Công việc đã lưu</button>
                    <button class="tablinks" data-electronic="sendedjob">Công việc đã ứng tuyển</button>
                </div>
                <div id="savedjob" class="tabcontent active mt-3">
                    @if (count($congviecdaluu) > 0)
                        @foreach ($congviecdaluu as $cviecdaluu)
                        <div class="myjob">
                            <div class="row">
                                <div class="col-2">
                                    <div class="job-logo myjob-logo">
                                        <a href="{{route('job_detail', ['id_tintd'=>$cviecdaluu->id_tintd])}}">
                                            <img src="{{ URL::asset('public/img/recruiter/uploads/'.$cviecdaluu->logo)}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-7 mt-2">
                                    <div class="job-title">
                                        <a href="{{route('job_detail', ['id_tintd'=>$cviecdaluu->id_tintd])}}">{{$cviecdaluu->tencongviec}}</a>
                                    </div>
                                    <div class="job-company myjob-inf">
                                        <a href="{{route('recruiter_detail', ['id_hosontd'=>$cviecdaluu->id_hosontd])}}">
                                            {{$cviecdaluu->tencty}}</a>
                                        <a class="job-address">
                                            <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$cviecdaluu->thanhpho}}" name="thanhpho">
                                                <button class="btn-info-job" type="submit">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{$cviecdaluu->thanhpho}}
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="job-main-skill">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i><a> {{$cviecdaluu->loaicongviec}}</a>
                                        </div>
                                        <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$cviecdaluu->nganhnghe}}" name="nganhnghe">
                                            <button class="btn-info-job" type="submit">
                                                <i class="fa fa-suitcase" aria-hidden="true"></i>
                                                {{$cviecdaluu->nganhnghe}}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="job-inf myjob-inf">
                                        <div class="job-salary">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>{{$cviecdaluu->mucluong_toithieu}}$</span>
                                            <span> - {{$cviecdaluu->mucluong_toida}}$</span>
                                        </div>
                                        <div class="job-deadline">
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> Hạn nộp: <strong>{{$cviecdaluu->ngayhethan}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    @if ($cviecdaluu->trangthai_tintd == -1)
                                       Công việc đã xoá!
                                    @else
                                    <div class="btn-job-detail">
                                        <a href="{{route('job_detail', ['id_tintd'=>$cviecdaluu->id_tintd])}}" class="btn"><i class="fa fa-info" aria-hidden="true"></i> Chi tiết</a>
                                    </div>
                                     @endif
                                    <div class="btn-job-unsave">
                                        <a href="#" class="btn" data-target="#unsave-{{ $cviecdaluu->id_tintd }}" data-toggle="modal"><i class="fa fa-close" aria-hidden="true"></i> Bỏ lưu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- Modal bỏ lưu công việc --}}
                        <div class="modal fade" id="unsave-{{ $cviecdaluu->id_tintd }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            {{ csrf_field() }}
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">BỎ LƯU CÔNG VIỆC</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn bỏ lưu công việc này?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    <a href="{{route('js_getunsavejob', ['id_tintd'=>$cviecdaluu->id_tintd])}}" class="btn btn-danger">Bỏ lưu</a>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/empty/myjob1.jpg')}})"></div>
                        </div>
                    </div>
                    @endif
                    <div>
                        {!! $congviecdaluu->links() !!}
                    </div>
                </div>
                <div id="sendedjob" class="tabcontent mt-3">
                    @if (count($congviecdaut) > 0)
                        @foreach ($congviecdaut as $cviecdaut)
                        <div class="myjob">
                            <div class="row">
                                <div class="col-2">
                                    <div class="job-logo myjob-logo">
                                        <a href="{{route('job_detail', ['id_tintd'=>$cviecdaut->id_tintd])}}">
                                            <img src="{{ URL::asset('public/img/recruiter/uploads/'.$cviecdaut->logo)}}" class="job-logo-ima" alt="job-logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="job-title">
                                        <a href="{{route('job_detail', ['id_tintd'=>$cviecdaut->id_tintd])}}">{{$cviecdaut->tencongviec}}</a>
                                    </div>
                                    <div class="job-company myjob-inf">
                                        <a href="{{route('recruiter_detail', ['id_hosontd'=>$cviecdaut->id_hosontd])}}">
                                            {{$cviecdaut->tencty}}</a>
                                        <a class="job-address">
                                            <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$cviecdaut->thanhpho}}" name="thanhpho">
                                                <button class="btn-info-job" type="submit">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{$cviecdaut->thanhpho}}
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="job-main-skill">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i><a> {{$cviecdaut->loaicongviec}}</a>
                                        </div>
                                        <form method="GET" action="{{route('job_search')}}" style="display: inline;">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$cviecdaut->nganhnghe}}" name="nganhnghe">
                                            <button class="btn-info-job" type="submit">
                                                <i class="fa fa-suitcase" aria-hidden="true"></i>
                                                {{$cviecdaut->nganhnghe}}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="job-inf myjob-inf">
                                        <div class="job-salary">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>{{$cviecdaut->mucluong_toithieu}}$</span>
                                            <span> - {{$cviecdaut->mucluong_toida}}$</span>
                                        </div>
                                        <div class="job-deadline">
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i> Hạn nộp: <strong>{{$cviecdaut->ngayhethan}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    @if ($cviecdaut->trangthai_tintd == -1)
                                        Công việc đã xoá!
                                    @else
                                        <div class="btn-job-detail">
                                            <a href="{{route('job_detail', ['id_tintd'=>$cviecdaut->id_tintd])}}" class="btn"><i class="fa fa-info" aria-hidden="true"></i> Chi tiết</a>
                                        </div>
                                    @endif
                                    @if ($cviecdaut->loaicv == 'file')
                                    <div class="btn-job-apply"  data-target="#info-apply1-{{ $cviecdaut->id_CVdaut }}" data-toggle="modal">
                                        <a href="#" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i> Chi tiết ứng tuyển</a>
                                    </div>
                                    @elseif ($cviecdaut->loaicv == 'online')
                                    <div class="btn-job-apply"  data-target="#info-apply2-{{ $cviecdaut->id_CVdaut }}" data-toggle="modal">
                                        <a href="#" class="btn"><i class="fa fa-paper-plane" aria-hidden="true"></i> Chi tiết ứng tuyển</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Modal detail apply - CV File --}}
                        <div class="modal fade" id="info-apply1-{{ $cviecdaut->id_CVdaut }}" tabindex="-1" role="dialog" style="z-index: 10000">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-apply">
                                    <h5 class="modal-title">THÔNG TIN ỨNG TUYỂN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <span>BẠN ĐÃ NỘP ỨNG TUYỂN VÀO CÔNG VIỆC NÀY</span><br>
                                        <span style="height: 10px"></span><br>
                                        <span>Loại CV:</span><span style="font-weight: bold"> File CV Cá nhân</span><br>
                                        <span>Tên File:</span><span style="font-weight: bold"> {{$cviecdaut->tenfile}}</span> |
                                        <a href="{{ URL::asset('public/cv/'.$cviecdaut->tenfile) }}" target="_blank"> <i class="fa fa-eye" aria-hidden="true"></i>  Xem File</a> <br>
                                        <span>Thời gian ứng tuyển:</span><span style="font-weight: bold"> {{$cviecdaut->thoigiannop}}</span><br>
                                        <hr>

                                        <h5>Thông tin phản hồi ứng tuyển</h5>
                                        @if ($cviecdaut->trangthai_danhgia == 2)
                                            <div class="alert alert-primary mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                Đã Tiếp nhận hồ sơ và xem xét sau
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 3)
                                            <div class="alert alert-warning mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                Nhà tuyển dụng đã đặt lịch hẹn phỏng vấn vào lúc
                                                <br>
                                                <strong>{{$cviecdaut->ngayhenphongvan}}</strong>
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 4)
                                            <div class="alert alert-success mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Bạn đã được nhận vào công việc này.
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 0)
                                            <div class="alert alert-danger mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-window-close" aria-hidden="true"></i>
                                                Hồ sơ của bạn không được thông qua
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 1)
                                            <div class="alert alert-secondary mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-send" aria-hidden="true"></i>
                                                Hồ sơ của bạn đã được gửi và chờ phản hồi từ Nhà tuyển dụng
                                            </div>
                                        @endif

                                        @if ($cviecdaut->nhanxet != null)
                                            <h6>Nhận xét: </h6><br>
                                            <p>{{$cviecdaut->nhanxet}}</p>
                                        @else
                                            <p style="text-align: center">(Chưa có nhận xét nào)</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal detail apply - CV Onl --}}
                        <div class="modal fade" id="info-apply2-{{ $cviecdaut->id_CVdaut }}" tabindex="-1" role="dialog" style="z-index: 10000">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-apply">
                                    <h5 class="modal-title">THÔNG TIN ỨNG TUYỂN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <span>BẠN ĐÃ NỘP ỨNG TUYỂN VÀO CÔNG VIỆC NÀY</span><br>
                                        <span style="height: 10px"></span><br>
                                        <span>Loại CV:</span><span style="font-weight: bold"> CV Online</span><br>
                                        <span>Tiêu đề CV:</span><span style="font-weight: bold"> {{$cviecdaut->tieudecv}}</span> |
                                        <a href="{{ route('js_getpreviewCVOnl', ['id_cv'=>$cviecdaut->id_cv]) }}" target="_blank"> <i class="fa fa-eye" aria-hidden="true"></i>  Xem CV</a> <br>
                                        <span>Thời gian ứng tuyển:</span><span style="font-weight: bold"> {{$cviecdaut->thoigiannop}}</span><br>
                                        <hr>


                                        <h5>Thông tin phản hồi ứng tuyển</h5>
                                        @if ($cviecdaut->trangthai_danhgia == 2)
                                            <div class="alert alert-primary mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                Đã Tiếp nhận hồ sơ và xem xét sau
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 3)
                                            <div class="alert alert-warning mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                Nhà tuyển dụng đã đặt lịch hẹn phỏng vấn vào lúc
                                                <br>
                                                <strong>{{$cviecdaut->ngayhenphongvan}}</strong>
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 4)
                                            <div class="alert alert-success mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Bạn đã được nhận vào công việc này.
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 0)
                                            <div class="alert alert-danger mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-window-close" aria-hidden="true"></i>
                                                Hồ sơ của bạn không được thông qua
                                            </div>
                                        @elseif ($cviecdaut->trangthai_danhgia == 1)
                                            <div class="alert alert-secondary mt-2" role="alert" style="text-align: center">
                                                <i class="fa fa-send" aria-hidden="true"></i>
                                                Hồ sơ của bạn đã được gửi và chờ phản hồi từ Nhà tuyển dụng
                                            </div>
                                        @endif

                                        @if ($cviecdaut->nhanxet != null)
                                            <h6>Nhận xét: </h6><br>
                                            <p>{{$cviecdaut->nhanxet}}</p>
                                        @else
                                            <p style="text-align: center">(Chưa có nhận xét nào)</p>
                                        @endif


                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    @else
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/empty/myjob2.jpg')}})"></div>
                        </div>
                    </div>
                    @endif
                    <div>
                        {!! $congviecdaut->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{---------- Toast thông báo ----------}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQuery-Toast/0.1.6v/NToast.min.css') }}">
<script src="{{ URL::asset('public/jQuery-Toast/0.1.6v/NToast.min.js')}}"></script>
@if(Session::pull('success'))
<script>
    NToast(
        "#2dde23",
        "br",
        "CẬP NHẬT DỮ LIỆU THÀNH CÔNG!",
        true,
        "fa fa-check-circle ",
        true,
        50,
    )
</script>
@endif

@endsection



