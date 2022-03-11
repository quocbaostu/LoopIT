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
            <li  class="nav-active">
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

<div class="container-fluid published-recuitment-wrapper" style="padding-bottom: 100px">
    <div class="container published-recuitment-content">
        <div class="col-sm-12">
            <div class="alert alert-primary" role="alert" style="font-size: 18px">
                <i class="fa fa-info" aria-hidden="true"></i>
                Trang LoopIT chúng tôi khuyên bạn nên dùng CV Online, để có thể được nhà tuyển dụng tiếp cận dễ dàng hơn.
            </div>
            <div class="card mb-3 nav-tab-job">
                <div class="card-header myjob-header">Quản lý CV của tôi</div>
                <div class="tabs">
                    <a href="{{route('js_getcvmanage')}}" class="tablinks btn btn-light" data-electronic="cvfile">File CV CÁ NHÂN</a>
                    <button class="tablinks active" data-electronic="cvonline">CV online</button>
                </div>
                <div id="cvfile" class="tabcontent">
                    <div class="card-deck row">
                        <div class="card">
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/loading.jpg')}})"></div>
                        </div>
                    </div>
                </div>
                <div id="cvonline" class="tabcontent active">
                    <div class="row" style="height: 38px">
                        <a href="" class="addfilecv-link" data-toggle="modal" data-target="#add-cv-online">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            <span>Tạo CV online mới</span>
                        </a>
                    </div>
                    <div class="card-deck">
                        <div class="card">
                            @if (count($lstcvfile) > 0 )
                            @foreach ($lstcvfile as $cv)
                            <div class="small-card">
                                <div class="card-body">
                                    <div class="row" id="before-delete">
                                        <div class="col-8">
                                            <h4 class="small-card-content"> {{$cv->tieudecv}}</h4>
                                            <p class="small-card-content">Chức danh hiện tại: <span style="font-weight:bold">{{$cv->chucdanhht}}</span>
                                                - Cấp bậc hiện tại: <span style="font-weight:bold">{{$cv->capbacht}}</span>
                                            <p class="small-card-content">Kinh nghiệm: <span style="font-weight:bold">{{$cv->sonamkn}} Năm</span>
                                                - Mức lương mong muốn: <span style="font-weight:bold">{{$cv->mucluongmm}} $</span>
                                            @if($cv->thetukhoa != null)
                                            <p class="mt-2 small-card-content">Thẻ từ khoá: {{$cv->thetukhoa}}</p>
                                            @else
                                            <p class="mt-2 small-card-content">Thẻ từ khoá: <span style="font-style: italic">chưa gắn thẻ</span></p>
                                            @endif
                                        </div>
                                        <div class="col-1">
                                            <a href="#" class="small-card-edit-cvonl" data-target="#edit-cv-onl-{{ $cv->id_cv }}" data-toggle="modal">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="{{route('js_getpreviewCVOnl', ['id_cv'=>$cv->id_cv])}}" class="small-card-edit-cvonl">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="{{route('js_getDownloadCV', ['id_cv'=>$cv->id_cv])}}" class="small-card-edit-cvonl">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            @if ($cv->trangthaicv == 2)
                                            <a href="#" class="small-card-edit-cvonl" data-target="#delete-cv-onl-pub-{{ $cv->id_cv }}" data-toggle="modal">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            @else
                                            <a href="#" class="small-card-edit-cvonl" data-target="#delete-cv-onl-{{ $cv->id_cv }}" data-toggle="modal">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            @if ($cv->trangthaicv == 1)
                                            <h5 class="small-card-content">
                                                Trạng thái:
                                                <span class="small-card-content-cvunseen">
                                                    Đã tắt cho phép Nhà tuyển dụng tìm kiêm
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                </span>
                                            </h5>
                                            @elseif($cv->trangthaicv == 2 || $cv->trangthaicv == 3)
                                            <h5 class="small-card-content">
                                                Trạng thái:
                                                <span class="small-card-content-cvseen">
                                                    Đã bật cho phép Nhà tuyển dụng tìm kiếm
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                        <div class="col-6" style="text-align:right">
                                            Cập nhật lần cuối: <span style="font-weight: bold">{{$cv->thoigiancapnhat}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- Modal delete cv --}}
                                <div class="modal fade" id="delete-cv-onl-{{$cv->id_cv}}" tabindex="-1" role="dialog" style="z-index: 10000">
                                    <div class="modal-dialog" role="document">
                                    <form method="POST" action="{{route('js_postdeletecv', ['id_cv'=>$cv->id_cv])}}">
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Xoá File CV</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xoá File CV này?
                                                <h5 class="mt-2"> {{ $cv->tieudecv }}</h5>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn" style="background-color: #fa2a2a; color: #fff">Xoá</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                {{-- Modal delete cv Published--}}
                                <div class="modal fade" id="delete-cv-onl-pub-{{$cv->id_cv}}" tabindex="-1" role="dialog" style="z-index: 10000">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="{{route('js_postdeletecv', ['id_cv'=>$cv->id_cv])}}">
                                            {{ csrf_field() }}
                                            <div class="modal-content ">
                                                <div class="modal-header modal-header-err">
                                                <h5 class="modal-title">LỖI XOÁ CV</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    CV đang này ở trạng thái
                                                    <span style="color: #37f366">"Cho phép Nhà Tuyển Dụng tìm kiếm"</span>
                                                    <br>
                                                    <span class="mt-2">
                                                        Bạn có chắc chắn muốn Xoá CV ?
                                                    </span>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                                <button type="submit" class="btn btn-danger">Xoá</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- Modal edit cv --}}
                                <div class="modal fade" id="edit-cv-onl-{{$cv->id_cv}}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">CÀI ĐẶT FILE CV</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('js_postsettingcv', ['id_cv'=>$cv->id_cv])}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="form-group required" style="width :100%">
                                                            <label class="control-label"> Tiêu đề file CV</label>
                                                            <div class="alert alert-warning" role="alert">
                                                                Hệ thống khuyến nghị nhập tiêu đề theo ngành nghề của bạn
                                                                để Nhà Tuyển Dụng có thể tối ưu tìm kiếm cho CV.
                                                            </div>
                                                            <input type="text" class="form-control" name="tieudecv_ed" value="{{$cv->tieudecv}}">
                                                            <div class="edit-vali-error">
                                                                @foreach ($errors->get('tieudecv_ed') as $message)
                                                                    <div class="error">{{$message}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group" style="width :100%">
                                                            <label class="control-label"> Gắn tag cho CV</label>
                                                            <input name="tagsedit" id="tagsedit-{{$cv->id_cv}}" placeholder="gắn tag cho CV của bạn" value="{{$cv->thetukhoa}}">
                                                            <small style="font-style: italic;">Gắn các tag giúp cho CV của bạn nổi bật hơn</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12">
                                                    <div class="row mb-3">
                                                        <h5>Thông tin bổ sung CV</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label"> Cấp bậc hiện tại</label>
                                                                <select class="form-control" name="capbacht_ed" id="capbacht_ed-{{ $cv->id_cv }}">
                                                                    <option value="0" selected>Chọn cấp bậc của bạn</option>
                                                                    <option value="Thực tập/Sinh viên">Thực tập/Sinh viên</option>
                                                                    <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                                                    <option value="Nhân viên">Nhân viên</option>
                                                                    <option value="Trưởng phòng">Trưởng phòng</option>
                                                                    <option value="Giám Đốc và Cấp Cao Hơn">Giám Đốc và Cấp Cao Hơn</option>
                                                                </select>
                                                                <div class="edit-vali-error">
                                                                    @foreach ($errors->get('capbacht_ed') as $message)
                                                                        <div class="error">{{$message}}</div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label"> Chức danh hiện tại</label>
                                                                <input type="text" class="form-control" name="chucdanhht_ed" value="{{$cv->chucdanhht}}">
                                                                <div class="edit-vali-error">
                                                                    @foreach ($errors->get('chucdanhht_ed') as $message)
                                                                        <div class="error">{{$message}}</div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label"> Số năm kinh nghiệm</label>
                                                                <input type="number" class="form-control" name="sonamkn_ed" value="{{$cv->sonamkn}}">
                                                                <div class="edit-vali-error">
                                                                    @foreach ($errors->get('sonamkn_ed') as $message)
                                                                        <div class="error">{{$message}}</div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group required">
                                                                <label class="control-label"> Mức lương mong muốn</label>
                                                                <input type="number" class="form-control" name="mucluongmm_ed" value="{{$cv->mucluongmm}}">
                                                                <div class="edit-vali-error">
                                                                    @foreach ($errors->get('mucluongmm_ed') as $message)
                                                                        <div class="error">{{$message}}</div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="text-align: center">
                                                        <h6>Cung cấp các thông tin giúp CV của bạn nổi bật với Nhà Tuyển Dụng</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="mb-2" style="text-align: center">Trạng thái cho phép Nhà tuyển dụng tìm kiếm </h5>
                                                <div style="text-align: center">
                                                    <input value="1" name="trangthaicv" data-radiocharm-label="Tắt tìm kiếm" type="radio"
                                                        data-radiocharm-background-color="f52222" data-radiocharm-icon="eye-slash" {{ ($cv->trangthaicv=="1")? "checked" : "" }}>
                                                    <input value="2" name="trangthaicv" data-radiocharm-label="Bật tìm kiếm" type="radio"
                                                        data-radiocharm-background-color="1bd411" data-radiocharm-icon="eye" {{ ($cv->trangthaicv=="2" || $cv->trangthaicv=="3")? "checked" : "" }}>
                                                    <h6 class="mt-2">Bật trạng thái để cho phép Nhà tuyển dụng dụng tìm kiếm đến CV của bạn</h6>
                                                    <small class="mt-2" style="font-style: italic">Ghi chú: Bạn cần hoàn thành cập nhật mục "Thông tin cá nhân" tại Trang Quản Lý Hồ Sơ để bật trạng thái cho phép tìm kiếm.</small>
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
                                {{-- Script hỗ trợ --}}
                                <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
                                @if (Session::pull('errcvedit') != null)
                                <script type="text/javascript">
                                    $(window).load(function(e) {
                                        $("#edit-cv-onl-{{$cv->id_cv}}").modal('show');
                                    });
                                </script>
                                @endif
                                <script src="{{ URL::asset('public/jQueryPlugin/jQuery-Tagify/dist/jQuery.tagify.min.js')}}"></script>
                                <script>
                                    $('#tagsedit-{{$cv->id_cv}}').tagify();
                                </script>
                                <script type="text/javascript">
                                    window.addEventListener("load", function(){
                                        $('#capbacht_ed-{{ $cv->id_cv }}').val('{{ $cv->capbacht }}').change();
                                    });
                                </script>
                            @endforeach
                            @elseif (count($lstcvfile) < 1)
                            <div class="card-body" style="background-image: url({{ URL::asset('public/img/jobseeker/empty/cv.jpg')}})"></div>
                            @endif
                            <div>
                                {!! $lstcvfile->withQueryString()->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- Modal Error Status CV --}}
