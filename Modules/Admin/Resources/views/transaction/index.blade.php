@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Đơn hàng</h4>
    <div class="row">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-0">
                    <form action="" method="GET">
                        <div class="form-group form-inline">
                            <div class="col-md-3 p-0 mr-1">
                                <input type="text" class="form-control input-full" placeholder="Tên khách hàng" name="q" id="keyword">
                            </div>
                            <button  type="submit" id="js-search" class="btn btn-info">Tìm</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-info">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Thành viên</th>
                                <th scope="col">Status</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        @if ($transactions->count() >0)
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    
                                    <td>{{ $transaction->tr_name }}</td>
                                    <td>{{ $transaction->tr_email }}</td>
                                    <td>{{ $transaction->tr_phone }}</td>
                                    <td>{{ number_format($transaction->tr_total_money, 0, ',', '.') }}đ</td>
                                    <td>
                                        @if ($transaction->tr_user_id !=0)
                                            <span class="badge badge-success">Thành viên</span>
                                        @else
                                            <span class="badge badge-default">Khách</span>
                                        @endif 
                                    </td>
                                    <td>
                                        @if ($transaction->tr_status == null)
                                            <span class="badge badge-default">Tiếp nhận</span>
                                        @endif 
                                        @if ($transaction->tr_status == 1)
                                            <span class="badge badge-warning">Chờ xử lý</span>
                                        @endif 
                                        @if ($transaction->tr_status == 2)
                                            <span class="badge badge-info">Đang giao hàng</span>
                                        @endif 
                                        @if ($transaction->tr_status == 3)
                                            <span class="badge badge-success">Đã giao hàng</span>
                                        @endif 
                                        @if ($transaction->tr_status == -1)
                                            <span class="badge badge-danger">Đã hủy</span>
                                        @endif 
                                    </td>
                                    
                                    <td>
                                        
                                        <button data-id="{{ $transaction->id }}" data-href="{{ route('ajax.admin.transaction.detail', $transaction->id) }}" class="btn btn-info btn-sm transactionDetail">
                                            <i class="la la-eye"></i>
                                        </button>
                                        
                                        <div class="dropdown" style="display: inline;">
                                            <button class=" btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Action</button>

                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <!--Truyền tên trạng thái để route xử lý switch case luôn-->
                                                <a onclick="return confirm('Bạn chắc muốn xóa đơn hàng?');" class="dropdown-item" href="{{ route('admin.transaction.action', ['xoa', $transaction->id]) }}">Xóa đơn hàng</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('admin.transaction.action', ['xuly', $transaction->id]) }}">Chờ xử lý</a>
                                                <a class="dropdown-item" href="{{ route('admin.transaction.action', ['danggiao', $transaction->id]) }}">Đang giao hàng</a>
                                                <a class="dropdown-item" href="{{ route('admin.transaction.action', ['dagiao', $transaction->id]) }}">Đã giao hàng</a>
                                                <a class="dropdown-item" href="{{ route('admin.transaction.action', ['huy', $transaction->id]) }}">Đã hủy</a>
                                            </ul>

                                        </div>

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
    <div class="modal fade" id="transactionModal">
        <div class="modal-dialog " style="max-width: 1000px">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết đơn hàng: #<b class="tranID">Mã đơn</b></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Phun AJAX vào đây
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
        $('.transactionDetail').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-href');
            var id = $(this).attr('data-id');
            $('#transactionModal .tranID').html(id);

            $.post(url, function(data){
                $('#transactionModal .modal-body').html(data);
                $('#transactionModal').modal();
            });

        });
    </script>

@endsection
