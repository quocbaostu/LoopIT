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
<div class="container-fluid published-recuitment-wrapper mb-5">
  <div class="container published-recuitment-content">
    <form action="">
        <div class="row recuitment-form">
            <div class="col-8">
                <input type="text" name="noidung_timkiem" value="{{ request()->input('noidung_timkiem') }}" class="form-control" placeholder="Nhập từ khóa tìm kiếm . . .">
            </div>
            <div class="col-2  recuitment-body">
                <select type="text" name="loaitimkiem" class="form-control"  id="jobProvince" >
                    <option value="1">Tất cả</option>
                    <option value="2">Tên</option>
                    <option value="3">Chức danh</option>
                </select>
                @if(request()->input('loaitimkiem') != null)
                <script type="text/javascript">
                window.addEventListener("load", function() {
                    $('#jobProvince').val(`{{ request()->input('loaitimkiem') }}`).change();
                });
                </script>
                @endif
            </div>
            <div class="col-2"><button type="submit" name="button_submit" class="btn btn-info ss-orange float-right ">Tìm kiếm</button>
            </div>
        </div>
        <div class="row recuitment-form">

            <div class="col-3  border-ser-toolbar">
                    <h5 class="text-center mt-2">BỘ LỌC KẾT QUẢ TÌM KIẾM</h5>
                    <hr>
                    <div class="row ">
                        <div class="col-12 recuitment-body">
                            <a href="{{route('recruiter.cv_search')}}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Làm mới</a>

                            <button type="submit" name="button_submit" class="btn btn-info ss-orange float-right"><i class="fa fa-filter" aria-hidden="true"></i> Lọc CV</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Ngành Nghề Mong Muốn</strong>
                            <select type="text" name="nganhnghemm"  id="jobType">
                            @if(request()->input('nganhnghemm') != null)
                                <option value=""  selected>Chọn Ngành Nghề</option>
                                @foreach($nganhnghe as $nn)
                                    @if($nn->tennganhnghe == request()->input('nganhnghemm'))
                                    <option value="{{ $nn->tennganhnghe }}" selected>{{$nn->tennganhnghe}}</option>
                                    @else
                                    <option value="{{ $nn->tennganhnghe }}">{{$nn->tennganhnghe}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value=""  selected>Chọn Ngành Nghề</option>
                                @foreach($nganhnghe as $nn)
                                <option value="{{ $nn->tennganhnghe }}">{{$nn->tennganhnghe}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Nơi Làm Việc Mong Muốn</strong>
                            <select type="text" name="noilamviecmm"  id="jobGender">
                            @if(request()->input('noilamviecmm') != null)
                                <option value=""  selected>Chọn Tỉnh/Thành Phố</option>
                                @foreach($thanhpho as $tp)
                                    @if($tp->tentp == request()->input('noilamviecmm'))
                                    <option value="{{ $tp->tentp }}" selected>{{$tp->tentp}}</option>
                                    @else
                                    <option value="{{ $tp->tentp }}">{{$tp->tentp}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value=""  selected>Chọn Tỉnh/Thành Phố</option>
                                @foreach($thanhpho as $tp)
                                <option value="{{ $tp->tentp }}">{{$tp->tentp}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Cấp bậc</strong>
                            <select type="text" name="capbacht" class="form-control" id="natureWork">
                                <option value="" selected>Chọn cấp bậc</option>
                                <option value="Thực tập sinh/Sinh viên">Thực tập sinh/Sinh viên</option>
                                <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                <option value="Nhân viên">Nhân viên</option>
                                <option value="Trưởng phòng">Trưởng phòng</option>
                                <option value="Giám đốc/Cấp cao hơn">Giám đốc/Cấp cao hơn</option>
                            </select>
                            @if(request()->input('capbacht') != null)
                            <script type="text/javascript">
                            window.addEventListener("load", function() {
                                $('#natureWork').val(`{{ request()->input('capbacht') }}`).change();
                            });
                            </script>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Trình độ</strong>
                            <select type="text" name="trinhdoht" class="form-control" id="jobLevel">
                                <option value="" selected>Chọn trình độ</option>
                                <option value="Đại học">Đại học</option>
                                <option value="Cao đẳng">Cao đẳng</option>
                                <option value="Trung cấp">Trung cấp</option>
                                <option value="Cao học">Cao học</option>
                                <option value="Trung học">Trung học</option>
                                <option value="Chứng chỉ">Chứng chỉ</option>
                                <option value="Lao động phổ thông">Lao động phổ thông</option>
                                <option value="Không yêu cầu">Không yêu cầu</option>
                            </select>
                            @if(request()->input('trinhdoht') != null)
                            <script type="text/javascript">
                            window.addEventListener("load", function() {
                                $('#jobLevel').val(`{{ request()->input('trinhdoht') }}`).change();
                            });
                            </script>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Năm Kinh Nghiệm</strong>
                            <div class="row">
                                <div class="col-6">
                                Từ <input type="number" name="namkn_toithieu" value="{{request()->input('namkn_toithieu')}}" style="width:70% !important;">
                                </div>
                                <div class="col-6">
                                Đến <input type="number" name="namkn_toida" value="{{request()->input('namkn_toida')}}" style="width:70% !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-12 recuitment-body">
                            <strong class="font-weight-light">Mức Lương Mong Muốn</strong>
                            <div class="row">
                                <div class="col-6">
                                Từ <input type="number" name="mucluong_toithieu" value="{{request()->input('mucluong_toithieu')}}" style="width:70% !important;">
                                </div>
                                <div class="col-6">
                                Đến <input type="number" name="mucluong_toida" value="{{request()->input('mucluong_toida')}}" style="width:70% !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


            <div class="col-9 ver-line">
            <h5 class="text-left font-italic font-weight-light">"{{$hosoCV_UV->count()}}" trong "{{$hosoCV_UV->total()}}" KẾT QUẢ TÌM ĐƯỢC</h5>
                @foreach($hosoCV_UV as $k => $v)
                    <hr>
                    <div class="row">
                        <div class="col-2 text-center">
                        @if($v->loaicv == 'file')
                            @if($v->hinhanh != null)
                            <img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/'.$v->hinhanh)}}" width="70px" height="70px">
                            @else
                            <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" style="width:70px; height:70px;">
                            @endif
                        @else
                            @if($v->hinhdaidien != null)
                            <img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/avt_cv/'.$v->hinhdaidien)}}" width="70px" height="70px">
                            @else
                            <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}" class="rounded-circle" style="width:70px; height:70px;">
                            @endif
                        @endif
                        </div>
                        <div class="col-7">
                            <h5 class="text-primary">{{$v->ho}} {{$v->ten}} <span class="font-weight-light text-black-50"><small>
                                @php
                                    $thoigiancn = new Carbon\Carbon($v->thoigiancapnhat,'Asia/Ho_Chi_Minh');
                                    $now = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                    if($thoigiancn->diffInDays($now) != 0){
                                        echo '(Vừa chỉnh sửa '.$thoigiancn->diffInDays($now).' ngày trước)';
                                    } else if($thoigiancn->diffInHours($now) != 0) {
                                        echo '(Vừa chỉnh sửa '.$thoigiancn->diffInHours($now).' giờ trước)';
                                    } else  if($thoigiancn->diffInMinutes($now) != 0){
                                        echo '(Vừa chỉnh sửa '.$thoigiancn->diffInMinutes($now).' phút trước)';
                                    } else if($thoigiancn->diffInSeconds($now) != 0){
                                        echo '(Vừa chỉnh sửa '.$thoigiancn->diffInSeconds($now).' giây trước)';
                                    }
                                @endphp
                            </small></span></h5>
                            <strong class="font-weight-light">Chức danh hiện tại: </strong>  <span class="font-weight-bold">{{$v->chucdanhht}}</span>
                            <strong class="font-weight-light"> | Trình độ: </strong>  <span class="font-weight-bold">{{$v->trinhdoht}}</span>

                            <div class="mt-1 row">
                                <div class="col-4"><strong class="font-weight-light">Ngành nghề Mong Muốn:</strong></div>
                                <div class="col-8"><span class="font-weight-bold">{{$v->nganhnghemm}}</span></div>
                            </div>

                            <div class="mt-1 row">
                                <div class="col-3"><strong class="font-weight-light">Kinh nghiệm:</strong></div>
                                <div class="col-3"><span class="font-weight-bold">{{$v->sonamkn}}</span></div>
                                <div class="col-3"><strong class="font-weight-light"> Mức lương:</strong></div>
                                <div class="col-3"><span class="font-weight-bold">$ {{$v->mucluongmm}}</span></div>
                            </div>
                            <strong class="font-weight-light">Địa điểm làm việc mong muốn: </strong><span class="font-weight-bold">{{$v->noilamviecmm}}</span>
                        </div>
                        <div class="col-3">
                            <a href="{{route('recruiter.detail_cv_search', ['id_cv' => $v->id_cv ])}}" class="btn btn-outline-info s-orange mt-4">Chi tiết</a>
                            @if(in_array( $v->id_cv, $listCVDaLuu_id_cv))
                                @if(in_array( $v->id_cv, $listCVDaXem_id_cv))
                                <a style="pointer-events: none;" class="btn btn-outline-success text-success mt-4"><i class="fa fa-check" aria-hidden="true"></i></a>
                                @else
                                <a href="{{route('recruiter.remove_save_jobseeker_cv', ['id_cv' => $v->id_cv ])}}"
                                class="btn btn-success mt-4"><i class="fa fa-check" aria-hidden="true"></i></a>
                                @endif
                            @else
                                <a href="{{route('recruiter.save_jobseeker_cv', ['id_cv' => $v->id_cv ])}}"
                                class="btn btn-outline-secondary mt-4"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
                            @endif


                        </div>
                    </div>
                @endforeach

                <!-- paginate search results -->
                <hr>
                {!! $hosoCV_UV->withQueryString()->links() !!}
            </div>
        </div>
  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix"></div>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQuery-Toast/0.1.6v/NToast.min.css') }}">
<script src="{{ URL::asset('public/jQuery-Toast/0.1.6v/NToast.min.js')}}"></script>
@if(session('msg_success'))
<script>
    NToast(
        "#2dde23",
        "br",
        "{{Session::get('msg_success')}}",
        true,
        "fa fa-check-circle ",
        true,
        50,
    )
</script>
@endif


@endsection




