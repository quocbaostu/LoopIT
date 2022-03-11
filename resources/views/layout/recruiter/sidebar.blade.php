<div class="col-md-4 col-sm-12 col-12">
    <div class="recuiter-info">
    @if(isset($hoSoNTD))
        <div class="recuiter-info-avt">
            <img src="{{URL::asset('public/img/recruiter/uploads/'.$hoSoNTD->logo)}}">
        </div>
        <div class="clearfix list-rec">
            <h4>{{$hoSoNTD->tencty}}</h4>
            <hr>
            <ul>
                <li><a href="{{route('recruiter.list_recruitment')}}">Việc làm đang đăng <strong>({{$showing_recruitment}})</strong></a></li>
                <li><a href="#">Follower <strong>(450)</strong></a></li>
            </ul>         
        </div>
    @else
        <div class="recuiter-info-avt">
            <img src="{{ URL::asset('public/img/icon_avatar.jpg') }}">
        </div>
        <div class="clearfix list-rec ">     
            <h4>Bạn chưa cập nhật hồ sơ công ty.</h4>
            <hr>
            <ul>
                <li class="btncenter"><a class="btn btn-outline-success" href="{{route('recruiter.company_info')}}"><strong>Cập nhật</strong></a></li>
            </ul>   
        </div>
    @endif
        
    </div>


    <div class="block-sidebar" style="margin-bottom: 20px;">
        <header>
            <h3 class="title-sidebar font-roboto bg-success">
                Trung tâm quản lý
            </h3>
        </header>
        <div class="content-sidebar menu-trung-tam-ql menu-ql-employer">
            <h3 class="menu-ql-ntv">
                Quản lý tài khoản
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.account_my_info')}}">
                        Tài khoản
                    </a>
                </li>
                <li>
                    <a href="{{ route('recruiter.account_change_password')}}">
                        Đổi mật khẩu
                    </a>
                </li>
            </ul>
            <h3 class="menu-ql-ntv">
                Quản lý hồ sơ công ty
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.company_info')}}">
                        Thông tin công ty
                    </a>
                </li>
            </ul>
            <h3 class="menu-ql-ntv">
                Quản lý dịch vụ
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.my_services') }}">
                        Dịch vụ của tôi
                    </a>
                </li>
                <li>
                    <a href="{{ route('recruiter.history_orders') }}">
                        Đơn Hàng
                    </a>
                </li>
            </ul>
            <h3 class="menu-ql-ntv">
                Quản lý đăng tuyển
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.list_recruitment') }}">
                        Danh sách tin tuyển dụng
                    </a>
                </li>
                <li>
                    <a href="{{ route('recruiter.list_jobseeker_apply') }}">
                        Danh sách ứng viên ứng tuyển
                    </a>
                </li>
            </ul>
            <h3 class="menu-ql-ntv">
                Quản lý hồ sơ ứng viên
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.list_cv_save') }}">
                        Danh sách CV đã lưu
                    </a>
                </li>
                <li>
                    <a href="{{ route('recruiter.list_cv_view') }}">
                        Danh sách CV đã dùng điểm xem
                    </a>
                </li>
            </ul>
            <h3 class="menu-ql-ntv">
                Hỗ trợ và thông báo
            </h3>
            <ul>
                <li>
                    <a href="#" title="Gửi yêu cầu đến ban quản trị">
                        Gửi yêu cầu đến ban quản trị
                    </a>
                </li>
                <li>
                    <a href="#" title="Hướng dẫn thao tác">
                        Hướng dẫn thao tác
                    </a>
                </li>
                <li>
                    <a target="_blank" href="#">
                        <span> Cẩm nang tuyển dụng</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
