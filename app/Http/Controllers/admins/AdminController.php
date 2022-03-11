<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use Str;
use DB;
use Carbon\Carbon;
use Mail;

use App\Models\admin\TaiKhoanAdmin;
use App\Models\admin\ChucVu;
use App\Models\recruiter\TaiKhoanNTD;
use App\Models\recruiter\HoSoNTD;
use App\Models\recruiter\TinTuyenDung;
use App\Models\recruiter\DichVu;
use App\Models\recruiter\DichVuDaDangKy;
use App\Models\recruiter\ChiTietDonHang;
use App\Models\recruiter\DonHang;
use App\Models\jobseeker\CV;
use App\Models\jobseeker\TkUngvien;
use App\Models\ThanhPho;
use App\Models\LoaiNganhNghe;
use App\Models\NganhNghe;

class AdminController extends Controller
{
    public function index (){
        $admin = TaiKhoanAdmin::where('id_qtv','=',Session::get('admin_id'))->first();
        Session::put('id_chucvu', $admin->id_chucvu);
        Session::put('hinhanh', $admin->hinhanh);
        return view('pages.admins.home')->with(compact('admin'));
    }
    public function getChangeProfile (){
        $admin = TaiKhoanAdmin::where('id_qtv','=',Session::get('admin_id'))->first();
        $chucvu = ChucVu::all();
        return view('pages.admins.change-profile')->with(compact('admin','chucvu'));
    }
    public function postChangeProfile (Request $request){
        
        $validator = Validator::make($request->all(), [
            'tenqtv' => 'required',
            'sdt' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:15',
        ],[
            'tenqtv.required' => 'Tên người liên hệ không được để trống.',
            'sdt.required' => 'Số điện thoại không được để trống.',
            'sdt.regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.not_regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.min' => 'Số điện thoại tối thiểu 9 số.',
            'sdt.max' => 'Số điện thoại tối đa 15 số.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else if ($validator->passes()) {
            $admin = TaiKhoanAdmin::where('id_qtv','=', $request->id_qtv)->first();
            $exist_sdt = TaiKhoanAdmin::where('id_qtv','<>', $request->id_qtv)->where('sdt', '=' ,$request->sdt)->first();
            $ava_name = null;
            if($admin != null){
                if($exist_sdt == null) {
                    if($request->hasFile('hinhanh')){
                        $des_path = 'img/admin/uploads';
                        $ava = $request->file('hinhanh');
                        $ava_name = Str::random(10).$ava->getClientOriginalName();
                        $path = $ava->move(public_path($des_path), $ava_name);
                        $admin->update([
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                            'hinhanh' => $ava_name,
                        ]);
                        Session::put('admin_name',$admin->tenqtv);
                        Session::put('hinhanh',$admin->hinhanh);
                        Session::flash('msg_success', 'Cập nhật thông tin tài khoản thành công !!');
                        return redirect()->back();
                    } else {
                        $admin->update([
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                        ]);
                        Session::put('admin_name',$admin->tenqtv);
                        Session::put('hinhanh',$admin->hinhanh);
                        Session::flash('msg_success', 'Cập nhật thông tin tài khoản thành công !!');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('msg_exs_sdt', 'Số điện thoại bị trùng !!');
                    return redirect()->back();
                }
            }else {
                return redirect()->back();
            }
        }
    }
    public function getChangePassword (){
        $admin = TaiKhoanAdmin::where('id_qtv','=',Session::get('admin_id'))->first();
        return view('pages.admins.change-password')->with(compact('admin'));
    }
    public function postChangePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required|string|min:6',
            'new_pass' => 'required|string|min:6',
        ],[
            'old_pass.required' => 'Mật khẩu hiện tại không được để trống.',
            'old_pass.min' => 'Mật khẩu hiện tại tối thiểu 6 ký tự.',
            'new_pass.required' => 'Mật khẩu mới không được để trống.',
            'new_pass.min' => 'Mật khẩu mới tối thiểu 6 ký tự.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else if ($validator->passes()) {
            $matkhau_old = $request->old_pass;
            $matkhau_new = bcrypt($request->new_pass);
            $admin = TaiKhoanAdmin::where('id_qtv','=',$request->id_qtv)->first();

            if(Hash::check($matkhau_old ,$admin->matkhau)) {
                $admin->update(['matkhau' => $matkhau_new]);
                Session::flash('msg_success', 'Cập nhật mật khẩu thành công !!');
                return redirect()->back();
            } else {
                Session::flash('msg_exs_sdt', 'Mật khẩu cũ không đúng !!');
                return redirect()->back()->withInput();
            }
        }
    }
    
