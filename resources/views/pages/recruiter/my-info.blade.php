@extends('layout.recruiter.main')
@section('recruiter_content')

<!-- widget recuitment  -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ads-above">
         <!-- Thông báo ở đây-->
         
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) widget recuitment  -->

<!-- published recuitment -->
<div class="published-recuitment-wrapper1">
  <div class="container published-recuitment-content">
    <div class="row">

        <!-- Side bar -->
        @include('layout.recruiter.sidebar-acc-management')
        <!-- End Side bar -->

        <div class="col-md-8 col-sm-12 col-12">
            <div class="row  mt-2 sizeh1" >
              <div class="col-6">
              <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ TÀI KHOẢN </h4>
              </div>
              @if(Session::get('msg_success') != null)
              <div class="col-6" style="width:600px;">
                <div class="alert alert-success"  role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('msg_success')}}
                </div>
              </div>
              @endif
            </div>
            <form method="post" action="{{ route('recruiter.account_my_info_post') }}" class="recuitment-form recuitment-inner">
              {{ csrf_field() }}
                <div class="accordion" id="accordionExample">
                    <div class="card recuitment-card ">
                        <div class="card-header recuitment-card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Thông tin cá nhân
                            <span id="clickc1_advance1" class="clicksd">
                                <i class="fa fa fa-angle-up"></i>
                            </span>
                            </a>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body recuitment-body">
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label text-right label">Email<span style="color: red" class="pl-2">*</span></label>
                                  <div class="col-sm-9">
                                      <input type="email" name="email" value="{{ $taiKhoanNTD->email }}" class="form-control" placeholder="Địa chỉ email" readonly/>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label text-right label">Tên người liên hệ<span style="color: red" class="pl-2">*</span></label>
                                  <div class="col-sm-9">
                                      <input type="text" name="tennlh" value="{{ $taiKhoanNTD->tennlh ?? old('tennlh') }}" class="form-control" placeholder="Tên người liên hệ"/>
                                      @error('tennlh')
                                      <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="form-group row">
                                  <label class="col-sm-3 col-form-label text-right label">Điện thoại<span style="color: red" class="pl-2">*</span></label>
                                  <div class="col-sm-9">
                                      <input type="text" name="sdt" value="{{ $taiKhoanNTD->sdt ?? old('sdt') }}" class="form-control" placeholder="Nhập số điện thoại"/>
                                      @error('sdt')
                                      <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                      @enderror
                                      @if(Session::get('exist_sdt') != null)
                                      <div class="alert alert-danger form-control-user" role="alert">{{Session::get('exist_sdt')}}</div>
                                      @endif
                                  </div>
                              </div>
                              
                          </div>
                        </div>
                    </div>               
                </div>
                <div class="rec-submit">
                    <button type="submit" class="btn-submit-recuitment ml-5" >
                        <i class="fa fa-floppy-o pr-2"></i>Lưu Cập Nhật
                    </button>
                </div>
            </form> 
      </div>
      
    </div>
  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix"></div>

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




