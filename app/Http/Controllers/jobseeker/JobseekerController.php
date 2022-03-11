<?php

namespace App\Http\Controllers\jobseeker;
use App\Http\Controllers\Controller;
use App\Models\jobseeker\CongviecBaocao;
use App\Models\jobseeker\CongviecDaluu;
use App\Models\jobseeker\CongviecGoiY;
use App\Models\jobseeker\CV;
use App\Models\jobseeker\CVUVDaUngTuyen;
use Illuminate\Http\Request;
use App\Models\jobseeker\Hocvan;
use App\Models\jobseeker\Kinhnghiem;
use App\Models\jobseeker\Ngoaingu;
use App\Models\jobseeker\NoidungCV;
use App\Models\jobseeker\NTDDaluu;
use App\Models\jobseeker\TkUngvien;
use App\Models\LoaiNganhNghe;
use App\Models\Nganhnghe;
use App\Models\recruiter\CVUVDaLuu;
use App\Models\recruiter\HoSoNTD;
use App\Models\recruiter\TinTuyenDung;
use App\Models\ThanhPho;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Validator;
use Mail;
use Str;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Response;



class JobseekerController extends Controller
{
    //Get trang chủ
    public function getHome(){
        $TinTD = TinTuyenDung::where('trangthai_tintd', 2)
        ->where('dichvuhotro', 'coban')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
        ->orderBy('ngaydangtin', 'DESC')
        ->get();

        $Tin_tg = TinTuyenDung::where('trangthai_tintd', 2)
        ->where('dichvuhotro', 'tuyengap')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
        ->orderBy('id_tintd')
        ->get();

        $Tin_hd = TinTuyenDung::where('trangthai_tintd', 2)
        ->where('dichvuhotro', 'hapdan')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
        ->orderBy('id_tintd')
        ->get();


        $cviec_daluu = CongviecDaluu::where('id_uv', Session::get('js_id'))->get();
        $cviec_daluu_id = array();
        foreach($cviec_daluu as $a){
            $cviec_daluu_id[] = $a->id_tintd;
        }

        $ntdhd = HoSoNTD::paginate(4);

        $nganhnghe = Nganhnghe::all();
        $thanhpho = ThanhPho::all();
        return view('pages/jobseeker/home')->with(compact('TinTD', 'Tin_tg', 'Tin_hd', 'nganhnghe', 'thanhpho', 'cviec_daluu_id', 'ntdhd'));
    }
    //Post Tìm kiếm công việc từ trang chủ
    public function postSearchHome(Request $request){
        $key = $request->keysearch;
        $result = TinTuyenDung::where('tencongviec', 'LIKE', "%{$key}%")->get();
        return view('pages.jobseeker.job_search')->with(compact('$result'));
    }
    //Get đăng xuất
    public function getlogout(){
        Session::put('js_name',null);
        Session::put('js_id', null);
        return redirect()->route('js_getLogin');
    }
    //Get trang xem chi tiết công việc
    public function getJobDetail($id_tintd){
        $tintd = TinTuyenDung::where('id_tintd', $id_tintd)
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->select('tbl_hosontd.tencty','tbl_hosontd.logo', 'tbl_hosontd.diachicty',
        'tbl_hosontd.id_hosontd','tbl_hosontd.quymo','tbl_hosontd.thanhpho as tpcty','tbl_tintuyendung.*')
        ->first();

        $check_save = CongviecDaluu::where('id_tintd', $id_tintd)->where('id_uv', Session::get('js_id'))->first();
        $check_profile = TkUngvien::where('id_uv', Session::get('js_id'))->first();
        $ungtuyen_cv = CVUVDaUngTuyen::join('tbl_cv', 'tbl_cvuvdaungtuyen.id_cv', '=', 'tbl_cv.id_cv')
        ->where('id_tintd', $id_tintd)
        ->first();
        $check_apply = 0;
        if($ungtuyen_cv->id_uv == Session::get('js_id')){
            $check_apply = 1;
        }

        $cvfile = CV::where('id_uv', Session::get('js_id'))
        ->where('loaicv', 'file')
        ->where(function($query) {
            $query->where('trangthaicv', '1')
                ->orWhere('trangthaicv', '2');
            })
        ->get();

        $cvonl = CV::where('id_uv', Session::get('js_id'))
        ->where('loaicv', 'online')
        ->where(function($query) {
            $query->where('trangthaicv', '1')
                ->orWhere('trangthaicv', '2');
            })
        ->get();
        return view('pages/jobseeker/job_detail')->with(compact('tintd', 'check_save', 'cvfile', 'cvonl', 'check_profile', 'check_apply'));
    }
    //Get trang xem chi tiết
    public function getRecruiterDetail($id_hosontd){
        $hosontd = HoSoNTD::where('id_hosontd', $id_hosontd)->first();
        $cviec = TinTuyenDung::where('id_ntd', $hosontd->id_ntd)
        ->where('trangthai_tintd', '=', 2)->paginate(3);
        $check_save_ntd = NTDDaluu::where('id_hosontd', $id_hosontd)->where('id_uv', Session::get('js_id'))->first();

        $check_save = CongviecDaluu::where('id_uv', Session::get('js_id'))->get();
        $savejob_id_tintd = array();
        foreach($check_save as $list){
            $savejob_id_tintd[] = $list->id_tintd;
        }

        return view('pages.jobseeker.recruiter_detail')->with(compact('hosontd', 'cviec','savejob_id_tintd', 'check_save_ntd'));
    }


