<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LoopIT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Roboto Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{ URL::asset('public/css/select2.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('public/css/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/css/owlcarousel/owl.theme.default.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/jobseeker-old-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/jobseeker-new-style.css') }}">
    <!--Addition css-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/jobseeker-login-logout.css') }}">
    {{--jQuery File Input --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQueryPlugin/jQuery-Fileinput/css/fileinput.css') }}">
    <!--CKEditor-->
    <script src="{{ URL::asset('public/ckeditor/ckeditor.js')}}"></script>
    <!--Color Picker-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQueryPlugin/jQuery-ColorPick/src/colorPick.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('public/jQueryPlugin/jQuery-ColorPick/src/colorPick.js')}}"></script>

    <link href="{{ URL::asset('public/jQueryPlugin/jQuery-Tagify/dist/tagify.css')}}" rel="stylesheet">

</head>

<body>

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
    $noti_all = $rc_newjob + $ft_newjob;
@endphp

<div class="container-fluid fluid-nav another-page">
    <div class="container cnt-tnar" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <a href="{{route('Home')}}" class="nav-logo">
            <img src="{{ URL::asset('public/img/techjobs_bgw.png') }}">
            </a>
            <button class="navbar-toggler tnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fa fa-bars icn-res" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto tnav-left tn-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{route('job_search')}}">Việc Làm</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('recruiter_search')}}">Công ty</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
                @if(Session::get('js_name') != null)
                <li class="nav-item mr-2">
                    <a class="nav-link btn-employers" href="{{route('recruiter.home')}}" tabindex="-1" aria-disabled="true" target="_blank">Nhà Tuyển Dụng</a>
                </li>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-profile2 header-menu-noti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>{{Session::get('js_name')}}</span>
                        @if ($noti_all > 0)
                            <span class="badge"><i class="fa fa-circle" aria-hidden="true"></i></span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" style="width: 300px">
                        <a href="{{route('js_dasboard')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>Quản lý hồ sơ</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_getcvmanage')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-file-text " aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>Quản lý CV</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_jobmana')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <Span>Việc làm của tôi</Span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_jobnotirc')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>
                                        Thông báo việc làm
                                        @if ($noti_all > 0)
                                            <span class="header-jobnoti">Mới</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_rcsee')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>Nhà tuyển dụng đã xem hồ sơ</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_security')}}" class="dropdown-item dr-pr-item2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>Cài đặt bảo mật</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('js_logout')}}" class="dropdown-item dr-pr-item-ls2" type="button">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </div>
                                <div class="col-10">
                                    <span>Đăng xuất</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @else
                <li class="nav-item">
                    <a class="nav-link btn-employers" href="{{route('recruiter.home')}}" tabindex="-1" aria-disabled="true" target="_blank">Nhà Tuyển Dụng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-login-signup" href="{{route('js_getLogin')}}" tabindex="-1" aria-disabled="true">Đăng nhập / đăng ký</a>
                </li>
                @endif
            </ul>
            </div>
        </nav>
    </div>
</div>
