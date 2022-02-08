@extends('admin::layouts.master')


@section('content')
    <h4 class="page-title mb-1">Slide</h4>
    <div class="row">
        <div class="col-md-12 text-right mb-1">
            <a href="{{ route('admin.slide.create') }}">
                <button class="btn btn-info"><i class="la la-plus"></i> Thêm mới</button>
            </a>
            
        </div>
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <table class="table table-head-bg-info">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Status</th>
                                <th scope="col">Sắp xếp</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($slides->count() >0)
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>

                                    <td>{{ $slide->sd_title }}</td>

                                    <td>
                                        @if ($slide->sd_active == 1)
                                            <a href="{{ route('admin.slide.active', $slide->id) }}">
                                                <span class="badge badge-success">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.slide.active', $slide->id) }}">
                                                <span class="badge badge-default">None</span>
                                            </a>
                                        @endif 
                                    </td>
                                    
                                    <td>{{ $slide->sd_sort }}</td>

                                    <td>
                                        <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-warning btn-sm">
                                            <i class="la la-pencil-square-o"></i>
                                        </a>

                                        <a href="{{ route('admin.slide.delete', $slide->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc muốn xóa bản ghi?');">
                                            <i class="la la-trash-o"></i>
                                        </a>

                                        <button  data-href="{{ route('ajax.admin.slide.detail', $slide->id) }}" class="btn btn-info btn-sm slideDetail">
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
    <div class="modal fade" id="slideModal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết:</h4>
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
        $('.slideDetail').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-href');

            $.post(url, function(data){
                
                $('#slideModal .modal-body').html(data.html);
                $('#slideModal').modal();
            });
        });
    </script>
@endsection

