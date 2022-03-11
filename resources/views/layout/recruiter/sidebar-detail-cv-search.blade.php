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
                @if($existCV_DaDungDiemTK)
                <p class="font-weight-light">Đã dùng điểm để xem</p>
                @else 
                <p class="font-weight-light">Chưa dùng điểm để xem</p> 
                @endif
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Thông tin liên hệ</h5>
            </div>
            <div class="col-12 mt-2" >
                @if($existCV_DaDungDiemTK)
                <div id="border-dop">
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$ungVien->email}}</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{$ungVien->sdt}}</p>
                </div>
                @else   
                <button  class="btn btn-success" data-toggle="modal" data-target="{{'#showing-'.$cv->id_cv}}" id="border-dop-fill">
                    @if($cv->capbacht == 'Thực tập/Sinh viên' || $cv->capbacht == 'Mới tốt nghiệp')
                    Xem thông tin liên hệ và CV(-1 điểm)
                    <input type="hidden" name="diem_tkuv" value="1" />
                    @elseif($cv->capbacht == 'Nhân viên')
                    Xem thông tin liên hệ và CV(-2 điểm)
                    <input type="hidden" name="diem_tkuv" value="2" />
                    @else
                    Xem thông tin liên hệ và CV(-3 điểm)
                    <input type="hidden" name="diem_tkuv" value="3" />
                    @endif
                    <hr>
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> [protected_info@gmail.com]</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> [protected_number_phone]</p>
                </button>
                <!--Modal showing protected-->
                <div class="modal fade show" id="{{'showing-'.$cv->id_cv}}" style="z-index:10000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Thông Báo</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('recruiter.show_protected_info')}}">
                            {{csrf_field()}}
                            <div class="modal-body scroll-content">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <input type="hidden" name="id_cv" value="{{$cv->id_cv}}" />
                                        @if($cv->capbacht == 'Thực tập/Sinh viên' || $cv->capbacht == 'Mới tốt nghiệp')
                                        <h5 class="text-center font-weight-light">Bạn muốn dùng 1 điểm để xem thông tin được bảo vệ của CV?</h5>
                                        <input type="hidden" name="diem_tkuv" value="1" />
                                        @elseif($cv->capbacht == 'Nhân viên')
                                        <h5 class="text-center font-weight-light">Bạn muốn dùng 2 điểm để xem thông tin được bảo vệ của CV?</h5>
                                        <input type="hidden" name="diem_tkuv" value="2" />
                                        @else
                                        <h5 class="text-center font-weight-light">Bạn muốn dùng 3 điểm để xem thông tin được bảo vệ của CV?</h5>
                                        <input type="hidden" name="diem_tkuv" value="3" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success">Xác nhận</button>
                                    </form> 
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>File CV</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mt-1" >
                @if($existCV_DaDungDiemTK)
                <a href="{{ URL::asset('public/cv/'.$cv->tenfile) }}" class="btn btn-success" target="_blank">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Tải file CV PDF
                </a>
                @else 
                <a class="btn btn-outline-secondary" style="pointer-events: none;">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> [protected_file_CV]
                </a>
                @endif
            </div>
            <div class="col-4 mt-1 ">
                @if($existCVDaLuu)
                    @if($existCV_DaDungDiemTK)
                    <a style="pointer-events: none;"  class="btn btn-outline-success text-success float-right"><i class="fa fa-check" aria-hidden="true"></i></a>  
                    @else
                    <a href="{{route('recruiter.remove_save_jobseeker_cv', ['id_cv' => $cv->id_cv ])}}" 
                    class="btn btn-success float-right"><i class="fa fa-check" aria-hidden="true"></i></a>
                    @endif
                @else
                    <a href="{{route('recruiter.save_jobseeker_cv', ['id_cv' => $cv->id_cv ])}}" 
                    class="btn btn-outline-secondary float-right"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
                @endif
            </div>
        </div>
        
    </div>
</div>
