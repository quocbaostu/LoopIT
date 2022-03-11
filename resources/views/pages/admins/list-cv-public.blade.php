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
                <h1 class="h3 mb-0 text-gray-800">Danh sách CV ứng viên công khai</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
            </div>
            

            <!-- Content Row 1 -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <h4 class="card-title">Danh sách CV cần duyệt thẻ từ khóa</h4>
                            <table class="table table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th width="2%" class="text-center">#</th>
                                    <th class="text-center">Tiêu đề CV</th>
                                    <th width="20%" class="text-center">Tên ứng viên</th>
                                    <th width="15%" class="text-center">Cập nhật</th>
                                    <th width="15%" class="text-center">Trạng thái</th>
                                    @if($listCVPublic != null)
                                    <th class="text-center" width="20%">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @if($listCVPublic != null)
                                @foreach($listCVPublic as $key => $val)
                                <tr>
                                    <td class="text-center">
                                        @if($val->hinhanh != null)
                                        <img src="{{URL::asset('public/img/jobseeker/uploads/'.$val->hinhanh)}}" class="rounded-circle" width="50px" height="50px" alt="avatar-jobseeker-apply">
                                        @else
                                        <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="none-avatar-jobseeker-apply">
                                        @endif
                                    </td>
                                    <td class="text-center">{{$val->tieudecv}}</td>
                                    <td class="text-right">{{$val->ho}} {{$val->ten}}</td>
                                    <td class="text-center">
                                        @php 
                                            $thoigiancapnhat = new Carbon\Carbon($val->thoigiancapnhat,'Asia/Ho_Chi_Minh');
                                            $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            if($thoigiancapnhat->diffInDays($now) != 0){
                                                echo $thoigiancapnhat->diffInDays($now).' ngày trước';
                                            } else if($thoigiancapnhat->diffInHours($now) != 0) {
                                                echo $thoigiancapnhat->diffInHours($now).' giờ trước';
                                            } else  if($thoigiancapnhat->diffInMinutes($now) != 0){
                                                echo $thoigiancapnhat->diffInMinutes($now).' phút trước';
                                            } else if($thoigiancapnhat->diffInSeconds($now) != 0){
                                                echo $thoigiancapnhat->diffInSeconds($now).' giây trước';
                                            }
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        @if($val->trangthaicv == 3)
                                        <span class="bg-gradient-warning radius-status">
                                        <i class="fas fa-spinner"></i> Chờ duyệt
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button  class="btn btn-primary" data-toggle="modal" 
                                        data-target="{{'#detail-'.$val->id_cv}}"><i class="fas fa-list-ul" aria-hidden="true"></i></button>
                                        <button  class="btn btn-outline-warning" data-toggle="modal" 
                                        data-target="{{'#apply-tags-'.$val->id_cv}}"><i class="far fa-check-circle"></i> Duyệt Từ Khóa</button>
                                    </td>
                                    
                                    <!--Modal Details-->
                                    <div class="modal fade" id="{{'detail-'.$val->id_cv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết CV và các thẻ từ khóa cần duyệt</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                  <div class="row mt-4">
                                                    <div class="col-3" ><strong  class="font-weight-bold">Thẻ từ khóa của CV: </strong></div>
                                                    <div class="col-9">
                                                        <ul class="tags">
                                                            @foreach(explode("," , $val->thetukhoa) as $k_tukhoa => $v_tukhoa)
                                                            <li><a class="tag">{{$v_tukhoa}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">Thông tin ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    @if($val->hinhanh == null)
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{ URL::asset('public/img/icon_avatar.jpg') }}" width="100px" height="100px"></div>
                                                    @else
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/'.$val->hinhanh)}}" width="100px" height="100px"></div>
                                                    @endif
                                                    <div class="col-6 text-left" >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="font-weight-light">{{$val->ho}} {{$val->ten}}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3" ><strong  class="font-weight-bold">Email:</strong></div>
                                                            <div class="col-9" >{{$val->email}}</div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-3" ><strong class="font-weight-bold">SĐT:</strong></div>
                                                            <div class="col-9">{{$val->sdt}}</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">CV của ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                      <div class="col-12">
                                                        <object width="100%" height="800px" type="application/pdf" data="{{ URL::asset('public/cv/'.$val->tenfile) }}?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
                                                            <p>Insert your error message here, if the PDF cannot be displayed.</p>
                                                        </object>
                                                      </div>
                                                  </div>
                                                  
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Modal Apply Tags CV-->
                                    <div class="modal fade" id="{{'apply-tags-'.$val->id_cv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Thông báo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                    <h4 class="font-weight-bold text-center">Xác nhận duyệt các thẻ từ khóa của CV này ?</h4>
                                                  <div class="row mt-4">
                                                    <div class="col-4" ><h5  class="font-weight-bold">Thẻ từ khóa của CV</h5></div>
                                                    <div class="col-8">
                                                        <ul class="tags">
                                                            @foreach(explode("," , $val->thetukhoa) as $k_tukhoa => $v_tukhoa)
                                                            <li><a class="tag">{{$v_tukhoa}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">Thông tin ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    @if($val->hinhanh == null)
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{ URL::asset('public/img/icon_avatar.jpg') }}" width="100px" height="100px"></div>
                                                    @else
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/'.$val->hinhanh)}}" width="100px" height="100px"></div>
                                                    @endif
                                                    <div class="col-6 text-left" >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="font-weight-light">{{$val->ho}} {{$val->ten}}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3" ><strong  class="font-weight-bold">Email:</strong></div>
                                                            <div class="col-9" >{{$val->email}}</div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-3" ><strong class="font-weight-bold">SĐT:</strong></div>
                                                            <div class="col-9">{{$val->sdt}}</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">CV của ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                      <div class="col-12">
                                                        <object width="100%" height="800px" type="application/pdf" data="{{ URL::asset('public/cv/'.$val->tenfile) }}?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
                                                            <p>Insert your error message here, if the PDF cannot be displayed.</p>
                                                        </object>
                                                      </div>
                                                  </div>
                                                  
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{route('admin.jobseeker.apply_tags_cv')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id_cv" value="{{$val->id_cv}}"/>
                                                        <button type="submit" class="btn btn-outline-warning"><i class="fas fa-check"></i> Xác nhận</button>
                                                    </form>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @if($listCVPublic == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có CV cần duyệt nào</strong></h5></td>
                              </tr>
                            </tfoot>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row 1 -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                        <h4 class="card-title">Danh sách CV đã được duyệt</h4>
                            <table class="table table-bordered" id="table2">
                            <thead>
                                <tr>
                                    <th width="2%" class="text-center">#</th>
                                    <th class="text-center">Tiêu đề CV</th>
                                    <th width="20%" class="text-center">Tên ứng viên</th>
                                    <th width="15%" class="text-center">Cập nhật</th>
                                    <th width="15%" class="text-center">Trạng thái</th>
                                    @if($listCVPublicCurrent != null)
                                    <th class="text-center" width="15%">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @if($listCVPublicCurrent != null)
                                @foreach($listCVPublicCurrent as $k => $v)
                                <tr>
                                    <td class="text-center">
                                        @if($v->hinhanh != NULL)
                                        <img src="{{URL::asset('public/img/jobseeker/uploads/'.$v->hinhanh)}}" class="rounded-circle" width="50px" height="50px" alt="avatar-jobseeker-apply">
                                        @else
                                        <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="none-avatar-jobseeker-apply">
                                        @endif
                                    </td>
                                    <td class="text-center">{{$v->tieudecv}}</td>
                                    <td class="text-right">{{$v->ho}} {{$v->ten}}</td>
                                    <td class="text-center">
                                        @php 
                                            $thoigiancapnhat = new Carbon\Carbon($v->thoigiancapnhat,'Asia/Ho_Chi_Minh');
                                            $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            if($thoigiancapnhat->diffInDays($now) != 0){
                                                echo $thoigiancapnhat->diffInDays($now).' ngày trước';
                                            } else if($thoigiancapnhat->diffInHours($now) != 0) {
                                                echo $thoigiancapnhat->diffInHours($now).' giờ trước';
                                            } else  if($thoigiancapnhat->diffInMinutes($now) != 0){
                                                echo $thoigiancapnhat->diffInMinutes($now).' phút trước';
                                            } else if($thoigiancapnhat->diffInSeconds($now) != 0){
                                                echo $thoigiancapnhat->diffInSeconds($now).' giây trước';
                                            }
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        @if($v->trangthaicv == 2)
                                        <span class="bg-gradient-success radius-status">
                                        <i class="fas fa-check"></i> Đã duyệt
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button  class="btn btn-primary" data-toggle="modal" 
                                        data-target="{{'#detail-'.$v->id_cv}}"><i class="fas fa-list-ul" aria-hidden="true"></i> Chi tiết</button>
                                    </td>
                                    
                                    <!--Modal Details-->
                                    <div class="modal fade" id="{{'detail-'.$v->id_cv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Chi Tiết CV và các thẻ từ khóa đã duyệt</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="max-height: 500px; overflow: scroll;">
                                                  <div class="row mt-4">
                                                    <div class="col-4" ><h5  class="font-weight-bold">Thẻ từ khóa của CV</h5></div>
                                                    <div class="col-8">
                                                        <ul class="tags">
                                                            @foreach(explode("," , $v->thetukhoa) as $k_tukhoa => $v_tukhoa)
                                                            <li><a class="tag">{{$v_tukhoa}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">Thông tin ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                    @if($v->hinhanh == null)
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{ URL::asset('public/img/icon_avatar.jpg') }}" width="100px" height="100px"></div>
                                                    @else
                                                    <div class="col-6 text-center" ><img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/'.$v->hinhanh)}}" width="100px" height="100px"></div>
                                                    @endif
                                                    <div class="col-6 text-left" >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3 class="font-weight-light">{{$v->ho}} {{$v->ten}}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3" ><strong  class="font-weight-bold">Email:</strong></div>
                                                            <div class="col-9" >{{$v->email}}</div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-3" ><strong class="font-weight-bold">SĐT:</strong></div>
                                                            <div class="col-9">{{$v->sdt}}</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    </div>
                                                  <hr>
                                                    <h5 class="font-weight-bold">CV của ứng viên</h5>
                                                  <hr>
                                                  <div class="row mt-4">
                                                      <div class="col-12">
                                                        <object width="100%" height="800px" type="application/pdf" data="{{ URL::asset('public/cv/'.$v->tenfile) }}?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
                                                            <p>Insert your error message here, if the PDF cannot be displayed.</p>
                                                        </object>
                                                      </div>
                                                  </div>
                                                  
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @if($listCVPublicCurrent == null)
                            <tfoot class="text-right">
                              <tr>
                                  <td colspan="5" class="text-right"><h5><strong class="font-weight-light">Chưa có CV nào</strong></h5></td>
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


