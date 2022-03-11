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
            <li class="nav-active">
                <a href="{{route('js_dasboard')}}">Quản Lý Hồ Sơ</a>
            </li>
            <li>
                <a href="{{route('js_getcvmanage')}}">CV Của Tôi</a>
            </li>
            <li>
                <a href="{{route('js_jobmana')}}">Việc Làm Của Tôi</a>
            </li>
            <li>
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

<!-- Jobseeker eit -->
<div class="container-fluid published-recuitment-wrapper">
    <div class="container published-recuitment-content">
        <div class="col-sm-12">
            {{-- Back dashboard --}}
            <div style="padding-bottom: 10px">
                <a href="{{route('js_dasboard')}}" class="back-dashboard-link">
                    <i class="fa fa-arrow-left"></i>
                    <span>Trở về trang Quản lý hồ sơ</span>
                </a>
            </div>
            {{-- Personal info --}}
            <div class="row">
                <div class="card mb-3 card-edit">
                    <div class="card-header header-edit">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Thông tin cá nhân</span>
                        <a href="#" class="card-add-icon" id="edit-info-open" data-toggle="modal" data-target="#edit-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span>Chỉnh sửa</span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="avatar-profile">
                            <div class="avatar-preview">
                                @if ($ungvien->hinhanh != null)
                                <div style="background-image: url('{{ URL::asset('public/img/jobseeker/uploads/'.$ungvien->hinhanh)}}">
                                </div>
                                @else
                                <div style="background-image: url('{{ URL::asset('public/img/jobseeker/user.jpg')}}">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-6">
                            <div class="card-body profile-card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-address-card" aria-hidden="true"></i>
                                                <span>Họ Tên: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">{{$ungvien->ho}} {{$ungvien->ten}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <span>Email: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">{{$ungvien->email}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <span>Ngày sinh: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->ngaysinh == null)
                                                ................................................
                                                @else
                                                <p class="sub-text sub-text-content"> {{$ungvien->ngaysinh}} </p>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                <span>Giới tính: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->gioitinh == null)
                                                ................................................
                                                @else
                                                {{$ungvien->gioitinh}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-body profile-card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                                <span>Di động: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->sdt == null)
                                                ................................................
                                                @else
                                                {{$ungvien->sdt}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                <span>Thành phố: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->thanhpho == null)
                                                ................................................
                                                @else
                                                {{$ungvien->thanhpho}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <span>Địa chỉ: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->diachi == null)
                                                ................................................
                                                @else
                                                {{$ungvien->diachi}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row no-gutters">
                        <div class="col-6">
                            <div class="card-body profile-card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                <span>Trình độ hiện tại: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->trinhdoht == null)
                                                ................................
                                                @else
                                                {{$ungvien->trinhdoht}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-map" aria-hidden="true"></i>
                                                <span>Nơi làm việc mong muốn: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->noilamviecmm == null)
                                                ................................
                                                @else
                                                {{$ungvien->noilamviecmm}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-body profile-card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-title">
                                                <i class="fa fa-suitcase" aria-hidden="true"></i>
                                                <span>Ngành nghề mong muốn: </span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="sub-text sub-text-content">
                                                @if ($ungvien->nganhnghemm == null)
                                                ................................
                                                @else
                                                {{$ungvien->nganhnghemm}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Education info --}}
            <div class="row">
                <div class="card mb-3 card-add">
                    <div class="card-header header-edit">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <span>Thông tin học vấn</span>
                        <a href="#" class="card-add-icon" data-toggle="modal" data-target="#add-study">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            <span>Thêm một học vấn</span>
                        </a>
                    </div>
                    <div>
                        @if (count($lsthocvan) > 0 )
                        @foreach ($lsthocvan as $hv)
                        <div class="card small-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10"  data-toggle="collapse" data-target="#{{$hv->id_hocvan}}">
                                        <h5 class="small-card-content"> {{$hv->chuyennganh}}</h5>
                                        <h6 class="text-muted small-card-content">{{$hv->truong}} - {{$hv->bangcap}}</h6>
                                        <p class="small-card-content">{{$hv->ngaybd}} - {{$hv->ngaykt}}</p>
                                    </div>
                                    <div class="col-1">
                                        <a href="#"  class="small-card-edit" data-toggle="modal" data-target="#edit-study-{{$hv->id_hocvan}}" id="edit-study-btn">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="#" class="small-card-edit" data-toggle="modal" data-target="#delete-study-{{$hv->id_hocvan}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="accordion" id="accordionExample">
                                    <div id="{{$hv->id_hocvan}}" class="collapse">
                                        <p>{!!$hv->mota!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal sửa học vấn --}}
                        <div class="modal fade" id="edit-study-{{$hv->id_hocvan}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">CẬP NHẬT THÔNG TIN HỌC VẤN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('js_postEditStudy', ['id_hocvan'=>$hv->id_hocvan])}}" id="edit-study" name="edit-study">
                                        {{ csrf_field() }}
                                        <div class="col-sm-12">
                                            <div class="form-group required">
                                                <label class="control-label"> Chuyên ngành</label>
                                                <input type="text" class="form-control" name="chuyennganh_ed" value="{{$hv->chuyennganh}}">
                                                <div class="edit-vali-error">
                                                    @foreach ($errors->get('chuyennganh_ed') as $message)
                                                    <div class="error">{{$message}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group required">
                                                        <label class="control-label"> Trường</label>
                                                        <input type="text" class="form-control" name="truong_ed" value="{{$hv->truong}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('truong_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Từ tháng</label>
                                                        <input type="month" class="form-control" name="ngaybdhv_ed" value="{{$hv->ngaybd}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('ngaybd_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group required">
                                                        <label class="control-label"> Bằng cấp</label>
                                                        <select class="form-control" name="bangcap_ed" id="bangcap_ed-{{$hv->id_hocvan}}">
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
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('bangcap_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Đến tháng</label>
                                                        <input type="month" class="form-control" name="ngaykthv_ed" value="{{$hv->ngaykt}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('ngaykt_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label> Mô tả chung</label>
                                                <textarea name="mota_ed" style="width: 100%" class="form-control" name="editor-edit-study{{$hv->id_hocvan}}" id="editor-edit-study{{$hv->id_hocvan}}" cols="30" rows="10">
                                                    {!!$hv->mota!!}
                                                </textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="btn-edit">
                                            <button type="submit" class="btn button-save">Lưu cập nhật</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- Modal delete cv --}}
                        <div class="modal fade" id="delete-study-{{$hv->id_hocvan}}" tabindex="-1" role="dialog" style="z-index: 10000">
                            <div class="modal-dialog" role="document">
                            <form method="POST" action="{{route('js_postDeleteStudy', ['id_hocvan'=>$hv->id_hocvan])}}">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">XOÁ HỌC VẤN</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Bạn có chắc chắn muốn xoá Học vấn này?</h4>
                                        <p class="mt-2">Chuyên ngành: <h5>{{$hv->chuyennganh}}</h5></p>
                                        <p class="mt-1">Trường: <h5>{{$hv->truong}}</h5></p>
                                        <p class="mt-1">Bằng cấp: <h5>{{$hv->bangcap}}</h5></p>
                                        <p class="mt-1">Thời gian: <h5>{{$hv->ngaybd}} - {{$hv->ngaykt}}</h5></p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn" style="background-color: #fa2a2a; color: #fff">Xoá</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    </div>
                                  </div>
                            </form>
                            </div>
                        </div>
                        {{-- Scrip hỗ trợ --}}
                        <script type="text/javascript">
                            $("#edit-study-btn").click(function(){
                                $('#bangcap_ed-{{$hv->id_hocvan}}').val('{{ $hv->bangcap }}').change();
                            });
                            CKEDITOR.config.entities = false;
                            CKEDITOR.replace( 'editor-edit-study{{$hv->id_hocvan}}' );
                        </script>
                        {{-- Validate form sửa thông tin học vấn --}}
                        <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
                        @if (Session::pull('errorEditStudy') != null)
                        <script type="text/javascript">
                            $(window).load(function(e) {
                                $("#edit-study-{{$hv->id_hocvan}}").modal('show');
                            });
                        </script>
                        @endif
                        @endforeach
                        @elseif (count($lsthocvan) < 1)
                            <div class="card-body card-study-empty"></div>
                        @endif
                    </div>
                    <div>
                        {!! $lsthocvan->appends(['kinhnghiem'=>$lstkinhnghiem->currentPage(),'ngoaingu'=>$lstngoaingu->currentPage()])->links() !!}
                    </div>
                </div>
            </div>
            {{-- Experience info --}}
            <div class="row">
                <div class="card mb-3 card-add">
                    <div class="card-header header-edit">
                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                        <span>Thông tin kinh nghiệm</span>
                        <a href="#" class="card-add-icon" data-toggle="modal" data-target="#add-exp">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            <span>Thêm một kinh nghiệm</span>
                        </a>
                    </div>
                    <div>
                        @if (count($lstkinhnghiem) > 0 )
                        @foreach ($lstkinhnghiem as $kn)
                        <div class="card small-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10" data-toggle="collapse" data-target="#{{$kn->id_kinhnghiem}}">
                                        <h5 class="small-card-content">{{$kn->chucdanh}}</h5>
                                        <h6 class="text-muted small-card-content">{{$kn->congty}}</h6>
                                        <p class="small-card-content">{{$kn->ngaybd}} - {{$kn->ngaykt}}</p>
                                    </div>
                                    <div class="col-1">
                                        <a href="" class="small-card-edit" data-toggle="modal" data-target="#edit-exp-{{$kn->id_kinhnghiem}}" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="" class="small-card-edit" data-toggle="modal" data-target="#delete-exp-{{$kn->id_kinhnghiem}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="accordion" id="accordionExample">
                                    <div id="{{$kn->id_kinhnghiem}}" class="collapse">
                                        <p>
                                            {!!$kn->mota!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal sửa kinh nghiệm --}}
                        <div class="modal fade" id="edit-exp-{{$kn->id_kinhnghiem}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">CẬP NHẬT KINH NGHIỆM LÀM VIỆC</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('js_postEditExp', ['id_kinhnghiem'=>$kn->id_kinhnghiem])}}">
                                        {{ csrf_field() }}
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Chức danh</label>
                                                        <input type="text" class="form-control" name="chucdanh_ed" value="{{$kn->chucdanh}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('chucdanh_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Công ty</label>
                                                        <input type="text" class="form-control" name="congty_ed" value="{{$kn->congty}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('congty_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Từ tháng</label>
                                                        <input type="month" class="form-control" name="ngaybdkn_ed" value="{{$kn->ngaybd}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('ngaybdkn_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Đến tháng</label>
                                                        <input type="month" class="form-control" name="ngayktkn_ed" value="{{$kn->ngaykt}}">
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('ngayktkn_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label>Mô tả chung</label>
                                                <textarea name="mota" style="width: 100%" class="form-control" name="editor-edit-exp{{$kn->id_kinhnghiem}}" id="editor-edit-exp{{$kn->id_kinhnghiem}}" cols="30" rows="10" >
                                                    {{$kn->mota}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="btn-edit">
                                            <button type="submit" class="btn button-save">Lưu cập nhật</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- Modal xoá kinh nghiệm --}}
                        <div class="modal fade" id="delete-exp-{{$kn->id_kinhnghiem}}" tabindex="-1" role="dialog" style="z-index: 10000">
                            <div class="modal-dialog" role="document">
                            <form method="POST" action="{{route('js_postDeleteExp', ['id_kinhnghiem'=>$kn->id_kinhnghiem])}}">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">XOÁ HỌC VẤN</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Bạn có chắc chắn muốn xoá Kinh nghiêm làm việc này?</h4>
                                        <p class="mt-2">Chức danh: <h5>{{$kn->chucdanh}}</h5></p>
                                        <p class="mt-1">Công ty: <h5>{{$kn->congty}}</h5></p>
                                        <p class="mt-1">Thời gian: <h5>{{$kn->ngaybd}} - {{$kn->ngaykt}} </h5></p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn" style="background-color: #fa2a2a; color: #fff">Xoá</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    </div>
                                  </div>
                            </form>
                            </div>
                        </div>
                        {{-- Scrip hỗ trợ --}}
                        <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
                        @if (Session::pull('errorEditExp') != null)
                        <script type="text/javascript">
                            $(window).load(function(e) {
                                $("#edit-exp-{{$kn->id_kinhnghiem}}").modal('show');
                            });
                        </script>
                         @endif
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor-edit-exp{{$kn->id_kinhnghiem}}' );
                            CKEDITOR.config.entities = false;
                        </script>
                        @endforeach
                        @elseif (count($lstkinhnghiem) < 1)
                            <div class="card-body card-exp-empty"></div>
                        @endif
                    </div>
                    <div>
                        {!! $lstkinhnghiem->appends(['hocvan'=>$lsthocvan->currentPage(),'ngoaingu'=>$lstngoaingu->currentPage()])->links() !!}
                    </div>
                </div>
            </div>
            {{--Language info--}}
            <div class="row">
                <div class="card mb-3 card-add">
                    <div class="card-header header-edit">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>Thông tin ngoại ngữ</span>
                        <a href="#" class="card-add-icon" data-toggle="modal" data-target="#add-language">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            <span>Thêm một ngoại ngữ</span>
                        </a>
                    </div>
                    <div>
                        @if (count($lstngoaingu) > 0 )
                        @foreach ($lstngoaingu as $nn)
                        <div class="card small-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h5 class="small-card-content">{{$nn->tenngoaingu}}</h5>
                                        <h6 class="text-muted small-card-content">{{$nn->mucdo}}</h6>
                                    </div>
                                    <div class="col-1">
                                        <a href="" class="small-card-edit-lan" data-toggle="modal" data-target="#edit-language-{{$nn->id_ngoaingu}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <a href="" class="small-card-edit-lan" data-toggle="modal" data-target="#delete-language-{{$nn->id_ngoaingu}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal sửa ngoại ngữ --}}
                        <div class="modal fade" id="edit-language-{{$nn->id_ngoaingu}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">CẬP NHẬT KỸ NĂNG NGOẠI NGỮ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('js_postEditLanguage', ['id_ngoaingu'=>$nn->id_ngoaingu])}}">
                                        {{ csrf_field() }}
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Tên ngoại ngữ</label>
                                                        <select class="form-control" name="tenngoaingu_ed" id="tenngoaingu_ed-{{$nn->id_ngoaingu}}">
                                                            <option value="0" seleted>Chọn ngôn ngữ</option>
                                                            <option value="Tiếng Anh">Tiếng Anh</option>
                                                            <option value="Tiếng Nhật">Tiếng Nhật</option>
                                                            <option value="Tiếng Hàn">Tiếng Hàn</option>
                                                            <option value="Tiếng Hoa (Phổ thông)">Tiếng Hoa (Phổ thông)</option>
                                                            <option value="Tiếng Hoa (Quảng Đông)">Tiếng Hoa (Quảng Đông)</option>
                                                            <option value="Tiếng Nga">Tiếng Nga</option>
                                                            <option value="Tiếng Pháp">Tiếng Pháp</option>
                                                            <option value="Tiếng Tây Ban Nha">Tiếng Tây Ban Nha</option>
                                                            <option value="Tiếng Đức">Tiếng Đức</option>
                                                        </select>
                                                        <div class="edit-vali-error">
                                                            @foreach ($errors->get('tenngoaingu_ed') as $message)
                                                            <div class="error">{{$message}}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label>Mức độ thành thạo</label>
                                                            <select class="form-control" name="mucdo_ed" id="mucdo_ed-{{$nn->id_ngoaingu}}">
                                                                <option value="0" seleted>Chọn mức độ thành thạo</option>
                                                                <option value="Sơ cấp">Sơ cấp</option>
                                                                <option value="Trung cấp">Trung cấp</option>
                                                                <option value="Cao cấp">Cao cấp</option>
                                                                <option value="Bản địa">Bản địa</option>
                                                            </select>
                                                            <div class="edit-vali-error">
                                                                @foreach ($errors->get('mucdo_ed') as $message)
                                                                <div class="error">{{$message}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="btn-edit">
                                            <button type="submit" class="btn button-save">Lưu cập nhật</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- Thay đổi select tên ngoại ngữ và mức độ thành thạo --}}
                        <script type="text/javascript">
                            window.addEventListener("load", function(){
                                $('#tenngoaingu_ed-{{$nn->id_ngoaingu}}').val('{{ $nn->tenngoaingu }}').change();
                                $('#mucdo_ed-{{$nn->id_ngoaingu}}').val('{{ $nn->mucdo }}').change();
                            });
                        </script>
                        {{-- Modal delete ngoại ngữ --}}
                        <div class="modal fade" id="delete-language-{{$nn->id_ngoaingu}}" tabindex="-1" role="dialog" style="z-index: 10000">
                            <div class="modal-dialog" role="document">
                            <form method="POST" action="{{route('js_postDeleteLanguage', ['id_ngoaingu'=>$nn->id_ngoaingu])}}">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">XOÁ KỸ NĂNG NGOẠI NGỮ</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Bạn có chắc chắn muốn xoá Kỹ năng ngoại ngữ này?</h4>
                                        <p class="mt-2">Tên ngôn ngữ: <h5>{{$nn->tenngoaingu}}</h5></p>
                                        <p class="mt-1">Mức độ thành thạo: <h5>{{$nn->mucdo}}</h5></p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn" style="background-color: #fa2a2a; color: #fff">Xoá</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    </div>
                                  </div>
                            </form>
                            </div>
                        </div>
                        <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
                        @if (Session::pull('errorEditLanguage') != null)
                        <script type="text/javascript">
                            $(window).load(function(e) {
                                $("#edit-language-{{$nn->id_ngoaingu}}").modal('show');
                            });
                        </script>
                        @endif
                        @endforeach
                        @elseif (count($lstngoaingu) < 1)
                            <div class="card-body card-language-empty"></div>
                        @endif
                    </div>
                    <div>
                        {!! $lstngoaingu->appends(['kinhnghiem'=>$lstkinhnghiem->currentPage(),'hocvan'=>$lsthocvan->currentPage()])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Jobseeker edit -->



{{----------- MODAL -------------}}
{{-- Modal cập nhật thông tin cá nhân --}}
<div class="modal fade" id="edit-info" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="edit-info" name="edit-info" class="form-edit" method="POST" action="{{route('js_postEditinfo')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="row">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input name="avt" type='file' id="imgUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imgUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if ($ungvien->hinhanh != null)
                                <div id="imagePreview" style="background-image: url('{{ URL::asset('public/img/jobseeker/uploads/'.$ungvien->hinhanh)}}">
                                </div>
                                @else
                                <div id="imagePreview" style="background-image: url('{{ URL::asset('public/img/jobseeker/user.jpg')}}">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Email</label>
                                <input type="email" class="form-control" name="email" value="{{$ungvien->email}}" disabled>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('email') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Giới tính</label>
                                <select class="form-control" name="gioitinh" id="gioitinh">
                                    <option value="0" selected>Chọn giới tính của bạn</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                    <option value="Khác">Khác</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('gioitinh') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Tên</label>
                                <input type="text" class="form-control" name="ten" value="{{$ungvien->ten}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ten') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt" value="{{$ungvien->sdt}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('sdt') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Họ</label>
                                <input type="text" class="form-control" name="ho" value="{{$ungvien->ho}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ho') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Thành phố</label>
                                <select class="form-control" name="thanhpho">
                                    @if ($ungvien->thanhpho != null)
                                        @foreach ($thanhpho as $tp)
                                        @if ($ungvien->thanhpho == $tp->tentp)
                                        <option selected value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                        @else
                                        <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                        @endif
                                        @endforeach
                                    @else
                                        <option value="0" selected>Chọn Tỉnh/Thành phố</option>
                                        @foreach ($thanhpho as $tp)
                                        <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('thanhpho') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Ngày sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" value="{{$ungvien->ngaysinh}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ngaysinh') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" value="{{$ungvien->diachi}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('diachi') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required">
                                <label class="control-label"> Trình độ hiện tại</label>
                                <select class="form-control" name="trinhdoht" id="trinhdoht">
                                    <option value="0" selected>Chọn trình độ</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao học">Cao học</option>
                                    <option value="Trung học">Trung học</option>
                                    <option value="Chứng chỉ">Chứng chỉ</option>
                                    <option value="Lao động phổ thông">Lao động phổ thông</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('trinhdoht') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group required">
                                <label class="control-label"> Ngành nghề mong muốn</label>
                                <select class="form-control" name="nganhnghemm[]" id="nganhnghemm" multiple="multiple">
                                    @if ($ungvien->nganhnghemm != null)
                                        @foreach ($nganhnghe as $nnghe)
                                            @if (in_array($nnghe->tennganhnghe, $nganhnghemm))
                                            <option selected value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                            @else
                                            <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($nganhnghe as $nnghe)
                                        <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('nganhnghemm') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group required">
                                <label class="control-label"> Nơi làm việc mong muốn</label>
                                <select class="form-control" name="noilamviecmm[]" id="noilamviecmm" multiple="multiple">
                                    @if ($ungvien->noilamviecmm != null)
                                        @foreach ($thanhpho as $tp)
                                            @if (in_array($tp->tentp,$noilamviecmm))
                                            <option selected value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                            @else
                                            <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($thanhpho as $tp)
                                        <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('noilamviecmm') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save" id="submitEditInfo">Lưu cập nhật</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal thêm học vấn --}}
<div class="modal fade" id="add-study" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">THÊM MỘT HỌC VẤN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postAddStudy')}}" id="add-study" name="add-study">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="form-group required">
                        <label class="control-label"> Chuyên ngành</label>
                        <input type="text" class="form-control" name="chuyennganh" value="{{old('chuyennganh')}}">
                        <div class="edit-vali-error">
                            @foreach ($errors->get('chuyennganh') as $message)
                                <div class="error">{{$message}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label"> Trường</label>
                                <input type="text" class="form-control" name="truong" value="{{old('truong')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('truong') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Từ tháng</label>
                                <input type="month" class="form-control" name="ngaybdhv" value="{{old('ngaybd')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ngaybd') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label"> Bằng cấp</label>
                                <select class="form-control" name="bangcap" value="{{old('bangcap')}}">
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
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('bangcap') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Đến tháng</label>
                                <input type="month" class="form-control" name="ngaykthv" value="{{old('ngaykt')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ngaykt') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label> Mô tả chung</label>
                        <textarea name="mota" style="width: 100%" class="form-control" name="editor-add-study" id="editor-add-study" cols="30" rows="10" value="{{old('mota')}}">
                        </textarea>
                        <div class="edit-vali-error">
                            @foreach ($errors->get('mota') as $message)
                                <div class="error">{{$message}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save">Lưu cập nhật</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal thêm kinh nghiệm --}}
<div class="modal fade" id="add-exp" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">THÊM MỘT KINH NGHIỆM LÀM VIỆC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postAddExp')}}" id="add-exp" name="add-exp">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Chức danh</label>
                                <input type="text" class="form-control" name="chucdanh" value="{{old('chucdanh')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('chucdanh') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Công ty</label>
                                <input type="text" class="form-control" name="congty" value="{{old('congty')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('congty') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Từ tháng</label>
                                <input type="month" class="form-control" name="ngaybdkn" value="{{old('ngaybd')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ngaybdkn') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Đến tháng</label>
                                <input type="month" class="form-control" name="ngayktkn" value="{{old('ngaykt')}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('ngayktkn') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Mô tả chung</label>
                        <textarea name="mota" style="width: 100%" class="form-control" name="editor-add-exp" id="editor-add-exp" cols="30" rows="10" >
                        </textarea>
                    </div>
                </div>
                <hr>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save">Lưu cập nhật</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal thêm ngoại ngữ --}}
<div class="modal fade" id="add-language" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">THÊM KỸ NĂNG NGOẠI NGỮ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postAddLanguage')}}">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tên ngoại ngữ</label>
                                <select class="form-control" name="tenngoaingu" id="">
                                    <option value="0" seleted>Chọn ngôn ngữ</option>
                                    <option value="Tiếng Anh">Tiếng Anh</option>
                                    <option value="Tiếng Nhật">Tiếng Nhật</option>
                                    <option value="Tiếng Hàn">Tiếng Hàn</option>
                                    <option value="Tiếng Hoa (Phổ thông)">Tiếng Hoa (Phổ thông)</option>
                                    <option value="Tiếng Hoa (Quảng Đông)">Tiếng Hoa (Quảng Đông)</option>
                                    <option value="Tiếng Nga">Tiếng Nga</option>
                                    <option value="Tiếng Pháp">Tiếng Pháp</option>
                                    <option value="Tiếng Tây Ban Nha">Tiếng Tây Ban Nha</option>
                                    <option value="Tiếng Đức">Tiếng Đức</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('tenngoaingu') as $message)
                                    <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Mức độ thành thạo</label>
                                    <select class="form-control" name="mucdo">
                                        <option value="0" seleted>Chọn mức độ thành thạo</option>
                                        <option value="Sơ cấp">Sơ cấp</option>
                                        <option value="Trung cấp">Trung cấp</option>
                                        <option value="Cao cấp">Cao cấp</option>
                                        <option value="Bản địa">Bản địa</option>
                                    </select>
                                    <div class="edit-vali-error">
                                        @foreach ($errors->get('mucdo') as $message)
                                        <div class="error">{{$message}}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save">Lưu cập nhật</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>




{{----------- JAVASCRIPT -------------}}
<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
{{-- Validate form chỉnh sửa thông tin cá nhân --}}
@if (Session::get('errorEditInfo') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#edit-info").modal('show');
    });
</script>
@endif
{{-- Validate form thêm thông tin học vấn --}}
@if (Session::get('errorAddStudy') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#add-study").modal('show');
    });
</script>
@endif
{{-- Validate form sửa thông tin học vấn --}}
@if (Session::get('errorEditStudy') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#edit-study-{{$id_hvan_err}}").modal('show');
    });
