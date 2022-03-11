<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đổi mật khẩu  - LoopIT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    

	<!-- Roboto Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/bootstrap.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/recruiter-old-style.css') }}">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
	integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


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
						<a href="#">
							<img src="{{ URL::asset('public/img/techjobs_bgw.png') }}" alt="TechJobs">
						</a>
					</h3>
					<span class="login-breadcrumb"><em>/</em> Đổi Mật Khẩu</span>
				</div>
				
			</div>
		</div>
		<!-- (end) login header -->
		
		<div class="clearfix"></div>

		<div class="padding-top-90"></div>

		<!-- login main -->
		<div class="login-main mt-4">
			<div class="w-login m-auto">
				<div class="row">
					<!-- login main descriptions -->
					<div class="col-md-6 col-sm-12 col-12 login-main-left">
						<img src="{{ URL::asset('public/img/banner-login.png') }}">
					</div>
					<!-- login main form -->
					<div class="col-md-6 col-sm-12 col-12 login-main-right">						
						<form method="post" action="{{ route('recruiter.change_password_post') }}" class="login-form reg-form">
                            {{ csrf_field() }}
							<div class="login-main-header">
								<h3>Thay đổi mật khẩu của bạn</h3>
							</div>
							
						    <div class="input-div one">
								<div class="div lg-lable">
									<h5>Địa Chỉ Email<span class="req">*</span></h5>
									<input type="email" name="email" value="{{ old('email') }}" class="input form-control-lgin">
								</div>
								@error('email')
								<div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
								@enderror
								@if(Session::get('not_find_email'))
								@endif
								
							</div>
							<div class="input-div one">
								<div class="div lg-lable txtcheck">
									<h5>Mật khẩu mới<span class="req">*</span></h5>
									<input type="password" name="matkhau" value="{{ old('matkhau') }}" id="password" class="input form-control-lgin">
								</div>
								@error('matkhau')
								<div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
								@enderror
							</div>
                            <div class="input-div one">
								<div class="div lg-lable txtcheck">
										<h5>Nhập Lại Mật khẩu mới<span class="req">*</span></h5>
										<input type="password" name="matkhau_nhaplai" value="{{ old('matkhau_nhaplai') }}" id="confirm_password" class="input form-control-lgin">
								</div> 
								<div id='message' class="alert  form-control-user" role="alert" >                               
								</div>
								@error('matkhau_nhaplai')
								<div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
								@enderror
							</div>
                       
						  <div class="form-group d-block frm-text">
							<a href="{{ route('recruiter.register') }}" class="fg-login float-right d-inline-block">Bạn chưa có tài khoản? Đăng Ký</a>
						  </div>
						  <button type="submit" class="btn btn-primary float-right btn-login d-block w-100">Đổi mật khẩu</button>
						<div class="form-group d-block w-100 mt-5">
							<div class="text-or text-center"></div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- (end) login main -->
	</div>
</div>
<footer class="login-footer">
		<div class="w-login m-auto">
			<div class="row">
				<!-- login footer left -->
				<div class="col-md-6 col-sm-12 col-12 login-footer-left">
					<div class="login-copyright">
						<p>Copyright © 2020 <a href="#"> LoopIT</a>. All Rights Reserved.</p>
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
    <script type="text/javascript">
      $(".txtcheck input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtcheck input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      $('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Nhập lại mật khẩu đúng').css('color', 'green').addClass('alert-success').removeClass("alert-danger");
			document.getElementById("btnsubmit").disabled = false;
		} else {
			$('#message').html('Nhập lại mật khẩu sai').css('color', 'red').addClass('alert-danger');
			document.getElementById("btnsubmit").disabled = true;
		}		
      });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ URL::asset('public/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/main.js') }}"></script>
</body>
</html>
