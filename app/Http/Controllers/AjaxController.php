<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //
    public function checkmail(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->get('email');
            $check = DB::table('users')->where('email', $email)->get();
            $check = $check->count();

            return $check;
        }
        return view(404);
    }
}
