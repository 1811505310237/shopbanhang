<div class="main-content">
    <ul>
        <li>Tiêu đề: <b>{{ $slide[0]->sd_title }}</b></li>
        <hr>
        <li>Link: <b>{{ $slide[0]->sd_link }}</b></li>
        <hr>
        <li>Banner:
            <img src="{{ url($slide[0]->sd_image) }}" alt="no_image" width="100px">
        </li>
        <hr>
        <li>Ngày tạo: {{ $slide[0]->created_at }}</li>
        <hr>
        <li>Ngày cập nhật: {{ $slide[0]->updated_at }}</li>
    </ul>
</div>