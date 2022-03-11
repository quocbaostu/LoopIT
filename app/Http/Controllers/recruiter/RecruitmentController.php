<?php

namespace App\Http\Controllers\recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
use Carbon\Carbon;
use DB;

use App\Models\recruiter\TaiKhoanNTD;
use App\Models\recruiter\HoSoNTD;
use App\Models\recruiter\TinTuyenDung;
use App\Models\recruiter\DichVuDaDangKy;
use App\Models\jobseeker\CVUVDaUngTuyen;
use App\Models\jobseeker\TkUngvien;
use App\Models\jobseeker\CV;
use App\Models\jobseeker\NoidungCV;

use App\Models\ThanhPho;
use App\Models\LoaiNganhNghe;
use App\Models\NganhNghe;


class RecruitmentController extends Controller
{
    // Danh sách tin tuyển dụng
    public function getListRecruitment()
    {
        $id_ntd = Session::get('recruiter_id');
        $tinTuyenDung = TinTuyenDung::where('id_ntd', '=', $id_ntd)->OrderBy('trangthai_tintd')->get();

        $exist_DVHT = DB::table('tbl_dichvudadangky')
        ->join('tbl_dichvu', 'tbl_dichvu.id_dichvu', '=', 'tbl_dichvudadangky.id_dichvu')
        ->join('tbl_tknhatuyendung', 'tbl_tknhatuyendung.id_ntd', '=', 'tbl_dichvudadangky.id_ntd')
        ->select('tbl_dichvudadangky.*', 'tbl_dichvu.*','tbl_tknhatuyendung.*')
        ->where('tbl_dichvudadangky.id_ntd','=',Session::get('recruiter_id'))
        ->where('tbl_dichvu.loaidv','=',3)
        ->where('tbl_dichvudadangky.trangthai_dvdadk','=',1)
        ->exists();

        return view('pages.recruiter.list-recruitment')->with(compact('tinTuyenDung','exist_DVHT'));
    }
    public function getCreateRecruitment()
    {
        $thanhpho = ThanhPho::all();
        $nganhnghe = NganhNghe::all();
        return view('pages.recruiter.create-recruitment')->with(compact('thanhpho','nganhnghe'));
    }
    public function postCreateRecruitment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tencongviec' => 'required',
            'capbac' => 'not_in:0',
            'loaicongviec' => 'not_in:0',
            'diadiemlamviec' => 'required',
            'thanhpho' => 'not_in:0',
            'trinhdo' => 'not_in:0',
            'kinhnghiem' => 'not_in:0',
            'mucluong_toithieu' => 'not_in:0|lt:'.$request->mucluong_toida,
            'mucluong_toida' => 'not_in:0',
            'nganhnghe' => 'required',
            'motacongviec' => 'required',
            'yeucaucongviec' => 'required',
            'quyenloi' => 'required',
        ],[
            'tencongviec.required' => 'Tên công việc không được để trống.',
            'capbac.not_in' => 'Xin hãy chọn cấp bậc.',
            'loaicongviec.not_in' => 'Xin hãy chọn loại công việc.',
            'diadiemlamviec.required' => 'Địa điểm không được để trống.',
            'thanhpho.not_in' => 'Xin hãy chọn thành phố.',
            'trinhdo.not_in' => 'Xin hãy chọn trình độ.',
            'kinhnghiem.not_in' => 'Xin hãy chọn số năm kinh nghiệm.',
            'mucluong_toithieu.not_in' => 'Xin hãy chọn mức lương tối thiểu.',
            'mucluong_toithieu.lt' => 'Mức lương tối thiểu không được lớn hơn hoặc bằng mức lương tối đa.',
            'mucluong_toida.not_in' => 'Xin hãy chọn mức lương tối đa.',
            'nganhnghe.required' => 'Xin hãy chọn ngành nghề.',
            'motacongviec.required' => 'Mô tả công việc không được để trống.',
            'yeucaucongviec.required' => 'Yêu cầu công việc không được để trống.',
            'quyenloi.required' => 'Quyền lợi không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {
                $id_ntd = Session::get('recruiter_id');
                do{
                    $id_tintd = Str::random(5).mt_rand(1, 99999);
                    $exist_id_tintd = TinTuyenDung::where('id_tintd','=',$id_tintd)->first();
                } while ($exist_id_tintd != null);

                $flag = 1;
                $nganhnghe = null;
                foreach($request->nganhnghe as $key => $value){
                    if($flag){
                        $nganhnghe = $value;
                        $flag = 0;
                    } else {
                        $nganhnghe = $nganhnghe.','.$value;
                    }
                }

                $tinTuyenDung = new TinTuyenDung;
                $tinTuyenDung->id_tintd = $id_tintd;
                $tinTuyenDung->tencongviec = $request->tencongviec;
                $tinTuyenDung->capbac = $request->capbac;
                $tinTuyenDung->loaicongviec = $request->loaicongviec;
                $tinTuyenDung->diadiemlamviec = $request->diadiemlamviec;
                $tinTuyenDung->thanhpho = $request->thanhpho;
                $tinTuyenDung->trinhdo = $request->trinhdo;
                $tinTuyenDung->kinhnghiem = $request->kinhnghiem;
                $tinTuyenDung->mucluong_toithieu = $request->mucluong_toithieu;
                $tinTuyenDung->mucluong_toida = $request->mucluong_toida;
                $tinTuyenDung->nganhnghe = $nganhnghe;
                $tinTuyenDung->motacongviec = $request->motacongviec;
                $tinTuyenDung->yeucaucongviec = $request->yeucaucongviec;
                $tinTuyenDung->quyenloi = $request->quyenloi;
                $tinTuyenDung->id_ntd = $id_ntd;
                $tinTuyenDung->save();

                Session::flash('msg_success','Thêm tin tuyển dụng thành công.');
                return redirect()->back();

        }
    }
    public function getUpdateRecruitment($id_tintd)
    {
        $thanhpho = ThanhPho::all();
        $nganhnghe = NganhNghe::all();
        $id_ntd = Session::get('recruiter_id');
        $tinTuyenDung = TinTuyenDung::select('*')
        ->where('id_ntd', '=', $id_ntd)
        ->where('id_tintd', '=', $id_tintd)->first();
        if($tinTuyenDung != null){
            $listNganhNghe =  explode(",", $tinTuyenDung->nganhnghe);
            return view('pages.recruiter.update-recruitment')->with(compact('thanhpho','nganhnghe','tinTuyenDung', 'listNganhNghe'));
        } else {
            return redirect()->back();
        }
    }
    public function postUpdateRecruitment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tencongviec' => 'required',
            'capbac' => 'not_in:0',
            'loaicongviec' => 'not_in:0',
            'diadiemlamviec' => 'required',
            'thanhpho' => 'not_in:0',
            'trinhdo' => 'not_in:0',
            'kinhnghiem' => 'not_in:0',
            'mucluong_toithieu' => 'not_in:0|lt:'.$request->mucluong_toida,
            'mucluong_toida' => 'not_in:0',
            'nganhnghe' => 'required',
            'motacongviec' => 'required',
            'yeucaucongviec' => 'required',
            'quyenloi' => 'required',
        ],[
            'tencongviec.required' => 'Tên công việc không được để trống.',
            'capbac.not_in' => 'Xin hãy chọn cấp bậc.',
            'loaicongviec.not_in' => 'Xin hãy chọn loại công việc.',
            'diadiemlamviec.required' => 'Địa điểm không được để trống.',
            'thanhpho.not_in' => 'Xin hãy chọn thành phố.',
            'trinhdo.not_in' => 'Xin hãy chọn trình độ.',
            'kinhnghiem.not_in' => 'Xin hãy chọn số năm kinh nghiệm.',
            'mucluong_toithieu.not_in' => 'Xin hãy chọn mức lương tối thiểu.',
            'mucluong_toithieu.lt' => 'Mức lương tối thiểu không được lớn hơn hoặc bằng mức lương tối đa.',
            'mucluong_toida.not_in' => 'Xin hãy chọn mức lương tối đa.',
            'nganhnghe.required' => 'Xin hãy chọn ngành nghề.',
            'motacongviec.required' => 'Mô tả công việc không được để trống.',
            'yeucaucongviec.required' => 'Yêu cầu công việc không được để trống.',
            'quyenloi.required' => 'Quyền lợi không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {

                $id_ntd = Session::get('recruiter_id');
                $id_tintd = $request->id_tintd;

                $tinTuyenDung = TinTuyenDung::select('*')
                ->where('id_ntd', '=', $id_ntd)
                ->where('id_tintd', '=', $id_tintd)->first();

                $flag = 1;
                $nganhnghe = null;
                foreach($request->nganhnghe as $key => $value){
                    if($flag){
                        $nganhnghe = $value;
                        $flag = 0;
                    } else {
                        $nganhnghe = $nganhnghe.','.$value;
                    }
                }

                $tinTuyenDung->update([
                    'tencongviec' => $request->tencongviec,
                    'capbac' => $request->capbac,
                    'loaicongviec' => $request->loaicongviec,
                    'diadiemlamviec' => $request->diadiemlamviec,
                    'thanhpho' => $request->thanhpho,
                    'trinhdo' => $request->trinhdo,
                    'kinhnghiem' => $request->kinhnghiem,
                    'mucluong_toithieu' => $request->mucluong_toithieu,
                    'mucluong_toida' => $request->mucluong_toida,
                    'nganhnghe' => $nganhnghe,
                    'motacongviec' => $request->motacongviec,
                    'yeucaucongviec' => $request->yeucaucongviec,
                    'quyenloi' => $request->quyenloi
                ]);

                Session::flash('msg_success','Cập nhật tin tuyển dụng thành công.');
                return redirect()->back();

        }
    }
    public function deleteRecruitment($id_tintd){
        $id_ntd = Session::get('recruiter_id');

        $tinTuyenDung = TinTuyenDung::select('*')
        ->where('id_ntd', '=', $id_ntd)
        ->where('id_tintd', '=', $id_tintd)->first();
        if($tinTuyenDung != null){
            $tinTuyenDung->update(['trangthai_tintd' => -1]);
            Session::flash('msg_success','Xóa tin tuyển dụng thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function postingRecruitment(Request $request) {
        $validator = Validator::make($request->all(), [
            'ngayhethan' => 'date|after:now',
        ],[
            'ngayhethan.date' => 'Xin hãy chọn hạn nộp hồ sơ.',
            'ngayhethan.after' => 'Hạn nộp hồ sơ ứng tuyển phải sau ngày hiện tại.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {

            $id_ntd = Session::get('recruiter_id');
            $id_tintd = $request->id_tintd;

            $check_trangthaitk = TaiKhoanNTD::where('id_ntd','=',$id_ntd)->first();
            $total = $check_trangthaitk->trangthaitk;
            if($total == 2){
                $total = 1;
            }
            $listRecruitmentCurrent = TinTuyenDung::where('id_ntd', '=', $id_ntd)
            ->where('trangthai_tintd', '=', 2)
            ->get();
            $existHoSoNTD = HoSoNTD::where('id_ntd','=', $id_ntd)->first();
            if($existHoSoNTD != null) {
                if($listRecruitmentCurrent->count() < $total){
                    $tinTuyenDung = TinTuyenDung::select('*')
                    ->where('id_ntd', '=', $id_ntd)
                    ->where('id_tintd', '=', $id_tintd)->first();

                    $ngayhethan = new Carbon($request->ngayhethan, 'Asia/Ho_Chi_Minh');

                    $tinTuyenDung->update([
                        'ngaydangtin' => Carbon::now('Asia/Ho_Chi_Minh'),
                        'ngayhethan' => $ngayhethan,
                        'dichvuhotro' => $request->dichvuhotro,
                        'trangthai_tintd' => 2,
                    ]);

                    Session::flash('msg_success','Đăng tin tuyển dụng thành công. Tin sẽ được hiển thị trên trang ứng viên.');
                    return redirect()->back();

                } else {
                    Session::flash('msg_error','Không thành công.');
                    Session::flash('mess_h5','Đăng không thành công');
                    Session::flash('mess_p1','Do số tin tuyển dụng đang đăng đã đạt tối đa.');
                    return redirect()->back();
                }
            } else {
                Session::flash('msg_error1','Không thành công.');
                Session::flash('mess_h5','Đăng không thành công');
                Session::flash('mess_p1','Do chưa cập nhật hồ sơ công ty.');
                return redirect()->back();
            }

        }
    }
    public function removePostingRecruitment(Request $request){
        if($request->id_tintd != null){
            $id_ntd = Session::get('recruiter_id');
            $id_tintd = $request->id_tintd;
            $tinTuyenDung = TinTuyenDung::select('*')
            ->where('id_ntd', '=', $id_ntd)
            ->where('id_tintd', '=', $id_tintd)->first();

            $tinTuyenDung->update([
                'ngaydangtin' => NULL,
                'ngayhethan' =>  NULL,
                'dichvuhotro' => NULL,
                'trangthai_tintd' => 0,
            ]);

            Session::flash('msg_success','Hủy đăng tin tuyển dụng thành công.');
            return redirect()->back();
        }else {
            return redirect()->back();
        }
    }

    public function getListJobseekerApply(){
        $listJobseekerApply = DB::table('tbl_cvuvdaungtuyen')
        ->join('tbl_cv', 'tbl_cv.id_cv', '=', 'tbl_cvuvdaungtuyen.id_cv')
        ->join('tbl_tintuyendung', 'tbl_tintuyendung.id_tintd', '=', 'tbl_cvuvdaungtuyen.id_tintd')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cv.*', 'tbl_cvuvdaungtuyen.*','tbl_tkungvien.*','tbl_tintuyendung.*')
        ->where('tbl_tintuyendung.id_ntd','=',Session::get('recruiter_id'))
        ->orderBy('tbl_cvuvdaungtuyen.thoigiannop', 'desc')
        ->get();
        // dd($listJobeekerApply);

        return view('pages.recruiter.list-jobseeker-apply')->with(compact('listJobseekerApply'));
    }

    public function getDetailCVJobseeker($id_uv, $id_cv,$id_CVdaut){
        $ungVien = TkUngvien::where('id_uv','=', $id_uv)->first();
        $cv = CV::where('id_cv', $id_cv)->first();
        $noiDungCV = NoidungCV::where('id_cv', $cv->id_cv)->get();
        $cvDaUngTuyen = CVUVDaUngTuyen::where('id_CVdaut','=', $id_CVdaut)->first();

        return view('pages.recruiter.detail-cv-jobseeker')->with(compact('cv', 'noiDungCV', 'ungVien','cvDaUngTuyen'));
    }
    public function postReviewsCV(Request $request){
        $cvDaUngTuyen = CVUVDaUngTuyen::where('id_CVdaut','=', $request->id_CVdaut)->first();

        if($request->ngayhenphongvan != null && $request->trangthai_danhgia == 3) {
            $cvDaUngTuyen->update([
                'trangthai_danhgia' => $request->trangthai_danhgia ,
                'nhanxet' => $request->nhanxet,
                'ngayhenphongvan' => $request->ngayhenphongvan,
            ]);
        } else {
            $cvDaUngTuyen->update([
                'trangthai_danhgia' => $request->trangthai_danhgia ,
                'nhanxet' => $request->nhanxet,
                'ngayhenphongvan' => NULL,
            ]);
        }


        Session::flash('msg_success','Gửi nhận xét & đánh giá cho ứng viên thành công.');

        return redirect()->back();
    }
}
