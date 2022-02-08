<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('public/admin/assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ get_data_user('admins', 'name') }}
                        <span class="user-level">Administrator</span>
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>

        <!--Begin Sidebar-->
        <ul class="nav">
            <li class="nav-item {{ ($module_active == 'dashboard')?'active':''}}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Tổng quan</p>
                </a>
            </li>

            <li class="nav-item {{ ($module_active == 'category')?'active':''}}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="la la-code"></i>
                    <p>Danh mục</p>
                </a>
            </li>
            
            <li class="nav-item {{ ($module_active == 'product')?'active':''}}">
                <a href="{{ route('admin.product.index') }}">
                    <i class="la la-code"></i>
                    <p>Sản phẩm</p>
                </a>
            </li>
            <li class="nav-item {{ ($module_active == 'slide')?'active':''}}">
                <a href="{{ route('admin.slide.index') }}">
                    <i class="la la-code"></i>
                    <p>Slides</p>
                </a>
            </li>
            <li class="nav-item {{ ($module_active == 'user')?'active':''}}">
                <a href="{{ route('admin.user.index') }}">
                    <i class="la la-user"></i>
                    <p>Thành viên</p>
                </a>
            </li>

            <li class="nav-item {{ ($module_active == 'transaction')?'active':''}}">
                <a href="{{ route('admin.transaction.index') }}">
                    <i class="la la-shopping-cart"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            <li class="nav-item {{ ($module_active == 'pageStatic')?'active':''}}">
                <a href="">
                    <i class="la la-code"></i>
                    <p>Trang tĩnh</p>
                </a>
            </li>
            
            
        </ul>
    </div>
</div>