@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Sản phẩm</h4>
    <div class="row">
        <div class="col-md-12 text-right mb-1">
            <a href="{{ route('admin.product.create') }}">
                <button class="btn btn-info"><i class="la la-plus"></i> Thêm mới</button>
            </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-0">
                    <form action="" method="GET">
                        <div class="form-group form-inline">
                            <div class="col-md-3 p-0 mr-1">
                                <input type="text" class="form-control input-full" placeholder="Tên sản phẩm" name="q">
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
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Sale</th>
                                <th scope="col">Status</th>
                                <th scope="col">Hot</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                        @if ($products->count() >0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ url($product->pro_avatar) }}" alt="" width="50px">
                                    </td>
                                    <td>{{ $product->pro_name }}</td>
                                    <td>{{ number_format($product->pro_price, 0, ',', '.') }}đ</td>
                                    <td>{{ $product->pro_sale }}(%)</td>
                                    <td>
                                        @if ($product->pro_active == 1)
                                            <a href="{{ route('admin.product.active', $product->id) }}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.product.active', $product->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif 
                                    </td>
                                    <td>
                                        @if ($product->pro_hot == 1)
                                            <a href="{{ route('admin.product.hot', $product->id) }}">
                                                <span class="badge badge-success">Hot</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.product.hot', $product->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                            <i class="la la-pencil-square-o"></i>
                                        </a>

                                        <a href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc muốn xóa không?');">
                                            <i class="la la-trash-o"></i>
                                        </a>
                                    
                                        <button data-proName="{{ $product->pro_name }}"  data-href="{{ route('ajax.admin.product.detail', $product->id) }}" class="btn btn-info btn-sm proDetail">
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
                   {{ $products->links() }}
                </div>
            </div>
        </div>
            
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="proModal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết: <b class="proName">product name</b></h4>
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
        $('.proDetail').click(function (e) { 
            e.preventDefault();
            url = $(this).attr('data-href');
            proName = $(this).attr('data-proName');
            $('.proName').html(proName);

            $.post(url, function(data){
                $('#proModal .modal-body').html(data.html);
                //Hiện modal
                $("#proModal").modal();
            }); 
        });
    </script>
@endsection