<div class="modal fade" id="errstt" tabindex="-1" role="dialog" style="z-index: 10000">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-err">
          <h5 class="modal-title">BẬT TRẠNG THÁI TÌM KIẾM THẤT BẠI</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Bạn cần cập nhật mục
            <span style="font-weight: bold">"Thông tin cá nhân"</span>
            tại trang
            <span style="font-style: italic">Cập nhật Hồ Sơ</span>
            để có thể bật Trạng thái cho phép tìm kiếm!
            <div class="mt-3" style="text-align: center">
                <a href="{{route('js_editprofile')}}" class="btn" style="background-color: #f36969; color: #fff">Đến trang cập nhật "Thông Tin Cá Nhân"</a>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" style="background-color: #aaaaaaa6; color: #fff">Đóng</button>
        </div>
      </div>
    </div>
</div>
{{-- Modal Add CV Online--}}
<div class="modal fade" id="add-cv-online" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalCenterTitle" style="z-index: 10000">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">TẠO CV ONILINE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('js_postcreatecvonl')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="form-group required" style="width :100%">
                        <label class="control-label"> Tiêu đề CV</label>
                        <div class="alert alert-warning" role="alert">
                            Hệ thống khuyến nghị nhập tiêu đề theo ngành nghề của bạn
                            để Nhà Tuyển Dụng có thể tối ưu tìm kiếm cho CV.
                        </div>
                        <input type="text" class="form-control" name="tieudecvonl" value="{{old('tieudecvonl')}}">
                        <div class="edit-vali-error">
                            @foreach ($errors->get('tieudecvonl') as $message)
                                <div class="error">{{$message}}</div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group" style="width :100%">
                        <label class="control-label"> Gắn tag cho CV</label>
                        <input name="tags" id="tagsadd" placeholder="gắn tag cho CV của bạn">
                        <small style="font-style: italic;">Gắn các tag giúp cho CV của bạn nổi bật hơn</small>
                        <div class="edit-vali-error">
                            @foreach ($errors->get('filecv') as $message)
                                <div class="error">{{$message}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12">
                    <div class="row mb-3">
                        <h5>Thông tin bổ sung CV</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Cấp bậc hiện tại</label>
                                <select class="form-control" name="capbacht" id="capbacht">
                                    <option value="0" selected>Chọn cấp bậc của bạn</option>
                                    <option value="Thực tập/Sinh viên">Thực tập/Sinh viên</option>
                                    <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option>
                                    <option value="Giám Đốc và Cấp Cao Hơn">Giám Đốc và Cấp Cao Hơn</option>
                                </select>
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('capbacht') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Chức danh hiện tại</label>
                                <input type="text" class="form-control" name="chucdanhht" value="{{$ungvien->chucdanhht}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('chucdanhht') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Số năm kinh nghiệm</label>
                                <input type="number" class="form-control" name="sonamkn" value="{{$ungvien->sonamkn}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('sonamkn') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label class="control-label"> Mức lương mong muốn</label>
                                <input type="number" class="form-control" name="mucluongmm" value="{{$ungvien->mucluongmm}}">
                                <div class="edit-vali-error">
                                    @foreach ($errors->get('mucluongmm') as $message)
                                        <div class="error">{{$message}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center">
                        <h6>Cung cấp các thông tin giúp CV của bạn nổi bật với Nhà Tuyển Dụng</h6>
                    </div>
                </div>
                <hr>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="taidulieu">
                    <label class="custom-control-label" for="customCheck" style="font-size: 15px; padding-top:3px">
                        Bạn có muốn Hệ thống tự động điền thông tin
                        <span style="font-weight:bold; font-style: italic">Học Vấn, Kinh Nghiệm, Ngoại ngữ</span>
                        <span style="font-weight:bold; font-size: 18px">(Nếu có)</span> vào CV này</label>
                </div>
                <hr>
                <div class="btn-edit">
                    <button type="submit" class="btn button-save">Tạo CV</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>



<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.js" type="text/javascript"></script>
{{-- Validate form thêm CV Onl--}}
@if (Session::pull('errcvonl') != null)
<script type="text/javascript">
    $(window).load(function(e) {
        $("#add-cv-online").modal('show');
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



{{-- Radio charm --}}
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Radiocharm/jquery-radiocharm.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/jQueryPlugin/jQuery-Radiocharm/jquery-radiocharm.css') }}">
<script>
    $('input:radio').radiocharm();
</script>

<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Tagify/dist/jQuery.tagify.min.js')}}"></script>
{{-- Tagify --}}
<script>
    $('#tagsadd').tagify();
</script>


@endsection



