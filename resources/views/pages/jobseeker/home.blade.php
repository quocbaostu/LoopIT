@include('layout.jobseeker.header_home')

<div class="clearfix"></div>

<!-- main banner -->
<div class="container-fluid clear-left clear-right">
    <div class="main-banner">
        <div class="banner-image">
            <img src="public/img/banner2.jpg" alt="banner-image">
        </div>
    </div>
    <div class="banner-content">
        <h3>Tìm kiếm công việc cho mình ngay!</h3>
    </div>
</div>
<!-- (end) main banner -->

<!-- search section -->
<div class="container-fluid search-fluid">
    <div class="container">
        <div class="search-wrapper" style="margin-top: -11rem;">
            <ul class="nav nav-tabs search-nav-tabs" id="myTab" role="tablist">
                <li class="nav-item search-nav-item">
                    <a class="nav-link snav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tìm việc làm</a>
                </li>
                <li class="nav-item search-nav-item">
                    <a class="nav-link snav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tìm công ty</a>
                </li>
            </ul>
            <div class="tab-content search-tab-content" id="myTabContent">
                <!-- content tab 1 -->
                <div class="tab-pane stab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="bn-search-form" method="GET" action="{{route('job_search')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group s-input-group">
                                        <input type="text" class="form-control sinput" name="nd_timkiem" placeholder="Nhập kỹ năng, công việc,...">
                                        <span><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="computer-languages" name="nganhnghe">
                                        <option value="0" selected hidden >Tất cả ngành nghề</option>
                                        @foreach ($nganhnghe as $nnghe)
                                            <option value="{{$nnghe->tennganhnghe}}">{{$nnghe->tennganhnghe}}</option>
                                        @endforeach
                                        </select>
                                        <i class="fa fa-briefcase sfa" aria-hidden="true"></i>
                                        </div>
                                    <div class="col-md-3">
                                        <select id="s-provinces" name="thanhpho">
                                            <option value="0" selected hidden >Tất cả địa điểm</option>
                                            @foreach ($thanhpho as $tp)
                                            <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                            @endforeach
                                        </select>
                                        <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-search col-sm-12">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- (end) content tab 1 -->
                <!-- content tab 2 -->
                <div class="tab-pane stab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form class="bn-search-form" method="GET" action="{{route('recruiter_search')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="input-group s-input-group w-100">
                                    <input type="text" class="form-control sinput" placeholder="Nhập tên công ty, địa chỉ...">
                                    <span><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select id="jobType" name="thanhpho">
                                    <option value="0" selected hidden >Tất cả địa điểm</option>
                                    @foreach ($thanhpho as $tp)
                                    <option value="{{$tp->tentp}}">{{$tp->tentp}}</option>
                                    @endforeach
                                </select>
                                <i class="fa fa-map-marker sfa" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-search col-sm-12">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- (end) content tab 2 -->
            </div>
        </div>
    </div>
</div>
<!-- (end) search section -->

<!-- job board & sidebar section  -->
<div class="container-fluid jb-wrapper">
  <div class="container">
    <div class="row">
        <!-- job board -->
        <div class="col-md-8 col-sm-12 col-12">
            <div class="job-board-wrap">
                <h2 class="widget-title">
                <span>Tuyển gấp</span>
                </h2>
                <div class="job-group" style="height: 778px; overflow-y: auto;">
                    @foreach ($Tin_tg as $tintg)
                    <div class="job pagi">
                        <div class="job-content">
                            <div class="row">
                                <div class="job-logo col-2">
                                    <a href="{{route('job_detail', ['id_tintd'=>$tintg->id_tintd])}}">
                                        <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tintg->logo)}}" class="job-logo-ima" alt="job-logo">
                                    </a>
                                </div>
                                <div class="job-desc col-7">
                                    <div class="job-title">
                                        <a href="{{route('job_detail', ['id_tintd'=>$tintg->id_tintd])}}">{{$tintg->tencongviec}}</a>
                                    </div>
                                    <div class="job-company">
                                        <a href="{{route('recruiter_detail', ['id_hosontd'=>$tintg->id_hosontd])}}">{{$tintg->tencty}}</a> | <a class="job-address"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$tintg->thanhpho}}</a>
                                    </div>
                                    <div class="job-inf">
                                        <div class="job-main-skill">
                                            <i class="fa fa-circle-o-notch" aria-hidden="true"></i> <a href="#"> {{$tintg->loaicongviec}}</a>
                                        </div>
                                        <div class="job-salary">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span class="salary-min">{{$tintg->mucluong_toithieu}} <em class="salary-unit">$</em></span>
                                            <span class="salary-max">{{$tintg->mucluong_toida}} <em class="salary-unit">$</em></span>
                                        </div>
                                        <div class="job-deadline">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i>  Hạn nộp: <strong>{{$tintg->ngayhethan}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a href="{{route('job_detail', ['id_tintd'=>$tintg->id_tintd])}}" class="btn btn-detail ml-4">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                        <span>Chi tiết</span>
                                    </a>
                                    @if (in_array($tintg->id_tintd, $cviec_daluu_id))
                                    <a href="{{route('js_getunsavejob', ['id_tintd'=>$tintg->id_tintd])}}" class="btn btn-saved-list mt-1 ml-4" style="100px">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Bỏ Lưu</span>
                                    </a>
                                    @else
                                    <a href="{{route('js_savejob', ['id_tintd'=>$tintg->id_tintd])}}" class="btn btn-save-list mt-1 ml-4" style="100px">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <span>Lưu</span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- (end) job board -->
        <!-- sidebar -->
        <div class="col-md-4 col-sm-12 col-12 clear-left">
            <div class="job-sidebar">
                <div class="sb-banner">
                    <img src="public/img/ads.jpg" class="advertisement">
                </div>
            </div>
        </div>
        <!-- (end) sidebar -->
    </div>
  </div>
</div>
<!-- (end) job board & sidebar section  -->

<div class="clearfix"></div>

<!-- CViec Hấp dẫn -->
<div class="container-fluid">
    <div class="container job-board2">
        <div class="row">
            <div class="col-md-12 job-board2-wrap-header">
                <h3>Việc làm hấp dẫn</h3>
            </div>
            <div class="col-md-12 job-board2-wrap">
                <div class="owl-carousel owl-theme job-board2-contain">
                    @foreach ($Tin_hd as $tinhd)
                    <div class="item job-latest-item">
                        <a href="{{route('job_detail', ['id_tintd'=>$tinhd->id_tintd])}}" class="job-latest-group">
                            <div class="job-lt-logo">
                                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tinhd->logo)}}">
                            </div>
                            <div class="job-lt-info">
                                <h3>{{$tinhd->tencongviec}}</h3>
                                <a class="company" href="{{route('recruiter_detail', ['id_hosontd'=>$tinhd->id_hosontd])}}">{{$tinhd->tencty}}</a>
                                <p class="address" ><i class="fa fa-map-marker pr-1" aria-hidden="true"></i> {{$tinhd->thanhpho}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true,
                    slideBy: 2,
                    dots: false
                },
                600:{
                    items:4,
                    nav:false,
                    slideBy: 2,
                    dots: false
                },
                1000:{
                    items: 6,
                    nav:true,
                    loop:false,
                    slideBy: 2
                }
            }
        });
    })
