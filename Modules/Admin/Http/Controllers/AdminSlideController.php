<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSlideController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'slide']);

            return $next($request);
        });
    }
    #end active sidebar

    #Index
    public function index()
    {
        $slides = DB::table('slides')->get();
        return view('admin::slide.index', compact('slides'));
    }

    #Create
    public function create()
    {
        return view('admin::slide.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'sd_title'=>'required',
                'sd_link'=>'required',
            ],
            [
                'sd_title.required'=>'Bạn chưa nhập tiêu đề',
                'sd_link.required'=>'Bạn chưa nhập link',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('sd_image')) {
            $file = $request->sd_image;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = 'public/admin/no_image.jpg';
        }
        //end upload ảnh

        $data = $request->except('_token', 'sd_image');
        $data['sd_image'] = $thumbnail;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');

        $id = DB::table('slides')->insertGetId($data);
        if ($id) {
            return redirect()->back()->with('success', 'Thêm thành công');
        }
    }
    #Edit
    public function edit($id)
    {
        $slide = DB::table('slides')->where('id', $id)->get();
        return view('admin::slide.edit', compact('slide'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'sd_title'=>'required',
                'sd_link'=>'required',
            ],
            [
                'sd_title.required'=>'Bạn chưa nhập tiêu đề',
                'sd_link.required'=>'Bạn chưa nhập link',
            ]
        );

        //Xử lý upload ảnh
        if ($request->hasFile('sd_image')) {
            $file = $request->sd_image;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(4).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            
        }else{
            $thumbnail = $request->sd_old_image;
        }
        //end upload ảnh


        $data = $request->except('_token', 'sd_old_image', 'id');
        $data['sd_image'] = $thumbnail;
        
        if ($data) {
            DB::table('slides')->where('id', $request->id)->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    #Delete
    public function delete($id)
    {
        if ($id) {
            DB::table('slides')->delete($id);
            return redirect()->back()->with('success', 'Đã xóa thành công');
        }
    }



    #Ajax
    public function ajaxDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $slide = DB::table('slides')->where('id', $id)->get();

            $html = view('admin::ajax.detailSlide', compact('slide'))->render();
            $data =['html'=>$html];
            return $data;
        }
    }
}
