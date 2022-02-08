<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    //
    public function getFormLogin()
    {
        return view('account.login');
    }
    public function postFormLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'password.required'=>'Vui lòng nhập mật khẩu',
            ]
        );


        //Xử lý login
        $email = $request->email;
        $password = $request->password;

        //1. Kiểm tra email và password của user login vào hệ thống.
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            if (Auth::guard('web')->user()->status == 1) {
                return redirect()->route('fe.home');
            }
            else{
                Auth::guard('web')->logout();
                return redirect()->back()->with('err', 'Tài khoản của bạn đang bị khóa. Liên hệ quản trị viên để biết thêm thông tin.');
            }
        }
        else{
            return redirect()->back()->with('err', 'Email hoặc Mật khẩu không đúng.');
        }

    }
}
