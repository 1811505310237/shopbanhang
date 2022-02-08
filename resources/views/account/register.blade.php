@extends('layouts.master')

@section('title')
    Đăng ký
@endsection

@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-md-4 col-sm-12 pb-1"></div>

            <div class="col-md-4 col-sm-12 pb-1">
                <h3 class="text-center">Đăng ký</h3>
                <form action="{{ route('fe.post.register') }}" method="POST">
                    <div class="form-group">
                        <label for="name">Họ tên: <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control"  id="name" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control"  id="email" name="email">
                        <!--Check Mail-->
                        <small id="mailcheck"></small>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu: <span class="text-danger">(*)</span></label>
                        <input type="password" class="form-control"  id="pwd" name="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pwdc">Xác nhận mật khẩu: <span class="text-danger">(*)</span></label>
                        <input type="password" class="form-control" id="pwdc" name="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                    @csrf
                </form>
            </div>
            
            <div class="col-md-4 col-sm-12 pb-1"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#email').blur(function (e) { 
            e.preventDefault();
            var email = $(this).val();
            var url = "{{ route('ajax.check.mail') }}";

            // Ajax check email tồn tại
            $.get(url,{email: email} ,function(data){
                if (data == 1) {
                    $('#mailcheck').html('Mail đã tồn tại!');
                    $('#mailcheck').css('color','red');
                }else{
                    $('#mailcheck').html('');
                }
            });
        });
    </script>
@endsection