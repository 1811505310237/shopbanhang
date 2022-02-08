@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Sửa slide</h4>
    <form action="{{ route('admin.slide.update') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thông tin cơ bản</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="squareInput">Tiêu đề: <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control input-square" id="squareInput" name="sd_title" value="{{ $slide[0]->sd_title }}">
                            @error('sd_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">Link:<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control input-square" id="squareInput" name="sd_link" value="{{ $slide[0]->sd_link }}">
                            @error('sd_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>                              
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comment">Target:</label>
                                    <select class="form-control input-square" id="squareSelect" name="sd_target">
                                        <option {{ ($slide[0]->sd_target == 1)?'selected':'' }} value="1">_blank</option>
                                        <option {{ ($slide[0]->sd_target == 2)?'selected':'' }} value="2">_self</option>
                                        <option {{ ($slide[0]->sd_target == 3)?'selected':'' }} value="3">_parent</option>
                                        <option {{ ($slide[0]->sd_target == 4)?'selected':'' }} value="4">_top</option>
                                    </select>
                                </div>      
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comment">Sort:</label>
                                    <input type="number" class="form-control input-square" id="squareInput" name="sd_sort" placeholder="0" value="{{ $slide[0]->sd_sort }}">
                                </div>      
                            </div>    
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
                            <label for="squareSelect">Banner</label>
                            <input type="file" class="form-control-file" name="sd_image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <hr>
                            <label for="squareSelect" class="d-block">Preview:</label>
                            <img src="{{ url( $slide[0]->sd_image) }}" id="output" style="max-width: 125px; border: 1px solid gray; padding: 1px">

                            <input type="hidden" value="{{ $slide[0]->sd_image }}" name="sd_old_image">
                            <input type="hidden" value="{{ $slide[0]->id }}" name="id">
                        </div>
                                                        
                    </div>
                </div> 
            </div>
            <div class="col-md-12 text-center">
                <div class="card-action">
                    <button type="submit" class="btn btn-info"><i class="la la-save"></i> Cập nhật</button>
                    <a href="{{ route('admin.slide.index') }}" class="btn btn-danger"><i class="la la-reply"></i> Quay lại</a>
                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection
