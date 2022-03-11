<?php

namespace App\Console;

use App\Models\jobseeker\CongviecGoiY;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $listDVdaDK = DB::table('tbl_dichvudadangky')
        ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
        ->where('tbl_dichvudadangky.ngayhethan', '<>', 0)
        ->get();
        $listNTD = DB::table('tbl_tknhatuyendung')
        ->where('tbl_tknhatuyendung.trangthaitk', '>', 2)
        ->get();
        $listTTD = DB::table('tbl_tintuyendung')
        ->where('tbl_tintuyendung.trangthai_tintd', '=', 2)
        ->get();
        $ntddaluu = DB::table('tbl_ntddaluu')
        ->join('tbl_hosontd', 'tbl_ntddaluu.id_hosontd','=','tbl_hosontd.id_hosontd')
        ->get();
        $tintd= DB::table('tbl_tintuyendung')
        ->join('tbl_hosontd', 'tbl_tintuyendung.id_ntd','=','tbl_hosontd.id_ntd')
        ->where('trangthai_tintd', 2)
        ->get();
        $boloc = CongviecGoiY::all();
        $schedule->call(function () use($listDVdaDK, $listTTD, $listNTD, $ntddaluu, $tintd, $boloc) {
            //
            foreach($listDVdaDK as $key => $value) {
                $ngayhethan = new Carbon($value->ngayhethan,'Asia/Ho_Chi_Minh');
                $current = Carbon::now('Asia/Ho_Chi_Minh');
                $max_ngayhieuluc = 1;
                $flag = 1;
                if($current > $ngayhethan){
                    DB::table('tbl_dichvudadangky')
                    ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
                    ->where('tbl_dichvudadangky.id_dvdadk', '=', $value->id_dvdadk)
                    ->update(['trangthai_dvdadk' => 0]);

                    $exist = DB::table('tbl_dichvudadangky')
                             ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
                            ->where('tbl_dichvudadangky.id_ntd', '=', $value->id_ntd)
                            ->exists();
                    if($exist){
                        $expired  = DB::table('tbl_dichvudadangky')
                                    ->join('tbl_dichvu', 'tbl_dichvudadangky.id_dichvu', '=', 'tbl_dichvu.id_dichvu')
                                    ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
                                    ->where('tbl_dichvudadangky.id_ntd', '=', $value->id_ntd)
                                    ->select('tbl_dichvudadangky.*', 'tbl_dichvu.*')
                                    ->get();

                        foreach($expired as $key_ex => $val_ex){
                            if($flag == 1) {
                                $max_ngayhieuluc = $val_ex->songayhieuluc;
                                $flag = 0;
                            } else if($val_ex->songayhieuluc > $max_ngayhieuluc) {
                                $max_ngayhieuluc = $val_ex->songayhieuluc;
                            }
                        }
                        DB::table('tbl_tknhatuyendung')
                        ->where('tbl_tknhatuyendung.id_ntd', '=', $value->id_ntd)
                        ->update(['trangthaitk' => $max_ngayhieuluc/3]);
                    } else {
                        DB::table('tbl_tknhatuyendung')
                        ->where('tbl_tknhatuyendung.id_ntd', '=', $value->id_ntd)
                        ->update(['trangthaitk' => 2]);
                    }

                }
            }
            foreach($listNTD as $k_ntd => $v_ntd){
                $exist_ser = DB::table('tbl_dichvudadangky')
                ->where('tbl_dichvudadangky.trangthai_dvdadk', '=', 1)
                ->where('tbl_dichvudadangky.id_ntd', '=',$v_ntd->id_ntd)
                ->exists();
               if(!$exist_ser) {
                DB::table('tbl_tknhatuyendung')
                    ->where('tbl_tknhatuyendung.id_ntd', '=',$v_ntd->id_ntd)
                    ->update(['trangthaitk' => 2]);
                }
            }
            foreach($listTTD as $k => $v) {
                $ngayhethan_ttd = new Carbon($v->ngayhethan,'Asia/Ho_Chi_Minh');
                $current_ttd = Carbon::now('Asia/Ho_Chi_Minh');
                if($current_ttd > $ngayhethan_ttd){
                    DB::table('tbl_tintuyendung')
                    ->where('tbl_tintuyendung.trangthai_tintd', '=', 2)
                    ->where('tbl_tintuyendung.id_tintd', '=', $v->id_tintd)
                    ->update(['trangthai_tintd' => 1 ]);
                }
            }

            //Thông báo công việc
            foreach($ntddaluu as $ntd){
                $dem_tintd_moi = 0;
                foreach($tintd as $tin){
                    if($ntd->id_hosontd == $tin->id_hosontd){
                        $a = new Carbon($tin->ngaydangtin,'Asia/Ho_Chi_Minh');
                        $b = new Carbon($ntd->thoigianluu,'Asia/Ho_Chi_Minh');
                        if($a > $b){
                            $dem_tintd_moi++;
                            DB::table('tbl_ntddaluu')
                            ->where('tbl_ntddaluu.id_ntddaluu','=', $ntd->id_ntddaluu)
                            ->update(['trangthaixem' => $dem_tintd_moi]);
                        }
                    }
                }
            }
            foreach($boloc as $bl){
                $tingoiy= DB::table('tbl_tintuyendung')
                ->where('trangthai_tintd','=', 2);

                if($bl['thanhpho'] != null){
                    $tingoiy->where('thanhpho', 'LIKE', '%'.$bl['thanhpho'].'%');
                }
                if($bl['nganhnghe'] != null){
                    $tingoiy->where('nganhnghe', 'LIKE', '%'.$bl['nganhnghe'].'%');
                }
                if($bl['kinhnghiem'] != null){
                    $tingoiy->where('kinhnghiem', 'LIKE', $bl['kinhnghiem']);
                }
                if($bl['mucluong'] != null){
                    $tingoiy->where('mucluong_toithieu', '>=', $bl['mucluong']);
                }
                if($bl['loaicongviec'] != null){
                    $tingoiy->where('loaicongviec', 'LIKE', $bl['loaicongviec']);
                }
                if($bl['trinhdo'] != null){
                    $tingoiy->where('trinhdo', 'LIKE', $bl['trinhdo']);
                }
                if($bl['capbac'] != null){
                    $tingoiy->where('capbac', 'LIKE', $bl['capbac']);
                }
                $tingoiy = $tingoiy->get();

                $demtingoiy = 0;
                if(count($tingoiy) == 0){
                    DB::table('tbl_congviecgoiy')
                    ->where('tbl_congviecgoiy.id_goiy','=', $bl['id_goiy'])
                    ->update(['trangthaixem' => 0]);
                }else{
                    foreach($tingoiy as $tin_goiy){
                        $a = new Carbon($tin_goiy->ngaydangtin,'Asia/Ho_Chi_Minh');
                        $b = new Carbon($bl->thoigiantao,'Asia/Ho_Chi_Minh');
                        if($a > $b){
                            $demtingoiy++;
                            DB::table('tbl_congviecgoiy')
                            ->where('tbl_congviecgoiy.id_goiy','=', $bl['id_goiy'])
                            ->update(['trangthaixem' => $demtingoiy]);
                        }
                        if($demtingoiy == 0){
                            DB::table('tbl_congviecgoiy')
                            ->where('tbl_congviecgoiy.id_goiy','=', $bl['id_goiy'])
                            ->update(['trangthaixem' => 0]);
                        }
                    }
                }

            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
