@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Thành viên</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-0">
                    <form action="" method="GET">
                        <div class="form-group form-inline">
                            <div class="col-md-3 p-0 mr-1">
                                <input type="text" class="form-control input-full" placeholder="Tên thành viên" name="q">
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
                                <th scope="col">Họ tên</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Status</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($users->count() >0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <a href="{{ route('admin.user.active', $user->id) }}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.user.active', $user->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif 
                                    </td>
                                   
                                    <td>

                                        <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc muốn xóa bản ghi?');">
                                            <i class="la la-trash-o"></i>
                                        </a>

                                        <button data-href="{{ route('ajax.admin.user.detail', $user->id) }}" class="btn btn-info btn-sm userDetail">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
            
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="userModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết thành viên: <b class="userName"></b></h4>
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
        $('.userDetail').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-href');

            $.post(url, function(data){
                
                $('#userModal .modal-body').html(data);
                $('#userModal').modal();
            });
        });
    </script>
@endsection
