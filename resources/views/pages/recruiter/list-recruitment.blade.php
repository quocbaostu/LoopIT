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
        @include('layout.recruiter.sidebar-recruitment')
        <!-- End Side bar -->

        <div class="col-md-8 col-sm-12 col-12  ">
            <div class="row mt-2 sizeh1 " style="width:950px;">
              <div class="col-md-4 col-4 col-sm-4 col-sm-4 col-lg-4 col-xs-4">
                <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header" >QUẢN LÝ ĐĂNG TUYỂN</h4>
              </div>
              <div class="col-md-5 col-5 col-sm-5 col-sm-5 col-lg-5 col-xs-5 ">
                <div id="msgSucc" class="alert alert-success"  role="alert">
                  {{Session::get('msg_success')}}
                </div>
                @if(session('msg_error'))
                <div  class="alert alert-danger"  role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h5 class="text-center">{{Session::get('mess_h5')}}</h5>
                  <hr>
                  <p>{{Session::get('mess_p1')}}</p>
                  <p class="mt-1">Đăng ký dịch vụ cao cấp hơn <a href="{{route('recruiter.list_services')}}"> tại đây</a></p>
                </div>
                @elseif(session('msg_error1'))
                <div  class="alert alert-danger"  role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h5 class="text-center">{{Session::get('mess_h5')}}</h5>
                  <hr>
                  <p>{{Session::get('mess_p1')}}</p>
                  <p class="mt-1">Xin cập nhật hồ sơ công ty <a href="{{route('recruiter.company_info')}}"> tại đây</a></p>
                </div>
                @endif
                @error('ngayhethan')
                <div class="alert alert-danger form-control-user" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  {{$message}}
                </div>
                @enderror
              </div>
              <div class="col-md-3 col-3 col-sm-3 col-sm-3 col-lg-3 col-xs-3">
                <a class="btn btn-success float-right" href="{{route('recruiter.create_recruitment')}}" style="width:180px; height:40px; ">Thêm Tin Tuyển Dụng</a> 
              </div>
            </div>

            <div class="recuitment-form recuitment-inner">
              <div class="accordion" id="accordionExample">
                <div class="card recuitment-card ">
                    <div class="card-header recuitment-card-header" id="headingThree">
                    <h2 class="mb-0">
                        <a class="btn btn-link btn-block text-left collapsed recuitment-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Danh sách tin tuyển dụng
                        <span id="clickc1_advance1" class="clicksd">
                            <i class="fa fa fa-angle-up"></i>
                        </span>
                        </a>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body recuitment-body">
                            <table class="table table-hover" id="tblDV">
                              <thead class="table-success">
                                <tr>
                                    <th width="2%">STT</th>
                                    <th width="25%" class="text-center">Tên Công Việc</th>
                                    <th class="text-center">Ngành Nghề</th>
                                   
                                    <th width="15%" class="text-center">Trạng thái</th>
                                    @if($tinTuyenDung != null)
                                    <th width="23%" class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt=1; @endphp
                            @if($tinTuyenDung != null)
                                @foreach($tinTuyenDung as $key => $val)
                                  @if($val->trangthai_tintd != -1)
                                  <tr>
                                    <td class="text-center">{{$stt++}}</td>
                                    <td class="text-center">{{$val->tencongviec}}</td>
                                    <td class="text-center">{{$val->nganhnghe}}</td>
                                    <td class="text-center">
                                      @if($val->trangthai_tintd == 0)
                                      <span class="bg-secondary radius-status">Chưa đăng</span>
                                      @elseif($val->trangthai_tintd == 1)
                                      <span class="bg-secondary radius-status">Hết hạn</span>
                                      @elseif($val->trangthai_tintd == 2)
                                      <span class="bg-success radius-status">Đã đăng</span>
                                      @elseif($val->trangthai_tintd == 3)
                                      <span class="bg-warning radius-status">Đã bị khóa</span>
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      @if($val->trangthai_tintd == 0 || $val->trangthai_tintd == 1)
                                      <button  class="btn btn-secondary" data-toggle="modal" data-target="{{'#posting-'.$val->id_tintd}}"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>
                                      @elseif($val->trangthai_tintd == 3)
                                      @else
                                      <button  class="btn btn-success" data-toggle="modal" data-target="{{'#remove_posting-'.$val->id_tintd}}"><i class="fa fa-toggle-on" aria-hidden="true"></i></button>
                                      @endif
                                      
                                      <button  class="btn btn-primary" data-toggle="modal" data-target="{{'#detail-'.$val->id_tintd}}"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
                                      <a  class="btn btn-warning" href="{{route('recruiter.update_recruitment', ['id_tintd' => $val->id_tintd ])}}"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                      <button  class="btn btn-danger" data-toggle="modal" data-target="{{'#del-'.$val->id_tintd}}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                    
                                     <!--Modal Details-->
                                     <div class="modal fade" id="{{'detail-'.$val->id_tintd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết Tin Tuyển Dụng</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên công việc:</strong></div>
                                                    <div class="col-10" >{{$val->tencongviec}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngành nghề:</strong></div>
                                                    <div class="col-4"> {{$val->nganhnghe}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Cấp bậc:</strong></div>
                                                    <div class="col-4" >{{$val->capbac}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trình độ:</strong></div>
                                                    <div class="col-4">{{$val->trinhdo}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Kinh nghiệm:</strong></div>
                                                    <div class="col-4" >{{$val->kinhnghiem}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Mức lương:<span class="badge font-weight-lighter">(USD)</span></strong></div>
                                                    <div class="col-4">{{$val->mucluong_toithieu}}-{{$val->mucluong_toida}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Loại công việc:</strong></div>
                                                    <div class="col-4" >{{$val->loaicongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Địa điểm làm:</strong></div>
                                                    <div class="col-10">{{$val->diadiemlamviec}}, {{$val->thanhpho}}</div>
                                                  </div>
                                                  @if($val->ngaydangtin != 0 || $val->ngayhethan != 0)
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày đăng tin:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngaydangtin))}}</div>
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày hết hạn:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngayhethan))}}</div>
                                                  </div>
                                                  @elseif($val->ngaydangtin == 0 || $val->ngayhethan == 0)
                                                  @endif
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trạng thái:</strong></div>
                                                    <div class="col-10">
                                                      @if($val->trangthai_tintd == 0)
                                                      Chưa đăng
                                                      @elseif($val->trangthai_tintd == 1)
                                                      Hết hạn
                                                      @elseif($val->trangthai_tintd == 2)
                                                      Đã đăng
                                                      @elseif($val->trangthai_tintd == 3)
                                                      <p class="text-danger">Đã bị khóa do vi phạm điều khoản của website</p>
                                                      @endif
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <div class="row">
                                                    <div class="col-12 mt-2" >
                                                      <strong class="font-weight-bold">Mô tả:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $val->motacongviec !!}
                                                      </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                    <strong class="font-weight-bold">Yêu cầu công việc:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $val->yeucaucongviec !!}
                                                      </div>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                    <strong class="font-weight-bold">Quyền lợi:</strong>
                                                      <div class="area-recruitment">
                                                        {!! $val->quyenloi !!}
                                                      </div>
                                                    </div>
                                                    
                                                  </div>
                                                  
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Delete-->
                                    <div class="modal fade" id="{{'del-'.$val->id_tintd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h3 class="text-center font-weight-light">Bạn thật sự muốn xóa tin tuyển dụng này?</h3>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên công việc:</strong></div>
                                                    <div class="col-10" >{{$val->tencongviec}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngành nghề:</strong></div>
                                                    <div class="col-4"> {{$val->nganhnghe}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Cấp bậc:</strong></div>
                                                    <div class="col-4" >{{$val->capbac}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trình độ:</strong></div>
                                                    <div class="col-4">{{$val->trinhdo}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Kinh nghiệm:</strong></div>
                                                    <div class="col-4" >{{$val->kinhnghiem}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Mức lương:<span class="badge font-weight-lighter">(USD)</span></strong></div>
                                                    <div class="col-4">{{$val->mucluong_toithieu}}-{{$val->mucluong_toida}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Loại công việc:</strong></div>
                                                    <div class="col-4" >{{$val->loaicongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Địa điểm làm:</strong></div>
                                                    <div class="col-10">{{$val->diadiemlamviec}}, {{$val->thanhpho}}</div>
                                                  </div>
                                                  @if($val->ngaydangtin != 0 || $val->ngayhethan != 0)
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày đăng tin:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngaydangtin))}}</div>
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày hết hạn:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngayhethan))}}</div>
                                                  </div>
                                                  @elseif($val->ngaydangtin == 0 || $val->ngayhethan == 0)
                                                  @endif
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trạng thái:</strong></div>
                                                    <div class="col-10">
                                                      @if($val->trangthai_tintd == 0)
                                                      Chưa đăng
                                                      @elseif($val->trangthai_tintd == 1)
                                                      Hết hạn
                                                      @elseif($val->trangthai_tintd == 2)
                                                      Đã đăng
                                                      @elseif($val->trangthai_tintd == 3)
                                                      <p class="text-danger">Đã bị khóa</p>
                                                      @endif
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('recruiter.delete_recruitment',['id_tintd' => $val->id_tintd ])}}" class="btn btn-outline-danger">Xác nhận</a>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Posting Recruitment-->
                                    <div class="modal fade show" id="{{'posting-'.$val->id_tintd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h3 class="text-center font-weight-light">Bạn muốn đăng tin tuyển dụng này?</h3>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên công việc:</strong></div>
                                                    <div class="col-10" >{{$val->tencongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngành nghề:</strong></div>
                                                    <div class="col-4"> {{$val->nganhnghe}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Cấp bậc:</strong></div>
                                                    <div class="col-4" >{{$val->capbac}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trình độ:</strong></div>
                                                    <div class="col-4">{{$val->trinhdo}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Kinh nghiệm:</strong></div>
                                                    <div class="col-4" >{{$val->kinhnghiem}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Mức lương:<span class="badge font-weight-lighter">(USD)</span></strong></div>
                                                    <div class="col-4">{{$val->mucluong_toithieu}}-{{$val->mucluong_toida}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Loại công việc:</strong></div>
                                                    <div class="col-4" >{{$val->loaicongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Địa điểm làm:</strong></div>
                                                    <div class="col-10">{{$val->diadiemlamviec}}, {{$val->thanhpho}}</div>
                                                  </div>
                                                 
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trạng thái:</strong></div>
                                                    <div class="col-10">
                                                      @if($val->trangthai_tintd == 0)
                                                      Chưa đăng
                                                      @elseif($val->trangthai_tintd == 1)
                                                      Hết hạn
                                                      @elseif($val->trangthai_tintd == 2)
                                                      Đã đăng
                                                      @elseif($val->trangthai_tintd == 3)
                                                      <p class="text-danger">Đã bị khóa</p>
                                                      @endif
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <form method="post" action="{{route('recruiter.posting_recruitment')}}">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="id_tintd" value="{{ $val->id_tintd}}">
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Hạn nộp hồ sơ:</strong></div>
                                                    <div class="col-4">
                                                      <input type="date" name="ngayhethan" value="{{old('ngayhethan')}}">
                                                    </div>
                                                    @if($exist_DVHT)
                                                    <div class="col-2" ><strong class="font-weight-bold">Hỗ trợ hiển thị</strong></div>
                                                    <div class="col-4">
                                                      <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="dichvuhotro" value="coban" id="dvht1" checked>
                                                          <label class="form-check-label" for="dvht1">
                                                            Cơ Bản
                                                          </label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="dichvuhotro" value="tuyengap" id="dvht2">
                                                          <label class="form-check-label" for="dvht2">
                                                            Tuyển Gấp
                                                          </label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="dichvuhotro" value="hapdan" id="dvht3">
                                                          <label class="form-check-label" for="dvht3">
                                                            Hấp Dẫn
                                                          </label>
                                                      </div>
                                                    </div>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-success">Xác nhận</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                                  </form>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Remove Posting Recruitment-->
                                    <div class="modal fade show" id="{{'remove_posting-'.$val->id_tintd}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h3 class="text-center font-weight-light">Bạn muốn hủy đăng tin tuyển dụng này?</h3>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong  class="font-weight-bold">Tên công việc:</strong></div>
                                                    <div class="col-10" >{{$val->tencongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngành nghề:</strong></div>
                                                    <div class="col-4"> {{$val->nganhnghe}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Cấp bậc:</strong></div>
                                                    <div class="col-4" >{{$val->capbac}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trình độ:</strong></div>
                                                    <div class="col-4">{{$val->trinhdo}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Kinh nghiệm:</strong></div>
                                                    <div class="col-4" >{{$val->kinhnghiem}}</div>
                                                    
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Mức lương:<span class="badge font-weight-lighter">(USD)</span></strong></div>
                                                    <div class="col-4">{{$val->mucluong_toithieu}}-{{$val->mucluong_toida}}</div>
                                                    <div class="col-2" ><strong  class="font-weight-bold">Loại công việc:</strong></div>
                                                    <div class="col-4" >{{$val->loaicongviec}}</div>
                                                  </div>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Địa điểm làm:</strong></div>
                                                    <div class="col-10">{{$val->diadiemlamviec}}, {{$val->thanhpho}}</div>
                                                  </div>
                                                  @if($val->ngaydangtin != 0 || $val->ngayhethan != 0)
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày đăng tin:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngaydangtin))}}</div>
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày hết hạn:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngayhethan))}}</div>
                                                  </div>
                                                  @elseif($val->ngaydangtin == 0 || $val->ngayhethan == 0)
                                                  @endif
                                                  <hr>
                                                  <div class="row mt-4">
                                                    <div class="col-2" ><strong class="font-weight-bold">Trạng thái:</strong></div>
                                                    <div class="col-4">
                                                      @if($val->trangthai_tintd == 0)
                                                      Chưa đăng
                                                      @elseif($val->trangthai_tintd == 1)
                                                      Hết hạn
                                                      @elseif($val->trangthai_tintd == 2)
                                                      Đã đăng
                                                      @elseif($val->trangthai_tintd == 3)
                                                      <p class="text-danger">Đã bị khóa</p>
                                                      @endif
                                                    </div>
                                                    <div class="col-2" ><strong class="font-weight-bold">Dịch vụ hỗ trợ:</strong></div>
                                                    <div class="col-4">
                                                      @if($val->dichvuhotro == 'coban')
                                                      Cơ bản
                                                      @elseif($val->dichvuhotro == 'tuyengap')
                                                      Tuyển gấp
                                                      @elseif($val->dichvuhotro == 'hapdan')
                                                      Hấp dẫn
                                                      @endif
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <form method="post" action="{{route('recruiter.remove_posting_recruitment')}}">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="id_tintd" value="{{ $val->id_tintd}}">
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-danger">Xác nhận</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                                  </form>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                  @endif
                                
                                @endforeach
                            </tbody>
                            @endif
                            @if($tinTuyenDung == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Bạn chưa có tin tuyển dụng nào</strong></h5></td>
                              </tr>
                            </tfoot>
                            @endif
                        </table>
                      </div>
                    </div>
                </div>               
              </div> 
            </div>
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




