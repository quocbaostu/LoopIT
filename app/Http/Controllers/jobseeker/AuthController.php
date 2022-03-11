<?php

namespace App\Http\Controllers\jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Mail;
use Validator;
use App\Rules\Captcha;
use Illuminate\Support\Str;

use App\Models\jobseeker\TkUngvien;

class AuthController extends Controller
{
    public function getLogin(){
        return view('pages/jobseeker/auth/js_login');
    }

    public function getSignup(){
        return view('pages/jobseeker/auth/js_signup');
    }

    public function getResendVeri(){
        return view('pages/jobseeker/auth/js_resendveri');
    }

    public function getForgotpass(){
        return view('pages/jobseeker/auth/js_forgotpass');
    }

    public function postLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required',
            'password' => 'bail|required'
        ],
        [
            'email.required'=> 'Vui lòng nhập email',
            'password.required'=> 'Vui lòng nhập mật khẩu'
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if($validator->passes()){
            $email = $request->email;
            $password = $request->password;

            $gettkungvien = TkUngvien::where('email', '=', $email)->first();

            if($gettkungvien == null){
                Session::flash('message_email', 'null');
                return redirect()->route('js_getLogin')->withInput();
            }
            else {
                $check_veri = $gettkungvien->trangthaitk;
                if($check_veri == 0){
                    Session::flash('message_veri_alert','null');
                    return redirect::back()->withInput();
                }
                else{
                    if(Hash::check($password, $gettkungvien->matkhau)){
                        Session::put('js_name', $gettkungvien->ten);
                        Session::put('js_id', $gettkungvien->id_uv);
                        Session::put('js_email',$gettkungvien->email);
                        return redirect()->route('Home');
                    }
                    else {
                        Session::flash('message_password', 'null');
                        return redirect()->route('js_getLogin')->withInput();
                    }
                }
            }
        }
    }

    public function sendVerimail($Tkungvien, $token){
        Mail::send('pages.jobseeker.auth.js_mail', compact('Tkungvien', 'token'), function($email) use($Tkungvien){
            $email->subject('Mail xác thực');
            $email->to($Tkungvien->email, $Tkungvien->ten);
        });
    }

    public function postSignup(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required',
            'ten' => 'bail|required',
            'ho' => 'bail|required',
            'password' => 'bail|required|min:6|max:18',
            'password_confirmation' => 'bail|required|same:password',
            'g-recaptcha-response'=> new Captcha(),
        ],
        [
            'email.required'=> 'Thông tin Email không được bỏ trống',
            'ten.required'=> 'Thông tin Tên không được bỏ trống',
            'ho.required'=> 'Thông tin Họ không được bỏ trống',
            'password.required'=> 'Mật khẩu không được bỏ trống',
            'password.min'=> 'Mật khẩu tối thiểu 6 ký tự',
            'password.max'=> 'Mật khẩu tối đa 18 ký tự',
            'password_confirmation.required'=> 'Xin hãy xác nhận mật khẩu',
            'password_confirmation.same'=> 'Mật khẩu xác nhận không trùng khớp'
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            do{
                $number = rand(1,200);
                $id_uv = 'uv'.$number;
                $id_check = TkUngvien::where('id_uv', $id_uv)->first();
            }while($id_check !=null);

            $email_check = TkUngvien::where('email', '=', $request->email)->first();
            if ($email_check  != null ){
                Session::flash('message_email', 'Email này đã được sử dụng!');
                return redirect::back()->withInput();
            }else{
                $token = Str::random(10);

                $Tkungvien = new TkUngvien();
                $Tkungvien->id_uv =  $id_uv;
                $Tkungvien->email = $request->email;
                $Tkungvien->ten = $request->ten;
                $Tkungvien->ho = $request->ho;
                $Tkungvien->matkhau = bcrypt($request->password);
                $Tkungvien->maxacnhan = $token;
                $Tkungvien->save();
                $this->sendVerimail($Tkungvien, $token);
                return view('pages/jobseeker/auth/js_authMessage')->with('message_veri_req', 'Email xác thực đã được gửi tới '.$Tkungvien->email.'.Vui lòng kiểm tra hòm thư!');
            }
        }
    }

    public function activeAccount(tkungvien $Tkungvien, $token) {
        if ($Tkungvien->trangthaitk == 1){
            return view('pages.jobseeker.auth.js_authMessage')->with('message_veried','Email đã được xác thực!');
        }
        if($Tkungvien->maxacnhan === $token){
            $Tkungvien->update(['trangthaitk'=> 1, 'maxacnhan'=> null]);
            return view('pages.jobseeker.auth.js_authMessage')->with('message_veri_suc','Email xác thực thành công!');
        }
        else {
            return view('pages.jobseeker.auth.js_authMessage')->with('message_veri_fail','Email xác thực không hợp lệ hoặc đã hết hạn!');
        }
    }

    public function postResendVeri(Request $request){
        $token = Str::random(10);
        $uv = TkUngvien::where('email', '=', $request->email)->first();
        if ($uv == null){
            Session::flash('message_invalid','null');
            return redirect::back()->withInput();
        }else{
            if($uv->trangthaitk == 1){
                Session::flash('message_verified','null');
                return redirect::back()->withInput();
            }else{
                if ($uv->solanxacnhan > 0){
                    $uv->maxacnhan = $token;
                    $uv->solanxacnhan--;
                    $uv->save();
                    $this->sendVerimail($uv,$token);
                    return view('pages/jobseeker/auth/js_authMessage')->with('message_veri_req','Một thư xác nhận đã được gửi đến '.$uv->email.'.Vui lòng kiểm tra hòm thư!');
                }
                else{
                    Session::flash('message_outtime','null');
                    return redirect::back()->withInput();
                }
            }
        }
    }

    public function postForgotpass(Request $request){
        $ungvien = TkUngvien::where('email', '=', $request->email)->first();
        if ($ungvien == null || $ungvien->trangthaitk == 0){
            Session::flash('message_invalid','null');
            return redirect::back()->withInput();
        }else{
            Mail::send('pages.jobseeker.auth.js_mail_changePass', compact('ungvien'), function($email) use($ungvien){
                $email->subject('Thay đổi mật khẩu');
                $email->to($ungvien->email, $ungvien->ten);
            });
            return view('pages/jobseeker/auth/js_authMessage')->with('message_veri_req','Một thư hướng dẫn thay đổi mật khẩu đã được gửi đến '.$ungvien->email.'.Vui lòng kiểm tra hòm thư!');
        }
    }

    public function getChangepass(tkungvien $ungvien){
        return view('pages/jobseeker/auth/js_changePass')->with(compact('ungvien', $ungvien));
    }

    public function postChangepass(tkungvien $ungvien, Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'bail|required|min:6|max:18',
            'password_confirm' => 'bail|required|same:password'
        ],
        [
            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.min'=> 'Mật khẩu phải tối thiểu 6 ký tự',
            'password.max'=> 'Mật khẩu phải tối đa 18 ký tự',
            'password_confirm.required'=> 'Vui lòng nhập mật khẩu xác nhận',
            'password_confirm.same'=> 'Mật khẩu xác nhận không trùng khớp'
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if($validator->passes()){
            $uv = TkUngvien::where('email', '=', $ungvien->email)->first();
            $uv->matkhau = bcrypt($request->password);
            $uv->save();
            return view('pages/jobseeker/auth/js_authMessage')->with('message_pass_changed','Cập nhật mật khẩu thành công!');
        }
    }


}
