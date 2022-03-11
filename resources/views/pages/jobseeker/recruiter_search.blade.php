@extends('layout.jobseeker.main')
@section('content')


<div class="container-fluid search-fluid">
    <div class="container mb-3">
        <Form method="GET" action="{{route('recruiter_search')}}">
            {{ csrf_field() }}
            <h3 style="color: #147259">TÌM KIẾM NHÀ TUYỂN DỤNG</h3>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="input-group s-input-group">
                            <input type="text" class="form-control sinput" name="nd_timkiem" placeholder="Nhập kỹ năng, công việc,..."  value="{{ request()->input('nd_timkiem')}}">
                            <span><i class="fa fa-search"></i></span>
                            </div>
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
                        <p><a class="btnf mb-2">Lĩnh vực hoạt động</a></p>
                        <select name="linhvuchd" id="jobType">
                            @if (request()->input('linhvuchd') != null)
                                <option value="0">Tất cả lĩnh vực</option>
                            @foreach ($loainganhnghe as $lnn)
                            @if($lnn->tenloainn == request()->input('linhvuchd'))
                                <option value="{{$lnn->tenloainn}}" selected >{{$lnn->tenloainn}}</option>
                            @else
                                <option value="{{$lnn->tenloainn}}" >{{$lnn->tenloainn}}</option>
                            @endif
                            @endforeach
                            @else
                                <option selected value="0">Tất cả lĩnh vực</option>
                                @foreach ($loainganhnghe as $lnn)
                                <option value="{{$lnn->tenloainn}}" >{{$lnn->tenloainn}}</option>
                                @endforeach
                            @endif
                        </select>
                        <hr>
                        <p><a class="btnf mb-2">Quy mô</a></p>
                        <select name="quymo" id="natureWork">
                            <option selected value="0">Chọn quy mô</option>
                            <option value="Dưới 20 người">Dưới 20 người</option>
                            <option value="20 - 150 người">20 - 150 người</option>
                            <option value="150 - 300 người">150 - 300 người</option>
                            <option value="Trên 300 người">Trên 300 người</option>
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
                                            <div class="col-2">
                                                <a href="#">
                                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$kq->logo)}}" class="job-logo-ima" alt="job-logo">
                                                </a>
                                            </div>
                                            <div class="col-8">
                                                <div class="row job-title mb-1">
                                                    <a href="{{route('recruiter_detail', ['id_hosontd'=>$kq->id_hosontd])}}">{{$kq->tencty}}</a>
                                                </div>
                                                <div class="row job-company mb-3">
                                                    <a href="#">{{$kq->thanhpho}}</a> | <a href="#" class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$kq->diachicty}}</a>
                                                </div>
                                                <div class="row mb-2">
                                                    <i class="fa fa-cubes" aria-hidden="true"></i>&nbsp;
                                                    Lĩnh vực:&nbsp;<span style="font-weight:bold">{{$kq->linhvuchd}}</span>
                                                </div>
                                                <div class="row">
                                                    <i class="fa fa-users " aria-hidden="true"></i>&nbsp;
                                                    Quy mô:&nbsp;<span style="font-weight:bold">{{$kq->quymo}}</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div>
                                                    <a href="{{route('recruiter_detail', ['id_hosontd'=>$kq->id_hosontd])}}" class="btn btn-detail">
                                                        <i class="fa fa-info" aria-hidden="true"></i> Chi tiết
                                                    </a>
                                                </div>
                                                @if (in_array($kq->id_hosontd, $savejob_id_hosontd))
                                                <div>
                                                    <a href="{{route('js_getunsaverc',['id_hosontd'=>$kq->id_hosontd])}}" class="btn btn-saved-list">
                                                        <i class="fa fa-check" aria-hidden="true"></i> Đã Lưu
                                                    </a>
                                                </div>
                                                @else
                                                <div>
                                                    <a href="{{route('js_getsaverc',['id_hosontd'=>$kq->id_hosontd])}}" class="btn btn-save-list">
                                                        <i class="fa fa-heart" aria-hidden="true"></i> Lưu
                                                    </a>
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

{{-- Đổi select Quy mô sang giá trị hiện tại  --}}
@if(request()->input('quymo') != null)
<script type="text/javascript">
    window.addEventListener("load", function(){
        $( '#natureWork' ).val('{{ request()->input('quymo') }}').change();
    });
</script>
@endif


@endsection
