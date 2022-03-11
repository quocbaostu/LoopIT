@extends('layout.recruiter.main')
@section('recruiter_content')

<!-- widget recuitment  -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <a href="{{route('recruiter.list_jobseeker_apply')}}" class="btn btn-lg btn-success">Quay Lại</a>
      </div>
      <div class="col-md-4">
        <div id="msgSucc" class="alert alert-success"  role="alert">
          {{Session::get('msg_success')}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) widget recuitment  -->

<!-- published recuitment -->
<div class="container-fluid published-recuitment-wrapper mt-3 mb-3">
  <div class="container published-recuitment-content">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-12 recuitment-inner ">
        <div class="card">
            <div class="card-header bg-success ">
                <h2 class="text-center text-light font-weight-bolder">Thông tin chung</h2>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                @if($cv->hinhdaidien == null)
                <div class="col-6 text-center" ><img class="rounded-circle" src="{{ URL::asset('public/img/icon_avatar.jpg') }}" width="100px" height="100px"></div>
                @else
                <div class="col-6 text-center" ><img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/avt_cv/'.$cv->hinhdaidien)}}" width="100px" height="100px"></div>
                @endif
                <div class="col-6 text-left" >
                    <div class="row">
                        <div class="col-12">
                            <h3 class="font-weight-light">{{$ungVien->ho}} {{$ungVien->ten}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3" ><strong  class="font-weight-bold">Email:</strong></div>
                        <div class="col-9" >{{$ungVien->email}}</div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-3" ><strong class="font-weight-bold">SĐT:</strong></div>
                        <div class="col-9">{{$ungVien->sdt}}</div>
                    </div>
                </div>
                <hr>
                </div>
                <hr>
                <div class="row mt-4">
                <div class="col-2" ><strong class="font-weight-bold">Giới tính:</strong></div>
                <div class="col-4"> {{$ungVien->gioitinh}}</div>
                <div class="col-2" ><strong  class="font-weight-bold">Ngày sinh:</strong></div>
                <div class="col-4" >{{date("d/m/Y", strtotime($ungVien->ngaysinh))}}</div>
                </div>
                <hr>
                <div class="row mt-4">
                <div class="col-2" ><strong class="font-weight-bold">Địa chỉ:</strong></div>
                <div class="col-10">{{$ungVien->diachi}}, {{$ungVien->thanhpho}}</div>
                </div>
                <hr>
                <div class="row mt-4">
                <div class="col-2" ><strong class="font-weight-bold">Chức danh hiện tại:</strong></div>
                <div class="col-4">{{$cv->chucdanhht}}</div>
                <div class="col-2" ><strong class="font-weight-bold">Cấp bậc:</strong></div>
                <div class="col-4">{{$cv->capbacht}}</div>
                
                </div>
                <hr>
                <div class="row mt-4">
                <div class="col-2" ><strong  class="font-weight-bold">Kinh nghiệm:</strong></div>
                <div class="col-4" >{{$cv->sonamkn}} năm</div>
                <div class="col-2" ><strong class="font-weight-bold">Mức lương mong muốn:<span class="badge font-weight-lighter">(USD)</span></strong></div>
                <div class="col-4">{{$cv->mucluongmm}}</div>
               
                </div>
                <hr>
                <div class="row mt-4">
                <div class="col-2" ><strong  class="font-weight-bold">Ngành nghề mong muốn:</strong></div>
                <div class="col-4" >{{$ungVien->nganhnghemm}}</div>
                <div class="col-2" ><strong class="font-weight-bold">Nơi làm việc mong muốn:</strong></div>
                <div class="col-4">{{$ungVien->noilamviecmm}}</div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-success"><h2 class="text-center text-light font-weight-bolder">Nội dụng CV</h2></div>
            <div class="card-body">
              <object width="100%" height="800px" type="application/pdf" data="{{ URL::asset('public/cv/'.$cv->tenfile) }}?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
                <p>Insert your error message here, if the PDF cannot be displayed.</p>
              </object>
            </div>
        </div>

         
          
                  
      </div>
      <!-- Side bar -->
        @include('layout.recruiter.sidebar-detail-cv')
        <!-- End Side bar -->
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
<!-- (end) job support -->
<!-- Alert Success-->
@if(session('msg_success'))
<script type="text/javascript">
  $('#msgSucc').show()
  setTimeout(function() {
    $("#msgSucc").fadeTo(1000, 400).slideUp(400, function(){
        $("#msgSucc").fadeOut();
    });
  }, 1000);
</script>
@endif

@endsection




