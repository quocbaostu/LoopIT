@extends('layout.admins.main')
@section('admin_content')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        @include('layout.admins.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Cập nhật mật khẩu</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.home')}}"><i class="far fa-arrow-alt-circle-left"></i> Về trang chủ</a>
            </div>
            

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route('admin.change_password_post')}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id_qtv" value="{{$admin->id_qtv}}">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Mật khẩu cũ</label>
                                        <input type="password" name="old_pass" value="{{old('old_pass')}}" class="form-control" placeholder="Nhập mật khẩu cũ . . .">
                                        @error('old_pass')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="new_pass" value="{{old('new_pass')}}" class="form-control" placeholder="Nhập mật khẩu mới . . .">
                                        @error('new_pass')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    
    
@endsection


