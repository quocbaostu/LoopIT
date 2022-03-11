<?php

namespace App\Http\Controllers\recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
use DB;

use App\Models\recruiter\TaiKhoanNTD;
use App\Models\recruiter\HoSoNTD;
use App\Models\recruiter\TinTuyenDung;
use App\Models\recruiter\CVUVDaLuu;

use App\Models\jobseeker\CVUVDaUngTuyen;
use App\Models\jobseeker\TkUngvien;
use App\Models\jobseeker\CV;
use App\Models\jobseeker\NoidungCV;


use App\Models\ThanhPho;
use App\Models\LoaiNganhNghe;

class RecruiterController extends Controller
{
    // Trang chủ
    public function  index()
    {
        $id_ntd = Session::get('recruiter_id');
        $hoSoNTD = HoSoNTD::where('id_ntd', '=' ,$id_ntd)->first();
        $current_recruitment = TinTuyenDung::select('*')
        ->where('id_ntd', '=', $id_ntd)
        ->get()->count();
        $showing_recruitment = TinTuyenDung::select('*')
        ->where('id_ntd', '=', $id_ntd)
        ->where('trangthai_tintd', '=', 2)
        ->get()->count();
        $count_listCV_apply =  DB::table('tbl_cvuvdaungtuyen')
        ->join('tbl_cv', 'tbl_cv.id_cv', '=', 'tbl_cvuvdaungtuyen.id_cv')
        ->join('tbl_tintuyendung', 'tbl_tintuyendung.id_tintd', '=', 'tbl_cvuvdaungtuyen.id_tintd')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cv.*', 'tbl_cvuvdaungtuyen.*','tbl_tkungvien.*','tbl_tintuyendung.*')
        ->where('tbl_tintuyendung.id_ntd','=',Session::get('recruiter_id'))
        ->where('tbl_cvuvdaungtuyen.trangthai_danhgia','=', 1)
        ->get()->count();
        $count_listCV_watched = DB::table('tbl_cvuvdaungtuyen')
        ->join('tbl_cv', 'tbl_cv.id_cv', '=', 'tbl_cvuvdaungtuyen.id_cv')
        ->join('tbl_tintuyendung', 'tbl_tintuyendung.id_tintd', '=', 'tbl_cvuvdaungtuyen.id_tintd')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cv.*', 'tbl_cvuvdaungtuyen.*','tbl_tkungvien.*','tbl_tintuyendung.*')
        ->where('tbl_tintuyendung.id_ntd','=',Session::get('recruiter_id'))
        ->where('tbl_cvuvdaungtuyen.trangthai_danhgia','=', 2)
        ->get()->count();

        return view('pages.recruiter.home')->with(compact('hoSoNTD','current_recruitment','showing_recruitment','count_listCV_apply', 'count_listCV_watched'));
    }
    // Trang Thông tin cá nhân
    public function getMyInfo(){
        $id_ntd = Session::get('recruiter_id');
        $taiKhoanNTD = TaiKhoanNTD::where('id_ntd', '=' ,$id_ntd)->first();
        return view('pages.recruiter.my-info')->with(compact('taiKhoanNTD'));
    }
    // Thay đổi thông tin cá nhân
    public function postMyInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'tennlh' => 'required',
            'sdt' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:15',
        ],[
            'tennlh.required' => 'Tên người liên hệ không được để trống.',
            'sdt.required' => 'Số điện thoại không được để trống.',
            'sdt.regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.not_regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.min' => 'Số điện thoại tối thiểu 9 số.',
            'sdt.max' => 'Số điện thoại tối đa 15 số.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->passes()) {
            $oldSDT = TaiKhoanNTD::where('sdt', '=' ,$request->sdt)->where('id_ntd','=',Session::get('recruiter_id'))->first();
            if($oldSDT == null){
                $email = $request->email;
                $tennlh = $request->tennlh;
                $sdt = $request->sdt;
                $existSDT = TaiKhoanNTD::where('sdt', '=' ,$sdt)->first();
                if($existSDT == null){
                    $taiKhoanNTD = TaiKhoanNTD::where('email', '=' ,$email)->first();
                    $taiKhoanNTD->update(['tennlh' => $tennlh, 'sdt' => $sdt]);
    
                    Session::put('recruiter_name', $tennlh);
                    Session::flash('msg_success', 'Cập nhật thông tin cá nhân thành công !!');
                    return redirect()->route('recruiter.account_my_info');
                } else {
                    Session::flash('exist_sdt', 'Số điện thoại này đã được sử dụng !!');
                    return redirect()->back();
                }
            } else {
                $email = $request->email;
                $tennlh = $request->tennlh;
                
                $taiKhoanNTD = TaiKhoanNTD::where('email', '=' ,$email)->first();
                $taiKhoanNTD->update(['tennlh' => $tennlh]);

                Session::put('recruiter_name', $tennlh);
                Session::flash('msg_success', 'Cập nhật thông tin cá nhân thành công !!');
                return redirect()->route('recruiter.account_my_info');
            }
        }
    }
    // Trang thay đổi mật khẩu
    public function getAccChangePass(){
        $id_ntd = Session::get('recruiter_id');
        $taiKhoanNTD = TaiKhoanNTD::where('id_ntd', '=' ,$id_ntd)->first();
        return view('pages.recruiter.change-pass')->with(compact('taiKhoanNTD'));
    }
    // Thay đổi mật khẩu
    public function postAccChangePass(Request $request){

        $validator = Validator::make($request->all(), [
            'matkhau_old' => 'required|string|min:6',
            'matkhau_new' => 'required|string|min:6',
            'matkhau_nhaplai_new' => 'required',
        ],[
            'matkhau_old.required' => 'Mật khẩu hiện tại không được để trống.',
            'matkhau_old.min' => 'Mật khẩu hiện tại tối thiểu 6 ký tự.',
            'matkhau_new.required' => 'Mật khẩu mới không được để trống.',
            'matkhau_new.min' => 'Mật khẩu mới tối thiểu 6 ký tự.',
            'matkhau_nhaplai_new.required' => 'Mật khẩu nhập lại không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->passes()) {
            $email = $request->email;
            $matkhau_old = $request->matkhau_old;
            $matkhau_new = bcrypt($request->matkhau_new);
            $taiKhoanNTD = TaiKhoanNTD::where('email', '=' ,$email)->first();

            if(Hash::check($matkhau_old ,$taiKhoanNTD->matkhau)) {
                $taiKhoanNTD->update(['matkhau' => $matkhau_new]);
                Session::flash('msg_success', 'Cập nhật mật khẩu thành công !!');
                return redirect()->route('recruiter.account_change_password');
            } else {
                Session::flash('msg_error', 'Mật khẩu hiện tại không đúng !!');
                return redirect()->back()->withInput();
            }
        }

    }

    public function getCompanyInfo(){
        $id_ntd = Session::get('recruiter_id');
        $hoSoNTD = HoSoNTD::where('id_ntd', '=' ,$id_ntd)->first();
        $thanhpho = ThanhPho::all();
        $loainganhnghe = LoaiNganhNghe::all();
        if($hoSoNTD == null) {
            return view('pages.recruiter.company-info')->with(compact( 'thanhpho', 'loainganhnghe'));
        } else {
            return view('pages.recruiter.company-info')->with(compact('hoSoNTD', 'thanhpho', 'loainganhnghe'));
        }

    }
    public function postCompanyInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'tencty' => 'required',
            'diachicty' => 'required',
            'thanhpho' => 'not_in:0',
            'quymo' => 'not_in:0',
            'linhvuchd' => 'not_in:0',
            'mota' => 'required',
        ],[
            'tencty.required' => 'Tên công ty không được để trống.',
            'diachicty.required' => 'Địa chỉ công ty không được để trống.',
            'thanhpho.not_in' => 'Xin hãy chọn thành phố.',
            'quymo.not_in' => 'Xin hãy chọn quy mô công ty.',
            'linhvuchd.not_in' => 'Xin hãy chọn lĩnh vực ngành nghề của công ty.',
            'mota.required' => 'Mô tả sơ lược về công ty không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->passes()) {
            $logo_name = null;
            $id_ntd = Session::get('recruiter_id');
            $hoSoNTD = HoSoNTD::where('id_ntd', '=' ,$id_ntd)->first();

            if($request->hasFile('logo')){
                $des_path = 'img/recruiter/uploads';
                $logo = $request->file('logo');
                $logo_name = Str::random(10).$logo->getClientOriginalName();
                $path = $logo->move(public_path($des_path), $logo_name);
            }

            if($hoSoNTD == null){
                do{
                    $id_hosontd = Str::random(5).mt_rand(1, 99999);
                    $exist_id_ntd = HoSoNTD::where('id_hosontd','=',$id_hosontd)->first();
                } while ($exist_id_ntd != null);
                $hoSoNTD_cre = new HoSoNTD;
                $hoSoNTD_cre->id_hosontd = $id_hosontd;
                $hoSoNTD_cre->tencty = $request->tencty;
                $hoSoNTD_cre->diachicty = $request->diachicty;
                $hoSoNTD_cre->thanhpho = $request->thanhpho;
                $hoSoNTD_cre->quymo = $request->quymo;
                $hoSoNTD_cre->linhvuchd = $request->linhvuchd;
                $hoSoNTD_cre->mota = $request->mota;
                $hoSoNTD_cre->logo = $logo_name;
                $hoSoNTD_cre->website = $request->website;
                $hoSoNTD_cre->id_ntd = $id_ntd;
                $hoSoNTD_cre->save();

                Session::flash('msg_success', 'Cập nhật hồ sơ công ty thành công !!');
                return redirect()->route('recruiter.company_info');

            } else {
                if($request->hasFile('logo')){
                    $hoSoNTD->update([
                        'tencty' => $request->tencty,
                        'diachicty' => $request->diachicty,
                        'thanhpho' => $request->thanhpho,
                        'quymo' => $request->quymo,
                        'linhvuchd' => $request->linhvuchd,
                        'mota' => $request->mota,
                        'logo' => $logo_name,
                        'website' => $request->website
                    ]);
                } else {
                    $hoSoNTD->update([
                        'tencty' => $request->tencty,
                        'diachicty' => $request->diachicty,
                        'thanhpho' => $request->thanhpho,
                        'quymo' => $request->quymo,
                        'linhvuchd' => $request->linhvuchd,
                        'mota' => $request->mota,
                        'website' => $request->website
                    ]);
                }
                Session::flash('msg_success', 'Cập nhật hồ sơ công ty thành công !!');
                return redirect()->route('recruiter.company_info');
            }
        }
    }
    // Quản lý CV dã lưu và đã xem
    public function getListCVSave() {
        $listCVDaLuu = DB::table('tbl_cvuvdaluu')
        ->join('tbl_cv', 'tbl_cv.id_cv', '=', 'tbl_cvuvdaluu.id_cv')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cvuvdaluu.*','tbl_cv.*','tbl_tkungvien.ho','tbl_tkungvien.ten')
        ->where('tbl_cvuvdaluu.id_ntd','=', Session::get('recruiter_id'))
        ->where('tbl_cvuvdaluu.trangthai_cvdaluu','=',1)
        ->get();
       
        return view('pages.recruiter.list-cv-save')->with(compact('listCVDaLuu'));
    }
    public function getListCVView() {
         $listCVDaXem = DB::table('tbl_cvuvdaluu')
         ->join('tbl_cv', 'tbl_cv.id_cv', '=', 'tbl_cvuvdaluu.id_cv')
         ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
         ->select('tbl_cvuvdaluu.*','tbl_cv.*','tbl_tkungvien.ho','tbl_tkungvien.ten'
         ,'tbl_tkungvien.email','tbl_tkungvien.sdt')
         ->where('tbl_cvuvdaluu.id_ntd','=', Session::get('recruiter_id'))
         ->where('tbl_cvuvdaluu.trangthai_cvdaluu','=',2)
         ->get();
         return view('pages.recruiter.list-cv-view')->with(compact('listCVDaXem'));
    }
}
