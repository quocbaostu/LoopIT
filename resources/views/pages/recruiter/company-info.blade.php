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

        <div class="col-md-8 col-sm-12 col-12  ">
            <div class="row  mt-2 sizeh1" >
              <div class="col-6">
              <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ HỒ SƠ </h4>
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
            <form method="post" action="{{ route('recruiter.company_info_post') }}"  class="recuitment-form recuitment-inner" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="accordion" id="accordionExample">
                    <div class="card recuitment-card ">
                        <div class="card-header recuitment-card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Thông tin công ty
                            <span id="clickc1_advance1" class="clicksd">
                                <i class="fa fa fa-angle-up"></i>
                            </span>
                            </a>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body recuitment-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Tên công ty<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" name="tencty" value="{{old('tencty') ?? isset($hoSoNTD) ? $hoSoNTD->tencty : '' }}" class="form-control" placeholder="Tên công ty"/>
                                    @error('tencty')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Địa chỉ<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" name="diachicty" value="{{old('diachicty') ?? isset($hoSoNTD) ? $hoSoNTD->diachicty : ''}}" class="form-control" placeholder="Nhập địa chỉ"/>
                                    @error('diachicty')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Tỉnh/ Thành Phố<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <select type="text" name="thanhpho" class="form-control" id="jobProvince2">
                                        <option value="0">Tỉnh/Thành Phố</option>
                                        @if(isset($hoSoNTD))
                                          @foreach($thanhpho as $tp)
                                              @if($tp->tentp == $hoSoNTD->thanhpho)
                                              <option value="{{ $tp->tentp }}" selected>{{$tp->tentp}}</option>
                                              @else
                                              <option value="{{ $tp->tentp }}">{{$tp->tentp}}</option>
                                              @endif
                                          @endforeach
                                        @else
                                          @foreach($thanhpho as $tp)
                                            <option value="{{ $tp->tentp }}">{{$tp->tentp}}</option>
                                          @endforeach
                                        @endif
                                    </select>
                                    @error('thanhpho')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Quy mô nhân sự<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <select type="text" name="quymo" class="form-control" id="jobEmployerScale">
                                        <option value="0">Chọn quy mô</option>
                                        <option value="Dưới 20 người">Dưới 20 người</option>
                                        <option value="20 - 150 người">20 - 150 người</option>
                                        <option value="150 - 300 người">150 - 300 người</option>
                                        <option value="Trên 300 người">Trên 300 người</option>
                                    </select>
                                    @error('quymo')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Lĩnh vực hoạt động<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <select type="text" name="linhvuchd" class="form-control" id="jobFieldsActivity">
                                      <option value="0">Chọn lĩnh vực hoạt động</option>
                                      @if(isset($hoSoNTD))
                                        @foreach($loainganhnghe as $lnn)
                                          @if($lnn->tenloainn == $hoSoNTD->linhvuchd)
                                            <option value="{{ $lnn->tenloainn }}" selected>{{$lnn->tenloainn}}</option>
                                          @else
                                            <option value="{{ $lnn->tenloainn }}">{{$lnn->tenloainn}}</option>
                                          @endif
                                        @endforeach
                                      @else
                                        @foreach($loainganhnghe as $lnn)
                                          <option value="{{ $lnn->tenloainn }}">{{$lnn->tenloainn}}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                    @error('linhvuchd')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Sơ lược về công ty<span style="color: red" class="pl-2">*</span></label>
                                    <div class="col-sm-9">
                                    <textarea type="text" name="mota" id="mota" class="form-control" placeholder="Sơ lược về công ty" rows="5">{{ old('mota') ?? isset($hoSoNTD) ? $hoSoNTD->mota : '' }}
                                    </textarea>
                                    @error('mota')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                    </div>
                                    <!-- CKEDITOR -->
                                    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
                                    <script>
                                        CKEDITOR.replace( 'mota', '#motacongviec' );
                                        CKEDITOR.config.entities = false;
                                        
                                    </script>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Logo</label>
                                    <div class="col-sm-7 " >
                                        <div id="drop-area">
                                            <input name="logo" type="file" id="logo-img" accept="image/*" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]);" hidden="hidden">
                                            <button type="button" class="btn btn-success" id="upload-logo-button">Chọn Tệp</button>
                                            <span class="ml-3" id="upload-logo-span">Chưa có tệp nào được chọn.</span>
                                            <hr>
                                            @if(isset($hoSoNTD))
                                            <img id="photo" src="{{URL::asset('public/img/recruiter/uploads/'.$hoSoNTD->logo)}}"   class="mt-3 border border-success rounded-circle"  width="75" height="75" />
                                            @else
                                            <img id="photo" src=""   class="mt-3 border border-success rounded-circle"  width="75" height="75" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right label">Website</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="website" value="{{old('website') ?? isset($hoSoNTD) ? $hoSoNTD->website : '' }}" class="form-control" placeholder="Website"/>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="rec-submit">
                    <button type="submit" class="btn-submit-recuitment ml-5">
                        <i class="fa fa-floppy-o pr-2"></i>Lưu Cập Nhật
                    </button>
                </div>
                @if(isset($hoSoNTD))
                <script type="text/javascript">
                window.addEventListener("load", function() {
                    $('#jobEmployerScale').val('{{ $hoSoNTD->quymo }}').change();
                });
                </script>
                @endif
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




