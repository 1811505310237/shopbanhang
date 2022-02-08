<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'category']);

            return $next($request);
        });
    }
    #end active sidebar


    #Index
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin::category.index', compact('categories'));
    }

    #Create
    public function create()
    {
        return view('admin::category.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'c_name'=>'required|unique:categories,c_name',
                'c_desc'=>'required',
            ],
            [
                'c_name.required'=>'Tên không để trống.',
                'c_name.unique'=>'Tên đã tồn tại.',
                'c_desc.required'=>'Mô tả không để trống.',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('c_avatar')) {
            $file = $request->c_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = 'public/admin/no_image.jpg';
        }
        //end upload ảnh

        $data = $request->except('_token');
        $data['c_avatar'] = $thumbnail;
        $data['c_slug']   = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        
        $id = DB::table('categories')->insertGetId($data);
        if ($id) {
            return redirect()->back()->with('success', 'Thêm thành công.');
        }
    }


    #Ajax Detail
    public function ajaxDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $category = DB::table('categories')->where('id', $id)->get();

            $html = view('admin::ajax.detailCate', compact('category'))->render(); //có thể dùng render or ko.
            //$data = array('html' => $html ); nếu nhiều biến thì gom zô mảng. Ko thì trả về luôn 1 biến thôi.
            return response($html);
        }
        return view(404);
    }

    #Edit
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->get();
        return view('admin::category.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'c_name'=>'required',
                'c_desc'=>'required',
            ],
            [
                'c_name.required'=>'Tên không để trống.',
                'c_desc.required'=>'Mô tả không để trống.',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('c_avatar')) {
            $file = $request->c_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = $request->c_old_avatar;
        }
        //end upload ảnh

        $id = $request->id;
        $data = $request->except('_token', 'id', 'c_old_avatar');
        $data['c_avatar'] = $thumbnail;
        if ($data) {
            DB::table('categories')->where('id', $id)->update($data);
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
        }
    }


    #Delete
    public function delete($id)
    {
        if ($id) {
            DB::table('categories')->delete($id);
            return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
        }
    }

    #Active and Hot
    public function active($id)
    {
        $category = DB::table('categories')->where('id', $id)->get();
        if ($category[0]->c_status == 1) {
            DB::table('categories')->where('id', $id)->update(['c_status'=> 0]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        if ($category[0]->c_status == 0) {
            DB::table('categories')->where('id', $id)->update(['c_status'=> 1]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        return view(404);
    }

    public function hot($id)
    {
        $category = DB::table('categories')->where('id', $id)->get();
        if ($category[0]->c_hot == 1) {
            DB::table('categories')->where('id', $id)->update(['c_hot'=> 0]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        if ($category[0]->c_hot == 0) {
            DB::table('categories')->where('id', $id)->update(['c_hot'=> 1]);
            return redirect()->back()->with('success', 'Thao tác thành công');
        }
        return view(404);
    }

}