</script>
<!-- (end) CViec Hấp dẫn -->


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ads-above">
                    <a href="#">
                        <img src="public/img/hna.jpg">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- top employer -->
<div class="container-fluid">
    <div class="container top-employer">
        <div class="row">
            <div class="col-md-12 top-employer-contain">
                <div class="header">
                    <h3>Nhà tuyển dùng hàng đầu</h3>
                </div>
                <div class="row">
                    @foreach ($ntdhd as $ntd)
                    <div class="col-md-3 col-sm-6 col-12 top-employer-wrap">
                        <div class="top-employer-item">
                            <a href="{{route('recruiter_detail', ['id_hosontd'=>$ntd->id_hosontd])}}">
                                <div class="emp-img-thumb">
                                    <img src="{{ URL::asset('public/img/recruiter/uploads/'.$ntd->logo)}}">
                                </div>
                                <h3 class="company">{{$ntd->tencty}}</h3>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- (end) top employer -->

<div class="clearfix"></div>

<!-- CViec mới nhất-->
<div class="container-fluid">
    <div class="container job-board2">
        <div class="row">
            <div class="col-md-12 job-board2-wrap-header">
                <h3>Tin tuyển dụng, việc làm mới nhất</h3>
            </div>
            <div class="col-md-12 job-board2-wrap">
                <div class="owl-carousel owl-theme job-board2-contain">
                    @foreach ($TinTD as $tinmoi)
                    <div class="item job-latest-item">
                        <a href="#" class="job-latest-group">
                            <div class="job-lt-logo">
                                <img src="{{ URL::asset('public/img/recruiter/uploads/'.$tinmoi->logo)}}">
                            </div>
                            <div class="job-lt-info">
                                <h3>{{$tinmoi->tencongviec}}</h3>
                                <a class="company" href="#">{{$tinmoi->tencty}}</a>
                                <p class="address" ><i class="fa fa-map-marker pr-1" aria-hidden="true"></i> {{$tinmoi->thanhpho}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true,
                    slideBy: 2,
                    dots: false
                },
                600:{
                    items:4,
                    nav:false,
                    slideBy: 2,
                    dots: false
                },
                1000:{
                    items: 6,
                    nav:true,
                    loop:false,
                    slideBy: 2
                }
            }
        });
    })
