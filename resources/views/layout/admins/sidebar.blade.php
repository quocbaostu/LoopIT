<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-infinity"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> LoopIT <sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-home"></i>
            <span>TRANG CHỦ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản trị viên
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-user-shield"></i>
            <span>Quản lý quản trị viên</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lý danh sách:</h6>
                <a class="collapse-item" href="{{route('admin.list_admin')}}">Quản trị viên</a>
                <a class="collapse-item" href="{{route('admin.list_position')}}">Chức vụ</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dịch vụ
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices"
           aria-expanded="true" aria-controls="collapseServices">
            <i class="fas fa-server"></i>
            <span>Quản lý dịch vụ</span>
        </a>
        <div id="collapseServices" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lý danh sách:</h6>
                <a class="collapse-item" href="{{route('admin.list_services')}}">Dịch vụ</a>
                <a class="collapse-item" href="{{route('admin.list_order')}}">Đơn hàng</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Ứng viên
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-users"></i>
            <span>Quản lý ứng viên</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lý danh sách:</h6>
                <a class="collapse-item" href="{{route('admin.jobseeker.list_jobseeker')}}">Ứng viên</a>
                <a class="collapse-item" href="{{route('admin.jobseeker.list_cv_public')}}">CV Công Khai</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Nhà tuyển dụng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
           aria-expanded="true" aria-controls="collapsePages1">
            <i class="fas fa-user-tie"></i>
            <span>Quản lý nhà tuyển dụng</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lý danh sách:</h6>
                <a class="collapse-item" href="{{route('admin.recruiter.list_recruiter')}}">Nhà tuyển dụng</a>
                <a class="collapse-item" href="{{route('admin.recruiter.list_recruitment_pending')}}">Tin tuyển dụng </a>
                <a class="collapse-item" href="{{route('admin.recruiter.list_recruitment_reported')}}">Báo cáo xấu </a>
            </div>
        </div>
    </li>

   

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
