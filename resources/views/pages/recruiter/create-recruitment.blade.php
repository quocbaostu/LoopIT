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
<div class="published-recuitment-wrapper1">
  <div class="container published-recuitment-content">
    <div class="row">
      <!-- Side bar -->
      @include('layout.recruiter.sidebar-recruitment')  
      <!-- End Side bar -->
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner">
        <div class="row  mt-2 sizeh1" style="width:950px;">
          <div class="col-5">
            <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ ĐĂNG TUYỂN</h4>
          </div>
          <div class="col-md-4 col-4 col-sm-4 col-sm-4 col-lg-4 col-xs-4">
            <div id="msgSucc" class="alert alert-success"  role="alert">
              {{Session::get('msg_success')}}
            </div>
            
          </div>
          <div class="col-md-3 col-3 col-sm-3 col-sm-3 col-lg-3 col-xs-3">
            <a class="btn btn-success float-right" href="{{route('recruiter.list_recruitment')}}" style="width:180px; height:40px; "><i class="fa fa-angle-double-left mr-2" aria-hidden="true"></i> Quay lại</a> 
          </div>
        </div>
        <form method="post" action="{{ route('recruiter.create_recruitment_post') }}"  class="recuitment-form recuitment-inner">
              {{ csrf_field() }}
                <div class="accordion" id="accordionExample">
                    <div class="card recuitment-card ">
                      <div class="card-header recuitment-card-header" id="headingThree">
                      <h2 class="mb-0">
                          <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Thêm Tin Tuyển Dụng
                          <span id="clickc1_advance1" class="clicksd">
                              <i class="fa fa fa-angle-up"></i>
                          </span>
                          </a>
                      </h2>
                      </div>
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body recuitment-body">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Tên công việc/Chức danh<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" name="tencongviec" value="{{old('tencongviec')}}" class="form-control" placeholder="Nhập tên công việc">
                              @error('tencongviec')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Cấp bậc<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-3">
                              <select type="text" name="capbac" class="form-control" id="jobGender">
                                <option value="0">Chọn cấp bậc</option>
                                <option value="Thực tập sinh/Sinh viên">Thực tập sinh/Sinh viên</option>
                                <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Trưởng phòng">Trưởng phòng</option>
                                <option value="Giám đốc/Cấp cao hơn">Giám đốc/Cấp cao hơn</option>
                              </select>
                              @error('capbac')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('capbac') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#jobGender').val(`{{ old('capbac') }}`).change();
                                });
                                </script>
                              @endif
                            </div>

                            <label class="col-sm-3 col-form-label text-right label">Loại công việc<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-3">
                              <select type="text" name="loaicongviec" class="form-control" id="natureWork">
                                <option value="0">Chọn loại công việc</option>
                                <option value="Thực tập">Thực tập</option>
                                <option value="Toàn thời gian">Toàn thời gian</option>
                                <option value="Bán thời gian">Bán thời gian</option>
                                <option value="Nghề tự do">Nghề tự do</option>
                                <option value="Hợp đồng thời vụ">Hợp đồng thời vụ</option>
                                <option value="Khác">Khác</option>
                              </select>
                              @error('loaicongviec')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('loaicongviec') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#natureWork').val(`{{ old('loaicongviec') }}`).change();
                                });
                                </script>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Địa điểm làm việc<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-4">
                              <input type="text" name="diadiemlamviec" value="{{old('diadiemlamviec')}}" class="form-control" placeholder="Nhập địa điểm làm việc">
                              @error('diadiemlamviec')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                            </div>

                            <label class="col-sm-2 col-form-label text-right label">Tỉnh/Thành phố<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-3">
                              <select type="text" name="thanhpho" class="form-control" id="jobProvince">
                                @if(old('thanhpho') != null)
                                <option value="0">Chọn Tỉnh/Thành Phố</option>
                                  @foreach($thanhpho as $tp)
                                      @if($tp->tentp == old('thanhpho'))
                                      <option value="{{ $tp->tentp }}" selected>{{$tp->tentp}}</option>
                                      @else
                                      <option value="{{ $tp->tentp }}">{{$tp->tentp}}</option>
                                      @endif
                                  @endforeach
                                @else
                                  <option value="0">Chọn Tỉnh/Thành phố</option>
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
                            <label class="col-sm-3 col-form-label text-right label">Trình độ<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-3">
                              <select type="text" name="trinhdo" class="form-control" id="jobLevel"> 
                                <option value="0">Chọn trình độ</option>
                                <option value="Đại học">Đại học</option>
                                <option value="Cao đẳng">Cao đẳng</option>
                                <option value="Trung cấp">Trung cấp</option>
                                <option value="Cao học">Cao học</option>
                                <option value="Trung học">Trung học</option>
                                <option value="Chứng chỉ">Chứng chỉ</option>
                                <option value="Lao động phổ thông">Lao động phổ thông</option>
                                <option value="Không yêu cầu">Không yêu cầu</option>
                              </select>
                              @error('trinhdo')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('trinhdo') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#jobLevel').val(`{{ old('trinhdo') }}`).change();
                                });
                                </script>
                              @endif
                            </div>

                            <label class="col-sm-3 col-form-label text-right label">Kinh nghiệm<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-3">
                              <select type="text" name="kinhnghiem" class="form-control" id="jobExperience">
                                <option value="0">Chọn kinh nghiệm</option>
                                <option value="Chưa có kinh nghiệm">Chưa có kinh nghiệm</option>
                                <option value="Dưới 1 năm">Dưới 1 năm</option>
                                <option value="1 năm">1 năm</option>
                                <option value="2 năm">2 năm</option>
                                <option value="3 năm">3 năm</option>
                                <option value="4 năm">4 năm</option>
                                <option value="5 năm">5 năm</option>
                                <option value="Trên 5 năm">Trên 5 năm</option>
                                <option value="Không yêu cầu kinh nghiệm">Không yêu cầu kinh nghiệm</option>
                              </select>
                              @error('kinhnghiem')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('kinhnghiem') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#jobExperience').val(`{{ old('kinhnghiem') }}`).change();
                                });
                                </script>
                              @endif
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Mức lương<span style="color: red" class="pl-2">*</span>
                            <p><span class="badge font-weight-lighter">(USD)</span></p>
                            </label>
                            <div class="col-sm-4">
                              <select type="text" name="mucluong_toithieu" class="form-control" id="jobSalary">
                                <option value="0">Chọn mức lương tối thiểu</option>
                                <option value="100">100</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="1500">1500</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="5000">5000</option>
                                <option value="10000">10000</option>
                              </select>
                              @error('mucluong_toithieu')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('mucluong_toithieu') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#jobSalary').val(`{{ old('mucluong_toithieu') }}`).change();
                                });
                                </script>
                              @endif
                            </div>

                            <label class="col-sm-1 col-form-label text-right label"><hr class="bg-dark"></label>
                            <div class="col-sm-4">
                              <select type="text" name="mucluong_toida" class="form-control" id="jobWorkTime">
                                <option value="0">Chọn mức lương tối đa</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option value="1500">1500</option>
                                <option value="2000">2000</option>
                                <option value="3000">3000</option>
                                <option value="5000">5000</option>
                                <option value="10000">10000</option>
                                <option value="15000">15000</option>
                              </select>
                              @error('mucluong_toida')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                              @if(old('mucluong_toida') != null)
                                <script type="text/javascript">
                                window.addEventListener("load", function() {
                                    $('#jobWorkTime').val(`{{ old('mucluong_toida') }}`).change();
                                });
                                </script>
                              @endif
                            </div>
                            
                          </div>
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label text-right label">Ngành nghề<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <select type="text" multiple="multiple" name="nganhnghe[]" class="form-control" data-placeholder="Chọn Ngành Nghề" id="jobType">
                                @if(old('nganhnghe') != null)
                                  @php $listNganhNghe = old('nganhnghe'); @endphp
                                  @foreach($nganhnghe as $nn)
                                      <option value="{{ $nn->tennganhnghe }}" @if(in_array($nn->tennganhnghe, $listNganhNghe )) selected  @endif>{{$nn->tennganhnghe}}</option>
                                      
                                  @endforeach
                                @else
                                  @foreach($nganhnghe as $nn)
                                    <option value="{{ $nn->tennganhnghe }}">{{$nn->tennganhnghe}}</option>
                                  @endforeach
                                @endif
                              </select>
                              @error('nganhnghe')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                          <!-- jobProbation-->
                          <!-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Hạn nộp hồ sơ<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <input type="date" name="ngayhethan" value="{{ old('ngayhethan', date('d-m-Y')) }}" class="form-control" >
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Mô tả công việc<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <textarea type="text" name="motacongviec" class="form-control" id="txtarea1" rows="5">{{old('motacongviec')}}</textarea>
                              @error('motacongviec')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Yêu cầu công việc<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <textarea type="text" name="yeucaucongviec" class="form-control" id="txtarea2" rows="5">{{old('yeucaucongviec')}}</textarea>
                              @error('yeucaucongviec')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right label">Quyền lợi<span style="color: red" class="pl-2">*</span></label>
                            <div class="col-sm-9">
                              <textarea type="text" name="quyenloi" id="txtarea3" class="form-control" rows="5">{{old('quyenloi')}}</textarea>
                              @error('quyenloi')
                              <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                              @enderror
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
<!-- CKEditor create_recruitment -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.entities = false;
</script>
<script>
CKEDITOR.replace('txtarea1');
CKEDITOR.replace('txtarea2');
CKEDITOR.replace('txtarea3');
</script>
<!-- Alert Success-->
@if(session('msg_success'))
<script type="text/javascript">
  $('#msgSucc').show()
  setTimeout(function() {
    $("#msgSucc").fadeTo(700, 200).slideUp(200, function(){
        $("#msgSucc").fadeOut();
    });
  }, 700);
</script>
@endif




@endsection




