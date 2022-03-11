<div class="col-md-4 col-sm-12 col-12">

    <div class="block-sidebar" style="margin-bottom: 20px;">
        <header>
            <h3 class="title-sidebar font-roboto bg-success">
                Trung tâm quản lý
            </h3>
        </header>
        <div class="content-sidebar menu-trung-tam-ql menu-ql-employer">
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
        </div>
    </div>
</div>
