<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechJobs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Roboto Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{ URL::asset('public/css/select2.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/jobseeker-old-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/jobseeker-new-style.css') }}">
    <!--Color Picker-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQueryPlugin/jQuery-ColorPick/src/colorPick.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('public/jQueryPlugin/jQuery-ColorPick/src/colorPick.js')}}"></script>


    <style type="text/css">
        table, td
            { color: #000000;
        }
        @media only screen and (min-width: 670px)
        {
            .u-row {
                width: 650px !important;
            }
            .u-row .u-col {
                vertical-align: top;
            }

            .u-row .u-col-100 {
                width: 650px !important;
            }
        }

        @media (max-width: 670px) {
        .u-row-container {
            max-width: 100% !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        .u-row .u-col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
        }
        .u-row {
            width: calc(100% - 40px) !important;
        }
        .u-col {
            width: 100% !important;
        }
        .u-col > div {
            margin: 0 auto;
        }
        }
        body {
        margin: 0;
        padding: 0;
        }

        table,
        tr,
        td {
        vertical-align: top;
        border-collapse: collapse;
        }

        p {
        margin: 0;
        }

        .ie-container table,
        .mso-container table {
        table-layout: fixed;
        }

        * {
        line-height: inherit;
        }

        a[x-apple-data-detectors='true'] {
        color: inherit !important;
        text-decoration: none !important;
        }

        .row{
            width: 100%;
        }
        .column {
            width: 50%;
            padding: 10px;
        }
        .cv-info{
            font-size: 16px;
            line-height: 22.4px;
            color: {{$cv->mauchu_lh}};
        }
    </style>
</head>


