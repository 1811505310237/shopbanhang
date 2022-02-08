<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{
    //
    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }

}
