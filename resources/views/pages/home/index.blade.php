@extends('layouts.master')

@section('content')


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($slides as $key =>$item)

                        <li data-target="#header-carousel" data-slide-to="{{$key}}" class="{{ $key ==0?'active':'' }}"></li>
                        
                        @endforeach
                    </ol>
                    <div class="carousel-inner">

                        <!--Thêm class active nếu muốn nó active-->

                        @foreach ($slides as $key =>$item)
                            
                        <div class="carousel-item position-relative {{ $key ==0?'active':'' }}" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset($item->sd_image) }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ $item->sd_title }}</h1>
                                    
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua ngay</a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        
                    </div>
                </div>
            </div>

            <!--Sales Offer-->
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('public/fe/img/offer-1.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="{{ asset('public/fe/img/offer-2.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Chất lượng</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Ngày đổi trả</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Hỗ trợ</h5>
                </div>
            </div>

        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Danh mục</span></h2>
        <div class="row px-xl-5 pb-3">
        
            @foreach ($category as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <a class="text-decoration-none" href="{{ route('fe.product.by.category', $item->c_slug.'-'.$item->id) }}">
                        <div class="cat-item img-zoom d-flex align-items-center mb-4">
                            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img class="img-fluid" src="{{ url($item->c_avatar) }}" alt="">
                            </div>
                            <div class="flex-fill pl-3">
                                <h6>{{ $item->c_name }}</h6>
                                <small class="text-body">{{ qtyProduct($item->id) }} Sản phẩm</small>
                            </div>
                        </div>
                    </a>
                </div>
                <!--End col-3-->
            @endforeach
            
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm mới</span></h2>
        <div class="row px-xl-5">

           @foreach ($proNew as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ url($item->pro_avatar) }}" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="{{ route('shopping.get.add', $item->id) }}"><i class="fa fa-shopping-cart"></i>
                                </a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate d-block" href="{{ route('fe.product.detail', [$item->pro_slug, $item->id]) }}">{{ $item->pro_name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">

                                <div class="d-flex align-items-center justify-content-center mt-2">
                                        
                                    <h5>{{ number_format(price_after_sale($item->pro_price, $item->pro_sale), 0, ',', '.') }}đ</h5>
                                    <h6 class="text-muted ml-2"><del>{{ number_format($item->pro_price, 0, ',', '.') }}đ</del></h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
            
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{ url('public/fe/img/offer-1.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{ url('public/fe/img/offer-2.jpg') }}" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm nổi bật</span></h2>
        <div class="row px-xl-5">
            
            @foreach ($proHot as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ url($item->pro_avatar) }}" alt="">
                            <div class="product-action">

                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i>
                                </a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i>
                                </a>
                                
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('fe.product.detail', [$item->pro_slug, $item->id]) }}">{{ $item->pro_name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                        
                                    <h5>{{ number_format(price_after_sale($item->pro_price, $item->pro_sale), 0, ',', '.') }}đ</h5>
                                    <h6 class="text-muted ml-2"><del>{{ number_format($item->pro_price, 0, ',', '.') }}đ</del></h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small class="far fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div> 
            @endforeach
            
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-1.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-2.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-3.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-4.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-5.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-6.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-7.jpg') }}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{ url('public/fe/img/vendor-8.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection