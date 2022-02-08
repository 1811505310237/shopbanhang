<div class="main-content">
    <ul>
        <li>Họ tên: <b>{{ $user[0]->name }}</b></li>
        <hr>
        <li>Email: <b>{{ $user[0]->email }}</b></li>
        <hr>
        <li>Số điện thoại: <b>{{ $user[0]->phone }}</b></li>
        <hr>

        <li>Ảnh:
            <img src="{{ asset($user[0]->avatar) }}" alt="no_image" width="100px">
        </li>
        <hr>
        <li>Ngày tạo: <b>{{ $user[0]->created_at }}</b></li>
    </ul>
</div>
