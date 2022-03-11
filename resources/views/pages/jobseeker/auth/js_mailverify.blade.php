<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechJobs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('pages.jobseeker.auth.css')
</head>

<body>

<div class="container-fluid fluid-nav another-page">
    <div class="container cnt-tnar">
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
                <a class="nav-link" href="#">Việc Làm IT</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Công ty</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">
                @if(Session::get('js_name') != null)
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-profile2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                            <span>{{Session::get('js_name')}}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" style="width: 300px">
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
                    <a class="nav-link btn-employers" href="#" tabindex="-1" aria-disabled="true">Nhà Tuyển Dụng</a>
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

<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
        <div style="height: 150px"></div>
        <div class="card mb-3 veri-mail-req">
            <div class="card-body">
                <h5 class="card-title verimail-req-title">KIỂM TRA HÒM THƯ CỦA BẠN</h5>
                <p class="card-subtitle mb-2 text-muted verimail-req-subtitle">
                    Một email xác thực vừa gửi tới <span style="font-weight: bold">{{Session::get('js_email')}}</span>
                    Hãy kiểm tra hòm thư và làm theo hướng dẫn để hoàn tất bước đăng ký.
                </p>
                <p class="card-text verimail-req-text">Nếu không tìm thấy email, hãy kiểm tra hòm thư Spam hoặc bấm Gửi lại .</p>
                <div class="btn-verify">
                    <a href="#" class="btn btn-verify">Gửi lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.jobseeker.auth.js')
</body>

</html>
