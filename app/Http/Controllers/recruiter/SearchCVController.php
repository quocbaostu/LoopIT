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
use App\Models\recruiter\CVUVDaLuu;

use App\Models\jobseeker\CVUVDaUngTuyen;
use App\Models\jobseeker\TkUngvien;
use App\Models\jobseeker\CV;
use App\Models\jobseeker\NoidungCV;

use App\Models\ThanhPho;
use App\Models\LoaiNganhNghe;
use App\Models\NganhNghe;

class SearchCVController extends Controller
{
    public function searchCV(Request $request){
        $nganhnghe = NganhNghe::all();
        $thanhpho = ThanhPho::all();
        $listCVDaLuu = CVUVDaLuu::where('id_ntd','=', Session::get('recruiter_id'))->get();
        $listCVDaXem = CVUVDaLuu::where('id_ntd','=', Session::get('recruiter_id'))->where('trangthai_cvdaluu','=',2)->get();
        $listCVDaLuu_id_cv = array();
        $listCVDaXem_id_cv = array();
        foreach($listCVDaLuu as $list){
            $listCVDaLuu_id_cv[] = $list->id_cv;
        }
        foreach($listCVDaXem as $list_dx){
            $listCVDaXem_id_cv[] = $list_dx->id_cv;
        }
        // dd($request->all());
        if($request->noidung_timkiem == null ) {
            $hosoCV_UV =  DB::table('tbl_cv')
            ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
            ->select('tbl_cv.*','tbl_tkungvien.*')
            ->where('trangthaicv','=',2);


            foreach($request->all() as $key => $value){
                if($key != 'noidung_timkiem' && $key !='loaitimkiem' && $key != 'button_submit' && $key != 'page'){
                    if($key == 'namkn_toithieu'){
                        if($value != null){
                            $hosoCV_UV->where('sonamkn', '>=', $value);
                        }
                    } else if($key == 'namkn_toida'){
                        if($value != null){
                            $hosoCV_UV->where('sonamkn', '<=', $value);
                        }
                    } else if($key == 'mucluong_toithieu'){
                        if($value != null){
                            $hosoCV_UV->where('mucluongmm', '>=', $value);
                        }
                    } else if($key == 'mucluong_toida'){
                        if($value != null){
                            $hosoCV_UV->where('mucluongmm', '<=', $value);
                        }
                    } else {
                        if($value != null){
                            $hosoCV_UV->where($key, 'LIKE', '%'.$value.'%');
                        }
                    }
                }
            }

            $hosoCV_UV = $hosoCV_UV->distinct('id_cv')->paginate(4);

            return view('pages.recruiter.search-cv')->with(compact('thanhpho','nganhnghe','hosoCV_UV', 'listCVDaLuu_id_cv','listCVDaXem_id_cv'));
        } else {
            $keywords = str_replace('/', ' ', $request->noidung_timkiem);
            $keywords = str_replace(',', ' ', $request->noidung_timkiem);
            $keywords = str_replace(' ', '%', $request->noidung_timkiem);

            if($request->loaitimkiem == 1) {
                // tất cả
                $hosoCV_UV =  DB::table('tbl_cv')
                ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
                ->select('tbl_cv.*','tbl_tkungvien.*')
                ->where('trangthaicv','=',2)
                ->where(function($query) use($request){
                    $query->where('tbl_cv.tieudecv','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('ho','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('ten','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('gioitinh','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('chucdanhht','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('thetukhoa','LIKE','%'.$request->noidung_timkiem.'%');
                });

                foreach($request->all() as $key => $value){
                    if($key != 'noidung_timkiem' && $key !='loaitimkiem' && $key != 'button_submit' && $key != 'page'){
                        if($key == 'namkn_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '>=', $value);
                            }
                        } else if($key == 'namkn_toida'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '<=', $value);
                            }
                        } else if($key == 'mucluong_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '>=', $value);
                            }
                        } else if($key == 'mucluong_toida'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '<=', $value);
                            }
                        } else {
                            if($value != null){
                                $hosoCV_UV->where($key, 'LIKE', '%'.$value.'%');
                            }
                        }
                    }
                }

                $hosoCV_UV = $hosoCV_UV->distinct('tbl_cv.id_cv')->paginate(4);


