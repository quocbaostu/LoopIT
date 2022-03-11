<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Success - LoopIT</title>
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

	@if(Session::get('message_create_acc_success') != null)
		<script type="text/javascript">
		$(window).load(function(){
			$('#SuccessCreateReAcc').modal('show');
		});
		</script>
	@endif

</head>
<body>
	<!-- modal success create ReAcc -->
	<div class="modal fade mt-5 owl-animated-in" style="z-index: 1101;" id="SuccessCreateReAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-success ">
						<h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body bg-gray-100 "><strong>{{Session::get('message_create_acc_success')}}</strong></div>
					
				</div>
			</div>
		</div>
		<!-- end modal success create ReAcc -->
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
					<span class="login-breadcrumb"><em>/</em> Success</span>
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
						
						<p class="alert alert-success"><img src="{{ URL::asset('public/img/recruiter/success.png')}}" class="align-middle" width="50px" height="50px" style="align: center;"> {{$verified}} </p>
                        <a id="btnsubmit" class="btn btn-primary float-right btn-login d-block w-100" href="{{route('recruiter.login') }}">Về trang đăng nhập Nhà tuyển dụng</a>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ URL::asset('public/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/main.js') }}"></script>
</body>
</html>
