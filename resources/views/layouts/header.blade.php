<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">

        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">Về chúng tôi</a>
                <a class="text-body mr-3" href="">Liên hệ</a>
            </div>
        </div>

        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">

                @if (get_data_user('web', 'id'))
                    <!--Has Login-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Xin chào: Sret Ksor!</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="" class="dropdown-item">Quản lý tài khoản</a>
                            <a href="{{ route('fe.get.logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                @else
                    <!--Not Login-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> Tài khoản</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('fe.get.login') }}" class="dropdown-item">Đăng nhập</a>
                            <a href="{{ route('fe.get.register') }}" class="dropdown-item">Đăng kí</a>
                        </div>
                    </div>
                @endif
                
            </div>

            <!--Cart-->
            <div class="d-inline-flex align-items-center d-block d-lg-none">

                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>

                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">{{ Cart::count() }}</span>
                </a>

            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4"> 
            <!--Logo-->
            <a href="{{ route('fe.home') }}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <!--Search-->
            <form action="" id="homeSearch">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">

                    <div class="input-group-append" style="cursor: pointer" onclick="homeSearch()">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Hỗ trợ khách hàng</p>
            <h5 class="m-0">0343 191 473</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <!--Danh mục-->
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>

            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    
                    @foreach ($categories as $cate)
                        <a href="{{ route('fe.product.by.category', $cate->c_slug.'-'.$cate->id) }}" class="nav-item nav-link">{{ $cate->c_name }}</a>
                    @endforeach

                </div>
            </nav>
        </div>
        <!--End col 3-->

        <div class="col-lg-9">
            
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <!--Logo Mobile-->
                <a href="{{ route('fe.home') }}" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--End Logo Mobile-->

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">

                        {{-- <a href="{{ route('fe.home') }}" class="nav-item nav-link active">Trang chủ</a> --}}
                        <a href="{{ route('fe.home') }}" class="nav-item nav-link">Trang chủ</a>
                        <a href="{{ route('fe.product.all') }}" class="nav-item nav-link">Shop</a>
                        <a href="" class="nav-item nav-link">Giới thiệu</a>
                        <a href="" class="nav-item nav-link">Liên hệ</a>
                        <a href="" class="nav-item nav-link">Hướng dẫn</a>
                        
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        
                        <!--CART-->
                        <a href="" class="btn px-0 ml-2">
                            <i class="fas fa-heart text-dark"></i>
                            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>

                        <a href="{{ route('shopping.get.index') }}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{ Cart::count() }}</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->