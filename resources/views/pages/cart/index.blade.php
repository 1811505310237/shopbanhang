@extends('layouts.master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <!--Breadcrumb-->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('fe.home') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('fe.product.all') }}">Shop</a>
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-xl-5">
            @if ($listCart->count() >0)
                
                <!--Sản phẩm-->
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Cập nhật</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($listCart as $item)
                            
                                <tr>
                                    <td class="align-middle" style="max-width: 300px;">
                                        <img src="{{ asset($item->options->avatar) }}" alt="" width="50px">
                                        <a class="text-info" href="{{ route('fe.product.detail', [$item->options->slug, $item->id]) }}">{{ $item->name }}</a> 
                                    </td>
                                    <td class="align-middle">{{ number_format($item->price, 0, ',', '.') }}đ</td>

                                    <td class="align-middle ud">
                                        {{-- 111 --}}
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>

                                            <input type="text"  class="form-control form-control-sm bg-secondary border-0 text-center qty" value="{{ $item->qty }}" name="quantity">

                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </td>

                                    <td class="align-middle">
                                        <button data-proid="{{ $item->id }}" data-url="{{ route('ajax.shopping.get.update', $item->rowId) }}" class="btn btn-sm btn-info js-update-item">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                    </td>

                                    <td class="align-middle">{{ number_format($item->price * $item->qty, 0, ',', '.') }}đ
                                    </td>

                                    <td class="align-middle">

                                        <a href="{{ route('shopping.get.remove', $item->rowId) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach   
                        </tbody>
                    </table>
                </div>
                
                <!--Order-->
                <div class="col-lg-4">

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt</span>
                    </h5>

                    <div class="bg-light p-30 mb-5">

                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Tổng tiền</h6>
                                <h6>{{ Cart::subtotal(0, ',', '.') }}đ</h6>
                            </div>
                        </div>
                        
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng tiền</h5>
                                <h5>{{ Cart::subtotal(0, ',', '.') }}đ</h5>
                            </div>

                            <a href="{{ route('shopping.get.checkout') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                                Tiến hành thanh toán
                            </a>
                            
                        </div>

                    </div>
                </div>
            @else
                <div class="col-md-12 text-center">
                    <h4>Không có sản phẩm trong giỏ hàng, vui lòng mua hàng.</h4>
                    <i style="font-size: 70px" class="fas fa-cart-arrow-down"></i>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('input[name="quantity"]').keyup(function(e)
        {
        if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
        });
    </script>

    <script>
        $('.js-update-item').click(function (e) { 
            e.preventDefault();
            var url = $(this).attr('data-url');
            //Dùng quan hệ các phần tử với this để liên lạc
            var qty = $(this).closest('td').prev().children().children('.qty').val();
            var proID = $(this).attr('data-proid');

            $.post(url, {qty: qty, proID: proID}, function(data){
                if (data == 1) {
                    alert('Cập nhật thành công');
                    location.reload();
                }
                else
                if (data == 0) {
                    alert('Số lượng sản phẩm không đủ');
                    location.reload();
                }
            });
        });
    </script>
@endsection