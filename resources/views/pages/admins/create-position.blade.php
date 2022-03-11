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
                <h1 class="h3 mb-0 text-gray-800">Thêm chức vụ quản trị viên</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.list_position')}}"><i class="far fa-arrow-alt-circle-left"></i> Quay lại</a>
            </div>
            

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route('admin.create_position_post')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Mã chức vụ</label>
                                        <input type="text" name="id_chucvu" value="{{old('id_chucvu')}}" class="form-control" placeholder="Nhập mã chức vụ . . .">
                                        @error('id_chucvu')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Tên chức vụ</label>
                                        <input type="text" name="tenchucvu" value="{{old('tenchucvu')}}" class="form-control" placeholder="Nhập tên chức vụ. . .">
                                        @error('tenchucvu')
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


