<?php

namespace App\Http\Controllers\recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use DB;

use App\Models\recruiter\DichVu;
use App\Models\recruiter\TaiKhoanNTD;
use App\Models\recruiter\DichVuDaDangKy;
use App\Models\recruiter\DonHang;
use App\Models\recruiter\ChiTietDonHang;

class ServicesController extends Controller
{
    // Convert String to date
    // public function index()
    // {
    //     $myDate = '12/08/2020';
    //     $date = Carbon::createFromFormat('m/d/Y', $myDate)->format('Y-m-d');
        // Post::where('Expiration_date','<',Carbon::now())->delete();
    //     var_dump($date);
    // }
    // Trang dịch vụ của tôi
    public function getMyServices()
    {
        $id_ntd =  Session::get('recruiter_id');
        $exist_DVdaDK = DichVuDaDangKy::where('id_ntd','=',$id_ntd)->first();
        $taiKhoanNTD = TaiKhoanNTD::where('id_ntd','=',$id_ntd)->first();
        $dv_dadangky = DB::table('tbl_dichvudadangky')
        ->join('tbl_dichvu', 'tbl_dichvudadangky.id_dichvu', '=', 'tbl_dichvu.id_dichvu')
        ->where('tbl_dichvudadangky.id_ntd', '=', $id_ntd)
        ->select('tbl_dichvudadangky.*', 'tbl_dichvu.*')
        ->get();

        return view('pages.recruiter.my-services')->with(compact('exist_DVdaDK','dv_dadangky','taiKhoanNTD'));
    }
    public function deleteServices($id_dvdadk)
    {
        if($id_dvdadk != null) {
            $dichVuDaDangKy = DichVuDaDangKy::where('id_dvdadk', '=', $id_dvdadk)->first();
            if($dichVuDaDangKy != null){
                if($dichVuDaDangKy->trangthai_dvdadk == 0 && $dichVuDaDangKy->ngayhethan != 0){
                    DichVuDaDangKy::destroy($id_dvdadk);
                    session()->flash('alertSuc', 'Xóa thông tin dịch vụ đã đăng ký thành công!!');
                    return redirect()->back();

                } else if($dichVuDaDangKy->trangthai_dvdadk == 1 && $dichVuDaDangKy->ngayhethan != 0){
                    session()->flash('alertErr', 'Dịch vụ vẫn còn hạn sử dụng!!');
                    return redirect()->back();
                } else if($dichVuDaDangKy->trangthai_dvdadk == 1 && $dichVuDaDangKy->ngayhethan == 0){
                    DichVuDaDangKy::destroy($id_dvdadk);
                    session()->flash('alertSuc', 'Xóa thông tin dịch vụ đã đăng ký thành công!!');
                    return redirect()->back();
                }
            }
        }
    }
    // Danh sách dịch vụ
    public function getListServices()
    {
        //lọc lấy số
        // $numFormat = filter_var($request->giadv, FILTER_SANITIZE_NUMBER_INT);
        $listDichVu_DT = DichVu::where('loaidv', '=', '1')->get();
        $listDichVu_TK = DichVu::where('loaidv', '=', '2')->get();
        $listDichVu_HT = DichVu::where('loaidv', '=', '3')->get();

        $firstDV_DT = DichVu::where('loaidv', '=', '1')->first();
        $firstDV_TK = DichVu::where('loaidv', '=', '2')->first();
        $firstDV_HT = DichVu::where('loaidv', '=', '3')->first();

        return view('pages.recruiter.list-services')->with(
            compact('listDichVu_DT','listDichVu_TK','firstDV_DT','firstDV_TK','listDichVu_HT','firstDV_HT'));
    }
    // Thêm dịch vụ vào giỏ hàng
    public function addToCart($id_dichvu){
        $dichVu = DichVu::find($id_dichvu);
        $cart = Session::get('cart');
        $total_qtt = Session::get('total_qtt') + 1;
        if(isset($cart[$id_dichvu])){
            $cart[$id_dichvu]['soluong'] = $cart[$id_dichvu]['soluong'] + 1;

        } else {
            $cart[$id_dichvu] = [
                'tendv' => $dichVu->tendv,
                'giadv' => $dichVu->giadv,
                'loaidv' => $dichVu->loaidv,
                'songayhieuluc' => $dichVu->songayhieuluc,
                'diemtk' => $dichVu->diemtk,
                'soluong' => 1
            ];
        }
        Session::put('cart', $cart);
        Session::put('total_qtt', $total_qtt);

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ],200);
    }
    // Trang giỏ hàng
    public function getCart(){
        $cart = Session::get('cart');
        return view('pages.recruiter.cart')->with(compact('cart'));
    }
    // Cập nhật giỏ hàng
    public function updateCart(Request $request){
        if($request->id_dichvu && $request->soluong){
            $cart = session()->get('cart');
            $total_qtt = 0;
            $cart[$request->id_dichvu]['soluong'] = $request->soluong;


            foreach($cart as $id_dichvu => $details){
                $total_qtt += $details['soluong'];
            }
            session()->put('total_qtt', $total_qtt);
            session()->put('cart', $cart);
        }

        session()->flash('update-cart-success', 'Cập nhật giỏ hàng thành công!!');
        return response()->json([
            'message' => 'success'
        ],200);
    }
    // Xóa dịch vụ khỏi giỏ hàng
    public function deleteCart(Request $request)
    {
        if($request->id_dichvu) {
            $cart = session()->get('cart');
            $total_qtt = 0;
            if(isset($cart[$request->id_dichvu])) {
                unset($cart[$request->id_dichvu]);
                session()->put('cart', $cart);
            }
            foreach($cart as $id_dichvu => $details){
                $total_qtt += $details['soluong'];
            }
            session()->put('total_qtt', $total_qtt);
            session()->flash('update-cart-success', 'Xóa dịch vụ khỏi giỏ hàng thành công!!');
        }
    }
    // Trang kiểm tra đơn hàng và thanh toán
    public function getCheckOut() {
        $cart = session()->get('cart');
        return view('pages.recruiter.check-out')->with(compact('cart'));
    }
    // Lưu đơn hàng khi thanh toán Paypal thành công
    public function saveOrder($payment_success) {
        $cart = session()->get('cart');
        $taiKhoanNTD = TaiKhoanNTD::where('id_ntd', '=', Session::get('recruiter_id'))->first();
        $current_time =  Carbon::now('Asia/Ho_Chi_Minh');
        $view = 'pages.recruiter.mail-services-bill';
        $max_ngayhieuluc = 0;
        $flag = 1;
        if($cart != null && $payment_success == 1){
            $donHang = new DonHang;
            $donHang->ngaymua = $current_time;
            $donHang->hinhthucthanhtoan = 1;
            $donHang->trangthaidh = 1;
            $donHang->id_ntd = Session::get('recruiter_id');
            $donHang->save();

            $id_donhang=$donHang->id_donhang;


            foreach ($cart as $id_dichvu => $details){
                $chiTietDonHang =  new ChiTietDonHang;
                $chiTietDonHang->id_dichvu = $id_dichvu;
                $chiTietDonHang->id_donhang = $id_donhang;
                $chiTietDonHang->soluong = $details['soluong'];
                $chiTietDonHang->dongia = $details['giadv'];
                $chiTietDonHang->thanhtien = $details['soluong']*$details['giadv'];
                $chiTietDonHang->save();

                $exist_DVdaDK = DichVuDaDangKy::where('id_ntd','=',$taiKhoanNTD->id_ntd)->where('id_dichvu','=', $id_dichvu)->first();


                if($details['loaidv'] == 2) {
                    $new_diem_tkuv = $taiKhoanNTD->diem_tkuv + $details['diemtk']*$details['soluong'];
                    $taiKhoanNTD->update(['diem_tkuv' => $new_diem_tkuv ]);

                    if($exist_DVdaDK != null) {
                        $exist_DVdaDK->update(['ngaydangky' => Carbon::now('Asia/Ho_Chi_Minh')]);
                    } else {
                        $ngayhethan = Carbon::now('Asia/Ho_Chi_Minh')->addDays($details['songayhieuluc']*$details['soluong']);
                        $dichVuDaDangKy = new DichVuDaDangKy;
                        $dichVuDaDangKy->id_ntd = Session::get('recruiter_id');
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
                        $dichVuDaDangKy->id_ntd = Session::get('recruiter_id');
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
                        $dichVuDaDangKy->id_ntd = Session::get('recruiter_id');
                        $dichVuDaDangKy->id_dichvu = $id_dichvu;
                        $dichVuDaDangKy->ngaydangky = Carbon::now('Asia/Ho_Chi_Minh');
                        $dichVuDaDangKy->ngayhethan = $ngayhethan;
                        $dichVuDaDangKy->save();
                    }

                }
            }
            $hinhthucthanhtoan = $donHang->hinhthucthanhtoan;
            $this->sendMail($taiKhoanNTD, $cart,$id_donhang,$hinhthucthanhtoan,$current_time, $view);
            Session::forget('cart');
            Session::forget('total_qtt');
            Session::forget('cart');
            Session::flash('payment_success', $payment_success);
            return redirect()->route('recruiter.buy_success');
        } else {
            return redirect()->back();
        }
    }
    // Lưu đơn hàng cần duyệt chuyển khoản
    public function saveOrderTransfer(Request $request){
        $cart = session()->get('cart');
        $current_time =  Carbon::now('Asia/Ho_Chi_Minh');


        if($cart != null && $request->payment_status == 2){
            $donHang = new DonHang;
            $donHang->ngaymua = $current_time;
            $donHang->hinhthucthanhtoan = 2;
            $donHang->trangthaidh = $request->payment_status;
            $donHang->id_ntd = Session::get('recruiter_id');
            $donHang->save();

            $id_donhang=$donHang->id_donhang;


            foreach ($cart as $id_dichvu => $details){
                $chiTietDonHang =  new ChiTietDonHang;
                $chiTietDonHang->id_dichvu = $id_dichvu;
                $chiTietDonHang->id_donhang = $id_donhang;
                $chiTietDonHang->soluong = $details['soluong'];
                $chiTietDonHang->dongia = $details['giadv'];
                $chiTietDonHang->thanhtien = $details['soluong']*$details['giadv'];
                $chiTietDonHang->save();
            }

            Session::forget('cart');
            Session::forget('total_qtt');
            Session::forget('cart');
            Session::flash('req_success',1);
            return redirect()->route('recruiter.buy_success');
        } else {
            return redirect()->back();
        }
    }
    // Hàm send mail hóa đơn
    public function sendMail(TaiKhoanNTD $taiKhoanNTD, $cart,$id_donhang,$hinhthucthanhtoan,$current_time, $view) {
        Mail::send($view, compact('taiKhoanNTD', 'cart', 'id_donhang','hinhthucthanhtoan', 'current_time'), function($email) use($taiKhoanNTD){
            $email->subject('LoopIT - Hóa đơn thanh toán dịch vụ');
            // $email->from('loopit.test@gmail.com','LoopIT');
            $email->to( $taiKhoanNTD->email , $taiKhoanNTD->tennlh);
        });
    }
    // Trang thông báo mua dịch vụ và thanh toán thành công
    public function getBuySuccess() {
        if(Session::get('payment_success') == 1 ){
            Session::forget('cart');
            Session::forget('total_qtt');
            Session::forget('cart');
            return view('pages.recruiter.buy-success');
        }else if(Session::get('req_success') == 1) {
            Session::forget('cart');
            Session::forget('total_qtt');
            Session::forget('cart');
            return view('pages.recruiter.buy-success');
        } else {
            return redirect()->back();
        }
    }
    // Trang danh sách lịch sử đơn hàng
    public function getHistoryOrders(){
        $id_ntd =  Session::get('recruiter_id');
        $exist_DH = DonHang::where('id_ntd','=',$id_ntd)->first();
        $listChiTietDH = DB::table('tbl_chitietdonhang')
        ->join('tbl_dichvu', 'tbl_dichvu.id_dichvu', '=', 'tbl_chitietdonhang.id_dichvu')
        ->join('tbl_donhang', 'tbl_donhang.id_donhang', '=', 'tbl_chitietdonhang.id_donhang')
        ->where('tbl_donhang.id_ntd', '=', $id_ntd)
        ->select('tbl_chitietdonhang.*', 'tbl_dichvu.*', 'tbl_donhang.*')
        ->get();
        $listDH = DonHang::where('id_ntd','=',$id_ntd)
        ->OrderBy('ngaymua','desc')->get();

        return view('pages.recruiter.history-orders')->with(compact('listDH','listChiTietDH','exist_DH'));
    }
}
