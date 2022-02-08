<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Trang quản trị hệ thống</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/assets/css/demo.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" type="image/x-icon">
    <!--Tiny MCE-->
    <script src="https://cdn.tiny.cloud/1/7msnnclop7cauv4nzykim0zpeqkkpy4iigp7eu02zprsb4z0/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        var editor_config = {
          path_absolute : "http://localhost/multishop.vn/",
          selector: "#pro_content",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };
      
        tinymce.init(editor_config);
    </script>
</head>
<body>
    <!--Active Sidebar-->
    @php
        $module_active = session('module_active');
    @endphp
    <!--End Active Sidebar-->

	<div class="wrapper">
		<div class="main-header">
            <!--Logo-->
			@include('admin::layouts.logo')

            <!--Nav (Header)-->
			@include('admin::layouts.header')

            <!--Sidebar-->
			@include('admin::layouts.sidebar')

			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">

                        <!--Thông báo-->
                        <div class="row">
                            <div class="col-md-12">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success')}}</div>
                                @endif
                                @if(Session::has('err'))
                                <div class="alert alert-danger">{{ Session::get('err')}}</div>
                                @endif
                            </div>
                        </div>
                        
                        <!--Main content Start width row-->
						@yield('content')
						
					</div>
				</div>

                <!--Begin Footer-->
				

			</div>
		</div>
	</div>

	
</body>
<script src="{{ asset('public/admin/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/chartist/chartist.min.js') }}"></script>
{{-- <script src="{{ asset('public/admin/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script> --}}
<script src="{{ asset('public/admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{asset('public/admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{ asset('public/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/ready.min.js') }}"></script>
<!--TOKEN FOR AJAX-->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
</html>
