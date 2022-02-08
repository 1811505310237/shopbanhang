<div class="main-content">
    <h6>Thông tin đơn hàng:</h6>
    <div class="row">
        <div class="col-md-6">
            <ul>
                <li>Họ và tên: <b>{{ $transaction[0]->tr_name }}</b></li>
                <li>Email: <b>{{ $transaction[0]->tr_email }}</b></li>
                <li>Số điện thoại: <b>{{ $transaction[0]->tr_phone }}</b></li>
            </ul>
        </div>
        <div class="col-md-6">
            <ul>
                <li>Địa chỉ giao hàng: <b>{{ $transaction[0]->tr_address }}</b></li>
                <li>Loại thanh toán: <b>{{ ($transaction[0]->tr_type==1)?'COD':'Online' }}</b></li>
                <li>Ngày mua hàng: <b>{{ $transaction[0]->created_at }}</b></li>
                <li>Ngày cập nhật: <b>{{ $transaction[0]->updated_at }}</b></li>
            </ul>
        </div>
    </div>
    <hr>
    <h6>Chi tiết đơn hàng:</h6>
    <table class="table table-bordered table-bordered-bd-warning mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Sales</th>
                <th scope="col">Giá</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($detailTran as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->pro_name }}</td>
                <td>{{ $item->od_qty }}</td>
                <td>{{ $item->od_sale }}%</td>
                <td>{{ number_format($item->od_price, 0, ',', '.') }}đ</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <span>Tổng tiền phải trả: <b>{{ number_format($transaction[0]->tr_total_money, 0, ',', '.') }}đ</b></span>
    <hr>
    <label for=""><b>Ghi chú:</b></label>
    <p>
        {{ $transaction[0]->tr_note }}
    </p>
</div>