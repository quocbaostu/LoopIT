@extends('layout.jobseeker.main')
@section('content')

<div class="clearfix"></div>

{{-- Get new job noti --}}
@foreach($rcnoti as $rc)
    @if($rc->id_uv == Session::get('js_id'))
    @php
        $rc_newjob += $rc->trangthaixem;
    @endphp
    @endif
@endforeach

@foreach($filternoti as $ft)
    @if($ft->id_uv == Session::get('js_id'))
    @php
        $ft_newjob += $ft->trangthaixem;
    @endphp
    @endif
@endforeach

@php
    $noti_newjob_all = $rc_newjob + $ft_newjob;
@endphp

<!-- recuiter Nav -->
<nav class="navbar navbar-expand-lg navbar-light nav-recuitment">
    <div class="collapse navbar-collapse container nav-js" id="navbarNava">
        <ul class="navbar-nav">
            <li>
                <a href="{{route('Home')}}">Trang chủ</a>
            </li>
            <li>
                <a href="{{route('js_dasboard')}}">Quản Lý Hồ Sơ</a>
            </li>
            <li>
                <a href="{{route('js_getcvmanage')}}">CV Của Tôi</a>
            </li>
            <li>
                <a href="{{route('js_jobmana')}}">Việc Làm Của Tôi</a>
            </li>
            <li class="nav-active">
                <a href="{{route('js_jobnotirc')}}">
                    Thông Báo Việc làm
                    @if ($noti_newjob_all > 0)
                        <span class="badge" style="color: #fff; background-color: rgb(255, 7, 7);">
                            {{$noti_newjob_all}}
                        </span>
                    @elseif($noti_newjob_all == 0)
                        <span class="badge" style="color: rgb(0, 0, 0); background-color: rgb(141, 140, 140);">
                            0
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{route('js_rcsee')}}">Nhà tuyển dụng xem hồ sơ</a>
            </li>
            <li>
                <a href="{{route('js_security')}}">Bảo mật tài khoản</a>
            </li>
        </ul>
    </div>
