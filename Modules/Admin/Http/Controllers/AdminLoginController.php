<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getFormLogin()
    {
        //nếu login rồi thì cho vào admin luôn.
        if (get_data_user('admins', 'id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin::account.login');
    }
    public function postFormLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'email.required'=>'Bạn chưa nhập email.',
                'password.required'=>'Bạn chưa nhập mật khẩu.',
            ]
        );

        $data = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('err', 'Email hoặc mật khẩu không đúng');
        }
    }
}
