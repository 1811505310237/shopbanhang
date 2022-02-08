<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'transaction']);

            return $next($request);
        });
    }
    #end active sidebar

    #Index
    public function index()
    {
        $transactions = DB::table('transactions')->orderByDesc('id')->paginate(10);
        return view('admin::transaction.index', compact('transactions'));
    }

    #Ajax chi tiết đơn hàng
    public function ajaxDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $transaction = DB::table('transactions')->where('id', $id)->get();

            $detailTran = DB::table('orders')
            ->join('products', 'orders.od_product_id', '=', 'products.id')
            ->select('orders.*', 'products.pro_name')
            ->where('od_transaction_id', $id)
            ->get();

            $html = view('admin::ajax.detailTran', compact('detailTran', 'transaction'))->render();
            return response($html);
        }
        return view(404);
    }
    
    #Action 
    public function action($action, $id)
    {
        switch ($action) {
            case 'xoa':
                if ($id) {
                    DB::table('transactions')->where('id', $id)->delete();
                    DB::table('orders')->where('od_transaction_id', $id)->delete();
                    return redirect()->back()->with('success', 'Đã xóa thành công');
                }
                break;
            
            case 'xuly':
                DB::table('transactions')->where('id', $id)->update(['tr_status'=>1, 'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')]);
                return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng');
                break;
            
            case 'danggiao':
                DB::table('transactions')->where('id', $id)->update(['tr_status'=>2, 'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')]);
                return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng');
                break;
            
            case 'dagiao':
                DB::table('transactions')->where('id', $id)->update(['tr_status'=>3, 'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')]);
                return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng');
                break;
            
            case 'huy':
                DB::table('transactions')->where('id', $id)->update(['tr_status'=>-1, 'updated_at'=> Carbon::now('Asia/Ho_Chi_Minh')]);
                return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng');
                break;
            
            default:
                return view(404);
                break;
        }
        return view(404);
    }
}
