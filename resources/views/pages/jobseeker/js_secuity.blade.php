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
            <li>
                <a href="{{route('js_rcsee')}}">Nhà tuyển dụng xem hồ sơ</a>
            </li>
            <li class="nav-active">
                <a href="{{route('js_security')}}">Bảo mật tài khoản</a>
            </li>
        </ul>
    </div>
</nav>
<!--  recuiter Nav -->

<!-- Security edit -->
<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3 card-edit">
                        <div class="card-header header-edit">
                            <i class="fa fa-unlock" aria-hidden="true"></i>
                            <span>Thay đổi mật khẩu</span>
                        </div>
                        <form class="form-edit" method="POST" action="{{route('js_postUpdatepass')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" name="oldpass">
                                <div class="edit-vali-error">
                                    @if (Session::get('errorUpdatepass'))
                                        <div class="error">{{Session::get('errorUpdatepass')}}</div>
                                    @endif
                                    @foreach ($errors->get('oldpass') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" name="newpass">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('newpass') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" name="confirm_newpass">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('confirm_newpass') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-security">Xác nhận</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 card-edit">
                        <div class="card-header header-edit">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> Thay đổi email </span>
                        </div>
                        <form class="form-edit" method="POST" action="{{route('js_postUpdateemail')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email hiện tại</label>
                                <input type="email" class="form-control" name="email_old" value="{{Session::get('js_email')}}" readonly >
                            </div>
                            <div class="form-group">
                                <label>Email mới</label>
                                <input type="email" class="form-control" name="email_new" value="{{old('email_new')}}">
                                <div class="edit-vali-error">
                                    @if (Session::get('errupdateEmail'))
                                        <div class="error">{{Session::get('errupdateEmail')}}</div>
                                    @endif
                                    @foreach ($errors->get('email_new') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu hiện tại</label>
                                <input type="password" class="form-control" name="confirm_pass">
                                <div class="edit-vali-error">
                                    @if (Session::get('errorConfirmpass'))
                                        <div class="error">{{Session::get('errorConfirmpass')}}</div>
                                    @endif
                                    @foreach ($errors->get('confirm_pass') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-security">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Security edit -->


@endsection
