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
          <h3 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header-cart">Đơn hàng</h3>
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
                <li class="active link-pgb" id="step1" ><a href="{{route('recruiter.list_services')}}">Chọn Dịch Vụ </a></li>  
                <li class="active link-pgb" id="step2"> <a href="{{ route('recruiter.cart')}}"> Kiểm Tra Giỏ Hàng </a></li>
                <li class="active link-pgb" id="step3" ><a href="{{route('recruiter.check_out')}}">Thanh Toán </a></li>  
                <li class="link-pgb" id="step4"> <a href="#"> Đăng Ký Thành Công </a></li>  
            </ul>  
        </div>
    </div>
    <hr>
    <div class="row recuitment-form ">
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="accordion" id="accordionExample">
              <div class="card recuitment-card ">
                  <div class="card-header recuitment-card-header" id="headingThree">
                  <h2 class="mb-0">
                      <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Thông tin đơn hàng
                      <span id="clickc1_advance1" class="clicksd">
                          <i class="fa fa fa-angle-up"></i>
                      </span>
                      </a>
                  </h2>
                  </div>
                  <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body recuitment-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                              <th style="width:70%">Tên dịch vụ</th>
                              <th style="width:10%" class="text-center">Số lượng</th>
                              <th style="width:20%" class="text-center">Giá dịch vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                              @foreach($cart as $id_dichvu => $details)
                                @php $total += $details['giadv'] * $details['soluong'] @endphp
                                <tr data-id_dichvu="{{ $id_dichvu }}">
                                    <td>
                                        <h5 class="nomargin font-weight-bold">{{ $details['tendv'] }}</h5>
                                        @if($details['loaidv'] == 1)
                                        <span class="font-weight-light font-italic">{{ $details['songayhieuluc'] }} ngày đăng tuyển.</span>
                                        @elseif($details['loaidv'] == 2)
                                        <span class="font-weight-light font-italic">{{$details['diemtk']}} điểm</span>
                                        @endif
                                        
                                    </td>
                                    <td class="text-center">
                                        x{{ $details['soluong'] }}
                                    </td>
                                    <td class="text-center ">{{ number_format($details['giadv'] * $details['soluong']) }} VND</td>
                                </tr>
                              @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                          @if(session('cart'))
                            <tr>
                                <td colspan="5" class="text-right"><h4><strong>Tổng: {{ number_format($total) }} VND</strong></h4></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ route('recruiter.cart') }}" class="btn btn-warning"><i class="fa fa-backward" aria-hidden="true"></i> Cập nhật giỏ hàng</a>
                                </td>
                            </tr>
                          @else
                            <tr>
                                <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có dịch vụ nào trong giỏ!!</strong></h5></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">
                                    <a href="{{ route('recruiter.list_services') }}" class="btn btn-warning"><i class="fa fa-backward" aria-hidden="true"></i> Chọn dịch vụ</a>
                                </td>
                            </tr>
                          @endif
                        </tfoot>
                      </table>
                    </div>
                  </div>
              </div>    
              <!-- -->
                        
            </div> 
            
        </div>
    </div>
    @if(session('cart'))
    <div class="row recuitment-form ">
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="accordion" id="accordionExample">
              <div class="card recuitment-card ">
                <div class="card-header recuitment-card-header" id="headingOne">
                <h2 class="mb-0">
                    <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Chọn phương thức thanh toán
                    <span id="clickc1_advance1" class="clicksd">
                        <i class="fa fa fa-angle-up"></i>
                    </span>
                    </a>
                </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body recuitment-body">

                    <div class="row">
                      <div class="col-2 col-sm-2 col-xs-2 col-md-2 col-lg-2"></div>
                      <div class="col-4 col-sm-4 col-xs-4 col-md-4 col-lg-4">
                        <div class="card" style="height: 240.02px;">
                          <h5 class="card-header text-center font-weight-light">Cổng Thanh Toán Online</h5>
                          <div class="card-body text-center">
                            @php $vnd_to_usd = $total/23024.98; @endphp
                            <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}"/>
                            <h5 class="card-title a-gold"><div id="paypal-button"></div></h5>
                            <p class="card-text font-weight-light">Thanh toán trực tiếp qua cổng thanh toán Paypal.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-sm-4 col-xs-4 col-md-4 col-lg-4">
                        <div class="card" style="height: 240.02px;">
                          <h5 class="card-header text-center font-weight-light">Chuyển Khoản</h5>
                          <div class="card-body text-center">
                            <form action="{{route('recruiter.save_order_transfer')}}" method="post">
                              {{csrf_field()}}
                              <input type="hidden" name="payment_status" value="2">
                            <h5 class="card-title a-gold">
                              <button type="submit" class="btn btn-outline-success">Xác nhận thanh toán chuyển khoản</button>
                            </h5>
                            </form>
                            <p class="card-text font-weight-light">Chúng tôi sẽ liên hệ Quý khách để xác nhận đơn hàng. Quý khách có thể đăng tin tuyển dụng sau khi hoàn tất thanh toán trong vòng 24-48 giờ tùy theo thời gian xử lý của từng ngân hàng</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-2 col-sm-2 col-xs-2 col-md-2 col-lg-2"></div>
                    </div>
                    
                  </div>
                </div>
              </div>        
            </div> 
        </div>
    </div>
    @endif

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

<!-- Paypal checkout-->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      var usd = document.getElementById("vnd_to_usd").value;
      paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
          sandbox: 'AYL8Ukca5NKwH96lo9RyTrXk7t_Z6V8-bJ_IW5PWiLDNdSOr7NYzr4QWuUoZS2rkJyd0LVsDcYq5jRmE',
          production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
          layout: 'horizontal',
          size: 'small',
          color:  'gold',
          shape:  'rect',
          label:  'paypal',
          tagline: 'false',
          height: 40,
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
          return actions.payment.create({
            transactions: [{
              amount: {
                total: `${usd}`,
                currency: 'USD'
              }
            }]
          });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
          var redirectUrl = `{{URL::to('/recruiter/save-order', ['payment_success'=>1])}}`;
          return actions.redirect(window,redirectUrl);
        }
      }, '#paypal-button');

    </script>

@endsection




