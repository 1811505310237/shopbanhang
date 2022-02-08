@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Sửa sản phẩm</h4>
    <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thông tin cơ bản</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <!--ID-->
                            <input type="hidden" name="id" value="{{ $product[0]->id }}">

                            <label for="squareInput">Tên sản phẩm:</label>
                            <input type="text" class="form-control input-square" id="squareInput" name="pro_name" value="{{ $product[0]->pro_name }}">
                            @error('pro_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">Mô tả ngắn:</label>
                            <textarea class="form-control" id="comment" rows="2" name="pro_desc">{{ $product[0]->pro_desc }}</textarea>
                            @error('pro_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="squareInput">Danh mục:</label>
                                    <select class="form-control input-square" id="squareSelect" name="pro_category_id">
                                        @foreach ($categories as $category)
                                            <option {{ ($category->id == $product[0]->pro_category_id)? 'selected':'' }} value="{{ $category->id }}">
                                                {{ $category->c_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="squareInput">Số lượng:</label>
                                    <input type="number" min="0" class="form-control input-square" id="squareInput" name="pro_number" value="{{ $product[0]->pro_number }}">
                                </div>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="comment">Nội dung:</label>
                            <textarea class="form-control" id="pro_content" rows="4" name="pro_content">{{ $product[0]->pro_content }}</textarea>
                            @error('pro_content')
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
                            <input type="file" class="form-control-file" name="pro_avatar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <hr>
                            <label for="squareSelect" class="d-block">Preview:</label>
                            <img src="{{ url($product[0]->pro_avatar) }}" id="output" style="max-width: 125px; border: 1px solid gray; padding: 1px">
                            <!--OLD AVATAR-->
                            <input type="hidden" value="{{$product[0]->pro_avatar}}" name="pro_old_avatar">
                        </div>

                        <div class="form-group">
                            <label for="squareInput">Giá:</label>
                            <input type="number" class="form-control input-square" id="squareInput" name="pro_price" min="0" value="{{ $product[0]->pro_price }}">
                            @error('pro_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="squareInput">Sale:</label>
                            <input type="number" class="form-control input-square" id="squareInput" name="pro_sale" min="0" max="100" value="{{ $product[0]->pro_sale }}">
                            @error('pro_sale')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                                                        
                    </div>
                </div> 
            </div>

            <div class="col-md-12 text-center">
                <div class="card-action">
                    <button type="submit" class="btn btn-info"><i class="la la-save"></i> Cập nhật</button>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger"><i class="la la-reply"></i> Quay lại</a>
                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection
