<div class="col-md-4 col-sm-12 col-12">

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
                    <a href="{{ route('recruiter.account_my_info') }}">
                        Thông tin cá nhân
                    </a>
                </li>
                <li>
                    <a href="{{ route('recruiter.account_change_password') }}">
                        Thay đổi mật khẩu
                    </a>
                </li>
            </ul>
            
            <h3 class="menu-ql-ntv">
                Quản lý hồ sơ công ty
            </h3>
            <ul>
                <li>
                    <a href="{{ route('recruiter.company_info') }}">
                        Thông tin công ty
                    </a>
                </li>
            </ul>
                       
        </div>
    </div>
</div>
