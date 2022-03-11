@extends('layout.admins.main')
@section('admin_content')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('layout.admins.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Danh sách tin tuyển dụng bị báo cáo</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
            </div>
            

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th width="2%">STT</th>
                                    <th width="20%" class="text-center">Tên Công Việc</th>
                                    <th width="15%">Người báo cáo</th>
                                    <th width="15%" class="text-center">Ngày báo cáo</th>
                                    <th class="text-center">Nội dung</th>
                                    @if($listRecruitmentReported != null)
                                    <th width="15%" class="text-center">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt=1; @endphp
                            @if($listRecruitmentReported != null)
                                @foreach($listRecruitmentReported as $key => $val)
                                <tr>
                                    <td class="text-center">{{$stt++}}</td>
                                    <td>
                                        {{$val->tencongviec}} 
                                      <button  class="button-33" data-toggle="modal" role="button"
                                      data-target="{{'#detail-'.$val->id_baocao}}"><i class="fas fa-info-circle"></i></button>
                                      <br>
                                      @php 
                                        $hosoNTD = App\Models\recruiter\HoSoNTD::where('id_ntd', $val->id_ntd)->first();
                                        $tkNTD = App\Models\recruiter\TaiKhoanNTD::where('id_ntd', $val->id_ntd)->first();
                                      @endphp
                                      <p><small class="font-weight-bold">
                                        {{$hosoNTD->tencty}}
                                      </small></p>
                                    </td>
                                    <td>{{$val->ho}} {{$val->ten}}</td>
                                    <td class="text-center">{{date("d/m/Y", strtotime($val->ngaybaocao))}}
                                        <br>
                                        <p><small class="font-weight-bold">
                                        @if($val->trangthai_tintd == 2 || $val->trangthai_tintd == 3)
                                        @php 
                                            $thoigianbc = new Carbon\Carbon($val->ngaybaocao,'Asia/Ho_Chi_Minh');
                                            $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            if($thoigianbc->diffInDays($now) != 0){
                                                echo 'Báo cáo '.$thoigianbc->diffInDays($now).' ngày trước.';
                                            } else if($thoigianbc->diffInHours($now) != 0) {
                                                echo 'Báo cáo '.$thoigianbc->diffInHours($now).' giờ trước';
                                            } else  if($thoigianbc->diffInMinutes($now) != 0){
                                                echo 'Báo cáo '.$thoigianbc->diffInMinutes($now).' phút trước';
                                            } else if($thoigianbc->diffInSeconds($now) != 0){
                                                echo 'Báo cáo '.$thoigianbc->diffInSeconds($now).' giây trước';
                                            }
                                        @endphp
                                        @endif
                                        </small></p>
                                        
                                    </td>
                                    <td style="padding-right: 0 !important;">
                                        @php $list_noidung = explode(' /:/ ', $val->noidung_baocao);  @endphp
                                        <div style="height: 130px !important; overflow-y: scroll; ">
                                        @foreach ($list_noidung as $listnd) 
                                        {!! '+ '.$listnd."<br>" !!} 
                                        @endforeach
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($val->trangthai_tintd == 2)
                                        <button  class="btn btn-outline-warning" data-toggle="modal" role="button"
                                        data-target="{{'#lock-'.$val->id_baocao}}"><i class="fas fa-unlock"></i></button>
                                        @else($val->trangthai_tintd == 3)
                                        <button  class="btn btn-warning" data-toggle="modal" role="button"
                                        data-target="{{'#unlock-'.$val->id_baocao}}"><i class="fas fa-lock"></i></button>
                                        @endif
                                        <button  class="btn btn-danger" data-toggle="modal" role="button"
                                        data-target="{{'#del-'.$val->id_baocao}}"><i class="fas fa-trash-alt"></i></button>
                                        
                                    </td>
                                     <!--Modal Details-->
                                     <div class="modal fade" id="{{'detail-'.$val->id_baocao}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết Tin Tuyển Dụng</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                  <div class="row mt-4">
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{URL::asset('public/img/recruiter/uploads/'.$hosoNTD->logo)}}" width="100px" height="100px"></div>
                                                    <div class="col-6 text-left" >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="font-weight-light">{{$hosoNTD->tencty}}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5" ><strong  class="font-weight-bold">Người đại diện:</strong></div>
                                                            <div class="col-7" >{{$tkNTD->tennlh}}</div>
                                                        </div>
                                                        <hr>
                                                        <div class="row ">
                                                            <div class="col-3" ><strong class="font-weight-bold">Liên hệ:</strong></div>
                                                            <div class="col-9">
                                                            {{$tkNTD->email}}<br>
                                                            {{$tkNTD->sdt}}
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                  </div>
                                                  <hr>  
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
                                                    <div class="col-2" ><strong  class="font-weight-bold">Loại:</strong></div>
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
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày đăng:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngaydangtin))}}</div>
                                                    <div class="col-2" ><strong class="font-weight-bold">Ngày hết hạn:</strong></div>
                                                    <div class="col-4">{{date("d/m/Y", strtotime($val->ngayhethan))}}</div>
                                                  </div>
                                                  @elseif($val->ngaydangtin == 0 || $val->ngayhethan == 0)
                                                  @endif
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
                                    <div class="modal fade" id="{{'del-'.$val->id_baocao}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h4 class="text-center font-weight-light">Bạn thật sự muốn xóa tin tuyển dụng này?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('recruiter.delete_recruitment',['id_tintd' => $val->id_tintd ])}}" class="btn btn-outline-danger">Xác nhận</a>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Lock-->
                                    <div class="modal fade" id="{{'lock-'.$val->id_baocao}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h4 class="text-center font-weight-light">Bạn thật sự muốn khóa tin tuyển dụng này?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('admin.recruiter.lock_recruitment',['id_tintd' => $val->id_tintd ])}}" class="btn btn-outline-warning">Xác nhận</a>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Unlock-->
                                    <div class="modal fade" id="{{'unlock-'.$val->id_baocao}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body scroll-content">
                                                  <h4 class="text-center font-weight-light">Bạn thật sự muốn mở khóa tin tuyển dụng này?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('admin.recruiter.unlock_recruitment',['id_tintd' => $val->id_tintd ])}}" class="btn btn-outline-warning">Xác nhận</a>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @if($listRecruitmentReported == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có tin tuyển dụng bị báo cáo nào</strong></h5></td>
                              </tr>
                            </tfoot>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection


