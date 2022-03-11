<?php

namespace App\Http\Controllers\jobseeker;

use App\Http\Controllers\Controller;
use App\Models\jobseeker\CongviecDaluu;
use App\Models\jobseeker\NTDDaluu;
use App\Models\LoaiNganhNghe;
use App\Models\Nganhnghe;
use App\Models\recruiter\TinTuyenDung;
use App\Models\ThanhPho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    //Tìm kiếm Công việc
    public function getJobSearch(Request $request){
        $thanhpho = ThanhPho::all();
        $nganhnghe = Nganhnghe::all();
        $check_save = CongviecDaluu::where('id_uv', Session::get('js_id'))->get();
        $savejob_id_tintd = array();
        foreach($check_save as $list){
            $savejob_id_tintd[] = $list->id_tintd;
        }
        if($request->nd_timkiem != null){
            $kq_tkiem = DB::table('tbl_tintuyendung')
            ->join('tbl_hosontd','tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
            ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo',
            'tbl_tintuyendung.*')
            ->where('trangthai_tintd','=', 2)
            ->where(function($query) use($request){
                $query->where('tencongviec', 'LIKE', '%'.$request->nd_timkiem.'%')
                ->orWhere('motacongviec', 'LIKE', '%'.$request->nd_timkiem.'%')
                ->orWhere('yeucaucongviec', 'LIKE', '%'.$request->nd_timkiem.'%')
                ->orWhere('diadiemlamviec', 'LIKE', '%'.$request->nd_timkiem.'%');
            });

            foreach($request->all() as $key=>$value){
                if($key != 'nd_timkiem' && $key != '_token' && $key != 'page'){
                    if($key == 'mucluong_toithieu'){
                        if($value != null){
                            $kq_tkiem->where('mucluong_toithieu', '>=', (int)$value);
                        }
                    }
                    elseif($key == 'thanhpho'){
                        if($value != 0){
                            $kq_tkiem->where('tbl_tintuyendung.thanhpho', 'LIKE', '%'.$value.'%');
                        }
                    }
                    else{
                        if($value != 0){
                            $kq_tkiem->where($key, 'LIKE', '%'.$value.'%');
                        }
                    }
                }
            }
            $kq_tkiem = $kq_tkiem->distinct('id_tintd')->paginate(5);
            return view('pages.jobseeker.job_search')->with(compact('thanhpho','nganhnghe','kq_tkiem','savejob_id_tintd'));
        }
        elseif($request->nd_timkiem == null){
            $kq_tkiem = DB::table('tbl_tintuyendung')
            ->join('tbl_hosontd','tbl_tintuyendung.id_ntd', '=', 'tbl_hosontd.id_ntd')
            ->select('tbl_hosontd.id_hosontd','tbl_hosontd.tencty','tbl_hosontd.logo','tbl_tintuyendung.*')
            ->where('trangthai_tintd','=', 2);

            foreach($request->all() as $key=>$value){
                if($key != 'nd_timkiem' && $key != '_token' && $key != 'page'){
                    if($key == 'mucluong_toithieu'){
                        if($value != null){
                            $kq_tkiem->where('mucluong_toithieu', '>=', (int)$value);
                        }
                    }
                    elseif($key == 'thanhpho'){
                        if($value != 0){
                            $kq_tkiem->where('tbl_tintuyendung.thanhpho', 'LIKE', '%'.$value.'%');
                        }
                    }
                    else{
                        if($value != 0){
                            $kq_tkiem->where($key, 'LIKE', '%'.$value.'%');
                        }
                    }
                }
            }
            $kq_tkiem = $kq_tkiem->distinct('id_tintd')->paginate(5);
            return view('pages.jobseeker.job_search')->with(compact('thanhpho','nganhnghe','kq_tkiem','savejob_id_tintd'));
        }
    }

    //Tìm kiếm Nhà tuyển dụng
    public function getRecruiterSearch(Request $request){
        $thanhpho = ThanhPho::all();
        $loainganhnghe = LoaiNganhNghe::all();
        $check_save = NTDDaluu::where('id_uv', Session::get('js_id'))->get();
        $savejob_id_hosontd = array();
        foreach($check_save as $list){
            $savejob_id_hosontd[] = $list->id_hosontd;
        }
        if($request->nd_timkiem != null){
            $kq_tkiem = DB::table('tbl_hosontd')
            ->where(function($query) use($request){
                $query->where('tencty', 'LIKE', '%'.$request->nd_timkiem.'%')
                ->orWhere('diachicty', 'LIKE', '%'.$request->nd_timkiem.'%')
                ->orWhere('mota', 'LIKE', '%'.$request->nd_timkiem.'%');
            });

            foreach($request->all() as $key=>$value){
                if($key != 'nd_timkiem' && $key != '_token' && $key != 'page'){
                    if($value != 0){
                        $kq_tkiem->where($key, 'LIKE', '%'.$value.'%');
                    }
                }
            }
            $kq_tkiem = $kq_tkiem->distinct('id_hosontd')->paginate(4);
            return view('pages.jobseeker.recruiter_search')->with(compact('thanhpho','loainganhnghe','kq_tkiem','savejob_id_hosontd'));
        }
        elseif($request->nd_timkiem == null){
            $kq_tkiem = DB::table('tbl_hosontd');

            foreach($request->all() as $key=>$value){
                if($key != 'nd_timkiem' && $key != '_token' && $key != 'page'){
                    if($value != 0){
                        $kq_tkiem->where($key, 'LIKE', '%'.$value.'%');
                    }
                }
            }
            $kq_tkiem = $kq_tkiem->distinct('id_hosontd')->paginate(4);
            return view('pages.jobseeker.recruiter_search')->with(compact('thanhpho','loainganhnghe','kq_tkiem','savejob_id_hosontd'));
        }
    }
}
