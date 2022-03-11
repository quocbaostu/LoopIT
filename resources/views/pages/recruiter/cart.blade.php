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
          <h3 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header-cart">Giỏ hàng</h3>
        </div>
        <div class="col-4 col-sm-4 col-md-4 col-lg-4  recuitment-inner">
          <div id="alertSuccess" class="alert alert-success"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            {{Session::get('update-cart-success')}}
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center align-item-center" >
            <ul id="progressbar">  
                <li class="active link-pgb" id="step1" ><a href="{{route('recruiter.list_services')}}">Chọn Dịch Vụ </a></li>  
                <li class="active link-pgb" id="step2"> <a href="{{ route('recruiter.cart')}}"> Kiểm Tra Giỏ Hàng </a></li>
                <li class="link-pgb" id="step3" ><a href="{{route('recruiter.check_out')}}">Thanh Toán </a></li>  
                <li class="link-pgb" id="step4"> <a href="#"> Đăng Ký Thành Công </a></li>  
            </ul>  
        </div>
    </div>
    <hr>
    <div class="row recuitment-form ">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Kiểm tra giỏ hàng
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
                                  <th style="width:40%">Tên dịch vụ</th>
                                  <th style="width:20%">Số ngày hiệu lực</th>
                                  <th style="width:8%">Số lượng</th>
                                  <th style="width:22%" class="text-center">Giá dịch vụ</th>
                                  <th style="width:10%">Thao tác</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php $total = 0; @endphp
                              @if(session('cart'))
                                @foreach($cart as $id_dichvu => $details)
                                  @php $total += $details['giadv'] * $details['soluong'] @endphp
                                  <tr data-id_dichvu="{{ $id_dichvu }}">
                                      <td>
                                         <h5 class="nomargin font-weight-bold">{{ $details['tendv'] }}</h5>
                                      </td>
                                      @if($details['songayhieuluc'] != 0)
                                      <td>{{ $details['songayhieuluc'] }} Ngày</td>
                                      @else
                                      <td>Không thời hạn</td>
                                      @endif
                                      <td>
                                          <input type="number" value="{{ $details['soluong'] }}"  class="form-control quantity update-cart" min="1" max="100"/>
                                      </td>
                                      <td class="text-center ">{{ number_format($details['giadv'] * $details['soluong']) }} VND</td>
                                      <td class="actions" data-th="">
                                          <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                      </td>
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
                                      <a href="{{ route('recruiter.list_services') }}" class="btn btn-warning"><i class="fa fa-backward" aria-hidden="true"></i> Tiếp tục chọn dịch vụ</a>
                                      <a href="{{ route('recruiter.check_out')}}" class="btn btn-success">Thanh toán</a>
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




