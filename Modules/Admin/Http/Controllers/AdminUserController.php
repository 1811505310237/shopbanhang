<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'user']);

            return $next($request);
        });
    }
    #end active sidebar


    #Index
    public function index()
    {
        $users = DB::table('users')->orderByDesc('id')->paginate(10);
        return view('admin::user.index', compact('users'));
    }

    #Detail ajax
    public function ajaxDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = DB::table('users')->where('id', $id)->get();
            $html = view('admin::ajax.detailUser', compact('user'))->render();

            return response($html);
        }
        return view(404);
    }

    #Delete
    public function delete($id)
    {
        if ($id) {
            DB::table('users')->delete($id);
            return redirect()->back()->with('success', 'Đã xóa thành công');
        }
    }
}
