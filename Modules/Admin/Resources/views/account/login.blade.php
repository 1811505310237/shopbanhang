<!doctype html>
<html lang="en">
    <head>
        <title>Đăng nhập hệ thống</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('public/admin/acc/css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" type="image/x-icon">
    </head>
    <body>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                   
                    <div class="col-md-6 col-lg-5">
                        @if(Session::has('err'))
                        <div class="alert alert-danger">
                            {{ Session::get('err')}}
                        </div>
                        @endif
                        <div class="login-wrap p-4 p-md-5">
                            <div style="background: #3d464d !important" class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <h3 style="color: #3d464d !important" class="text-center mb-4">Đăng nhập hệ thống quản trị</h3>
                            <form action="#" class="login-form" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control rounded-left" placeholder="Email" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control rounded-left" placeholder="Mật khẩu" name="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button style="background: #3d464d !important" type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('public/admin/acc/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/admin/acc/js/popper.js') }}"></script>
        <script src="{{ asset('public/admin/acc/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/admin/acc/js/main.js') }}"></script>
    </body>
</html>