    // Danh sách Admin
    public function getAdminList(){
        $listAdmin =  DB::table('tbl_tkquantrivien')
        ->join('tbl_chucvu', 'tbl_chucvu.id_chucvu', '=', 'tbl_tkquantrivien.id_chucvu')
        ->select('tbl_tkquantrivien.*', 'tbl_chucvu.*')
        ->orderBy('tbl_tkquantrivien.id_qtv')
        ->get();
       
        return view('pages.admins.list-admin')->with(compact('listAdmin'));
    }
    public function getCreateAdminAcc() {
        if(Session::get('id_chucvu') == 'admin'){
            $chucvu = ChucVu::all();
            return view('pages.admins.create-admin-acc')->with(compact('chucvu'));
        } else {
            return redirect()->back();
        }
    }
    public function postCreateAdminAcc(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'matkhau' => 'required|string|min:6',
            'tenqtv' => 'required',
            'sdt' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:15',
            'chucvu' => 'required',
        ],[
            'email.required' => 'Email không được để trống.',
            'matkhau.required' => 'Mật khẩu không được để trống.',
            'matkhau.min' => 'Mật khẩu phải nhiều hơn 6 ký tự.',
            'tenqtv.required' => 'Tên quản trị viên không được để trống.',
            'sdt.required' => 'Số điện thoại không được để trống.',
            'sdt.regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.not_regex' => 'Số điện thoại không đúng định dạng.',
            'sdt.min' => 'Số điện thoại tối thiểu 9 số.',
            'sdt.max' => 'Số điện thoại tối đa 15 số.',
            'chucvu.required' => 'Xin hãy chọn chức vụ của quản trị viên.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {
            $exist_email = TaiKhoanAdmin::where('email','=',$request->email)->first();
            $exist_sdt = TaiKhoanAdmin::where('sdt','=',$request->sdt)->first();
            if($exist_email != null) {
                Session::flash('msg_exs_sdt','Email đã được sử dụng.');
                return redirect()->back()->withInput();
            }else if($exist_sdt != null){
                Session::flash('msg_exs_sdt','Số điện thoại đã được sử dụng.');
                return redirect()->back()->withInput();
            }else {
                $listAdmin = TaiKhoanAdmin::all();
                $flag = 1;
                $maxId = 1;
                foreach($listAdmin as $v){
                    if($flag == 1){
                        $flag = 0;
                        $maxId = (int) filter_var($v->id_qtv, FILTER_SANITIZE_NUMBER_INT);
                    }else  if($maxId < $v->id_qtv){
                        $maxId = (int) filter_var($v->id_qtv, FILTER_SANITIZE_NUMBER_INT);
                    }
                }
                if($request->hasFile('hinhanh')){
                    $des_path = 'img/admin/uploads';
                    $ava = $request->file('hinhanh');
                    $ava_name = Str::random(10).$ava->getClientOriginalName();
                    $path = $ava->move(public_path($des_path), $ava_name);
                    
                    $newAdmin = new TaiKhoanAdmin;
                    $newAdmin->id_qtv = 'qtv'.$maxId+ 1;
                    $newAdmin->email = $request->email;
                    $newAdmin->matkhau = bcrypt($request->matkhau);
                    $newAdmin->tenqtv = $request->tenqtv;
                    $newAdmin->sdt = $request->sdt;
                    $newAdmin->hinhanh = $ava_name;
                    $newAdmin->id_chucvu = $request->chucvu;
                    $newAdmin->save();
                    Session::flash('msg_success','Thêm tài khoản quản trị viên thành công.');
                    return redirect()->back();
                } else {
                    $newAdmin = new TaiKhoanAdmin;
                    $newAdmin->id_qtv = 'qtv'.$maxId+ 1;
                    $newAdmin->email = $request->email;
                    $newAdmin->matkhau = bcrypt($request->matkhau);
                    $newAdmin->tenqtv = $request->tenqtv;
                    $newAdmin->sdt = $request->sdt;
                    $newAdmin->id_chucvu = $request->chucvu;
                    $newAdmin->save();
                    Session::flash('msg_success','Thêm tài khoản quản trị viên thành công.');
                    return redirect()->back();
                }
                
            }
        }
    }
    public function getUpdateAdminAcc($id_qtv){
        if(Session::get('id_chucvu') == 'admin'){
            $admin = TaiKhoanAdmin::where('id_qtv','=', $id_qtv)->first();
            $chucvu = ChucVu::all();
            return view('pages.admins.update-admin-acc')->with(compact('chucvu','admin'));
        } else {
            return redirect()->back();
        }
    }
    public function postUpdateAdminAcc(Request $request){
        if($request->matkhau_new != null){
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'matkhau_new' => 'min:6',
                'tenqtv' => 'required',
                'sdt' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:15',
                'chucvu' => 'required',
            ],[
                'email.required' => 'Email không được để trống.',
                'matkhau_new.min' => 'Mật khẩu mới phải nhiều hơn 6 ký tự.',
                'tenqtv.required' => 'Tên quản trị viên không được để trống.',
                'sdt.required' => 'Số điện thoại không được để trống.',
                'sdt.regex' => 'Số điện thoại không đúng định dạng.',
                'sdt.not_regex' => 'Số điện thoại không đúng định dạng.',
                'sdt.min' => 'Số điện thoại tối thiểu 9 số.',
                'sdt.max' => 'Số điện thoại tối đa 15 số.',
                'chucvu.required' => 'Xin hãy chọn chức vụ của quản trị viên.',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'tenqtv' => 'required',
                'sdt' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:15',
                'chucvu' => 'required',
            ],[
                'email.required' => 'Email không được để trống.',
                'tenqtv.required' => 'Tên quản trị viên không được để trống.',
                'sdt.required' => 'Số điện thoại không được để trống.',
                'sdt.regex' => 'Số điện thoại không đúng định dạng.',
                'sdt.not_regex' => 'Số điện thoại không đúng định dạng.',
                'sdt.min' => 'Số điện thoại tối thiểu 9 số.',
                'sdt.max' => 'Số điện thoại tối đa 15 số.',
                'chucvu.required' => 'Xin hãy chọn chức vụ của quản trị viên.',
            ]);
        }

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {
            $exist_email = TaiKhoanAdmin::where('email','=',$request->email)->where('id_qtv','<>',$request->id_qtv)->first();
            $exist_sdt = TaiKhoanAdmin::where('sdt','=',$request->sdt)->where('id_qtv','<>',$request->id_qtv)->first();
            $admin = TaiKhoanAdmin::where('id_qtv','=',$request->id_qtv)->first();
            if($exist_email != null) {
                Session::flash('msg_exs_sdt','Email đã được sử dụng.');
                return redirect()->back()->withInput();
            }else if($exist_sdt != null){
                Session::flash('msg_exs_sdt','Số điện thoại đã được sử dụng.');
                return redirect()->back()->withInput();
            }else if($admin != null){
                if($request->hasFile('hinhanh')){
                    $des_path = 'img/admin/uploads';
                    $ava = $request->file('hinhanh');
                    $ava_name = Str::random(10).$ava->getClientOriginalName();
                    $path = $ava->move(public_path($des_path), $ava_name);
                    
                    if($request->matkhau_new != null){
                        $admin->update([
                            'email' => $request->email,
                            'matkhau' => bcrypt($request->matkhau_new),
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                            'hinhanh' => $ava_name,
                            'id_chucvu' => $request->chucvu
                        ]);
                    } else {
                        $admin->update([
                            'email' => $request->email,
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                            'hinhanh' => $ava_name,
                            'id_chucvu' => $request->chucvu
                        ]);
                    }
                    Session::flash('msg_success','Cập nhật tài khoản quản trị viên thành công.');
                    return redirect()->back();
                } else {
                    if($request->matkhau_new != null){
                        $admin->update([
                            'email' => $request->email,
                            'matkhau' => bcrypt($request->matkhau_new),
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                            'id_chucvu' => $request->chucvu
                        ]);
                    } else {
                        $admin->update([
                            'email' => $request->email,
                            'tenqtv' => $request->tenqtv,
                            'sdt' => $request->sdt,
                            'id_chucvu' => $request->chucvu
                        ]);
                    }
                    Session::flash('msg_success','Cập nhật tài khoản quản trị viên thành công.');
                    return redirect()->back();
                }
            }else {
                return redirect()->back();
            }
        }
    }
    public function deleteAdminAcc($id_qtv){
        $admin = TaiKhoanAdmin::where('id_qtv','=',$id_qtv)->first();
        if($admin != null ){
            if($admin->id_qtv == 'qtv1') {
                Session::flash('msg_exs_sdt','Không thể xóa tài khoản quyền quản trị viên cấp cao.');
                return redirect()->back();
            } else {
                TaiKhoanAdmin::destroy($id_qtv);
                Session::flash('msg_success','Xóa tài khoản quản trị viên thành công.');
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }
    // danh sách chức vụ
    public function getPositionList(){
        $listPosition = ChucVu::all();
        return view('pages.admins.list-position')->with(compact('listPosition'));
    }
    public function getCreatePosition(){
        return view('pages.admins.create-position');
    }
    public function postCreatePosition(Request $request){
        $validator = Validator::make($request->all(), [
            'id_chucvu' => 'required',
            'tenchucvu' => 'required',
        ],[
            'id_chucvu.required' => 'Mã chức vụ không được để trống.',
            'tenchucvu.required' => 'Tên chức vụ không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) { 
            $exist_position = ChucVu::where('id_chucvu','=',$request->id_chucvu)->first();
            if($exist_position != null){
                Session::flash('msg_exs_sdt','Đã tồn tại mã chức vụ này.');
                return redirect()->back()->withInput();
            } else{
                $new_position = new ChucVu;
                $new_position->id_chucvu = $request->id_chucvu;
                $new_position->tenchucvu = $request->tenchucvu;
                $new_position->save();
                Session::flash('msg_success','Thêm chức vụ thành công.');
                return redirect()->back()->withInput();
            }
        }
    }
    public function getUpdatePosition($id_chucvu){
        $position = ChucVu::where('id_chucvu','=',$id_chucvu)->first();
        return view('pages.admins.update-position')->with(compact('position'));
    }
    public function postUpdatePosition(Request $request){
        $validator = Validator::make($request->all(), [
            'id_chucvu' => 'required',
            'tenchucvu' => 'required',
        ],[
            'id_chucvu.required' => 'Mã chức vụ không được để trống.',
            'tenchucvu.required' => 'Tên chức vụ không được để trống.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) { 
            $position = ChucVu::where('id_chucvu','=',$request->id_chucvu)->first();
            $position->update(['tenchucvu'=>$request->tenchucvu]);

            Session::flash('msg_success','Cập nhật chức vụ thành công.');
            return redirect()->back()->withInput();
        }
    }
    public function deletePosition($id_chucvu){
        $isAdminPage = ChucVu::where('id_chucvu','=',$id_chucvu)->first();
        if($isAdminPage != null ){
            if($isAdminPage->id_chucvu == 'admin') {
                Session::flash('msg_exs_sdt','Không thể xóa chức vụ Admin Page.');
                return redirect()->back();
            } else {
                ChucVu::destroy($id_chucvu);
                Session::flash('msg_success','Xóa chức vụ thành công.');
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }
    // Danh sách nhà tuyển dụng
    public function getListRecruiter() {
        $listRecruiter = TaiKhoanNTD::where('trangthaitk','<>',-2)->get();
        return view('pages.admins.list-recruiter')->with(compact('listRecruiter'));
    }
    public function lockRecruiter(Request $request){
        $ntd = TaiKhoanNTD::where('id_ntd','=',$request->id_ntd)->first();
        if($ntd != null) {
            $ntd->update(['trangthaitk' => -1]);
            TinTuyenDung::where('id_ntd','=', $ntd->id_ntd)->where('trangthai_tintd','=',2)->update(['trangthai_tintd'=> -1]);
            Session::flash('msg_success','Khóa tài khoản nhà tuyển dụng thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function unlockRecruiter(Request $request){
        $ntd = TaiKhoanNTD::where('id_ntd','=',$request->id_ntd)->first();
        if($ntd != null) {
            $exist = DB::table('tbl_dichvudadangky')
            ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
            ->where('tbl_dichvudadangky.id_ntd', '=', $ntd->id_ntd) 
            ->exists();
            $flag = 1;
            $max_ngayhieuluc = 0;
            if($exist){
                $expired  = DB::table('tbl_dichvudadangky')
                ->join('tbl_dichvu', 'tbl_dichvudadangky.id_dichvu', '=', 'tbl_dichvu.id_dichvu')
                ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
                ->where('tbl_dichvudadangky.id_ntd', '=', $ntd->id_ntd)
                ->where('tbl_dichvu.loaidv', '=', 1)
                ->select('tbl_dichvudadangky.*', 'tbl_dichvu.*')
                ->get();
                foreach($expired as $val_ex){
                    if($flag == 1) {
                        $max_ngayhieuluc = $val_ex->songayhieuluc;
                        $flag = 0;
                    } else if($val_ex->songayhieuluc > $max_ngayhieuluc) {
                        $max_ngayhieuluc = $val_ex->songayhieuluc;
                    }
                }
                $ntd->update(['trangthaitk' => $max_ngayhieuluc/3]);

               


                Session::flash('msg_success','Mở khóa tài khoản nhà tuyển dụng thành công.');
                return redirect()->back();
            } else {
                $ntd->update(['trangthaitk' => 2]);
                Session::flash('msg_success','Mở khóa tài khoản nhà tuyển dụng thành công.');
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function deleteRecruiter(Request $request){
        $ntd = TaiKhoanNTD::where('id_ntd','=',$request->id_ntd)->first();
        if($ntd != null) {
            $ntd->update(['trangthaitk' => -2]);
            TinTuyenDung::where('id_ntd','=', $ntd->id_ntd)->where('trangthai_tintd','=',2)->update(['trangthai_tintd'=> -1]);
            Session::flash('msg_success','Xóa tài khoản nhà tuyển dụng thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // Danh sách tin tuyển dụng của NTD
    public function getListRecruitmentPending(){
        $listRecruitmentPending =  DB::table('tbl_tintuyendung')
        ->join('tbl_tknhatuyendung', 'tbl_tknhatuyendung.id_ntd', '=', 'tbl_tintuyendung.id_ntd')
        ->join('tbl_hosontd', 'tbl_hosontd.id_ntd', '=',  'tbl_tknhatuyendung.id_ntd')
        ->select('tbl_tknhatuyendung.*', 'tbl_tintuyendung.*', 'tbl_hosontd.*')
        ->where('tbl_tintuyendung.trangthai_tintd', '=', 2)
        ->orWhere('tbl_tintuyendung.trangthai_tintd', '=', 3)
        ->orderBy('tbl_tintuyendung.ngaydangtin')
        ->get();
        return view('pages.admins.list-recruitment-pending')->with(compact('listRecruitmentPending'));
    }
    public function getListRecruitmentReported(){
        $listRecruitmentReported =  DB::table('tbl_congviecbaocao')
        ->join('tbl_tintuyendung', 'tbl_tintuyendung.id_tintd', '=', 'tbl_congviecbaocao.id_tintd')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=',  'tbl_congviecbaocao.id_uv')
        ->select('*')
        ->where('tbl_tintuyendung.trangthai_tintd', '=', 2)
        ->orWhere('tbl_tintuyendung.trangthai_tintd', '=', 3)
        ->orderBy('tbl_congviecbaocao.ngaybaocao')
        ->get();
        // dd($listRecruitmentReported);
        return view('pages.admins.list-recruitment-reported')->with(compact('listRecruitmentReported'));
    }
    public function lockRecruitment($id_tintd){
        $existTTD = TinTuyenDung::where('id_tintd','=',$id_tintd)->first();
        if($existTTD != null) {
            $existTTD->update(['trangthai_tintd' => 3]);
            Session::flash('msg_success','Khóa tin tuyển dụng thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function unlockRecruitment($id_tintd){
        $existTTD = TinTuyenDung::where('id_tintd','=',$id_tintd)->first();
        if($existTTD != null) {
            $existTTD->update(['trangthai_tintd' => 2]);
            Session::flash('msg_success','Mở khóa tin tuyển dụng thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    // --------- Dịch vụ
    public function getListServices(){
        $listServices = DichVu::select('*')->where('loaidv','<>',-1)->orderBy('loaidv')->get();
        return view('pages.admins.list-services')->with(compact('listServices'));
    }

    public function getCreateServices(){
        return view('pages.admins.create-services');
    }
    public function postCreateServices(Request $request){
        $validator = Validator::make($request->all(), [
            'tendv' => 'required',
            'giadv' => 'required',
            'motadv' => 'required',
            'songayhieuluc' => 'min:0',
            'diemtk' => 'min:0',
            'songayhieuluc_hotro' => 'min:0',
        ],[
            'tendv.required' => 'Tên dịch vụ không được để trống.',
            'giadv.required' => 'Giá dịch vụ không được để trống.',
            'motadv.required' => 'Mô tả dịch vụ không được để trống.',
            'songayhieuluc.min' => 'Số ngày hiệu lực phải lớn hơn 0.',
            'diemtk.min' => 'Điểm tìm kiếm phải lớn hơn 0.',
            'songayhieuluc_hotro.min' => 'Số ngày hiệu lực phải lớn hơn 0.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {
            $listDV = DichVu::all();
            $flag = 1;
            $maxId = 1;
            foreach($listDV as $v){
                if($flag == 1){
                    $flag = 0;
                    $maxId = (int) filter_var($v->id_dichvu, FILTER_SANITIZE_NUMBER_INT);
                }else  if($maxId < $v->id_dichvu){
                    $maxId = (int) filter_var($v->id_dichvu, FILTER_SANITIZE_NUMBER_INT);
                }
            }
            $newDichVu = new DichVu;
            $newDichVu->id_dichvu = 'dv'.$maxId + 1;
            $newDichVu->tendv = $request->tendv;
            $newDichVu->giadv = $request->giadv;
            $newDichVu->motadv = $request->motadv;
            $newDichVu->loaidv = $request->loaidv;
            if($request->loaidv == 1){
                $newDichVu->songayhieuluc = $request->songayhieuluc;
            } else if($request->loaidv == 2){
                $newDichVu->diemtk = $request->diemtk;
            } else if($request->loaidv == 3){
                $newDichVu->songayhieuluc = $request->songayhieuluc_hotro;
            }
            $newDichVu->save();
            Session::flash('msg_success','Thêm dịch vụ mới thành công.');
            return redirect()->back();
        }
        
    }

    public function getUpdateServices($id_dichvu){
        $dichVu = DichVu::where('id_dichvu','=',$id_dichvu)->first();
        if($dichVu != null){
            return view('pages.admins.update-services')->with(compact('dichVu'));
        } else {
            return redirect()->back();
        }
    }
    public function postUpdateServices(Request $request){
        $validator = Validator::make($request->all(), [
            'tendv' => 'required',
            'giadv' => 'required',
            'motadv' => 'required',
            'songayhieuluc' => 'min:0',
            'diemtk' => 'min:0',
            'songayhieuluc_hotro' => 'min:0',
        ],[
            'tendv.required' => 'Tên dịch vụ không được để trống.',
            'giadv.required' => 'Giá dịch vụ không được để trống.',
            'motadv.required' => 'Mô tả dịch vụ không được để trống.',
            'songayhieuluc.min' => 'Số ngày hiệu lực phải lớn hơn 0.',
            'diemtk.min' => 'Điểm tìm kiếm phải lớn hơn 0.',
            'songayhieuluc_hotro.min' => 'Số ngày hiệu lực phải lớn hơn 0.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if ($validator->passes()) {
            $dichVu = DichVu::where('id_dichvu','=', $request->id_dichvu)->first();
            $dichVu->tendv = $request->tendv;
            $dichVu->giadv = $request->giadv;
            $dichVu->motadv = $request->motadv;
            $dichVu->loaidv = $request->loaidv;
            if($request->loaidv == 1){
                $dichVu->songayhieuluc = $request->songayhieuluc;
            } else if($request->loaidv == 2){
                $dichVu->diemtk = $request->diemtk;
            } else if($request->loaidv == 3){
                $dichVu->songayhieuluc = $request->songayhieuluc_hotro;
            }
            $dichVu->save();
            Session::flash('msg_success','Cập nhật dịch vụ thành công.');
            return redirect()->back();
        }
    }
    public function postDeleteServices(Request $request) {
        $existDV = DichVu::where('id_dichvu','=', $request->id_dichvu)->first();
        $existDV_DaDK = DichVuDaDangKy::where('id_dichvu','=', $request->id_dichvu)->first();
        $existChiTietDH = ChiTietDonHang::where('id_dichvu','=', $request->id_dichvu)->first();
        if($existDV != null ){
            if($existDV_DaDK != null || $existChiTietDH != null){
                $existDV->update(['loaidv' => -1]);
                Session::flash('msg_success','Xóa dịch vụ thành công.');
                return redirect()->back();
            } else {
                DichVu::destroy($request->id_dichvu);
                Session::flash('msg_success','Xóa dịch vụ thành công.');
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    // Danh sách đơn hàng
    public function getListOrder() {
        $listOrder = DB::table('tbl_donhang')->orderBy('tbl_donhang.id_donhang','desc')->get();
        $listChiTietDH = DB::table('tbl_chitietdonhang')
        ->join('tbl_dichvu', 'tbl_dichvu.id_dichvu', '=', 'tbl_chitietdonhang.id_dichvu')
        ->join('tbl_donhang', 'tbl_donhang.id_donhang', '=', 'tbl_chitietdonhang.id_donhang')
        ->select('tbl_chitietdonhang.*', 'tbl_dichvu.*', 'tbl_donhang.*')
        ->get();
        return view('pages.admins.list-order')->with(compact('listOrder','listChiTietDH'));
    }
    public function applyOrder(Request $request){
        $current_time =  Carbon::now('Asia/Ho_Chi_Minh');
        $view = 'pages.recruiter.mail-services-bill';
        $max_ngayhieuluc = 0;
        $flag = 1;

        $donHang = DonHang::where('id_donhang','=',$request->id_donhang)->first();
        $id_donhang = $donHang->id_donhang;
        $hinhthucthanhtoan = $donHang->hinhthucthanhtoan;

        if($donHang != null) {
            $taiKhoanNTD = TaiKhoanNTD::where('id_ntd', '=', $donHang->id_ntd)->first();

            $listChiTietDH = DB::table('tbl_chitietdonhang')
            ->join('tbl_dichvu', 'tbl_dichvu.id_dichvu', '=', 'tbl_chitietdonhang.id_dichvu')
            ->join('tbl_donhang', 'tbl_donhang.id_donhang', '=', 'tbl_chitietdonhang.id_donhang')
            ->where('tbl_donhang.id_donhang', '=', $request->id_donhang)
            ->select('tbl_chitietdonhang.*', 'tbl_dichvu.*', 'tbl_donhang.*')
            ->get();
            
            $cart = array();
            foreach($listChiTietDH as $cTiet) {
                $cart[$cTiet->id_dichvu] = [
                    'tendv' => $cTiet->tendv,
                    'giadv' => $cTiet->giadv,
                    'loaidv' => $cTiet->loaidv,
                    'songayhieuluc' => $cTiet->songayhieuluc,
                    'diemtk' => $cTiet->diemtk,
                    'soluong' => $cTiet->soluong
                ];
            }
           
            foreach ($cart as $id_dichvu => $details){
                $exist_DVdaDK = DichVuDaDangKy::where('id_ntd','=',$taiKhoanNTD->id_ntd)->where('id_dichvu','=', $id_dichvu)->first();
                
                if($details['loaidv'] == 2) {
                    $new_diem_tkuv = $taiKhoanNTD->diem_tkuv + $details['diemtk']*$details['soluong'];
                    $taiKhoanNTD->update(['diem_tkuv' => $new_diem_tkuv ]);

                    if($exist_DVdaDK != null) {
                        $exist_DVdaDK->update(['ngaydangky' => Carbon::now('Asia/Ho_Chi_Minh')]);
                    } else {
                        $dichVuDaDangKy = new DichVuDaDangKy;
                        $dichVuDaDangKy->id_ntd = $taiKhoanNTD->id_ntd;
                        $dichVuDaDangKy->id_dichvu = $id_dichvu;
                        $dichVuDaDangKy->ngaydangky = Carbon::now('Asia/Ho_Chi_Minh');
                        $dichVuDaDangKy->ngayhethan = 0;
                        $dichVuDaDangKy->save();
                    }

                } else if($details['loaidv'] == 1 ) {
                    if($exist_DVdaDK != null) {
                        $ngayhethan = new Carbon($exist_DVdaDK->ngayhethan, 'Asia/Ho_Chi_Minh');
                        if( $current_time > $ngayhethan ){
                            $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($details['songayhieuluc']*$details['soluong']);
                        } else {
                            $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($current_time->diffInDays($ngayhethan)+ 1 + $details['songayhieuluc']*$details['soluong'] );
                        }
                        DB::table('tbl_dichvudadangky')
                        ->where('tbl_dichvudadangky.id_dvdadk', '=', $exist_DVdaDK->id_dvdadk)
                        ->update(['trangthai_dvdadk' => 1, 'ngaydangky' => Carbon::now('Asia/Ho_Chi_Minh'), 'ngayhethan' =>  $ngayhethan]);
                    } else {
                        $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($details['songayhieuluc']*$details['soluong']);

                        $dichVuDaDangKy = new DichVuDaDangKy;
                        $dichVuDaDangKy->id_ntd = $taiKhoanNTD->id_ntd;
                        $dichVuDaDangKy->id_dichvu = $id_dichvu;
                        $dichVuDaDangKy->ngaydangky = Carbon::now('Asia/Ho_Chi_Minh');
                        $dichVuDaDangKy->ngayhethan = $ngayhethan;
                        $dichVuDaDangKy->save();
                    }

                    if($flag == 1) {
                        $max_ngayhieuluc = $details['songayhieuluc'];
                        $flag = 0;
                    } else if($details['songayhieuluc'] > $max_ngayhieuluc) {
                        $max_ngayhieuluc = $details['songayhieuluc'];
                    }
                    $taiKhoanNTD->update(['trangthaitk' => $max_ngayhieuluc/3 ]);
                } else {
                    if($exist_DVdaDK != null) {
                        $ngayhethan = new Carbon($exist_DVdaDK->ngayhethan, 'Asia/Ho_Chi_Minh');
                        if( $current_time > $ngayhethan ){
                            $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($details['songayhieuluc']*$details['soluong']);
                        } else {
                            $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($current_time->diffInDays($ngayhethan)+ 1 + $details['songayhieuluc']*$details['soluong'] );
                        }
                        DB::table('tbl_dichvudadangky')
                        ->where('tbl_dichvudadangky.id_dvdadk', '=', $exist_DVdaDK->id_dvdadk)
                        ->update(['trangthai_dvdadk' => 1, 'ngaydangky' => Carbon::now('Asia/Ho_Chi_Minh'), 'ngayhethan' =>  $ngayhethan]);
                    } else {
                        $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($details['songayhieuluc']*$details['soluong']);

                        $dichVuDaDangKy = new DichVuDaDangKy;
                        $dichVuDaDangKy->id_ntd = $taiKhoanNTD->id_ntd;
                        $dichVuDaDangKy->id_dichvu = $id_dichvu;
                        $dichVuDaDangKy->ngaydangky = Carbon::now('Asia/Ho_Chi_Minh');
                        $dichVuDaDangKy->ngayhethan = $ngayhethan;
                        $dichVuDaDangKy->save();
                    }

                }
            }
            $donHang->update(['trangthaidh' => 1]);
            
            $this->sendMail($taiKhoanNTD, $cart, $id_donhang, $hinhthucthanhtoan, $current_time, $view);

            Session::flash('msg_success','Xác nhận nhà tuyển dụng đã thanh toán đơn đăng ký dịch vụ thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }   
    }
     // Hàm send mail hóa đơn
     public function sendMail(TaiKhoanNTD $taiKhoanNTD, $cart,$id_donhang, $hinhthucthanhtoan ,$current_time, $view) {
        Mail::send($view, compact('taiKhoanNTD', 'cart', 'id_donhang', 'hinhthucthanhtoan', 'current_time'), function($email) use($taiKhoanNTD){
            $email->subject('LoopIT - Hóa đơn thanh toán dịch vụ');
            // $email->from('loopit.test@gmail.com','LoopIT');
            $email->to( $taiKhoanNTD->email , $taiKhoanNTD->tennlh);
        });
    }
    public function cancelOrder(Request $request){
        $donHang = DonHang::where('id_donhang','=',$request->id_donhang)->first();
        if($donHang != null) {
            $donHang->update(['trangthaidh' => 0]);
            Session::flash('msg_success','Hủy đơn dịch vụ thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    // Danh sách ứng viên
    public function getListJobseeker(){
        $listJobseeker = TkUngvien::where('trangthaitk','<>',-2)->get();
        return view('pages.admins.list-jobseeker')->with(compact('listJobseeker'));
    }

    // Danh sách Cv ứng viên đã công khai và cv ứng viên cần duyệt
    public function getListCVPublic(){
        $listCVPublic =  DB::table('tbl_cv')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cv.*','tbl_tkungvien.*')
        ->where('tbl_cv.trangthaicv','=',3)
        ->orderBy('tbl_cv.thoigiancapnhat', 'desc')
        ->get();
        $listCVPublicCurrent =  DB::table('tbl_cv')
        ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
        ->select('tbl_cv.*','tbl_tkungvien.*')
        ->where('tbl_cv.trangthaicv','=',2)
        ->orderBy('tbl_cv.thoigiancapnhat', 'desc')
        ->get();

        return view('pages.admins.list-cv-public')->with(compact('listCVPublic','listCVPublicCurrent'));
    }
    public function postApplyTagsCV(Request $request) {
        $existCV = CV::where('id_cv','=',$request->id_cv)->first();
        if($existCV != null) {
            $existCV->update(['trangthaicv' => 2]);
            Session::flash('msg_success','Duyệt thẻ từ khóa của CV thành công.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }  

    
    
    
}
