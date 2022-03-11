@extends('layout.jobseeker.main')
@section('content')


<div class="container-fluid search-fluid">
    <div class="container mb-3">
        <Form method="GET" action="{{route('job_search')}}">
            {{ csrf_field() }}
            <h3 style="color: #147259">TÌM KIẾM VIỆC LÀM</h3>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group s-input-group">
                            <input type="text" class="form-control sinput" name="nd_timkiem" placeholder="Nhập kỹ năng, công việc,..."  value="{{ request()->input('nd_timkiem')}}">
                            <span><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <select id="computer-languages" name="nganhnghe">
                            @if (request()->input('nganhnghe') != null)
                                <option value="0">Tất cả ngành nghề</option>
                            @foreach ($nganhnghe as $nn)
                            @if($nn->tennganhnghe == request()->input('nganhnghe'))
                                <option value="{{$nn->tennganhnghe}}" selected >{{$nn->tennganhnghe}}</option>
                            @else
                                <option value="{{$nn->tennganhnghe}}" >{{$nn->tennganhnghe}}</option>
                            @endif
                            @endforeach
                            @else
                                <option selected value="0">Tất cả ngành nghề</option>
                                @foreach ($nganhnghe as $nn)
                                <option value="{{$nn->tennganhnghe}}" >{{$nn->tennganhnghe}}</option>
                                @endforeach
                            @endif
                            </select>
                            <i class="fa fa-briefcase sfa" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-3">
                            <select id="s-provinces" name="thanhpho">
                            @if (request()->input('thanhpho') != null)
                                <option value="0">Tất cả khu vực</option>
                            @foreach ($thanhpho as $tp)
                            @if($tp->tentp == request()->input('thanhpho'))
                                <option value="{{$tp->tentp}}" selected >{{$tp->tentp}}</option>
                            @else
                                <option value="{{$tp->tentp}}" >{{$tp->tentp}}</option>
                            @endif
                            @endforeach
                            @else
                                <option selected value="0">Tất cả khu vực</option>
                                @foreach ($thanhpho as $tp)
                                <option value="{{$tp->tentp}}" >{{$tp->tentp}}</option>
                                @endforeach
                            @endif
                            </select>
                            <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button type="submit" class="btn btn-primary btn-search col-sm-12">Tìm kiếm</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 col-12 recuitment-body">
                    <div class="card card-body bg-card-body-filter">
                        <p><a class="btnf btn-filter mb-2">Mức Lương (Dollar $)</a></p>
                        <div>
                            <input style="width:100%" type="number" class="if-price" name="mucluong_toithieu" placeholder="Mức lương tối thiểu" value="{{ request()->input('mucluong_toithieu') }}">
                        </div>
                        <hr>
                        <p><a class="btnf mb-2">Cấp bậc công việc</a></p>
                        <select name="capbac" id="jobType">
                            <option value="0" selected>Tất cả Cấp bậc</option>
                            <option value="Thực tập sinh/Sinh viên">Thực tập sinh/Sinh viên</option>
                            <option value="Mới tốt nghiệp">Mới tốt nghiệp</option>
                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Trưởng phòng">Trưởng phòng</option>
                            <option value="Giám đốc/Cấp cao hơn">Giám đốc/Cấp cao hơn</option>
                        </select>
                        <hr>
                        <p><a class="btnf mb-2">Trình độ yêu cầu</a></p>
                        <select name="trinhdo" id="natureWork">
                            <option value="0" selected>Tất cả Trình độ</option>
                            <option value="Đại học">Đại học</option>
                            <option value="Cao đẳng">Cao đẳng</option>
                            <option value="Trung cấp">Trung cấp</option>
                            <option value="Cao học">Cao học</option>
                            <option value="Trung học">Trung học</option>
                            <option value="Chứng chỉ">Chứng chỉ</option>
                            <option value="Lao động phổ thông">Lao động phổ thông</option>
                        </select>
                        <hr>
                        <p><a class="btnf btn-filter mb-2">Số năm kinh nghiệm yêu cầu</a></p>
                        <select type="text" name="kinhnghiem" id="jobExperience">
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
                        <hr>
                        <p><a class="btnf mb-2">Loại công việc</a></p>
                        <select name="loaicongviec" id="jobProvince">
                            <option value="0" selected>Tất cả Loại công việc</option>
                            <option value="Thực tập">Thực tập</option>
                            <option value="Toàn thời gian">Toàn thời gian</option>
                            <option value="Bán thời gian">Bán thời gian</option>
                            <option value="Nghề tự do">Nghề tự do</option>
                            <option value="Hợp đồng thời vụ">Hợp đồng thời vụ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-12">
                    <h4 class="search-find">{{$kq_tkiem->count()}} trong {{$kq_tkiem->total()}} Kết quả tìm kiếm</h4>
                    <div class="job-board-wrap">
                        <div class="job-group">
                            @if ($kq_tkiem->count() > 0)
                                @foreach ($kq_tkiem as $kq)
                                <div class="job pagi">
                                    <div class="job-content">
                                        <div class="row">
                                            <div class="col-2 mt-3">
                                                <a href="{{route('job_detail', ['id_tintd'=>$kq->id_tintd])}}">
                                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$kq->logo)}}" class="job-logo-ima" alt="job-logo">
                                                </a>
                                            </div>
                                            <div class="col-8">
                                                <div class="row job-title mb-1">
                                                    <a href="{{route('job_detail', ['id_tintd'=>$kq->id_tintd])}}">{{$kq->tencongviec}}</a>
                                                </div>
                                                <div class="row job-company mb-1">
                                                    <a href="{{route('recruiter_detail', ['id_hosontd'=>$kq->id_hosontd])}}">{{$kq->tencty}}</a> | <a class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$kq->thanhpho}}</a>
                                                </div>
                                                <div class="row mb-3">
                                                    Ngành nghề:<span style="font-weight:bold">&nbsp{{$kq->nganhnghe}}</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-1">
                                                            <i class="fa fa-circle-o-notch " aria-hidden="true"></i> Loại: <span style="font-weight:bold">{{$kq->loaicongviec}}</span>
                                                        </div>
                                                        <div class="mb-1">
                                                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                                                            Cấp bậc: <span style="font-weight:bold">{{$kq->capbac}}</span>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                            Kinh nghiệm: <span style="font-weight:bold">{{$kq->kinhnghiem}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-1">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            Mức lương:
                                                            <span class="salary-min" style="font-weight:bold">{{$kq->mucluong_toithieu}}<em class="salary-unit">$</em></span>
                                                            <span class="salary-max" style="font-weight:bold">{{$kq->mucluong_toida}}<em class="salary-unit">$</em></span>
                                                        </div>
                                                        <div class="mb-1">
                                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                            Trình độ: <span style="font-weight:bold">{{$kq->trinhdo}}</span>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            Hạn nộp <span style="font-weight:bold">{{$kq->ngayhethan}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 mt-4">
                                                <div>
                                                    <a href="{{route('job_detail', ['id_tintd'=>$kq->id_tintd])}}" class="btn btn-detail">
                                                        <i class="fa fa-info" aria-hidden="true"></i> Chi tiết
                                                    </a>
                                                </div>
                                                @if (in_array($kq->id_tintd, $savejob_id_tintd))
                                                <div>
                                                    <a href="{{route('js_getunsavejob', ['id_tintd'=>$kq->id_tintd])}}" class="btn btn-saved-list">
                                                        <i class="fa fa-check" aria-hidden="true"></i> Đã Lưu
                                                    </a>
                                                </div>
                                                @else
                                                <div>
                                                    <a href="{{route('js_savejob', ['id_tintd'=>$kq->id_tintd])}}" class="btn btn-save-list"><i class="fa fa-heart" aria-hidden="true"></i> Lưu</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <img src="{{ URL::asset('public/img/jobseeker/empty/search.jpg')}}">
                            @endif
                        </div>

                    </div>
                </div>
                <div>
                    {!! $kq_tkiem->withQueryString()->links() !!}
                </div>
            </div>
        </Form>
    </div>
</div>

{{-- Đổi select Cấp bậc sang giá trị hiện tại  --}}
@if(request()->input('capbac') != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $( '#jobType' ).val('{{ request()->input('capbac') }}').change();
    });
</script>
@endif

{{-- Đổi select Trình độ sang giá trị hiện tại  --}}
@if(request()->input('trinhdo') != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $( '#natureWork' ).val('{{ request()->input('trinhdo') }}').change();
    });
</script>
@endif

{{-- Đổi select Loại công việc sang giá trị hiện tại  --}}
@if(request()->input('loaicongviec') != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $( '#jobProvince' ).val('{{ request()->input('loaicongviec') }}').change();
    });
</script>
@endif

{{-- Đổi select Năm kinh nghiệm sang giá trị hiện tại  --}}
@if(request()->input('loaicongviec') != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $( '#jobExperience' ).val('{{ request()->input('kinhnghiem') }}').change();
    });
</script>
@endif


@endsection
