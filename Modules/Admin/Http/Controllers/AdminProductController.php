<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'product']);

            return $next($request);
        });
    }
    #end active sidebar


    public function index()
    {
        $products = DB::table('products')
        ->orderByDesc('id')
        ->paginate(10);
        return view('admin::product.index', compact('products'));
    }

    #Create
    public function create()
    {
        $categories = DB::table('categories')->where('c_status', 1)->get();
        return view('admin::product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'pro_name'=>'required',
                'pro_desc'=>'required',
                'pro_content'=>'required',
                'pro_price'=>'required',
                'pro_sale'=>'required',
            ],
            [
                'pro_name.required'=>'Bạn chưa nhập tên sản phẩm',
                'pro_desc.required'=>'Bạn chưa nhập mô tả ngắn',
                'pro_content.required'=>'Bạn chưa nhập nội dung sản phẩm',
                'pro_price.required'=>'Bạn chưa nhập giá',
                'pro_sale.required'=>'Bạn chưa nhập % sale',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('pro_avatar')) {
            $file = $request->pro_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = 'public/admin/no_image.jpg';
        }
        //end upload ảnh

        $data = $request->except('_token');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['pro_avatar'] = $thumbnail;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        
        $id = DB::table('products')->insertGetId($data);
        if ($id) {
            return redirect()->back()->with('success', 'Thêm thành công.');
        }
    }

    #Edit
    public function edit($id)
    {
        $categories = DB::table('categories')->where('c_status', 1)->get();
        $product = DB::table('products')->where('id', $id)->get();

        return view('admin::product.edit', compact('product', 'categories'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'pro_name'=>'required',
                'pro_desc'=>'required',
                'pro_content'=>'required',
                'pro_price'=>'required',
                'pro_sale'=>'required',
            ],
            [
                'pro_name.required'=>'Bạn chưa nhập tên sản phẩm',
                'pro_desc.required'=>'Bạn chưa nhập mô tả ngắn',
                'pro_content.required'=>'Bạn chưa nhập nội dung sản phẩm',
                'pro_price.required'=>'Bạn chưa nhập giá',
                'pro_sale.required'=>'Bạn chưa nhập % sale',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('pro_avatar')) {
            $file = $request->pro_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = $request->pro_old_avatar;
        }
        //end upload ảnh

        $data = $request->except('_token', 'pro_old_avatar', 'id');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['pro_avatar'] = $thumbnail;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');

        if ($data) {
            DB::table('products')->where('id', $request->id)->update($data);
            return redirect()->route('admin.product.index')->with('success', 'Cập nhật thành công.');
        }

    }

    #Delete
    public function delete($id)
    {
        if ($id) {
            DB::table('products')->delete($id);
            return redirect()->back()->with('success', 'Xóa thành công.');
        }
    }

    #Active và Hot
    public function active($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        if ($product[0]->pro_active == 1) {
            DB::table('products')->where('id', $id)->update(['pro_active'=> 0]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        if ($product[0]->pro_active == 0) {
            DB::table('products')->where('id', $id)->update(['pro_active'=> 1]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        return view(404);
    }
    public function hot($id)
    {
        $product = DB::table('products')->where('id', $id)->get();
        if ($product[0]->pro_hot == 1) {
            DB::table('products')->where('id', $id)->update(['pro_hot'=> 0]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        if ($product[0]->pro_hot == 0) {
            DB::table('products')->where('id', $id)->update(['pro_hot'=> 1]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        return view(404);
    }



    #Detail Ajax
    public function ajaxDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = DB::table('products')
            ->join('categories', 'products.pro_category_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.c_name')
            ->get();

            $html = view('admin::ajax.detailPro', compact('product'))->render();
            $data = array('html' => $html, );
            return response($data);
        }
    }
}
