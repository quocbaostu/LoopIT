<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quên mật khẩu - LoopIt</title>
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
					<span class="login-breadcrumb"><em>/</em> Quên mật khẩu</span>
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
                                <div style="height: 25px"></div>
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Khôi phục mật khẩu đăng nhập</label>
                                <div class="login-frm">
                                    <form method="post" action="{{ route('js_postForgotpass')}}">
                                        {{ csrf_field() }}
                                        <div class="group">
                                            <label for="user" class="label">Nhập Email cần khôi phục mật khẩu</label>
                                            <input id="user" type="email" class="input" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="Gửi mail xác nhận">
                                        </div>
                                        @if (Session::get('message_invalid') != null )
                                            <div class="alert alert-danger login-alert">
                                                Email không tồn tại trong hệ thống hoặc chưa được xác nhận!
                                            </div>
                                        @endif
                                        <div class="hr"></div>
                                        <div>
                                            <a href="{{route('js_getLogin')}}" class="btn btn-back-login">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                                <span>Trở về trang đăng nhập</span>
                                            </a>
                                        </div>
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
