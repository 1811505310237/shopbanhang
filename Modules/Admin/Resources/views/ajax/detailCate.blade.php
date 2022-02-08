<div class="main-content">
    <ul>
        <li>Tên danh mục: {{ $category[0]->c_name }}</li>
        <hr>
        <li>Mô tả ngắn: {{ $category[0]->c_desc }}</li>
        <hr>
        <li>Ảnh:
            <img src="{{ url($category[0]->c_avatar) }}" alt="no_image" width="100px">
        </li>
        <hr>
        <li>Ngày tạo: {{ date('d/m/Y', strtotime($category[0]->created_at)) }}</li>
        <hr>
        <li>Ngày cập nhật: {{ date('d/m/Y', strtotime($category[0]->updated_at)) }}</li>
    </ul>
</div>