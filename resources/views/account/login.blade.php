@extends('layouts.master')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-md-4 col-sm-12 pb-1"></div>

            <div class="col-md-4 col-sm-12 pb-1">
                <h3 class="text-center">Đăng nhập</h3>
                <form action="{{ route('fe.post.login') }}" method="POST">
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
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                    <hr>

                    @csrf
                </form>
            </div>
            
            <div class="col-md-4 col-sm-12 pb-1"></div>
        </div>
    </div>
@endsection