</script>
@endif
{{-- Validate form thêm thông tin kinh nghiệm --}}
@if (Session::get('errorAddExp') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#add-exp").modal('show');
    });
</script>
@endif
{{-- Validate form sửa thông tin kinh nghiệm --}}
@if (Session::get('errorEditExp') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#edit-exp").modal('show');
    });
</script>
@endif
{{-- Validate form thêm thông tin ngoại ngữ --}}
@if (Session::get('errorAddLanguage') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#add-language").modal('show');
    });
</script>
@endif
{{-- Validate form sửa thông tin ngoại ngữ --}}
@if (Session::get('errorEditLanguage') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#edit-language").modal('show');
    });
</script>
@endif




{{-- Thay đổi select Thông tin cá nhân --}}
@if ($ungvien->gioitinh != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $('#gioitinh').val('{{ $ungvien->gioitinh }}').change();
        $('#capbacht').val('{{ $ungvien->capbacht }}').change();
        $('#trinhdoht').val( '{{ $ungvien->trinhdoht }}').change();
    });
</script>
@endif




{{-- Multi select --}}
<link rel="stylesheet" href="{{ URL::asset('public/jQueryPlugin/jQuery-MultipleSelect/dist/css/bootstrap-multiselect.css')}}" type="text/css">
<script type="text/javascript" src="{{ URL::asset('public/jQueryPlugin/jQuery-MultipleSelect/dist/js/bootstrap-multiselect.js')}}"></script>
<script>
    $('#nganhnghemm').multiselect({
        maxHeight:400,
        enableFiltering: true,
        buttonWidth: '100%',
        nonSelectedText: 'Chọn Ngành nghề mong muốn',
        numberDisplayed: 6,
        filterPlaceholder: 'Tìm kiếm',
    });
</script>
<script>
    $('#noilamviecmm').multiselect({
        maxHeight:400,
        enableFiltering: true,
        buttonWidth: '100%',
        nonSelectedText: 'Chọn Nơi làm việc mong muốn',
        numberDisplayed: 6,
        filterPlaceholder: 'Tìm kiếm',
    });
</script>

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
@if(Session::pull('fail'))
<script>
    NToast(
        "#ed3737",
        "br",
        "LỖI CẬP NHẬT DỮ LIỆU!",
        true,
        "fa fa-times-circle ",
        true,
        50,
    )
</script>
@endif

@endsection
