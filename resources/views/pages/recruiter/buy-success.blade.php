@extends('layout.recruiter.main')
@section('recruiter_content')

<!-- widget recuitment  -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ads-above">
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) widget recuitment  -->

<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper" id="forum-parent">
  <div class="container published-recuitment-content" id="forum">
    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8  recuitment-inner">
          <h3 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header-cart">Thành công</h3>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4  recuitment-inner">
          <div id="alertSuccess" class="alert alert-success"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Thông báo here
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center align-item-center" >
        <ul id="progressbar">  
                <li class="active link-pgb" id="step1" ><a style="pointer-events: none;">Chọn Dịch Vụ </a></li>  
                <li class="active link-pgb" id="step2"> <a style="pointer-events: none;"> Kiểm Tra Giỏ Hàng </a></li>
                <li class="active link-pgb" id="step3" ><a style="pointer-events: none;">Thanh Toán </a></li>  
                <li class="active link-pgb" id="step4"> <a  style="pointer-events: none;"> Đăng Ký Thành Công </a></li>  
            </ul>  
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="alert alert-success"  role="alert">
                @if(Session::get('req_success') == 1)
                Yêu cầu đăng ký thành công. Quản trị viên sẽ sớm liên hệ với bạn. Cảm ơn vì đã sử dụng dịch vụ!
                @else
                Thanh toán thành công. Cảm ơn bạn đã mua dịch vụ của chúng tôi!
                @endif
                
                </div>     
            </div> 
        </div>
    </div>
    <div class="row recuitment-form">
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="accordion" id="accordionExample">
              @if(Session::get('req_success') == 1)
              <a href="{{route('recruiter.history_orders')}}" class="ml-3 btn btn-outline-success ">Theo dõi đơn hàng</a>
              @else
              <a href="{{route('recruiter.my_services')}}" class="ml-3 btn btn-outline-success ">Dịch vụ đã đăng ký</a>
              @endif
                
            </div> 
        </div>
    </div>
    
   

  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix mt-5"></div>

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
            <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
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

@endsection




