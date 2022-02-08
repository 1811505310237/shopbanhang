@extends('layouts.master')

@section('title')
    Thanh toán
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('fe.home') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shopping.get.index') }}">Shop</a>
                    <span class="breadcrumb-item active">Thanh toán</span>
                </nav>
            </div>
        </div>
    </div>

    <!--Check Out-->
    <div class="container-fluid">
        <form action="{{ route('shopping.post.checkout') }}" method="POST">
            <div class="row px-xl-5">
                    
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" name="tr_name" value="{{ get_data_user('web', 'name') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="tr_email" value="{{ get_data_user('web', 'email') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="tr_phone" value="{{ get_data_user('web', 'phone') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="tr_address" value="{{ get_data_user('web', 'address') }}" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="tr_note" rows="3"></textarea>
                            </div>
                            
                            
                        </div>
                    </div>
                
                </div>

                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết đơn hàng</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Sản phẩm</h6>

                            @foreach ($listCart as $item)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->name }}</p>
                                    <b class="text-danger">X({{ $item->qty }})</b>
                                    <p>{{ number_format($item->price, 0, ',', '.') }}đ</p>
                                </div>
                            @endforeach

                        </div>
                        
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng tiền</h5>
                                <h5>{{ Cart::subtotal(0, ',', '.') }}đ</h5>
                            </div>
                        </div>

                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                        <div class="bg-light p-30">
                            
                            <button type="submit" name="tr_type" value="1" class="btn btn-block btn-primary font-weight-bold py-3">Thanh toán khi nhận hàng</button>
                        </div>
                    </div>
                </div>
                
            </div>
            @csrf
        </form>
    </div>
@endsection