                return view('pages.recruiter.search-cv')->with(compact('thanhpho','nganhnghe','hosoCV_UV', 'listCVDaLuu_id_cv','listCVDaXem_id_cv'));

            } else if($request->loaitimkiem == 2) {
                // tên
                $hosoCV_UV =  DB::table('tbl_cv')
                ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
                ->select('tbl_cv.*','tbl_tkungvien.*')
                ->where('trangthaicv','=',2)
                ->where(function($query) use($request) {
                    $query->where('ho','LIKE','%'.$request->noidung_timkiem.'%')
                    ->orWhere('ten','LIKE','%'.$request->noidung_timkiem.'%');
                });

                foreach($request->all() as $key => $value){
                    if($key != 'noidung_timkiem' && $key !='loaitimkiem' && $key != 'button_submit' && $key != 'page'){
                        if($key == 'namkn_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '>=', $value);
                            }
                        } else if($key == 'namkn_toida'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '<=', $value);
                            }
                        } else if($key == 'mucluong_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '>=', $value);
                            }
                        } else if($key == 'mucluong_toida'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '<=', $value);
                            }
                        } else {
                            if($value != null){
                                $hosoCV_UV->where($key, 'LIKE', '%'.$value.'%');
                            }
                        }
                    }
                }

                $hosoCV_UV = $hosoCV_UV->distinct('tbl_cv.id_cv')->paginate(4);

                return view('pages.recruiter.search-cv')->with(compact('thanhpho','nganhnghe','hosoCV_UV', 'listCVDaLuu_id_cv','listCVDaXem_id_cv'));
            } else if($request->loaitimkiem == 3) {
                // chức danh
                $hosoCV_UV =  DB::table('tbl_cv')
                ->join('tbl_tkungvien', 'tbl_tkungvien.id_uv', '=', 'tbl_cv.id_uv')
                ->select('tbl_cv.*','tbl_tkungvien.*')
                ->where('trangthaicv','=',2)
                ->where('chucdanhht','LIKE','%'.$request->noidung_timkiem.'%');

                foreach($request->all() as $key => $value){
                    if($key != 'noidung_timkiem' && $key !='loaitimkiem' && $key != 'button_submit' && $key != 'page'){
                        if($key == 'namkn_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '>=', $value);
                            }
                        } else if($key == 'namkn_toida'){
                            if($value != null){
                                $hosoCV_UV->where('sonamkn', '<=', $value);
                            }
                        } else if($key == 'mucluong_toithieu'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '>=', $value);
                            }
                        } else if($key == 'mucluong_toida'){
                            if($value != null){
                                $hosoCV_UV->where('mucluongmm', '<=', $value);
                            }
                        } else {
                            if($value != null){
                                $hosoCV_UV->where($key, 'LIKE', '%'.$value.'%');
                            }
                        }
                    }
                }
                $hosoCV_UV = $hosoCV_UV->distinct('id_cv')->paginate(4);

                return view('pages.recruiter.search-cv')->with(compact('thanhpho','nganhnghe','hosoCV_UV', 'listCVDaLuu_id_cv','listCVDaXem_id_cv'));
            }
        }
    }

    public function saveJobseekerCV($id_cv){
        $existCV = CV::where('id_cv','=',$id_cv)->first();
        if($existCV != null){
            $cvUVDaLuu = new CVUVDaLuu;
            $cvUVDaLuu->id_ntd = Session::get('recruiter_id');
            $cvUVDaLuu->id_cv = $id_cv;
            $cvUVDaLuu->save();

            Session::flash('msg_success','Lưu hồ sơ CV thành công');
            return redirect()->back();
        }else {
            return redirect()->back();
        }
    }

    public function removeSaveJobseekerCV($id_cv){
        $existCVDaLuu = CVUVDaLuu::where('id_cv','=',$id_cv)->where('id_ntd','=', Session::get('recruiter_id'))->first();
        if($existCVDaLuu != null){
            $id_CVdaluu = $existCVDaLuu->id_CVdaluu;
            CVUVDaLuu::destroy($id_CVdaluu);
            Session::flash('msg_success','Bỏ lưu hồ sơ CV thành công');
            return redirect()->back();
        }else {
            return redirect()->back();
        }
    }

    public function getDetailCVSearch($id_cv) {

        $cv = CV::where('id_cv', $id_cv)->first();
        $ungVien = TkUngvien::where('id_uv','=', $cv->id_uv)->first();
        $noiDungCV = NoidungCV::where('id_cv', $cv->id_cv)->get();

        $existCVDaLuu = CVUVDaLuu::where('id_cv','=',$id_cv)->where('id_ntd','=', Session::get('recruiter_id'))->exists();

        $existCV_DaDungDiemTK = CVUVDaLuu::where('id_cv','=',$id_cv)
        ->where('id_ntd','=', Session::get('recruiter_id'))
        ->where('trangthai_cvdaluu','=', 2)
        ->exists();


        $ex_URL = explode('/', url()->previous());
        if(in_array('detail-cv' ,$ex_URL,true) ){
            Session::put('page_redirect', Session::get('page_redirect_new'));
        } else {
            if(in_array('search' ,$ex_URL,true)){
                $page_back =  'search';
                Session::put('page_redirect', $page_back);
            } else {
                $page_back =  end($ex_URL);
                Session::put('page_redirect', $page_back);
            }


        }

        return view('pages.recruiter.detail-cv-search')->with(compact('cv', 'noiDungCV', 'ungVien','existCVDaLuu','existCV_DaDungDiemTK'));
    }

    public function postShowProtectedInfo(Request $request){
        $existCVDaLuu = CVUVDaLuu::where('id_cv','=',$request->id_cv)
        ->where('id_ntd','=', Session::get('recruiter_id'))
        ->where('trangthai_cvdaluu','=', 1)
        ->first();
        $tk_NTD = TaiKhoanNTD::where('id_ntd','=', Session::get('recruiter_id'))->first();
        $pay_point = $tk_NTD->diem_tkuv - $request->diem_tkuv;

        if($pay_point < 0 ){
            Session::flash('msg_error','Không thành công! Điểm tìm kiếm của bạn không đủ');
            Session::put('page_redirect_new', Session::get('page_redirect'));
            return redirect()->back();
        } else {
            if($existCVDaLuu != null){
                $existCVDaLuu->update(['trangthai_cvdaluu' => 2]);
                $tk_NTD->update(['diem_tkuv' => $pay_point]);
                Session::flash('msg_success','Hiển thị thông tin được bảo vệ thành công');
                Session::put('page_redirect_new', Session::get('page_redirect'));
                return redirect()->back();
            } else {
                $cvUVDaLuu = new CVUVDaLuu;
                $cvUVDaLuu->id_ntd = Session::get('recruiter_id');
                $cvUVDaLuu->id_cv = $request->id_cv;
                $cvUVDaLuu->trangthai_cvdaluu = 2;
                $cvUVDaLuu->save();

                $tk_NTD->update(['diem_tkuv' => $pay_point]);
                Session::flash('msg_success','Hiển thị thông tin được bảo vệ thành công');
                Session::put('page_redirect_new', Session::get('page_redirect'));
                return redirect()->back();
            }
        }
    }


}
