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
                <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin tài khoản</h1>
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
                            <form action="{{route('admin.change_profile_post')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id_qtv" value="{{$admin->id_qtv}}">
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{$admin->email}}" class="form-control"  readonly="readonly">
                                        @error('email')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label>Họ tên</label>
                                        <input type="text" name="tenqtv" value="{{$admin->tenqtv}}" class="form-control" >
                                        @error('tenqtv')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label>Số điện thoại</label>
                                        <input type="number" name="sdt" value="{{$admin->sdt}}" class="form-control" >
                                        @error('sdt')
                                        <div class="alert alert-danger form-control-user" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Chức vụ</label>
                                        @foreach($chucvu as $key => $value)
                                            @if($value->id_chucvu == $admin->id_chucvu)
                                            <input type="text" name="chucvu" value="{{$value->tenchucvu}}" class="form-control" readonly="readonly">
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label text-right label">Ảnh đại diện</label>
                                    <div class="col-7 " >
                                        <div id="drop-area">
                                            <input name="hinhanh" type="file" id="logo-img" accept="image/*" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]);" hidden="hidden">
                                            <button type="button" class="btn btn-success" id="upload-logo-button">Chọn Tệp</button>
                                            <span class="ml-3" id="upload-logo-span">Chưa có tệp nào được chọn.</span>
                                            <hr>
                                            @if(isset($admin) && $admin->hinhanh != null)
                                            <img id="photo" src="{{URL::asset('public/img/admin/uploads/'.$admin->hinhanh)}}"   class="mt-3 border border-success rounded-circle"  width="75" height="75" />
                                            @else
                                            <img id="photo" src=""   class="mt-3 border border-success rounded-circle"  width="75" height="75" />
                                            @endif
                                        </div>
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
    <script type="text/javascript">
      const uploadLogoButton = document.getElementById("logo-img");
      const customBtn = document.getElementById("upload-logo-button");
      const customText = document.getElementById("upload-logo-span");

      customBtn.addEventListener("click", function() {
        uploadLogoButton.click();
      });

      uploadLogoButton.addEventListener("change", function() {
        if(uploadLogoButton.value) {
          customText.innerHTML = uploadLogoButton.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        } else {
          customText.innerHTML = "Chưa có tệp nào được chọn.";
        }
      });
    </script>

    <script>
      $("img").each(function(){
        var img = $(this);
        var image = new Image();
        image.src = $(img).attr("src");
        var no_image = "{{ URL::asset('public/img/recruiter/no-image.png') }}";
        if (image.naturalWidth == 0 || image.readyState == 'uninitialized'){
            $(img).unbind("error").attr("src", no_image).css({
                height: $(img).css("height"),
                width: $(img).css("width"),
            });
        }
      });
      
    </script>
    
@endsection