<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f2f2f2;color: #000000">
    <!-- Menu bar -->
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
                    <a class="nav-link" href="#">Công ty</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
                    @if(Session::get('js_name') != null)
                    <li class="nav-item mr-2">
                        <a class="nav-link btn-employers" href="{{route('recruiter.home')}}" tabindex="-1" aria-disabled="true" target="_blank">Nhà Tuyển Dụng</a>
                    </li>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-profile2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                                <span>{{Session::get('js_name')}}</span>
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
                                        <span>Thông báo việc làm</span>
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
    <!-- Menu Bar -->

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
                <li  class="nav-active">
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

    <!-- Main CV -->
    <div class="container-fluid published-recuitment-wrapper">
        <div class="container published-recuitment-content">
           <div class="col-12">
            <div style="padding-bottom: 10px">
                <a href="{{route('js_getcvonlmanage')}}" class="back-dashboard-link">
                    <i class="fa fa-arrow-left"></i>
                    <span>Trở về trang Quản lý CV</span>
                </a>
                <a href="{{route('js_getupdatedContentCV', ['id_cv'=>$cv->id_cv])}}" class="forward-updatecv-link">
                    <i class="fa fa-pencil"></i>
                    <span>Chỉnh sửa Nội Dung CV</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
             </div>
            <div class="card mb-3">
                <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f2f2f2;width:100%" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr style="vertical-align: top">
                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                            <div class="u-row-container" style="padding: 25px 10px 0px;background-color: rgba(255,255,255,0)">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;">
                                        <div style="width: 100% !important;">
                                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                <tbody>
                                                <tr>
                                                <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 20px;font-family:arial,helvetica,sans-serif;" align="left">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                                        <img align="center" border="0" src="{{ URL::asset('public/img/techjobs_bgw.png')}}" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 150px;" width="150"/>
                                                        </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color:{{$cv->maucv}}">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('images/image-1.png');background-repeat: repeat;background-position: center top;background-color: transparent;">
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;">
                                            <div style="width: 100% !important;">
                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 20px 20px;font-family:arial,helvetica,sans-serif;" align="left">
                                                            <div style=" line-height: 120%; text-align: center; word-wrap: break-word;color:{{$cv->mauchu_lh}}">
                                                                <p style="font-size: 14px; line-height: 120%;"><span style="font-family: Montserrat, sans-serif; font-size: 40px; line-height: 48px;"><span style="line-height: 48px; font-size: 40px;">{{$ungvien->ho}} {{$ungvien->ten}}</span></span></p>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:15px 20px 20px;font-family:arial,helvetica,sans-serif;" align="left">
                                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                                                    <div class="avatar-profile">
                                                                        <div class="avatar-preview">
                                                                            @if ($cv->hinhdaidien != null)
                                                                            <div style="background-image: url('{{ URL::asset('public/img/jobseeker/uploads/avt_cv/'.$cv->hinhdaidien)}}">
                                                                            </div>
                                                                            @else
                                                                            <div style="background-image: url('{{ URL::asset('public/img/jobseeker/user.jpg')}}">
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px 20px 35px;font-family:arial,helvetica,sans-serif;" align="center">
                                                                <div style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                                                    <div  class="row" style="padding-left: 50px;">
                                                                        <div class="column" style="text-align: left;">
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-envelope-open"></i> EMAIL</span></strong></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-calendar"></i> NGÀY SINH</span></strong></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-venus-mars"></i> GIỚI TÍNH</span></strong></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-phone-square"></i> SỐ ĐIỆN THOẠI</span></strong></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-location-arrow"></i> ĐỊA CHỈ</span></strong></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 16px; line-height: 22.4px;"><strong><span class="cv-info"><i class="fa fa-building"></i> THÀNH PHỐ</span></strong></span></p>
                                                                        </div>
                                                                        <div class="column" style="text-align: right;">
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:16px;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->email}}</span></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:16px;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->ngaysinh}}</span></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:16px;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->gioitinh}}</span></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:16px;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->sdt}}</span></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;padding-bottom:16px;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->diachi}}</span></span></p>
                                                                            <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 16px; line-height: 22.4px;"><span class="cv-info">{{$ungvien->thanhpho}}</span></span></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">
                                <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;">
                                        <div style="width: 100% !important;">
                                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                                <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                        <td style="overflow-wrap:break-word;word-break:break-word;padding:40px 20px 10px;font-family:arial,helvetica,sans-serif;" align="left">
                                                            <div style="line-height: 150%; text-align: left; word-wrap: break-word;">

                                                                @foreach ($nd_cv as $nd)
                                                                <div class="cv-content">
                                                                    <div class="row">
                                                                        <div class="cv-content-title" style="color:{{$cv->mauchu_nd}}"> {{$nd->tieude}} </div>
                                                                    </div>
                                                                    <hr style="color:{{$cv->mauchu_nd}};" class="hrcvPreview">
                                                                    <div class="row">
                                                                        <div class="cv-content-detail">
                                                                             {!! $nd->chitiet !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="height: 50px"></div>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
           </div>
        </div>
    </div>
    <!-- Main CV -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/readmore.js') }}"></script>
    <script type="text/javascript">
        $('.catelog-list').readmore({
        speed: 75,
        maxHeight: 150,
        moreLink: '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
        lessLink: '<a href="#">Rút gọn<i class="fa fa-angle-up pl-2"></i></a>'
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ URL::asset('public/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/jobdata.js') }}"></script>
    <!-- Owl Stylesheets Javascript -->
    <script src="{{ URL::asset('public/js/owlcarousel/owl.carousel.js') }}"></script>


    <!-- job support -->
    <div class="container-fluid job-support-wrapper">
        <div class="container-fluid job-support-wrap">
            <div class="container job-support">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <ul class="spp-list">
                        <li>
                            <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
                        </li>
                        <li>
                            <span><i class="fa fa-phone pr-2 icsp"></i>083.578.4337</span>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="newsletter">
                            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
                            <div class="input-group frm1">
                            <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
                            <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- (end) job support -->
    <div class="container-fluid footer-wrap  clear-left clear-right">
        <div class="container footer">
            <div class="row">
                <div class="col-md-4 col-sm-8 col-12">
                    <h2 class="footer-heading">
                        <span>About</span>
                    </h2>
                    <p class="footer-content">
                        Discover the best way to find houses, condominiums, apartments and HDBs for sale and rent in Singapore with JobsOnline, Singapore's Fastest Growing Jobs Portal.
                    </p>
                    <ul class="footer-contact">
                        <li>
                        <a href="#">
                            <i class="fa fa-phone fticn"></i> +123 456 7890
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-envelope fticn"></i>
                            hello@123.com
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-map-marker fticn"></i>
                            33 Xô Viết Nghệ Tĩnh, Đà Nẵng
                        </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-12">
                    <h2 class="footer-heading">
                        <span>Ngôn ngữ nổi bật</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">Java</a></li>
                        <li><a href="#">Frontend</a></li>
                        <li><a href="#">SQL Server</a></li>
                        <li><a href="#">.NET</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả ngành nghề</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Lập trình viên</a></li>
                        <li><a href="#">Kiểm thử phần mềm</a></li>
                        <li><a href="#">Kỹ sư cầu nối</a></li>
                        <li><a href="#">Quản lý dự án</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả hình thức</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Nhân viên chính thức</a></li>
                        <li><a href="#">Nhân viên bán thời gian</a></li>
                        <li><a href="#">Freelancer</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-12">
                    <h2 class="footer-heading">
                        <span>Tất cả tỉnh thành</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Hồ Chính Minh</a></li>
                        <li><a href="#">Hà Nội</a></li>
                        <li><a href="#">Đà Nẵng</a></li>
                        <li><a href="#">Buôn Ma Thuột</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid copyright-wrap">
        <div class="container copyright">
            <p class="copyright-content">
            Copyright © 2020 <a href="#"> Tech<b>Job</b></a>. All Right Reserved.
            </p>
        </div>
    </footer>

</body>

</html>