</nav>
<!--  recuiter Nav -->
<div class="container-fluid published-recuitment-wrapper" style="padding-bottom: 100px">
    <div class="container published-recuitment-content">
        <div class="col-sm-12">
            <div class="card mb-3 nav-tab-job">
                <div class="card-header myjob-header">Bộ lọc gợi ý</div>
                <div class="tabs">
                    <a href="{{route('js_jobnotirc')}}" class="tablinks btn btn-light" data-electronic="rcsave">
                        <div class="tab-titles">Nhà tuyển dụng đã lưu</div>
                    </a>
                    <button class="tablinks active" data-electronic="notifilter">
                        <div class="tab-titles">Bộ lọc gợi ý</div>
                    </button>
                </div>
                <div id="rcsave" class="tabcontent">
                    <div class="card-deck row">
                        <div class="card">
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/loading.jpg')}})"></div>
                        </div>
                    </div>
                </div>
                <div id="notifilter" class="tabcontent active">
                    <div class="row" style="height: 38px">
                        <a href="" class="addfilecv-link" data-toggle="modal" data-target="#add-filter">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            <span>Tạo Bộ lọc Thông báo công việc mới</span>
                        </a>
                    </div>
                    <div class="card-deck">
                        <div class="card">
                            @if (count($boloc) > 0)
                                @foreach ($boloc as $k=>$v)
                                <div class="myjob">
                                    <div class="row">
                                        <div class="col-7 mt-4">
                                            <p class="small-card-content">
                                                Địa điểm:
                                                @if ($v->thanhpho != null)
                                                <span style="font-weight:bold">{{$v->thanhpho}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                                --- Ngành nghề:
                                                @if ($v->nganhnghe != null)
                                                <span style="font-weight:bold">{{$v->nganhnghe}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                            </p>
                                            <p class="small-card-content">
                                                Cấp bậc mong muốn:
                                                @if ($v->capbac != null)
                                                <span style="font-weight:bold">{{$v->capbac}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                                --- Trình độ yêu cầu:
                                                @if ($v->trinhdo != null)
                                                <span style="font-weight:bold">{{$v->trinhdo}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                            </p>
                                            <p class="small-card-content">
                                                Kinh nghiệm yêu cầu:
                                                @if ($v->kinhnghiem != null)
                                                <span style="font-weight:bold">{{$v->kinhnghiem}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                                --- Mức lương tối thiểu:
                                                @if ($v->mucluong != null)
                                                <span style="font-weight:bold">{{$v->mucluong}}$</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                            </p>
                                            <p class="small-card-content">
                                                Loại công việc mong muốn:
                                                @if ($v->loaicongviec != null)
                                                <span style="font-weight:bold">{{$v->loaicongviec}}</span>
                                                @else
                                                <span>(Ko lựa chọn)</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-5 mt-5">
                                            <a href="{{route('js_getcheckflnewjob', ['id_goiy'=>$v->id_goiy])}}" class="btn btn-newjob-rc">
                                                <i class="fa fa-bell" aria-hidden="true"></i> Công việc mới
                                                @if ($v->trangthaixem > 0)
                                                <span class="badge" style="background-color: #f62424">{{$v->trangthaixem}}</span>
                                                @else
                                                <span class="badge" style="background-color: #b4afaf">0</span>
                                                @endif
                                            </a>
                                            <a href="" class="btn btn-edit-filter ml-3" data-target="#edit-filter-{{$v->id_goiy}}" data-toggle="modal" >
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa
                                            </a>
                                            <a href="#" data-target="#delete-filter-{{ $v->id_goiy }}" data-toggle="modal" class="btn btn-unsave-rc ml-3">
                                                <i class="fa fa-close" aria-hidden="true"></i> Xoá bỏ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                 {{-- Modal delete Filter --}}
                                 <div class="modal fade" id="delete-filter-{{ $v->id_goiy }}" tabindex="-1" role="dialog" style="z-index: 10000">
                                    <div class="modal-dialog" role="document">
                                    <form method="POST" action="{{route('js_postdeletefilternoti', ['id_goiy'=>$v->id_goiy])}}">
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">XOÁ BỘ LỌC THÔNG BÁO CÔNG VIỆC</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xoá Bộ lọc thông báo này?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn" style="background-color: #fa2a2a; color: #fff">Xoá</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                {{-- Modal Edit Filter--}}
                                <div class="modal fade" id="edit-filter-{{$v->id_goiy}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">CHỈNH SỬA BỘ LỌC THÔNG BÁO CÔNG VIỆC</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('js_posteditfilternoti', ['id_goiy'=>$v->id_goiy])}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-sm-12">
                                                    @if(Session::get('fail_ed'))
                                                    <div class="alert alert-danger" role="alert">
                                                        Xin vui lòng chọn ít nhất một trường điều kiện cho bộ lọc!
                                                    </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label"> Nơi làm việc mong muốn</label>
                                                                <select class="form-control" name="thanhpho_ed" id="thanhpho_ed">
                                                                    @if ($v->thanhpho != null)
                                                                        <option value="">Tất cả địa điểm</option>
                                                                        @foreach ($thanhpho as $tp)
                                                                            @if ($tp->tentp == $v->thanhpho))
                                                                            <option selected value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                                                            @else
                                                                            <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <option selected value="">Tất cả địa điểm</option>
                                                                        @foreach ($thanhpho as $tp)
                                                                        <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label"> Ngành nghề mong muốn</label>
                                                                <select class="form-control" name="nganhnghe_ed" id="nganhnghe_ed">
                                                                    @if ($v->nganhnghe != null)
                                                                        <option value="">Tất cả ngành nghề</option>
                                                                        @foreach ($nganhnghe as $nnghe)
                                                                            @if ($nnghe->tennganhnghe == $v->nganhnghe)
                                                                            <option selected value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                                                            @else
                                                                            <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <option selected value="">Tất cả ngành nghề</option>
                                                                        @foreach ($nganhnghe as $nnghe)
                                                                        <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label"> Cấp bậc mong muốn</label>
                                                                <select class="form-control" name="capbac_ed" id="capbac_ed-{{$v->id_goiy}}">
                                                                    <option value="" selected>Tất cả cấp bậc</option>
                                                                    <option value="Thực tập sinh/Sinh viên">Thực tập sinh/Sinh viên</option>
                                                                    <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                                                    <option value="Nhân viên">Nhân viên</option>
                                                                    <option value="Trưởng phòng">Trưởng phòng</option>
                                                                    <option value="Giám Đốc và Cấp Cao Hơn">Giám Đốc và Cấp Cao Hơn</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label"> Trình độ mong muốn</label>
                                                                <select class="form-control" name="trinhdo_ed" id="trinhdo_ed-{{$v->id_goiy}}">
                                                                    <option value="" selected>Tất cả Trình độ</option>
                                                                    <option value="Đại học">Đại học</option>
                                                                    <option value="Cao đẳng">Cao đẳng</option>
                                                                    <option value="Trung cấp">Trung cấp</option>
                                                                    <option value="Cao học">Cao học</option>
                                                                    <option value="Trung học">Trung học</option>
                                                                    <option value="Chứng chỉ">Chứng chỉ</option>
                                                                    <option value="Lao động phổ thông">Lao động phổ thông</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label">Loại công việc mong muốn</label>
                                                                <select class="form-control" name="loaicongviec_ed" id="loaicongviec_ed-{{$v->id_goiy}}">
                                                                    <option value="" selected>Tất cả Loại công việc</option>
                                                                    <option value="Thực tập">Thực tập</option>
                                                                    <option value="Toàn thời gian">Toàn thời gian</option>
                                                                    <option value="Bán thời gian">Bán thời gian</option>
                                                                    <option value="Nghề tự do">Nghề tự do</option>
                                                                    <option value="Hợp đồng thời vụ">Hợp đồng thời vụ</option>
                                                                    <option value="Khác">Khác</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label">Số năm kinh nghiệm</label>
                                                                <select class="form-control" name="kinhnghiem_ed" id="kinhnghiem_ed-{{$v->id_goiy}}">
                                                                    <option value="" selected>Chọn kinh nghiệm</option>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="control-label"> Mức lương mong muốn tối thiếu</label>
                                                                <input type="number" class="form-control" name="mucluong_ed" placeholder="... đô la ($)" value="{{$v->mucluong}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="btn-edit">
                                                    <button type="submit" class="btn button-save">Lưu chỉnh sửa</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- Modal Xem công việc mới đăng--}}
                                <div class="modal fade bd-example-modal-lg" id="newjob-{{ $v->id_goiy }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 10000">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CÔNG VIỆC MỚI TỪ NHÀ TUYỂN DỤNG</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="height: 500px; overflow-y: auto;">
                                            @if($v->trangthaixem > 0)
                                                @foreach ($tintdgoiy as $k_tin=>$v_tin)
                                                @if ($k_tin == $v->id_goiy)
                                                @foreach ($v_tin as $tin)
                                                <div class="myjob">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <div class="job-logo">
                                                                <a href="">
                                                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tin->logo)}}" class="job-logo-ima" alt="job-logo">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-4">
                                                                <div class="job-title">
                                                                    <a href="">{{$tin->tencongviec}}</a>
                                                                </div>
                                                                <div class="job-company myjob-inf">
                                                                    <a href="">
                                                                        {{$tin->tencty}}</a> <a class="job-address">
                                                                        <i class="fa fa-map-marker" aria-hidden="true"></i> {{$tin->thanhpho}}
                                                                    </a>
                                                                </div>
                                                                <div class="job-inf myjob-inf">
                                                                    <div class="job-main-skill">
                                                                        <i class="fa fa-circle-o-notch" aria-hidden="true"></i><a> {{$tin->loaicongviec}}</a>
                                                                    </div>
                                                                    <div class="job-salary">
                                                                        <i class="fa fa-money" aria-hidden="true"></i>
                                                                        <span>{{$tin->mucluong_toithieu}}$</span>
                                                                        <span> - {{$tin->mucluong_toida}}$</span>
                                                                    </div>
                                                                    <div class="job-deadline">
                                                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i> Hạn nộp: <strong>{{$tin->ngayhethan}}</strong></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="btn-newjob-detail">
                                                                <a href="{{route('job_detail', ['id_tintd'=>$tin->id_tintd])}}" class="btn">Đến xem ngay <i class="fa fa-angle-double-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach
                                                @endif
                                                @endforeach
                                            @elseif ($v->trangthaixem == 0)
                                                <div class="empty-rcsave">
                                                    <i class="fa fa-bell-slash" aria-hidden="true"></i>
                                                    Nhà Tuyển Dụng chưa có công việc mới nào
                                                </div>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Script hỗ trợ --}}
                                <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
                                <script type="text/javascript">
                                    window.addEventListener("load", function(){
                                        $('#capbac_ed-{{$v->id_goiy}}').val('{{ $v->capbac }}').change();
                                        $('#trinhdo_ed-{{$v->id_goiy}}').val('{{ $v->trinhdo }}').change();
                                        $('#loaicongviec_ed-{{$v->id_goiy}}').val('{{ $v->loaicongviec }}').change();
                                        $('#kinhnghiem_ed-{{$v->id_goiy}}').val('{{ $v->kinhnghiem }}').change();
                                    });
                                </script>
                                <link rel="stylesheet" href="{{ URL::asset('public/jQueryPlugin/jQuery-MultipleSelect/dist/css/bootstrap-multiselect.css')}}" type="text/css">
                                <script type="text/javascript" src="{{ URL::asset('public/jQueryPlugin/jQuery-MultipleSelect/dist/js/bootstrap-multiselect.js')}}"></script>
                                @endforeach
                            @elseif(count($boloc) == 0)
                                <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/empty/filter_notijob.jpg')}})"></div>
                            @endif
                            <div>
                                {!! $boloc->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Add Filter--}}
