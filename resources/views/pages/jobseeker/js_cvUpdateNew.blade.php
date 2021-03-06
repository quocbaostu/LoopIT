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
    <!--CKEditor-->
    <script src="{{ URL::asset('public/ckeditor/ckeditor.js')}}"></script>


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

        .column {
            width: 50%;
            padding: 10px;
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
                    <a class="nav-link" href="{{route('job_search')}}">Vi???c L??m</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">C??ng ty</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
                    @if(Session::get('js_name') != null)
                    <li class="nav-item mr-2">
                        <a class="nav-link btn-employers" href="{{route('recruiter.home')}}" tabindex="-1" aria-disabled="true" target="_blank">Nh?? Tuy???n D???ng</a>
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
                                        <span>Qu???n l?? h??? s??</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_getcvmanage')}}" class="dropdown-item dr-pr-item2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <span>Qu???n l?? CV</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_jobmana')}}" class="dropdown-item dr-pr-item2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <Span>Vi???c l??m c???a t??i</Span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_jobnotirc')}}" class="dropdown-item dr-pr-item2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <span>Th??ng b??o vi???c l??m</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_rcsee')}}" class="dropdown-item dr-pr-item2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <span>Nh?? tuy???n d???ng ???? xem h??? s??</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_security')}}" class="dropdown-item dr-pr-item2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <span>C??i ?????t b???o m???t</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('js_logout')}}" class="dropdown-item dr-pr-item-ls2" type="button">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <span>????ng xu???t</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn-employers" href="{{route('recruiter.home')}}" tabindex="-1" aria-disabled="true" target="_blank">Nh?? Tuy???n D???ng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-login-signup" href="{{route('js_getLogin')}}" tabindex="-1" aria-disabled="true">????ng nh???p / ????ng k??</a>
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
                    <a href="{{route('Home')}}">Trang ch???</a>
                </li>
                <li>
                    <a href="{{route('js_dasboard')}}">Qu???n L?? H??? S??</a>
                </li>
                <li class="nav-active">
                    <a href="{{route('js_getcvmanage')}}">CV C???a T??i</a>
                </li>
                <li>
                    <a href="{{route('js_jobmana')}}">Vi???c L??m C???a T??i</a>
                </li>
                <li>
                    <a href="{{route('js_jobnotirc')}}">
                        Th??ng B??o Vi???c l??m
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
                    <a href="{{route('js_rcsee')}}">Nh?? tuy???n d???ng xem h??? s??</a>
                </li>
                <li>
                    <a href="{{route('js_security')}}">B???o m???t t??i kho???n</a>
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
                    <span>Tr??? v??? trang Qu???n l?? CV</span>
                </a>
             </div>
            <div class="card mb-3">
                <form action="{{route('js_postupdateContentCV')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$cv->id_cv}}" name="id_cv">
                    <button type="button" class=" btn cv-color colorPickSelector cv-contact-colorpicker"></button>
                    <div class="cv-color cv-contact-titles">M??U CV</div>
                    <input type="hidden" name="maucv" id="maucv">

                    <button type="button" class=" btn cv-color colorPickSelector2 cv-contact-colorpicker"></button>
                    <div class="cv-color cv-contact-titles">M??U CH??? (Li??n h???)</div>
                    <input type="hidden" name="mauchu_lh" id="mauchu_lh">

                    <button type="button" class=" btn cv-color colorPickSelector3 cv-contact-colorpicker2"></button>
                    <div class="cv-color cv-contact-titles2">M??U CH??? (N???i dung)</div>
                    <input type="hidden" name="mauchu_nd" id="mauchu_nd">

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
                                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 650px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;" id="colorPreview">
                                        <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('images/image-1.png');background-repeat: repeat;background-position: center top;background-color: transparent;">
                                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 650px;display: table-cell;vertical-align: top;">
                                                <div style="width: 100% !important;">
                                                <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->

                                                    <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:50px 20px 20px;font-family:arial,helvetica,sans-serif;" align="left">
                                                                <div style=" line-height: 120%; text-align: center; word-wrap: break-word;" id="hoten">
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
                                                                            <div class="avatar-edit">
                                                                                <input name="avt" type='file' id="imgUploadcv" accept=".png, .jpg, .jpeg" />
                                                                                <label for="imgUploadcv"></label>
                                                                            </div>
                                                                            <div class="avatar-preview">
                                                                                <div id="imagePreviewcv" style="background-image: url('{{ URL::asset('public/img/jobseeker/user.jpg')}}">
                                                                                </div>
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
                                                                        <div  class="row">
                                                                            <div class="column" style="text-align: left;">
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="email" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-envelope-open"></i> EMAIL</span></em></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="ngaysinh" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-calendar"></i> NG??Y SINH</span></em></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="gioitinh" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-venus-mars"></i> GI???I T??NH</span></em></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="sdt" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-phone-square"></i> S??? ??I???N THO???I</span></em></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:10px;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="diachi" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-location-arrow"></i> ?????A CH???</span></em></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 16px; line-height: 22.4px;"><em style="font-size: 30px;"><span id="thanhpho" style="line-height: 22.4px; font-size: 16px;"><i class="fa fa-building"></i> TH??NH PH???</span></em></span></p>
                                                                            </div>
                                                                            <div class="column" style="text-align: right;">
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:17px;"><span style="font-size: 16px; line-height: 22.4px;"><span id="email_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->email}}</span></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:17px;"><span style="font-size: 16px; line-height: 22.4px;"><span id="ngaysinh_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->ngaysinh}}</span></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:17px;"><span style="font-size: 16px; line-height: 22.4px;"><span id="gioitinh_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->gioitinh}}</span></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:17px;"><span style="font-size: 16px; line-height: 22.4px;"><span id="sdt_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->sdt}}</span></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;padding-bottom:17px;"><span style="font-size: 16px; line-height: 22.4px;"><span id="diachi_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->diachi}}</span></span></p>
                                                                                <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 16px; line-height: 22.4px;"><span id="thanhpho_dt" style=" font-size: 16px; line-height: 22.4px;">{{$ungvien->thanhpho}}</span></span></p>
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

                                                                @if(isset($hocvan) && count($hocvan) > 0)
                                                                <div class="cv-content">
                                                                    <div class="row">
                                                                        <input class="form-comtrol cv-content-title " type="text" value="H???C V???N" name="tieude1" id="tieude1">
                                                                    </div>
                                                                    <textarea style="width: 100%" id="hocvan" name="chitiet1" class="chitiet">
                                                                        @foreach ($hocvan as $hv)
                                                                        <p>H???c:&nbsp;<strong>{{$hv->chuyennganh}}&nbsp; -&nbsp;</strong>T???i:&nbsp;<strong>{{$hv->truong}}&nbsp;</strong></p>
                                                                        <p>C???p b???c:&nbsp;<strong>{{$hv->bangcap}}</strong>&nbsp;- Th???i gian:&nbsp;<strong>{{$hv->ngaybd}} - {{$hv->ngaykt}}</strong></p>
                                                                        {{-- <p><em>{{$hv->mota}}</em></p> --}}
                                                                        <hr />
                                                                        <p>&nbsp;</p>
                                                                        @endforeach
                                                                    </textarea>
                                                                </div>
                                                                @endif
                                                                @if(isset($kinhnghiem) && count($kinhnghiem) > 0)
                                                                <div class="cv-content">
                                                                    <div class="row">
                                                                        <input class="form-comtrol cv-content-title " type="text" value="KINH NGHI???M" name="tieude2" id="tieude2">
                                                                    </div>
                                                                    <textarea style="width: 100%" id="kinhnghiem" name="chitiet2" class="chitiet">
                                                                        @foreach ($kinhnghiem as $kn)
                                                                        <p>V??? tr??:&nbsp;<strong>{{$kn->chucdanh}}&nbsp;</strong>&nbsp;- T???i:&nbsp;<strong>{{$kn->congty}}&nbsp;</strong></p>
                                                                        <p>Th???i gian:<strong>&nbsp;{{$kn->ngaybd}} - {{$kn->ngaykt}}</strong></p>
                                                                        {{-- <p><em>{{$kn->mota}}</em></p> --}}
                                                                        <hr />
                                                                        <p>&nbsp;</p>
                                                                        @endforeach
                                                                    </textarea>
                                                                </div>
                                                                @endif
                                                                @if(isset($ngoaingu) && count($ngoaingu) > 0)
                                                                <div class="cv-content">
                                                                    <div class="row">
                                                                        <input class="form-comtrol cv-content-title " type="text" value="NGO???I NG???" name="tieude3" id="tieude3">
                                                                    </div>
                                                                    <textarea style="width: 100%" id="ngoaingu" name="chitiet3" class="chitiet">
                                                                        @foreach ($ngoaingu as $nn)
                                                                        <p>Ng??n ng???:&nbsp;<strong>{{$nn->tenngoaingu}}&nbsp;</strong></p>
                                                                        <p>M??c ????? th??nh th???o:&nbsp;<strong>{{$nn->mucdo}}&nbsp;</strong></p>
                                                                        <hr />
                                                                        <p>&nbsp;</p>
                                                                        @endforeach
                                                                    </textarea>
                                                                </div>
                                                                @endif

                                                                @for ($i=4; $i<14;$i++)
                                                                <div class="cv-content">
                                                                    <div class="row">
                                                                        <input class="form-comtrol cv-content-title " type="text" placeholder="TI??U ????? N???I DUNG..." name="tieude{{$i}}" id="tieude{{$i}}">
                                                                    </div>
                                                                    <textarea style="width: 100%" id="chitiet{{$i}}" name="chitiet{{$i}}" class="chitiet"></textarea>
                                                                </div>
                                                                <script>
                                                                    CKEDITOR.replace( 'chitiet{{$i}}' );
                                                                    CKEDITOR.config.entities = false;
                                                                </script>
                                                                @endfor
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                        <tbody>
                                                            <tr>
                                                            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="center">
                                                                <button type="submit" class="btn btn-success" style="width: 100px;">L??U CV</button>
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
                </form>
            </div>
           </div>
        </div>
    </div>
    <!-- Main CV -->


    {{-- Color Picker --}}
    <script>
        $(".colorPickSelector").colorPick({
            'initialColor': '#4bdbb5',
            'onColorSelected': function() {
                this.element.css({'backgroundColor':this.color,'color':this.color});
                $('#colorPreview').css({'backgroundColor': this.color, 'color': this.color});
                $('#maucv').val(this.color);
            }
        });
        $(".colorPickSelector2").colorPick({
            'initialColor': '#147259',
            'onColorSelected': function() {
                this.element.css({'backgroundColor':this.color,'color':this.color});
                $('#hoten').css({'Color': this.color, 'color': this.color});
                $('#ngaysinh').css({'Color': this.color, 'color': this.color});
                $('#ngaysinh_dt').css({'Color': this.color, 'color': this.color});
                $('#gioitinh').css({'Color': this.color, 'color': this.color});
                $('#gioitinh_dt').css({'Color': this.color, 'color': this.color});
                $('#email').css({'Color': this.color, 'color': this.color});
                $('#email_dt').css({'Color': this.color, 'color': this.color});
                $('#sdt').css({'Color': this.color, 'color': this.color});
                $('#sdt_dt').css({'Color': this.color, 'color': this.color});
                $('#thanhpho').css({'Color': this.color, 'color': this.color});
                $('#thanhpho_dt').css({'Color': this.color, 'color': this.color});
                $('#diachi').css({'Color': this.color, 'color': this.color});
                $('#diachi_dt').css({'Color': this.color, 'color': this.color});
                $('#mauchu_lh').val(this.color);
            }
        });
        $(".colorPickSelector3").colorPick({
            'initialColor': '#4bdbb5',
            'onColorSelected': function() {
                this.element.css({'backgroundColor':this.color,'color':this.color});
                $('#mauchu_nd').val(this.color);
                $('#tieude1').css({'Color': this.color, 'color': this.color});
                $('#tieude2').css({'Color': this.color, 'color': this.color});
                $('#tieude3').css({'Color': this.color, 'color': this.color});
                $('#tieude4').css({'Color': this.color, 'color': this.color});
                $('#tieude5').css({'Color': this.color, 'color': this.color});
                $('#tieude6').css({'Color': this.color, 'color': this.color});
                $('#tieude7').css({'Color': this.color, 'color': this.color});
                $('#tieude8').css({'Color': this.color, 'color': this.color});
                $('#tieude9').css({'Color': this.color, 'color': this.color});
                $('#tieude10').css({'Color': this.color, 'color': this.color});
                $('#tieude11').css({'Color': this.color, 'color': this.color});
                $('#tieude12').css({'Color': this.color, 'color': this.color});
                $('#tieude13').css({'Color': this.color, 'color': this.color});
                $('#tieude14').css({'Color': this.color, 'color': this.color});
            }
        });
    </script>

    {{-- CKEDITOR --}}
    <script>
        CKEDITOR.replace( 'hocvan' );
        CKEDITOR.replace( 'kinhnghiem' );
        CKEDITOR.replace( 'ngoaingu' );
        CKEDITOR.config.entities = false;
    </script>
    {{-- CKEDITOR --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/readmore.js') }}"></script>
    <script type="text/javascript">
        $('.catelog-list').readmore({
        speed: 75,
        maxHeight: 150,
        moreLink: '<a href="#">Xem th??m<i class="fa fa-angle-down pl-2"></i></a>',
        lessLink: '<a href="#">R??t g???n<i class="fa fa-angle-up pl-2"></i></a>'
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


    {{-- Avatar upload and preview --}}
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreviewcv').css('background-image', 'url('+e.target.result +')');
                    // $('#imagePreview').hide();
                    // $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgUploadcv").change(function() {
            readURL(this);
        });
    </script>

    <!-- job support -->
    <div class="container-fluid job-support-wrapper">
        <div class="container-fluid job-support-wrap">
            <div class="container job-support">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <ul class="spp-list">
                        <li>
                            <span><i class="fa fa-question-circle pr-2 icsp"></i>H??? tr??? nh?? tuy???n d???ng:</span>
                        </li>
                        <li>
                            <span><i class="fa fa-phone pr-2 icsp"></i>083.578.4337</span>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="newsletter">
                            <span class="txt6">????ng k?? nh???n b???n tin vi???c l??m</span>
                            <div class="input-group frm1">
                            <input type="text" placeholder="Nh???p email c???a b???n" class="newsletter-email form-control">
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
                            33 X?? Vi???t Ngh??? T??nh, ???? N???ng
                        </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-12">
                    <h2 class="footer-heading">
                        <span>Ng??n ng??? n???i b???t</span>
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
                        <span>T???t c??? ng??nh ngh???</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">L???p tr??nh vi??n</a></li>
                        <li><a href="#">Ki???m th??? ph???n m???m</a></li>
                        <li><a href="#">K??? s?? c???u n???i</a></li>
                        <li><a href="#">Qu???n l?? d??? ??n</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-12">
                    <h2 class="footer-heading">
                        <span>T???t c??? h??nh th???c</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">Nh??n vi??n ch??nh th???c</a></li>
                        <li><a href="#">Nh??n vi??n b??n th???i gian</a></li>
                        <li><a href="#">Freelancer</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-12 col-12">
                    <h2 class="footer-heading">
                        <span>T???t c??? t???nh th??nh</span>
                    </h2>
                    <ul class="footer-list">
                        <li><a href="#">H??? Ch??nh Minh</a></li>
                        <li><a href="#">H?? N???i</a></li>
                        <li><a href="#">???? N???ng</a></li>
                        <li><a href="#">Bu??n Ma Thu???t</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid copyright-wrap">
        <div class="container copyright">
            <p class="copyright-content">
            Copyright ?? 2020 <a href="#"> Tech<b>Job</b></a>. All Right Reserved.
            </p>
        </div>
    </footer>

</body>

</html>