</script>
<!-- (end) CViec mới nhất -->


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ads-above">
                    <a href="#">
                        <img src="public/img/hna2.jpg">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- news -->
<div class="container-fluid">
    <div class="container news-wrapper">
        <div class="row">
            <div class="col-md-12 news-wrapper-head">
                Tư vấn nghề nghiệp từ HR Insider
            </div>
            <div class="col-md-4 col-sm-12 col-12 news-item">
                <div class="news-item-inner">
                    <a href="#wrap">
                        <div class="news-thumb" style="background-image: url(public/img/news1.jpg);"></div>
                    </a>
                    <div class="news-details">
                        <div class="tags">
                            <a href="#tag1">Quyền lợi nhân viên</a>
                        </div>
                        <div class="title">
                            <a href="#">
                            5 thời điểm doanh nghiệp không được buộc người lao động thôi việc
                            </a>
                            </div>
                        <div class="meta">
                            Khi nào thì người sử dụng lao động được quyền đơn phương chấm dứt hợp đồng khi nào thì không? Cùng tham khảo bài viết sau đây để hiểu thêm về quyền lợi của người lao động Việt Nam nhé!
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12 news-item">
                <div class="news-item-inner">
                    <a href="#wrap">
                        <div class="news-thumb" style="background-image: url(public/img/news2.jpg);"></div>
                    </a>
                    <div class="news-details">
                        <div class="tags">
                            <a href="#tag1">Trước khi nhảy việc</a>
                        </div>
                        <div class="title">
                            <a href="#">
                            Nhảy việc và những con số bạn cần phải lưu tâm
                            </a>
                            </div>
                        <div class="meta">
                            Dù bạn nhảy việc vì lý do gì cũng hãy cân nhắc đến những “con số” sau đây nhé!
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12 news-item">
                <div class="news-item-inner">
                    <a href="#wrap">
                        <div class="news-thumb" style="background-image: url(public/img/news3.png);"></div>
                    </a>
                    <div class="news-details">
                        <div class="tags">
                            <a href="#tag1">Huấn luyện nhân sự</a>
                        </div>
                        <div class="title">
                            <a href="#">
                            Đánh giá: bước đệm cần thiết trong việc đào tạo huấn luyện nhân viên
                            </a>
                            </div>
                        <div class="meta">
                            Cú sốc về kinh tế do Covid-19 gây ra đã khiến cho nhiều doanh nghiệp lớn và nhỏ phải nhanh chóng tìm ra các phương án ứng phó tốc độ và hiệu quả để giải quyết bài toán về tìn...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- (end) news -->

@include('layout.jobseeker.footer')