<div class="modal fade" id="add-filter" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">TẠO BỘ LỌC THÔNG BÁO CÔNG VIỆC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postaddfilternoti')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    @if(Session::get('fail'))
                    <div class="alert alert-danger" role="alert">
                        Xịn vui lòng chọn ít nhất một trường điều kiện cho bộ lọc!
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label"> Nơi làm việc mong muốn</label>
                                <select class="form-control" name="thanhpho" id="thanhpho">
                                    <option selected value="">Tất cả địa điểm</option>
                                    @foreach ($thanhpho as $tp)
                                    <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label"> Ngành nghề mong muốn</label>
                                <select class="form-control" name="nganhnghe" id="nganhnghe">
                                    <option selected value="">Tất cả ngành nghề</option>
                                    @foreach ($nganhnghe as $nnghe)
                                    <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label"> Cấp bậc mong muốn</label>
                                <select class="form-control" name="capbac" id="capbac">
                                    <option value="" selected>Tất cả cấp bậc</option>
                                    <option value="Thực tập sinh/Sinh viên">Thực tập sinh/Sinh viên</option>
                                    <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option>
                                    <option value="Giám Đốc và Cấp Cao Hơn">Giám Đốc và Cấp Cao Hơn</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('capbac') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label"> Trình độ mong muốn</label>
                                <select class="form-control" name="trinhdo" id="trinhdo">
                                    <option value="" selected>Tất cả Trình độ</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao học">Cao học</option>
                                    <option value="Trung học">Trung học</option>
                                    <option value="Chứng chỉ">Chứng chỉ</option>
                                    <option value="Lao động phổ thông">Lao động phổ thông</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('trinhdo') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Loại công việc mong muốn</label>
                                <select class="form-control" name="loaicongviec" id="loaicongviec">
                                    <option value="" selected>Tất cả Loại công việc</option>
                                    <option value="Thực tập">Thực tập</option>
                                    <option value="Toàn thời gian">Toàn thời gian</option>
                                    <option value="Bán thời gian">Bán thời gian</option>
                                    <option value="Nghề tự do">Nghề tự do</option>
                                    <option value="Hợp đồng thời vụ">Hợp đồng thời vụ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Số năm kinh nghiệm</label>
                                <select class="form-control" name="kinhnghiem" id="kinhnghiem">
                                    <option value="" selected>Chọn kinh nghiệm</option>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label"> Mức lương mong muốn tối thiếu</label>
                                <input type="number" class="form-control" name="mucluong" placeholder="... đô la ($)" value="{{ old('mucluong') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save">Tạo Bộ lọc</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>




<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
{{-- Validate form thêm Bộ loc --}}
@if (Session::get('fail') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#add-filter").modal('show');
    });
</script>
@endif


{{---------- Toast thông báo ----------}}
{{-- Upload file thành công --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQueryPlugin/jQuery-Toast/0.1.6v/NToast.min.css') }}">
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Toast/0.1.6v/NToast.min.js')}}"></script>
@if(Session::pull('success'))
<script>
    NToast(
        "#2dde23",
        "br",
        "CẬP NHẬT DỮ LIỆU THÀNH CÔNG!",
        true,
        "fa fa-check-circle ",
        true,
        50,
    )
</script>
@endif




@endsection



