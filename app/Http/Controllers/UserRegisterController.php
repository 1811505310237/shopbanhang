<?php

namespace App\Http\Controllers;

use App\Mail\RegisterSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserRegisterController extends Controller
{
    //
    public function getFormRegister()
    {
        return view('account.register');
    }
    public function postFormRegister(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required|confirmed',
                'password_confirmation'=>'required',
            ],
            [
                'name.required'=>'Vui lòng nhập họ tên',
                'email.required'=>'Vui lòng nhập email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.confirmed'=>'Xác nhận mật khẩu không đúng',
                'password_confirmation.required'=>'Xác nhận mật khẩu',
            ]
        );
        
        $data = $request->except('_token', 'password_confirmation');
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['password'] = bcrypt($request->password);
        
        $id = DB::table('users')->insertGetId($data);


        if ($id) {
            $data =['name' => $request->name];
            Mail::to($request->email)->send(new RegisterSuccess($data));
            return redirect()->route('fe.get.login');
        }
    }
}
