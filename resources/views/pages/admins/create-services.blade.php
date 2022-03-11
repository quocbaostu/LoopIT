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
                <h1 class="h3 mb-0 text-gray-800">Thêm dịch vụ mới</h1>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a class="btn btn-primary" href="{{route('admin.list_services')}}"><i class="far fa-arrow-alt-circle-left"></i> Quay lại</a>
            </div>
            

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route('admin.create_services_post')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Tên dịch vụ</label>
                                    <input type="text" name="tendv" value="{{old('tendv')}}" class="form-control"  placeholder="Nhập tên dịch vụ . . .">
                                    @error('tendv')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label>Giá</label>
                                        <input type="number" name="giadv" value="{{old('giadv')}}" class="form-control" min="0"  placeholder="Nhập giá dịch vụ (VND) . . .">
                                        @error('giadv')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <label>Loại dịch vụ</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loaidv" id="dangTuyen" value="1" checked>
                                            <label class="form-check-label" for="dangTuyen">
                                                Đăng tuyển
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loaidv" id="timHoSo" value="2">
                                            <label class="form-check-label" for="timHoSo">
                                                Tìm hồ sơ
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="loaidv" id="hoTro" value="3">
                                            <label class="form-check-label" for="hoTro">
                                                Hỗ trợ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div id="loaidv1" class="desc">
                                            <label>Số ngày hiệu lực</label>
                                            <input type="number" name="songayhieuluc" value="{{old('songayhieuluc') ?? 0}}" class="form-control" min="0"  placeholder="Nhập số ngày hiệu lực (Ngày) . . .">
                                            @error('songayhieuluc')
                                            <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div id="loaidv2" class="desc" style="display: none;">
                                            <label>Điểm tìm kiếm</label>
                                            <input type="number" name="diemtk" value="{{old('diemtk') ?? 0}}" class="form-control" min="0"  placeholder="Nhập điểm tìm kiếm  . . .">
                                            @error('diemtk')
                                            <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div id="loaidv3" class="desc" style="display: none;">
                                            <label>Số ngày hiệu lực</label>
                                            <input type="number" name="songayhieuluc_hotro" value="{{old('songayhieuluc_hotro') ?? 0}}" class="form-control" min="0"  placeholder="Nhập số ngày hiệu lực (Ngày) . . .">
                                            @error('songayhieuluc_hotro')
                                            <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motadvu">Mô tả dịch vụ</label>
                                    <textarea class="form-control" id="motadvu" name="motadv">{{old('motadv')}}</textarea>
                                    @error('motadv')
                                    <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                    @enderror
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
    <script>
        $(document).ready(function() {
            $("input[name$='loaidv']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#loaidv" + test).show();
            });
        });
    </script>
    <!-- CKEditor create_recruitment -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.config.entities = false;
    </script>
    <script>
        CKEDITOR.replace('motadvu');
    </script>
@endsection


