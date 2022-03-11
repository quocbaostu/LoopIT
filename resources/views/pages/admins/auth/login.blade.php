<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('public/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>

    
     

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập Quản Trị Viên</h1>
                                    </div>
                                    <form method="post" action="{{ route('admin.login_post')}}" class="user">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}">
                                            @error('email')
                                            <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" name="matkhau" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Enter Password..." value="{{ old('matkhau') }}">
                                            @error('matkhau')
                                            <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                            @enderror
                                        </div>
                                        
                                     
                                        @if (Session::get('message_email_admin') != null && Session::get('message_matkhau_admin')!= null)
                                            <div class="alert alert-danger form-control-user" role="alert">
                                                Email hoặc Mật Khẩu Không trùng khớp !!
                                            </div>
                                        @elseif(Session::get('message_matkhau_admin') != null)                                   
                                            <div class="alert alert-danger form-control-user" role="alert">
                                                {{Session::get('message_matkhau_admin')}}
                                            </div>                                  
                                        @endif
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>                                                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                      <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    Remember Me</label>
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>