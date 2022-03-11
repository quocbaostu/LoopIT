<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - TechJobs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('pages.jobseeker.auth.css')
</head>
<body>
<div class="container-fluid login-fluid clear-left clear-right">
	<div class="login-container">
		<!-- login header -->
		<div class="login-header">
			<div class="w-login m-auto">
				<div class="login-logo">
					<h3>
						<!-- <a href="#">Tech<span class="txb-logo">Jobs.</span></a> -->
						<a href="{{route('Home')}}">
							<img src="{{URL::asset('public/img/techjobs_bgw.png')}}" alt="TechJobs">
						</a>
					</h3>
					<span class="login-breadcrumb"><em>/</em> Đăng nhập</span>
				</div>
				<div class="login-right">
					<a href="{{route('Home')}}" class="btn btn-return">Về trang chủ</a>
				</div>
			</div>
		</div>
		<!-- (end) login header -->

		<div class="clearfix"></div>

		<div class="padding-top-90" style="background-color: #0d8e56"></div>

		<!-- login main -->
		<div class="login-main">
			<div class="w-login m-auto">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-12 login-main-left">
					</div>
					<div class="col-md-6 col-sm-12 col-12 login-main-right">
                        <div class="login-wrap">
                            <div class="login-html">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập</label>
                                <input id="tab-2" type="radio" name="tab" class="sign-up"><a href="{{route('js_getSignup')}}" for="tab-2" class="tab">Đăng ký</a>
                                <div class="login-frm">
                                    <form method="post" action="{{ route('js_postLogin')}}">
                                        {{ csrf_field() }}
                                        <div class="group">
                                            <label for="user" class="label">Email</label>
                                            <input id="user" type="email" class="input" name="email" value="{{ old('email') }}">
                                            <div class="login-alert">
                                            @foreach ($errors->get('email') as $message)
                                                <div class="error">{{$message}}</div>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Mật khẩu</label>
                                            <input id="password" type="password" class="input" data-type="password" name="password">
                                            <div class="login-alert">
                                            @foreach ($errors->get('password') as $message)
                                                <div class="error">{{$message}}</div>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="Đăng nhập">
                                        </div>
                                        <div class="foot-lnk">
                                            <a href="{{route('js_getForgotpass')}}" class="help-lnk">Quên Mật khẩu?</a>
                                            <span class="vl-foot-link"></span>
                                            <a href="{{route('js_getResendveri')}}" class="help-lnk">Gửi lại thư xác nhận</a>
                                        </div>
                                        @if (Session::get('message_email') != null || Session::get('message_password') != null)
                                            <div class="alert alert-danger login-alert">
                                                Email hoặc Mật Khẩu không trùng khớp, vui lòng kiểm tra lại!
                                            </div>
                                        @elseif(Session::get('message_veri_alert') != null)
                                            <div class="alert alert-danger login-alert">
                                                Email của bạn chưa được xác thực. Vui lòng kiểm tra hòm thư và làm theo hướng dẫn!
                                            </div>
                                        @endif
                                        {{-- <div class="hr"></div>
                                        <div>
                                            <a href="" class="btn btn-google">
                                                <i class="fa fa-google" aria-hidden="true"></i>
                                                <span>Đăng nhập bằng Google</span>
                                            </a>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!-- (end) login main -->
	</div>
</div>

{{-- Footer --}}
<footer class="login-footer">
    <div class="w-login m-auto">
        <div class="row">
            <!-- login footer left -->
            <div class="col-md-6 col-sm-12 col-12 login-footer-left">
                <div class="login-copyright">
                    <p>Copyright © 2022 <a href="#"> LoopIT</a>. All Rights Reserved.</p>
                </div>
            </div>
            <!-- login footer right -->
            <div class="col-md-6 col-sm-12 col-12 login-footer-right">
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('pages.jobseeker.auth.js')

</body>
</html>
