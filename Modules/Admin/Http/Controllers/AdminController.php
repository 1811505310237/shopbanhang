<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'dashboard']);

            return $next($request);
        });
    }
    #end active sidebar


    #Dashboard
    public function index()
    {
        $doanhthu = DB::table('transactions')->where('tr_status', 3)->sum('tr_total_money');
        $thanhvien = DB::table('users')->count('id');
        $sanpham = DB::table('products')->count('id');
        $tongdonhang = DB::table('transactions')->count('id');

        return view('admin::index', compact('doanhthu', 'thanhvien', 'sanpham', 'tongdonhang'));
    }
}
