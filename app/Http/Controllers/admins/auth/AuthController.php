<?php

namespace App\Http\Controllers\admins\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;

use App\Models\admin\TaiKhoanAdmin;


class AuthController extends Controller
{
    public function getLogin(){
        return view('pages.admins.auth.login');
    }
    public function postLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'matkhau' => 'required|string|min:6',
        ],[
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'matkhau.required' => 'Mật khẩu không được để trống.',
            'matkhau.min' => 'Mật khẩu tối thiểu 6 ký tự.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->passes()) {
            $email = $request->email;
            $matkhau = $request->matkhau;

            $getTKAdmin =  TaiKhoanAdmin::where('email', '=', $email)->first();

            // $exists_TaiKhoan =  TaiKhoanAdmin::where('email', '=', $request->email)->where('matkhau','=',$request->matkhau)->first();


            if($getTKAdmin == null) {
                Session::flash('message_email_admin', 'Email không trùng khớp !!');
                return redirect()->route('admin.login')->withInput();
            } else {
                if (Hash::check( $matkhau, $getTKAdmin->matkhau)) {
                    Session::put('admin_name',$getTKAdmin->tenqtv);
                    Session::put('admin_id',$getTKAdmin->id_qtv);
                    return redirect()->route('admin.home');
                }else{
                    Session::flash('message_matkhau_admin', 'Mật khẩu không trùng khớp !!');
                    return redirect()->route('admin.login')->withInput();
                }
            }
        }
    }
    public function getLogout() {
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect()->route('admin.login');
    }
}