    // ------------NHÀ TUYỂN DỤNG ĐÃ XEM HỒ SƠ------------
    //Get trang quản lý nhà tuyển dụng đã xem hồ sơ
    public function getRecsee(){
        $ntd_daxemhs = DB::table('tbl_cvuvdaluu')
        ->where('trangthai_cvdaluu', 2)
        ->join('tbl_cv', 'tbl_cvuvdaluu.id_cv', '=', 'tbl_cv.id_cv')
        ->where('id_uv', Session::get('js_id'))
        ->join('tbl_hosontd', 'tbl_cvuvdaluu.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->groupBy('tbl_cvuvdaluu.id_ntd')->paginate(3);
        return view('pages/jobseeker/js_recruitersee')->with(compact('ntd_daxemhs'));
    }



    // ------------QUẢN LÝ HỒ SƠ------------
    //Get trang dashboard
    public function getDashboard(){
        $cviec_daluu = CongviecDaluu::where('id_uv', Session::get('js_id'))
        ->join('tbl_tintuyendung', 'tbl_congviecdaluu.id_tintd', '=', 'tbl_tintuyendung.id_tintd')
        ->get();

        $cviec_daut = CVUVDaUngTuyen::join('tbl_cv', 'tbl_cvuvdaungtuyen.id_cv', '=', 'tbl_cv.id_cv')
        ->where('id_uv',Session::get('js_id'))->get();

        $ntd_daxemhs = CVUVDaLuu::where('trangthai_cvdaluu', 2)
        ->join('tbl_cv', 'tbl_cvuvdaluu.id_cv', '=', 'tbl_cv.id_cv')
        ->where('id_uv', Session::get('js_id'))
        ->groupBy('id_ntd')->get();

        $ungvien = TkUngvien::where('id_uv', Session::get('js_id'))->first();

        $countexp = count(Kinhnghiem::where('id_uv', Session::get('js_id'))->get());

        $countstudy = count(Hocvan::where('id_uv', Session::get('js_id'))->get());

        $countlang = count(Ngoaingu::where('id_uv', Session::get('js_id'))->get());

        $countmyjob_saved = count($cviec_daluu);

        $countmyjob_sended = count($cviec_daut);

        $countmyjob_all = $countmyjob_saved + $countmyjob_sended;

        $count_jobnoti = count(NTDDaluu::where('id_uv', Session::get('js_id'))
        ->select('trangthaixem')->get())
        + count(CongviecGoiY::where('id_uv', Session::get('js_id'))->select('trangthaixem')->get());

        $countrcsee = count($ntd_daxemhs);

        // ------------------------------------------- //

        $cviec_daluu_id = array();
        foreach($cviec_daluu as $a){
            $cviec_daluu_id[] = $a->id_tintd;
        }

        $cviec_daut_id = array();
        foreach($cviec_daut as $b){
            $cviec_daut_id[] = $b->id_tintd;
        }

        $tintd_goiy = array();
        foreach($cviec_daluu as $cvdl){
            $tintd=  DB::table('tbl_tintuyendung')
            ->join('tbl_hosontd','tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
            ->where('trangthai_tintd','=', 2)
            ->where('tbl_tintuyendung.thanhpho', $cvdl['thanhpho'])
            ->where('nganhnghe', 'LIKE', '%'.$cvdl['nganhnghe'].'%')
            ->where(function($query) use($cvdl) {
                $query->where('capbac', $cvdl['capbac'])
                    ->orwhere('trinhdo', $cvdl['trinhdo'])
                    ->orwhere('loaicongviec', $cvdl['loaicongviec']);
            })
            ->whereNotIn('id_tintd', $cviec_daluu_id)
            ->whereNotIn('id_tintd', $cviec_daut_id)
            ->select('tbl_hosontd.tencty', 'tbl_hosontd.id_hosontd','tbl_hosontd.logo','tbl_tintuyendung.*')
            ->orderBy('ngaydangtin', 'DESC')
            ->get();

            foreach($tintd as $tin){
                $tintd_goiy[] =  $tin;
            }
        }

        return view('pages/jobseeker/js_dashboard')->with(compact('ungvien', 'countexp',
        'countstudy','countlang', 'countmyjob_saved', 'countmyjob_sended', 'countmyjob_all',
        'count_jobnoti','tintd_goiy', 'countrcsee'));
    }
    //Get trang chỉnh sửa hồ sơ
    public function getEditProfile(){
        $thanhpho = ThanhPho::all();
        $nganhnghe = Nganhnghe::all();
        $lsthocvan = Hocvan::where('id_uv', Session::get('js_id'))->paginate(3,['*'],'hocvan');
        $lstkinhnghiem = Kinhnghiem::where('id_uv', Session::get('js_id'))->paginate(3, ['*'], 'kinhnghiem');
        $lstngoaingu = Ngoaingu::where('id_uv', Session::get('js_id'))->paginate(3, ['*'], 'ngoaingu');

        $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
        $noilamviecmm = explode(", ", $ungvien->noilamviecmm);
        $nganhnghemm = explode(", ", $ungvien->nganhnghemm);

        return view('pages/jobseeker/js_editprofile')->with(compact('thanhpho', 'ungvien', 'lsthocvan', 'lstkinhnghiem', 'lstngoaingu', 'nganhnghe', 'noilamviecmm', 'nganhnghemm'));
    }
    //Post chỉnh sửa thông tin cá nhân
    public function postEditInfo(Request $request) {
        $validator = Validator::make($request->all(), [
            'ten' => 'bail|required',
            'ho' => 'bail|required',
            'ngaysinh' => 'bail|required',
            'gioitinh' => 'bail|required|not_in:0',
            'sdt' => 'bail|regex:/[0-9]/|max:15',
            'thanhpho' => 'bail|required|not_in:0',
            'diachi' => 'bail|required',
            'trinhdoht'=> 'bail|required|not_in:0',
            'nganhnghemm' => 'bail|required|not_in:0',
            'noilamviecmm' => 'bail|required|not_in:0',
        ],
        [
            'ten.required'=> 'Vui lòng nhập Tên',
            'ho.required'=> 'Vui lòng nhập Họ',
            'ngaysinh.required'=> 'Vui lòng nhập Ngày sinh',
            'gioitinh.not_in'=> 'Vui lòng chọn Giới tính',
            'sdt.regex'=> 'Số điên thoại ko hợp lệ',
            'sdt.max'=> 'Số điên thoại ko hợp lệ',
            'thanhpho.not_in'=> 'Vui lòng chọn Thành phố',
            'diachi.required'=> 'Vui lòng nhập Địa chỉ',
            'trinhdoht.required' => ' Vui lòng chọn trình độ hiện tại',
            'nganhnghemm.not_in'=> 'Vui lòng chọn ngành nghề mong muốn',
            'noilamviecmm.required'=> 'Vui lòng chọn việc làm mong muốn'
        ]);

        if ($validator->fails()) {
            Session::flash('errorEditInfo','null');
			return redirect()->route('js_editprofile')->withErrors($validator)->withInput();
        }
        else {
            if($request->hasFile('avt')){
                $des_path = 'img/jobseeker/uploads';
                $avt = $request->file('avt');
                $avt_name = Str::random(10).$avt->getClientOriginalName();
                $path = $avt->move(public_path($des_path), $avt_name);
            }

            $tkUngvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
            $tkUngvien->ten = $request->ten;
            $tkUngvien->ho = $request->ho;
            $tkUngvien->ngaysinh = $request->ngaysinh;
            $tkUngvien->gioitinh = $request->gioitinh;
            $tkUngvien->sdt = $request->sdt;
            $tkUngvien->thanhpho = $request->thanhpho;
            $tkUngvien->diachi = $request->diachi;
            $tkUngvien->trinhdoht = $request->trinhdoht;
            $tkUngvien->nganhnghemm = $request->nganhnghemm;
            $tkUngvien->nganhnghemm = implode(', ', $request->nganhnghemm);
            $tkUngvien->noilamviecmm = implode(', ', $request->noilamviecmm);
            if(isset($avt_name)){
                $tkUngvien->hinhanh = $avt_name;
            }
            $tkUngvien->save();
            Session::put('js_name', $tkUngvien->ten);
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post thêm thông tin kinh nghiệm
    public function postAddExp(Request $request){
        $validator = Validator::make($request->all(), [
            'chucdanh' => 'bail|required',
            'congty' => 'bail|required',
            'ngaybdkn' => 'bail|required|before:today',
            'ngayktkn' => 'bail|required|after:ngaybd'
        ],
        [
            'chucdanh.required'=> 'Vui lòng nhập Chức danh',
            'congty.required'=> 'Vui lòng nhập Công ty',
            'ngaybdkn.before' => 'Thời gian bắt đầu với sớm hơn thời gian hiện tại',
            'ngaybdkn.required' => 'Vui lòng nhập ngày bắt đầu làm việc',
            'ngayktkn.required' => 'Vui lòng nhập ngày kết thúc làm việc',
            'ngayktkn.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu',
        ]);

        if ($validator->fails()) {
            Session::flash('errorAddExp','null');
			return Redirect()->route('js_editprofile')->withErrors($validator)->withInput();
        }else{
            do{
                $number = rand(1,200);
                $id_kinhnghiem = 'kn'.$number;
                $id_check = Kinhnghiem::where('id_kinhnghiem', $id_kinhnghiem)->first();
            }while($id_check !=null);

            $kinhnghiem = new Kinhnghiem();
            $kinhnghiem->id_kinhnghiem = $id_kinhnghiem;
            $kinhnghiem->chucdanh = $request->chucdanh;
            $kinhnghiem->congty = $request->congty;
            $kinhnghiem->ngaybd = $request->ngaybdkn;
            $kinhnghiem->ngaykt = $request->ngayktkn;
            $kinhnghiem->mota = $request->mota;
            $kinhnghiem->id_uv = Session::get('js_id');
            $kinhnghiem->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post chỉnh sửa thông tin kinh nghiệm
    public function postEditExp(Request $request, $id_kinhnghiem){
        $validator = Validator::make($request->all(), [
            'chucdanh_ed' => 'bail|required',
            'congty_ed' => 'bail|required',
            'ngaybdkn_ed' => 'bail|required|before:today',
            'ngayktkn_ed' => 'bail|required|after:ngaybd'
        ],
        [
            'chucdanh_ed.required'=> 'Vui lòng nhập Chức danh',
            'congty_ed.required'=> 'Vui lòng nhập Công ty',
            'ngaybdkn_ed.before' => 'Thời gian bắt đầu với sớm hơn thời gian hiện tại',
            'ngaybdkn_ed.required' => 'Vui lòng nhập ngày bắt đầu làm việc',
            'ngayktkn_ed.required' => 'Vui lòng nhập ngày kết thúc làm việc',
            'ngayktkn_ed.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu',
        ]);

        if ($validator->fails()) {
            Session::flash('fail', 'null');
            Session::flash('errorEditExp','null');
			return Redirect::back()->withErrors($validator);
        }
        else {
            $kinhnghiem = Kinhnghiem::where('id_kinhnghiem', $id_kinhnghiem)->first();
            $kinhnghiem->chucdanh = $request->chucdanh_ed;
            $kinhnghiem->congty = $request->congty_ed;
            $kinhnghiem->ngaybd = $request->ngaybdkn_ed;
            $kinhnghiem->ngaykt = $request->ngayktkn_ed;
            $kinhnghiem->mota = $request->mota_ed;
            $kinhnghiem->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post xoá kinh nghiệm
    public function postDeleteExp($id_kinhnghiem){
        $kinhnghiem = Kinhnghiem::where ('id_kinhnghiem', $id_kinhnghiem)->first();
        $kinhnghiem->delete();
        Session::flash('success', 'null');
        return redirect()->route('js_editprofile');
    }
    //Post thêm thông tin ngoại ngữ
    public function postAddLanguage(Request $request){
        $validator = Validator::make($request->all(), [
            'tenngoaingu' => 'bail|required|not_in:0',
            'mucdo' => 'bail|required|not_in:0'
        ],[
            'tenngoaingu.not_in' => 'Vui lòng chọn Ngoại ngữ',
            'mucdo.not_in' => 'Vui lòng chọn Mức độ'
        ]);

        if ($validator->fails()){
            Session::flash('errorAddLanguage','null');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
            do{
                $number = rand(1,200);
                $id_ngoaingu = 'nn'.$number;
                $id_check = Ngoaingu::where('id_ngoaingu', $id_ngoaingu)->first();
            }while($id_check !=null);

            $ngoaingu = new Ngoaingu();
            $ngoaingu->id_ngoaingu = $id_ngoaingu;
            $ngoaingu->tenngoaingu = $request->tenngoaingu;
            $ngoaingu->mucdo = $request->mucdo;
            $ngoaingu->id_uv = Session::get('js_id');
            $ngoaingu->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post sửa ngoại ngữ ngữ
    public function postEditLanguage(Request $request, $id_ngoaingu){
        $validator = Validator::make($request->all(), [
            'tenngoaingu_ed' => 'bail|required|not_in:0',
            'mucdo_ed' => 'bail|required|not_in:0'
        ],[
            'tenngoaingu_ed.not_in' => 'Vui lòng chọn Ngoại ngữ',
            'mucdo_ed.not_in' => 'Vui lòng chọn Mức độ'
        ]);

        if ($validator->fails()){
            Session::flash('fail', 'null');
            Session::flash('errorEditLanguage','null');
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else {
            $ngoaingu = Ngoaingu::where('id_ngoaingu' ,$id_ngoaingu)->first();
            $ngoaingu->tenngoaingu = $request->tenngoaingu_ed;
            $ngoaingu->mucdo = $request->mucdo_ed;
            $ngoaingu->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post xoá ngoại ngữ
    public function postDeleteLanguage($id_ngoaingu){
        $ngoaingu = Ngoaingu::where('id_ngoaingu', $id_ngoaingu)->first();
        $ngoaingu->delete();
        Session::flash('success', 'null');
        return redirect()->route('js_editprofile');
    }
    //Post thêm thông tin học vấn
    public function postAddStudy(Request $request){
        $validator = Validator::make($request->all(), [
            'chuyennganh' => 'bail|required',
            'bangcap' => 'bail|required|not_in:0',
            'truong' => 'bail|required',
            'ngaybdhv' => 'bail|before:today',
            'ngaykthv' => 'bail|after:ngaybd'
        ],
        [
            'chuyennganh.required'=> 'Vui lòng nhập Chuyên ngành',
            'bangcap.not_in'=> 'Vui lòng chọn Bằng cấp',
            'truong.required'=> 'Vui lòng nhập Trường',
            'ngaybdhv.before' => 'Thời gian bắt đầu với sớm hơn thời gian hiện tại',
            'ngaykthv.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu',
        ]);

        if ($validator->fails()) {
            Session::flash('errorAddStudy','null');
			return Redirect()->route('js_editprofile')->withErrors($validator)->withInput();
        }else{
            do{
                $number = rand(1,200);
                $id_hocvan = 'hvan'.$number;
                $id_check = Hocvan::where('id_hocvan', $id_hocvan)->first();
            }while($id_check !=null);

            $hocvan = new Hocvan();
            $hocvan->id_hocvan = $id_hocvan;
            $hocvan->chuyennganh = $request->chuyennganh;
            $hocvan->truong = $request->truong;
            $hocvan->bangcap = $request->bangcap;
            $hocvan->ngaybd = $request->ngaybdhv;
            $hocvan->ngaykt = $request->ngaykthv;
            $hocvan->mota = $request->mota;
            $hocvan->id_uv = Session::get('js_id');
            $hocvan->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post sửa thông tin học vấn
    public function postEditStudy(Request $request, $id_hocvan){
        $validator = Validator::make($request->all(), [
            'chuyennganh_ed' => 'bail|required',
            'bangcap_ed' => 'bail|required|not_in:0',
            'truong_ed' => 'bail|required',
            'ngaybdhv_ed' => 'bail|before:today',
            'ngaykthv_ed' => 'bail|after:ngaybd'
        ],
        [
            'chuyennganh_ed.required'=> 'Vui lòng nhập Chuyên ngành',
            'bangcap_ed.not_in'=> 'Vui lòng chọn Bằng cấp',
            'truong_ed.required'=> 'Vui lòng nhập Trường',
            'ngaybdhv_ed.before' => 'Thời gian bắt đầu với sớm hơn thời gian hiện tại',
            'ngaykthv_ed.after'=>'Thời gian kết thúc phải sau thời gian bắt đầu',
        ]);
        if ($validator->fails()) {
            Session::flash('fail', 'null');
            Session::flash('errorEditStudy','null');
            $id_hvan_err = $id_hocvan;
			return Redirect::back()->withErrors($validator)->with(compact('id_hvan_err'));
        }else{
            $hocvan = Hocvan::where ('id_hocvan', $id_hocvan)->first();
            $hocvan->chuyennganh = $request->chuyennganh_ed;
            $hocvan->truong = $request->truong_ed;
            $hocvan->bangcap = $request->bangcap_ed;
            $hocvan->ngaybd = $request->ngaybdhv_ed;
            $hocvan->ngaykt = $request->ngaykthv_ed;
            $hocvan->mota = $request->mota;
            $hocvan->save();
            Session::flash('success', 'null');
            return redirect()->route('js_editprofile');
        }
    }
    //Post xoá học vấn
    public function postDeleteStudy($id_hocvan){
        $hocvan = Hocvan::where ('id_hocvan', $id_hocvan)->first();
        $hocvan->delete();
        Session::flash('success', 'null');
        return redirect()->route('js_editprofile');
    }







    //------------QUẢN LÝ CV------------
    //Get trang quản lý CV
    public function getCVManage(){
        $lstcvfile = CV::where('loaicv', 'file')
                        ->where('id_uv', Session::get('js_id'))
                        ->where(function($query) {
                            $query->where('trangthaicv', '1')
                                ->orWhere('trangthaicv', '2')
                                ->orWhere('trangthaicv', '3');
                            })->paginate(2,['*'],'cvfile');
        return view('pages/jobseeker/js_cvmanage')->with(compact('lstcvfile'));
    }
    //Get trang quản lý CV Onl
    public function getCVOnlManage(){
        $lstcvfile = CV::where('loaicv', 'online')
                        ->where('id_uv', Session::get('js_id'))
                        ->where(function($query) {
                            $query->where('trangthaicv', '1')
                                ->orWhere('trangthaicv', '2')
                                ->orWhere('trangthaicv', '3');
                            })->paginate(2,['*'],'cvfile');
        return view('pages/jobseeker/js_cvmanage_online')->with(compact('lstcvfile'));
    }
    //Post upload file CV
    public function postUploadCVFile(Request $request){
        $delimiters1 = ['"},{"value":"'];
        $delimiters2 = ['[{"value":"','"}]'];
        $tags1 = str_replace($delimiters1,', ', $request->tags);
        $tags2 = str_replace($delimiters2,'', $tags1);

        $validator = Validator::make($request->all(),[
            'filecv' => 'bail|required',
            'tieudecv' => 'bail|required',
            'chucdanhht' => 'bail|required',
            'capbacht' => 'bail|required|not_in:0',
            'sonamkn' => 'bail|required',
            'mucluongmm'=> 'bail|required',

        ],[
            'filecv.required'=> 'Vui lòng chọn file muốn tải lên!',
            'tieudecv.required'=> 'Vui lòng nhập tiêu đề cho File CV',
            'chucdanhht.required'=> 'Vui lòng nhập chức danh hiện tại',
            'capbacht.not_in'=> 'Vui lòng chọn cấp bậc hiện tại',
            'sonamkn.required'=> 'Vui lòng nhập số năm kinh nghiệm',
            'mucluongmm.required'=> 'Vui lòng nhập mức lương mong muốn',
        ]);

        if($validator->fails()){
            Session::flash('errupfile','null');
            return redirect::back()->withErrors($validator)->withInput();
        }
        else{
            if($request->hasFile('filecv')){
                $des_path = 'cv';
                $filecv = $request->file('filecv');
                $filecv_name = Str::random(10).$filecv->getClientOriginalName();
                $path = $filecv->move(public_path($des_path), $filecv_name);
            }

            do{
                $number = rand(1,200);
                $id_cv = 'cv'.$number;
                $id_check = CV::where('id_cv', $id_cv)->first();
            }while($id_check !=null);

            $cv = new CV();
            $cv->id_cv = $id_cv;
            $cv->tieudecv = $request->tieudecv;
            $cv->loaicv = 'file';
            $cv->thoigiancapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            if(isset($filecv_name)){
                $cv->tenfile = $filecv_name;
            }
            $cv->thetukhoa = $tags2;
            $cv->capbacht = $request->capbacht;
            $cv->chucdanhht = $request->chucdanhht;
            $cv->sonamkn = $request->sonamkn;
            $cv->mucluongmm = $request->mucluongmm;
            $cv->id_uv = Session::get('js_id');
            $cv->save();

            $nd_cv = new NoidungCV();
            $nd_cv->id_cv = $id_cv;
            $nd_cv->save();

            if($request->trangthaicv == 2){
                $uv = TkUngvien::where('id_uv', Session::get('js_id'))->first();
                if($uv->ngaysinh == null){
                    Session::flash('success', 'null');
                    Session::flash('errstt', 'null');
                    return redirect::back();
                }
                else{
                    $cv->trangthaicv = 3;
                    $cv->save();
                    Session::flash('success', 'null');
                    return redirect()->route('js_getcvmanage');
                }
            }
            else{
                $cv->save();
                Session::flash('success', 'null');
                return redirect()->route('js_getcvmanage');
            }
        }
    }
    //Post tạo CV Online
    public function postCreateCVOnl(Request $request){

        $delimiters1 = ['"},{"value":"'];
        $delimiters2 = ['[{"value":"','"}]'];
        $tags1 = str_replace($delimiters1,', ', $request->tags);
        $tags2 = str_replace($delimiters2,'', $tags1);


        $validator = Validator::make($request->all(),[
            'tieudecvonl' => 'bail|required',
            'chucdanhht' => 'bail|required',
            'capbacht' => 'bail|required|not_in:0',
            'sonamkn' => 'bail|required',
            'mucluongmm'=> 'bail|required',
        ],[
            'tieudecvonl.required'=> 'Vui lòng nhập tiêu đề cho CV!',
            'chucdanhht.required'=> 'Vui lòng nhập chức danh hiện tại',
            'capbacht.not_in'=> 'Vui lòng chọn cấp bậc hiện tại',
            'sonamkn.required'=> 'Vui lòng nhập số năm kinh nghiệm',
            'mucluongmm.required'=> 'Vui lòng nhập mức lương mong muốn',
        ]);

        if($validator->fails()){
            Session::flash('errcvonl','null');
            return redirect::back()->withErrors($validator)->withInput();
        }else{
            do{
                $number = rand(1,200);
                $id_cv = 'cv'.$number;
                $id_check = CV::where('id_cv', $id_cv)->first();
            }while($id_check !=null);


            $cv = new CV();
            $cv->id_cv = $id_cv;
            $cv->tieudecv = $request->tieudecvonl;
            $cv->loaicv = 'online';
            $cv->maucv = '#4bdbb5';
            $cv->mauchu_lh = '#147259';
            $cv->mauchu_nd = '#4bdbb5';
            $cv->tenfile = 'LoopIT-'.Str::random(15).'.pdf';
            $cv->thoigiancapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $cv->thetukhoa = $tags2;
            $cv->capbacht = $request->capbacht;
            $cv->chucdanhht = $request->chucdanhht;
            $cv->sonamkn = $request->sonamkn;
            $cv->mucluongmm = $request->mucluongmm;
            $cv->id_uv = Session::get('js_id');
            $cv->save();

            $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
            $pdf = PDF::loadview('pages.jobseeker.js_cvDownload', compact('cv', 'ungvien'));
            file_put_contents('public/cv/'.$cv->tenfile, $pdf->output());

            $taidulieu = 0;
            if($request->taidulieu != null){
                $taidulieu = 1;
            }
            return redirect()->route('js_getupdateNewContentCV',['id_cv'=>$id_cv, 'taidulieu'=>$taidulieu]);
        }
    }
    //Get Preview CV
    public function getPreviewCVOnl($id_cv){
        $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
        $cv = CV::where('id_cv', $id_cv)->first();
        $nd_cv = NoidungCV::where('id_cv', $cv->id_cv)->get();
        return view('pages.jobseeker.js_cvPreview')->with(compact('cv', 'nd_cv', 'ungvien'));
    }
    //Get Update Nội dung Mới CV Online
    public function getUpdateNewContentCV($id_cv, $taidulieu){
        $cv = CV::where('id_cv', $id_cv)->first();
        $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
        if($taidulieu == 1){
            $hocvan = Hocvan::where('id_uv', Session::get('js_id'))->get();
            $kinhnghiem = Kinhnghiem::where('id_uv', Session::get('js_id'))->get();
            $ngoaingu = Ngoaingu::where('id_uv', Session::get('js_id'))->get();
            return view('pages.jobseeker.js_cvUpdateNew')->with(compact('cv','ungvien', 'hocvan', 'kinhnghiem', 'ngoaingu'));
        }else{
            return view('pages.jobseeker.js_cvUpdateNew')->with(compact('cv','ungvien'));
        }
    }
    //Get Update Nội dung CV Online Đã lưu
    public function getUpdatedContentCV($id_cv){
        $cv = CV::where('id_cv', $id_cv)->first();
        $nd_cv = NoidungCV::where('id_cv', $cv->id_cv)->get();
        $countnd = count($nd_cv);
        $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
        return view('pages.jobseeker.js_cvUpdated')->with(compact('cv','ungvien','nd_cv','countnd'));
    }
    //Post Update Nội dung CV Đã Lưu
    public function postUpdateContentCV(Request $request){
        $cv = CV::where('id_cv', $request->id_cv)->first();
        $cv->maucv = $request->maucv;
        $cv->mauchu_lh = $request->mauchu_lh;
        $cv->mauchu_nd = $request->mauchu_nd;
        $cv->tenfile = 'LoopIT-'.Str::random(15).'.pdf';
        $cv->thoigiancapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        if($request->hasFile('avt')){
            $des_path = 'img/jobseeker/uploads/avt_cv';
            $avtcv = $request->file('avt');
            $avtcv_name = Str::random(10).$avtcv->getClientOriginalName();
            $path = $avtcv->move(public_path($des_path), $avtcv_name);
            $cv->hinhdaidien = $avtcv_name;
        }
        $cv->save();

        for( $i=1; $i<15; $i++){
            $id = 'id_nd'.$i;
            $tieude = 'tieude'.$i;
            $chitiet = 'chitiet'.$i;
            if(empty($request->$id)){
                $nd_cv = New NoidungCV();
                $tieude = 'tieude'.$i;
                $chitiet = 'chitiet'.$i;
                if($request->$tieude != null){
                    $nd_cv->tieude = $request->$tieude;
                    $nd_cv->id_cv = $request->id_cv;
                    $nd_cv->save();
                }
                if($request->$chitiet != null){
                    $nd_cv->chitiet = $request->$chitiet;
                    $nd_cv->id_cv = $request->id_cv;
                    $nd_cv->save();
                }
            }
            elseif(isset($request->$id)){
                $nd_cv = NoidungCV::where('id_nd', $request->$id)->first();
                if(empty($request->$tieude) && empty($request->$chitiet)){
                    $nd_cv->delete();
                }
                else{
                    $nd_cv->tieude = $request->$tieude;
                    $nd_cv->chitiet = $request->$chitiet;
                    $nd_cv->save();
                }
            }
        }

        $nd_cv = NoidungCV::where('id_cv', $cv->id_cv)->get();
        $ungvien = TkUngvien::where('id_uv',Session::get('js_id'))->first();
        $pdf = PDF::loadview('pages.jobseeker.js_cvDownload', compact('cv', 'nd_cv', 'ungvien'));
        file_put_contents('public/cv/'.$cv->tenfile, $pdf->output());

        Session::flash('success');
        return redirect()->route('js_getpreviewCVOnl', ['id_cv'=>$cv->id_cv]);
    }
    //Post xoá một CV
    public function postDeleteCV($id_cv){
        $cv = CV::where('id_cv', $id_cv)->first();
        $check_cviecdaut = CVUVDaUngTuyen::where('id_cv', $id_cv)->get();
        $check_cviecdaluu = CVUVDaUngTuyen::where('id_cv', $id_cv)->get();
        if(count($check_cviecdaut) > 0 && count($check_cviecdaluu) > 0){
            $cv->trangthaicv = 0;
            $cv->save();
        }
        else{
            $nd_cv = NoidungCV::where('id_cv', $id_cv)->get();
            foreach($nd_cv as $nd){
                $nd->delete();
            }
            $cv = CV::where('id_cv', $id_cv)->first();
            $cv->delete();
        }
        Session::flash('success', 'null');
        return redirect::back();
    }
    //Post chỉnh sửa thông tin file CV
    public function postSettingCV(Request $request, $id_cv){
        $delimiters1 = ['"},{"value":"'];
        $delimiters2 = ['[{"value":"','"}]'];
        $tags1 = str_replace($delimiters1,', ', $request->tagsedit);
        $tags2 = str_replace($delimiters2,'', $tags1);

        $validator = Validator::make($request->all(),[
            'tieudecv_ed' => 'bail|required',
            'chucdanhht_ed' => 'bail|required',
            'capbacht_ed' => 'bail|required|not_in:0',
            'sonamkn_ed' => 'bail|required',
            'mucluongmm_ed'=> 'bail|required',
        ],[
            'tieudecv_ed.required'=> 'Tiêu đề mới của CV không được bỏ trống!',
            'chucdanhht_ed.required'=> 'Vui lòng nhập chức danh hiện tại',
            'capbacht_ed.not_in'=> 'Vui lòng chọn cấp bậc hiện tại',
            'sonamkn_ed.required'=> 'Vui lòng nhập số năm kinh nghiệm',
            'mucluongmm_ed.required'=> 'Vui lòng nhập mức lương mong muốn',
        ]);

        if($validator->fails()){
            Session::flash('fail', 'null');
            Session::flash('errcvedit','null');
            return redirect::back()->withErrors($validator)->withInput();
        }else{
            $cv = CV::where('id_cv', $id_cv)->first();
            $cv->tieudecv = $request->tieudecv_ed;
            $cv->thetukhoa = $tags2;
            $cv->capbacht = $request->capbacht_ed;
            $cv->chucdanhht = $request->chucdanhht_ed;
            $cv->sonamkn = $request->sonamkn_ed;
            $cv->mucluongmm = $request->mucluongmm_ed;
            $cv->thoigiancapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $cv->save();
            if($request->trangthaicv == 2){
                $uv = TkUngvien::where('id_uv', $cv->id_uv)->first();
                if($uv->ngaysinh == null){
                    Session::flash('errstt', 'null');
                    Session::flash('success', 'null');
                    return redirect::back();
                }
                else{
                    $cv->trangthaicv = 3;
                    $cv->save();
                    Session::flash('success', 'null');
                    return redirect::back();
                }
            }elseif($request->trangthaicv == 1){
                $cv->trangthaicv = $request->trangthaicv;
                $cv->save();
                Session::flash('success', 'null');
                return redirect::back();
            }
            Session::flash('success', 'null');
            return redirect::back();
        }
    }
    //Download/ cv
    public function getDownloadCV($id_cv){
        $cv = CV::where('id_cv', $id_cv)->first();
        $path = 'C:/xampp/htdocs/LVAN/LoopIT/public/cv/'.$cv->tenfile;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }





    // ------------QUẢN LÝ CÔNG VIỆC------------
    //Get trang quản lý công việc đã lưu / ứng tuyển
    public function getJobMana(){
        $congviecdaluu = TinTuyenDung::join('tbl_congviecdaluu','tbl_tintuyendung.id_tintd', '=', 'tbl_congviecdaluu.id_tintd')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->where('id_uv',Session::get('js_id'))
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
        ->paginate(4);

        $congviecdaut = TinTuyenDung::join('tbl_cvuvdaungtuyen','tbl_tintuyendung.id_tintd', '=', 'tbl_cvuvdaungtuyen.id_tintd')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->join('tbl_cv', 'tbl_cvuvdaungtuyen.id_cv', '=', 'tbl_cv.id_cv')
        ->where('id_uv',Session::get('js_id'))
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*','tbl_cv.*',
        'tbl_cvuvdaungtuyen.thoigiannop','tbl_cvuvdaungtuyen.trangthai_danhgia', 'tbl_cvuvdaungtuyen.nhanxet',
        'tbl_cvuvdaungtuyen.id_CVdaut','tbl_cvuvdaungtuyen.ngayhenphongvan')
        ->paginate(4);

        return view('pages/jobseeker/js_jobmanage')->with(compact('congviecdaluu','congviecdaut'));
    }
    //Get Lưu công việc
    public function getSaveJob($id_tintd){
        if(Session::get('js_id') == null){
            Session::flash('loginReq', 'null');
            return redirect::back();
        }
        else{
            $congviecdaluu = new CongviecDaluu();
            $congviecdaluu->id_tintd = $id_tintd;
            $congviecdaluu->id_uv = Session::get('js_id');
            $congviecdaluu->thoigianluu = Carbon::now('Asia/Ho_Chi_Minh');
            $congviecdaluu->save();
            return redirect::back()->withInput();
        }
    }
    //Get bỏ lưu công việc
    public function getUnSaveJob($id_tintd){
        $congviecdaluu = CongviecDaluu::where('id_tintd', $id_tintd)
        ->where('id_uv', Session::get('js_id'))->first();
        $congviecdaluu->delete();
        Session::flash('success', 'null');
        return redirect::back();
    }
    //Function Add Bảng CV Đã ứng tuyển
    public function saveSendCV($id_cv, $id_tintd){
        $cvuv_daut = new CVUVDaUngTuyen();
        $cvuv_daut->id_tintd = $id_tintd;
        $cvuv_daut->id_cv = $id_cv;
        $cvuv_daut->thoigiannop = Carbon::now('Asia/Ho_Chi_Minh');
        $cvuv_daut->save();
    }
    //Post gửi CV ứng tuyển
    public function postSendCV($id_tintd, Request $request) {
        if($request->inlineRadioOptions == 0){
            $validator = Validator::make($request->all(),[
                'filecv' => 'bail|required'
            ],[
                'filecv.required'=> 'Vui lòng chọn file muốn tải lên!'
            ]);
            if($validator->fails()){
                Session::flash('errupfile','null');
                return redirect::back()->withErrors($validator)->withInput();
            }else{
                if($request->hasFile('filecv')){
                    $des_path = 'cv';
                    $filecv = $request->file('filecv');
                    $filecv_name = Str::random(10).$filecv->getClientOriginalName();
                    $path = $filecv->move(public_path($des_path), $filecv_name);
                }
                do{
                    $number = rand(1,200);
                    $id_cv = 'cv'.$number;
                    $id_check = CV::where('id_cv', $id_cv)->first();
                }while($id_check !=null);

                $cv = new CV();
                $cv->id_cv = $id_cv;
                $cv->loaicv = 'file';
                $cv->thoigiancapnhat = Carbon::now('Asia/Ho_Chi_Minh');
                if(isset($filecv_name)){
                    $cv->tenfile = $filecv_name;
                }
                $cv->id_uv = Session::get('js_id');
                $cv->save();

                $nd_cv = new NoidungCV();
                $nd_cv->id_cv = $id_cv;
                $nd_cv->save();

                $this->saveSendCV($id_cv, $id_tintd);
                Session::flash('applysuccess', 'null');
                return redirect::back();
            }
        }

        if($request->inlineRadioOptions == 1){
            $validator2 = Validator::make($request->all(),[
                'selectCVFile' => 'bail|required|not_in:0'
            ],[
                'selectCVFile.not_in'=> 'Vui lòng chọn CV muốn gửi ứng tuyển!'
            ]);
            if($validator2->fails()){
                Session::flash('errsendcvfile','null');
                return redirect::back()->withErrors($validator2)->withInput();
            }else{
                $this->saveSendCV($request->selectCVFile, $id_tintd);
            }
            Session::flash('applysuccess', 'null');
            return redirect::back();
        }

        if($request->inlineRadioOptions == 2){
            $validator3 = Validator::make($request->all(),[
                'selectCVOnl' => 'bail|required|not_in:0'
            ],[
                'selectCVOnl.not_in'=> 'Vui lòng chọn CV muốn gửi ứng tuyển!'
            ]);
            if($validator3->fails()){
                Session::flash('errsendcvonl','null');
                return redirect::back()->withErrors($validator3)->withInput();
            }else{
                $this->saveSendCV($request->selectCVOnl, $id_tintd);
            }
            Session::flash('applysuccess', 'null');
            return redirect::back();
        }
    }
    //Post gửi báo cáo công việc
    public function postSendReport($id_tintd, Request $request){
        if(!isset($request->baocao)){
            $noidungbaocao = "";
            if($request->motathem){
                $noidungbaocao = "Khác: ".$request->motathem;
            }else{
                Session::flash('errreport','null');
                return redirect::back();
            }
        }
        elseif(isset($request->baocao)){
            $noidungbaocao = "";
            foreach($request->baocao as $bc){
                if($bc != null){
                    $noidungbaocao =  $noidungbaocao.$bc.' /:/ ';
                }
            }
            if($request->motathem){
                $noidungbaocao =  $noidungbaocao."Khác: ".$request->motathem;
            }
        }

        $cviecbaocao = CongviecBaocao::where('id_uv', Session::get('js_id'))
        ->where('id_tintd', $id_tintd)->first();

        if($cviecbaocao != null){
            $cviecbaocao->update([
                'noidung_baocao' => $noidungbaocao,
                'ngaybaocao' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }elseif($cviecbaocao == null){
            $baocao = new CongviecBaocao();
            $baocao->id_uv = Session::get('js_id');
            $baocao->id_tintd = $id_tintd;
            $baocao->ngaybaocao = Carbon::now('Asia/Ho_Chi_Minh');
            $baocao->noidung_baocao = $noidungbaocao;
            $baocao->save();
        }
        Session::flash('reported', 'null');
        return redirect::back();
    }




    // ------------QUẢN LÝ TÀI KHOẢN------------
    //Get trang quản lý thông tin tài khoản
    public function getSecurity(){
        return view('pages/jobseeker/js_secuity');
    }
    //Post cập nhật mật khẩu
    public function postUpdatepass(Request $request){
        $validator = Validator::make($request->all(), [
            'oldpass'=> 'bail|required',
            'newpass' => 'bail|required|min:6|max:18',
            'confirm_newpass' => 'bail|required|same:newpass'
        ],[
            'oldpass.required'=> 'Vui lòng xác nhận mật khẩu hiện tại',
            'newpass.required'=> 'Vui lòng nhập mật khẩu mới',
            'newpass.min'=> 'Mật khẩu tối thiếu 6 ký tự',
            'newpass.max'=> 'Mật khẩu tối đa 18 ký tự',
            'confirm_newpass.required'=> 'Vui lòng nhập mật khẩu xác thực',
            'confirm_newpass.same'=> 'Mật khẩu xác nhận không trùng khớp'
        ]);
        if ($validator->fails()){
            return redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $ungvien = TkUngvien::where('id_uv', Session::get('js_id'))->first();
            if(Hash::check($request->oldpass, $ungvien->matkhau)){
                $ungvien->matkhau = bcrypt($request->newpass);
                $ungvien->save();
                $this->getlogout();
                return view('pages.jobseeker.auth.js_authMessage')->with('message_updatePass','Mật khẩu cập nhật thành công, bạn đã có thể đăng nhập bằng mật khẩu mới!');
            }elseif(!Hash::check($request->oldpass, $ungvien->matkhau)){
                Session::flash('errorUpdatepass','Mật khẩu hiện tại không chính xác!');
                return redirect::back();
            }
        }
    }
    //Gửi email xác nhận
    public function sendVerimail($Tkungvien, $token){
        Mail::send('pages.jobseeker.auth.js_mail', compact('Tkungvien', 'token'), function($email) use($Tkungvien){
            $email->subject('Mail xác thực');
            $email->to($Tkungvien->email, $Tkungvien->ten);
        });
    }
    //Post cập nhật email
    public function postUpdateemail(Request $request){
        $validator = Validator::make($request->all(), [
            'email_new' => 'bail|required',
            'confirm_pass' => 'bail|required'
        ],[
            'email_new.required'=> 'Vui lòng nhập email mới',
            'confirm_pass.required'=> 'Vui lòng xác nhận mật khẩu hiện tại',
        ]);
        if ($validator->fails()){
            return redirect::back()->withErrors($validator)->withInput();
        }
        else{

            $check_email = TkUngvien::where('email', $request->email_new)->first();
            if( $check_email != null){
                Session::flash('errupdateEmail','Email đã được sử dụng!');
                return redirect::back()->withInput();
            }else{
                $token = Str::random(10);
                $ungvien = TkUngvien::where('id_uv', Session::get('js_id'))->first();
                if(Hash::check($request->confirm_pass, $ungvien->matkhau)){
                    $ungvien->email = $request->email_new;
                    $ungvien->save();
                    $this->sendVerimail($ungvien, $token);
                    $this->getlogout();
                    return view('pages.jobseeker.auth.js_authMessage')->with('message_updateEmail','Email xác thực đã được gửi tới '.$ungvien->email.'.Vui lòng kiểm tra hòm thư!');
                }elseif(!Hash::check($request->oldpass, $ungvien->matkhau)){
                    Session::flash('errorConfirmpass','Mật khẩu hiện tại không chính xác!');
                    return redirect::back()->withInput();
                }
            }
        }
    }





    // ------------QUẢN LÝ THÔNG BÁO GỢI Ý VIỆC LÀM------------
    //Get trang quản lý NTD đã lưu
    public function getJobNotiRC(){
        $ntddaluu = DB::table('tbl_ntddaluu')
        ->where('id_uv', Session::get('js_id'))
        ->join('tbl_hosontd', 'tbl_ntddaluu.id_hosontd','=','tbl_hosontd.id_hosontd')
        ->paginate(3);

        return view('pages/jobseeker/js_notirc')->with(compact('ntddaluu'));
    }
    //get lưu nhà tuyển dụng
    public function getSaveRc($id_hosontd){
        if(Session::get('js_id') == null){
            Session::flash('loginReq', 'null');
            return redirect::back();
        }
        else{
            $ntddaluu = new NTDDaluu();
            $ntddaluu->id_hosontd = $id_hosontd;
            $ntddaluu->id_uv = Session::get('js_id');
            $ntddaluu->thoigianluu = Carbon::now('Asia/Ho_Chi_Minh');
            $ntddaluu->save();
            return redirect::back()->withInput();
        }
    }
    //get xoá nhà tuyển dụng
    public function getUnSaveRc($id_hosontd){
        $ntddaluu = NTDDaluu::where('id_hosontd', $id_hosontd)
        ->where('id_uv', Session::get('js_id'))->first();
        $ntddaluu->delete();
        Session::flash('success', 'null');
        return redirect::back();
    }
    //get trang xem công việc mới nhà tuyển dung
    public function getJobNotiRCCheck($id_ntddaluu){
        $ntddaluu = NTDDaluu::where('id_ntddaluu', $id_ntddaluu)
        ->join('tbl_hosontd', 'tbl_ntddaluu.id_hosontd','=','tbl_hosontd.id_hosontd')
        ->first();

        $ntddaluu->trangthaixem = 0;
        $ntddaluu->save();

        $tintd= DB::table('tbl_tintuyendung')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd','=','tbl_hosontd.id_ntd')
        ->where('trangthai_tintd', 2)
        ->orderBy('ngaydangtin', 'DESC')
        ->get();

        $tintd_ntddaluu = array();
        $tintd_ntddaluu_old = array();
        foreach($tintd as $tin){
            if($ntddaluu->id_hosontd == $tin->id_hosontd){
                $a = new Carbon($tin->ngaydangtin,'Asia/Ho_Chi_Minh');
                $b = new Carbon($ntddaluu->thoigianluu,'Asia/Ho_Chi_Minh');
                if($a > $b){
                    $tintd_ntddaluu[] = $tin;
                }else{
                    $tintd_ntddaluu_old[] = $tin;
                }
            }
        }

        return view('pages/jobseeker/js_notirccheck')->with(compact('ntddaluu', 'tintd_ntddaluu', 'tintd_ntddaluu_old'));
    }

    //Get trang gợi ý việc làm qua bộ lọc
    public function getJobNotiFilter(){
        $boloc = CongviecGoiY::where('id_uv', Session::get('js_id'))->paginate(3);
        $thanhpho = ThanhPho::all();
        $nganhnghe = Nganhnghe::all();
        return view('pages/jobseeker/js_notifilter')->with(compact('thanhpho', 'nganhnghe', 'boloc', 'tintdgoiy'));
    }
    //Post lưu bộ lọc
    public function postAddFilterNoti(Request $request){
        //dd($request->all());
        $testNull = 0;
        foreach($request->all() as $k=>$v){
            if($k != '_token'){
                if($v != NULL){
                    $testNull++;
                }
            }
        }
        if($testNull != 0 ){
            $boloc = new CongviecGoiY();
            $boloc->thanhpho =$request->thanhpho;
            $boloc->nganhnghe = $request->nganhnghe;
            $boloc->capbac = $request->capbac;
            $boloc->trinhdo = $request->trinhdo;
            $boloc->loaicongviec = $request->loaicongviec;
            $boloc->kinhnghiem = $request->kinhnghiem;
            $boloc->mucluong = $request->mucluong;
            $boloc->id_uv = Session::get('js_id');
            $boloc->thoigiantao = Carbon::now('Asia/Ho_Chi_Minh');
            $boloc->save();

            Session::flash('success', 'null');
            return redirect::back();
        }elseif($testNull == 0){
            Session::flash('fail', 'null');
            return redirect::back();
        }
    }
    //Post chỉnh sửa bộ lọc thông báo
    public function postEditFilterNoti(Request $request, $id_goiy){
        $boloc = CongviecGoiY::where('id_goiy',$id_goiy)->first();
        $testNull = 0;
        if($boloc != null){
            foreach($request->all() as $k=>$v){
                if($k != '_token'){
                    if($v != NULL){
                        $testNull++;
                    }
                }
            }
            if($testNull != 0 ){
                $boloc->thanhpho =$request->thanhpho_ed;
                $boloc->nganhnghe = $request->nganhnghe_ed;
                $boloc->capbac = $request->capbac_ed;
                $boloc->trinhdo = $request->trinhdo_ed;
                $boloc->loaicongviec = $request->loaicongviec_ed;
                $boloc->kinhnghiem = $request->kinhnghiem_ed;
                $boloc->mucluong = $request->mucluong_ed;
                $boloc->save();

                Session::flash('success', 'null');
                return redirect::back();
            }elseif($testNull == 0){
                Session::flash('fail_ed', 'null');
                return redirect::back();
            }
        }else{
            return redirect()->route('js_jobnotifilter');
        }
    }
    //Post xoá bộ lọc thông báo
    public function postDeleteFilterNoti($id_goiy){
        $boloc = CongviecGoiY::where('id_goiy',$id_goiy)->first();
        if($boloc != null){
            $boloc->delete();
            Session::flash('success', 'null');
            return redirect()->route('js_jobnotifilter');
        }else{
            return redirect()->route('js_jobnotifilter');
        }
    }
    //Get trang xem công việc mới của bộ lọc
    public function getJobNotiFLCheck($id_goiy){
        $boloc = CongviecGoiY::where('id_goiy', $id_goiy)->first();
        $boloc->trangthaixem = 0;
        $boloc->save();
        $tintdgoiy = array();

        $tintd=  DB::table('tbl_tintuyendung')
        ->join('tbl_hosontd','tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
        ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
        ->where('trangthai_tintd','=', 2)
        ->orderBy('ngaydangtin', 'DESC');

        if($boloc['thanhpho'] != null){
            $tintd->where('tbl_tintuyendung.thanhpho', 'LIKE', '%'.$boloc['thanhpho'].'%');
        }
        if($boloc['nganhnghe'] != null){
            $tintd->where('nganhnghe', 'LIKE', '%'.$boloc['nganhnghe'].'%');
        }
        if($boloc['kinhnghiem'] != null){
            $tintd->where('kinhnghiem', 'LIKE', $boloc['kinhnghiem']);
        }
        if($boloc['mucluong'] != null){
            $tintd->where('mucluong_toithieu', '>=', $boloc['mucluong']);
        }
        if($boloc['loaicongviec'] != null){
            $tintd->where('loaicongviec', 'LIKE', $boloc['loaicongviec']);
        }
        if($boloc['trinhdo'] != null){
            $tintd->where('trinhdo', 'LIKE', $boloc['trinhdo']);
        }
        if($boloc['capbac'] != null){
            $tintd->where('capbac', 'LIKE', $boloc['capbac']);
        }
        $tintd = $tintd->get();

        foreach($tintd as $tin){
            $a = new Carbon($tin->ngaydangtin,'Asia/Ho_Chi_Minh');
            $b = new Carbon($boloc->thoigiantao,'Asia/Ho_Chi_Minh');
            if($a > $b){
                $tintdgoiy[] = $tin;
            }
        }

        return view('pages/jobseeker/js_notifiltercheck')->with(compact('boloc', 'tintdgoiy'));
    }
}
