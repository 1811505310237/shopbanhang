<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title', 'MultiShop')
    </title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Multishop.vn" name="keywords">
    <meta content="Multishop.vn" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('public/fe/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/fe/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('public/fe/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <style>
        nav ul.pagination {
        display: flex;
        justify-content: center;
    }
    </style>
    
    <!--Header-->
    @include('layouts.header')
    <!-- Header End -->
    
    <!--Thông báo-->    
    @if(Session::has('success'))
        <div class="container-fluid mb-3">
            <div class="row px-xl-5">
                <div class="col-md-12">
                    <div style="position: absolute; top: 0; right: 0; z-index: 999" class="alert alert-success">{{ Session::get('success')}}</div>
                </div>
            </div>
        </div>
    @endif
    @if(Session::has('err'))
        <div class="container-fluid mb-3">
            <div class="row px-xl-5">
                <div class="col-md-12">
                    <div style="position: absolute; top: 0; right: 0; z-index: 999" class="alert alert-danger">{{ Session::get('err')}}</div>
                </div>
            </div>
        </div>
    @endif
    
    <!--Content-->
    @yield('content')

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/fe/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('public/fe/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('public/fe/js/main.js') }}"></script>
    <script>
        function homeSearch() {
          document.getElementById("homeSearch").submit();
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    @yield('script')

</body>

</html>