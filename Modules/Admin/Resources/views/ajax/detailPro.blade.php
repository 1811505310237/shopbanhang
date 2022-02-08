<div class="main-content">
    <ul>
        <li>Tên sản phẩm: <b>{{ $product[0]->pro_name }}</b></li>
        <hr>
        <li>Danh mục: <b>{{ $product[0]->c_name }}</b></li>
        <hr>
        <li>Mô tả ngắn: <b>{{ $product[0]->pro_desc }}</b></li>
        <hr>
        <li>Giá: <b>{{ number_format($product[0]->pro_price, 0, ',', '.') }}đ</b></li>
        <hr>
        <li>Sale: <b>{{ $product[0]->pro_sale }}(%)</b></li>
        <hr>
        <li>Giá sau Sale: <b>{{ number_format(price_after_sale($product[0]->pro_price, $product[0]->pro_sale), 0, ',', '.') }}đ</b></li>
        <hr>
        <li>Số lượng: <b>{{ $product[0]->pro_number }}</b></li>
        <hr>
        <li>Ảnh:
            <img src="{{ url( $product[0]->pro_avatar) }}" alt="no_image" width="100px">
        </li>
        <hr>
        <li>Ngày tạo: <b>{{ date('d/m/Y', strtotime($product[0]->created_at)) }}</b> </li>
        <hr>
        <li>Ngày cập nhật: <b>{{ date('d/m/Y', strtotime($product[0]->updated_at)) }}</b> </li>

    </ul>
</div>