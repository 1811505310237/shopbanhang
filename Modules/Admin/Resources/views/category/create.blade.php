@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Thêm danh mục</h4>
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thông tin cơ bản</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="squareInput">Tên danh mục:</label>
                            <input type="text" class="form-control input-square" id="squareInput" name="c_name">
                            @error('c_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">Mô tả ngắn:</label>
                            <textarea class="form-control" id="comment" rows="4" name="c_desc"></textarea>
                            @error('c_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                              
                    </div>
                    
                </div> 
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Ảnh đại diện</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="squareSelect">Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="c_avatar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <hr>
                            <label for="squareSelect" class="d-block">Preview:</label>
                            <img src="{{ url('public/admin/no_image.jpg') }}" id="output" style="max-width: 125px; border: 1px solid gray; padding: 1px">
                        </div>
                                                        
                    </div>
                </div> 
            </div>
            <div class="col-md-12 text-center">
                <div class="card-action">
                    <button type="submit" class="btn btn-info"><i class="la la-plus"></i> Thêm mới</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-danger"><i class="la la-reply"></i> Quay lại</a>
                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection
