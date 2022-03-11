<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thay đổi mật khẩu - LoopIt</title>
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
					<span class="login-breadcrumb"><em>/</em> Thay đổi mật khẩu</span>
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
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Thay đổi mật khẩu</label>
                                <div class="login-frm">
                                    <form method="post" action="{{ route('js_postChangepass', ['ungvien'=>$ungvien->id_uv])}}">
                                        {{ csrf_field() }}
                                        <div class="group">
                                            <label for="user" class="label">Nhập mật khẩu mới</label>
                                            <input id="user" type="password" class="input" name="password">
                                            @foreach ($errors->get('password') as $message)
                                                <div class="error">{{$message}}</div>
                                            @endforeach
                                        </div>
                                        <div class="group">
                                            <label for="user" class="label">Xác nhận mật khẩu mới</label>
                                            <input id="user" type="password" class="input" name="password_confirm">
                                            @foreach ($errors->get('password_confirm') as $message)
                                                <div class="error">{{$message}}</div>
                                            @endforeach
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="xác nhận">
                                        </div>
                                        @if (Session::get('message_success') != null)
                                            <div class="alert alert-success login-alert">
                                                Cập nhật mật khẩu thành công!
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
