<div class="col-md-4 col-sm-12 col-12">
    <div class="recuiter-info " >
        <div class="row">
            <div class="col-2">
                @if($cv->hinhdaidien == null)
                <img class="rounded-circle" src="{{ URL::asset('public/img/icon_avatar.jpg') }}" width="50px" height="50px">
                @else
                <img class="rounded-circle" src="{{URL::asset('public/img/jobseeker/uploads/avt_cv/'.$cv->hinhdaidien)}}" width="50px" height="50px">
                @endif
            </div>
            <div class="col-10">
                <h5>{{$ungVien->ho}}  {{$ungVien->ten}}</h5>
                <p class="font-weight-light">Đã ứng tuyển</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Thông tin liên hệ</h5>
            </div>
            <div class="col-12 mt-2" >
                <div id="border-dop">
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$ungVien->email}}</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{$ungVien->sdt}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>File CV</h5>
            </div>
            <div class="col-12 mt-1" >
                <div class="mt-2">
                <a href="{{ URL::asset('public/cv/'.$cv->tenfile) }}" class="btn btn-success" target="_blank">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Tải file CV PDF
                 </a>
                 
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Đánh giá & Nhận xét hồ sơ</h5>
            </div>
            <div class="col-12 mt-1" >
                <div class="mt-2">
                <button  class="btn btn-outline-success" data-toggle="modal" 
                data-target="{{'#danhgia-'.$cv->id_cv}}">Đánh giá</button>
                    
                </div>
            </div>
        </div>
        
    </div>

    <!--Modal Details-->
    <div class="modal fade" id="{{'danhgia-'.$cv->id_cv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h3 class="modal-title font-weight-light" id="exampleModalLabel">Đánh giá và nhận xét về hồ sơ của ứng viên</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('recruiter.reviews_jobseeker_cv')}}">
                {{ csrf_field() }}
                    <div class="modal-body scroll-content">
                    <input type="hidden" name="id_CVdaut" value="{{$cvDaUngTuyen->id_CVdaut}}">
                    @if($cvDaUngTuyen->trangthai_danhgia != 3)
                    <div class="row form-group">
                        <div class="col-12 mb-3"><h5>Đánh giá</h5></div>
                        <div class="col-12">
                            <div class="radio-toolbar">
                                <input type="radio" class="ml-3" id="radioNhanHoSo" name="trangthai_danhgia" value="2"
                                @if($cvDaUngTuyen->trangthai_danhgia == 2)  checked @endif >
                                <label for="radioNhanHoSo" class="ml-3">Tiếp nhận hồ sơ và xem xét sau</label>

                                <input type="radio" class="ml-3" id="radioHenPhongVan" name="trangthai_danhgia" value="3"
                                @if($cvDaUngTuyen->trangthai_danhgia == 3)  checked  @endif >
                                <label for="radioHenPhongVan" class="ml-3">Hẹn phỏng vấn</label>


                                <input type="radio" class="ml-3" id="radioNhanViec" name="trangthai_danhgia" value="4"
                                @if($cvDaUngTuyen->trangthai_danhgia == 4) checked   @endif >
                                <label for="radioNhanViec" class="ml-3">Nhận việc</label> 

                                <input type="radio" class="ml-3" id="radioTuChoi" name="trangthai_danhgia" value="0"
                                @if($cvDaUngTuyen->trangthai_danhgia == 0) checked @endif >
                                <label for="radioTuChoi" class="ml-3">Từ chối</label> 
                            </div>
                        </div>
                    </div>
                    <div class="row form-group desc" style="display: none;" id="trangthai_danhgia3">
                        <div class="col-3 font-weight-bold"><h5>Ngày hẹn phỏng vấn: </h5></div>
                        <div class="col-9">
                            <input type="datetime-local" name="ngayhenphongvan" id="datefield">
                        </div>
                    </div>
                    @else
                    <div class="row form-group">
                        <div class="col-12 mb-3"><h5>Đánh giá</h5></div>
                        <div class="col-12">
                            <div class="radio-toolbar">
                                <input type="radio" class="ml-3" id="radioNhanHoSo" name="trangthai_danhgia" value="2">
                                <label for="radioNhanHoSo" class="ml-3">Tiếp nhận hồ sơ và xem xét sau</label>

                                <input type="radio" class="ml-3" id="radioHenPhongVan" name="trangthai_danhgia" value="3" checked>
                                <label for="radioHenPhongVan" class="ml-3">Hẹn phỏng vấn</label>


                                <input type="radio" class="ml-3" id="radioNhanViec" name="trangthai_danhgia" value="4">
                                <label for="radioNhanViec" class="ml-3">Nhận việc</label> 

                                <input type="radio" class="ml-3" id="radioTuChoi" name="trangthai_danhgia" value="0">
                                <label for="radioTuChoi" class="ml-3">Từ chối</label> 
                            </div>
                        </div>
                    </div>
                    <div class="row form-group desc" id="trangthai_danhgia3">
                        <div class="col-3 font-weight-bold"><h5>Ngày hẹn phỏng vấn: </h5></div>
                        <div class="col-9">
                            <input type="datetime-local" name="ngayhenphongvan" value="{{ $cvDaUngTuyen->ngayhenphongvan }}" id="datefield">
                        </div>
                    </div>
                    @endif
                    <div class="row form-group">
                        <div class="col-12 mb-3"><h5>Nhận xét và Thông tin thêm cho ứng viên</h5></div>
                        <div class="col-12">
                            <textarea type="text" name="nhanxet" id="mota" class="form-control" rows="8" placeholder="Nhập nhận xét . . .">{!! $cvDaUngTuyen->nhanxet !!}</textarea>
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                     </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("input[name$='trangthai_danhgia']").click(function() {
                var test = $(this).val();

                $("div.desc").hide();
                $("#trangthai_danhgia" + test).show();
            });
        });

        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if(dd<10){
        dd='0'+dd
        } 
        if(mm<10){
        mm='0'+mm
        } 

        today = yyyy+'-'+mm+'-'+dd+'T00:00';
        document.getElementById("datefield").setAttribute("min", today);
    </script>
</div>
