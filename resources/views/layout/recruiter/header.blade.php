<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LoopIT - Nhà tuyển dụng</title>
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


  <!-- Custom styles for this page -->
  <link href="{{ URL::asset('public/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

   <!-- main css -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/recruiter-old-style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/css/recruiter-new-style.css') }}">

  


<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

 
 

    

</head>
<body>

<!-- main nav -->
<div class="container-fluid fluid-nav another-page">
  <div class="container cnt-tnar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light tjnav-bar">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <a href="{{ route('recruiter.home') }}" class="nav-logo">
    <img src="{{ URL::asset('public/img/techjobs_bgw.png') }}">
  </a>
  <button class="navbar-toggler tnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <!-- <span class="navbar-toggler-icon"></span> -->
    <i class="fa fa-bars icn-res" aria-hidden="true"></i>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto tnav-left tn-nav">
      <li class="nav-item">
        <a class="nav-link btn-employers" href="{{route('Home')}}" tabindex="-1" aria-disabled="true" target="_blank" style="color: #fff!important">Ứng Viên</a>
      </li>
      
      
      
    </ul>
    <ul class="navbar-nav mr-auto my-2 my-lg-0 tnav-right tn-nav">     
    <div id="alertDanger" class="alert alert-danger"  role="alert">
        {{Session::get('error')}}
      </div>
      <!-- Giỏ hàng -->
      <li class="nav-item dropdown" id="is-add-cart">
        <a class="nav-link dr-cart-top " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>@if(Session::get('cart') != null)<sup ><span class="badge badge-light">0</span></sup>@endif
        </a>
        <div class="dropdown-menu tdropdown" aria-labelledby="navbarDropdown" style="width: 200px; height: auto; text-align: center;">
          @if(Session::get('total_qtt') != null)
          <div class="row mt-3 mb-3">
            <div class="col-12">
              Có {{Session::get('total_qtt')}} dịch vụ trong giỏ.
            </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8 cart-top">
              <a class="btn btn-info" href="{{route('recruiter.cart')}}">Xem chi tiết</a>
            </div>
            <div class="col-2"></div>
          </div>
          @else
          <div class="row mt-3 mb-3">
            <div class="col-12">
              Chưa có dịch vụ nào trong giỏ.
            </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8 cart-top">
              <a class="btn btn-info" href="{{route('recruiter.cart')}}" >Xem chi tiết</a>
            </div>
            <div class="col-2"></div>
          </div>
          @endif
            
        </div>
      </li>
      
      
      
      
      
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-employers" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" style="color: #fff!important">       
            {{Session::get('recruiter_name')}}        
        </a>
        <div class="dropdown-menu tdropdown" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('recruiter.account_my_info') }}">Tài Khoản</a>    
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('recruiter.logout')}}">Đăng Xuất</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
  </div>
</div>
<!-- (end) main nav -->

<div class="clearfix"></div>

<!-- recuiter Nav -->
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment " >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNava" aria-controls="navbarNava" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse container" id="navbarNava">
    <ul class="navbar-nav nav-recuitment-li">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('recruiter.home') }}">Trang chủ</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('recruiter.list_recruitment') }}">Quản lý tin tuyển dụng</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('recruiter.my_services') }}">Quản lý dịch vụ</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('recruiter.list_cv_save')}}">Quản lý hồ sơ ứng viên</a>
      </li>
     
    </ul>
    <ul class="rec-nav-right">
      <li class="nav-item">
        <a class="nav-link" href="{{route('recruiter.cv_search')}}">Tìm hồ sơ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('recruiter.list_recruitment')}}">Đăng tuyển </a>
      </li>
    </ul>
  </div>
</nav>


<!--  recuiter Nav -->
<button onclick="topFunction()" class="btn btn-success" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

