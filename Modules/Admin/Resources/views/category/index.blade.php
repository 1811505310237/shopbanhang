@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Danh mục</h4>
    <div class="row">
        <div class="col-md-12 text-right mb-1">
            <a href="{{ route('admin.category.create') }}">
                <button class="btn btn-info"><i class="la la-plus"></i> Thêm mới</button>
            </a>
            
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-0">
                    <form action="" method="GET">
                        <div class="form-group form-inline">
                            <div class="col-md-3 p-0 mr-1">
                                <input type="text" class="form-control input-full" placeholder="Tên danh mục" name="q">
                            </div>
                            <button type="submit" class="btn btn-info">Tìm</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-info">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Status</th>
                                <th scope="col">Hot</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($categories->count() >0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <img src="{{ url($category->c_avatar) }}" alt="" width="50px">
                                    </td>
                                    <td>{{ $category->c_name }}</td>
                                    <td>
                                        @if ($category->c_status == 1)
                                            <a href="{{ route('admin.category.active', $category->id) }}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.category.active', $category->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif 
                                    </td>
                                    <td>
                                        @if ($category->c_hot == 1)
                                            <a href="{{ route('admin.category.hot', $category->id) }}">
                                                <span class="badge badge-success">Hot</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.category.hot', $category->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                            <i class="la la-pencil-square-o"></i>
                                        </a>

                                        <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc muốn xóa bản ghi?');">
                                            <i class="la la-trash-o"></i>
                                        </a>

                                        <button data-catename="{{ $category->c_name }}" data-href="{{ route('ajax.admin.category.detail', $category->id) }}" class="btn btn-info btn-sm cateDetail">
                                            <i class="la la-eye"></i>
                                        </button>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td>Không có bản ghi.</td>
                        @endif   
                            
                            
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
            
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="cateModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết danh mục: <b class="cateName"></b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    
                    
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.cateDetail').click(function (e) { 
            e.preventDefault();
            $this = $(this);
            url = $this.attr('data-href');
            name = $this.attr('data-catename');
            $('#cateModal .cateName').text(name);

            $.ajax({
            method: "POST",
            url: url,
            })
            .done(function(data) {
                //Set html cho selector và Show Modal
                $('#cateModal .modal-body').html(data);
                $("#cateModal").modal();
            });
        });
    </script>
@endsection
