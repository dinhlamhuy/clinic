<!DOCTYPE html>

<head>

    <link rel="shortcut icon" href="{{ asset('staff/images/logo.png') }}" type="image/png">
    <title>Đăng nhập hệ thống</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('staff/login/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('staff/login/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('staff/login/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('login/css/font.css') }}" type="text/css" />
    <link href="{{ asset('staff/login/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{ asset('vendor/jquery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <style>

    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-6 ">
			<img src="{{asset('staff/images/logo.png')}}" alt="" width="200px">
			<h1 class="display-1" style="margin-top:20px; margin-left:30px; color:white; font-weight:bold;">Hệ thống quản lý phòng khám đa khoa</h1>
			<h1 class="display-1" style="margin-top:20px; margin-left:410px; color:white; font-weight:bold;">PHƯƠNG NGÂN</h1>
			<center><h3 class="display-1" style="margin-top:40px; color:white; font-weight:bold;">-- Tận tâm phục vụ --</h3></center>
        </div>
        <div class="col-md-6">

            <div class="log-w3">
			<div class="w3layouts-main"> 
          
							<h2 style="font-weight:bold;color:white;">Đăng nhập</h2>
							<?php
							$mess = session()->get('mess');
							if ($mess) {
								echo '<center><span style="color:white; width:500px;text-algin:center;">' . $mess . '</span></center>';
								session()->put('mess', null);
							}
							?>
							<form action="{{ URL::to('/staff/logging_in') }}" method="post">
								@csrf
								<input type="text" class="ggg" name="tentaikhoan" placeholder="Tài khoản" value=""
									required>
								<input type="password" id="matkhau" class="ggg" name="matkhau" placeholder="Mật khẩu"
									value="" required>
								<label for="check" style="color: white"><input type="checkbox" id="check" /> Hiện mật
									khẩu</label>
								{{-- <h6><a href="#">Quên mật khẩu?</a></h6> --}}
								<div class="clearfix"></div>
								<input type="submit" value="Đăng nhập" name="login">
							</form>

				
            </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('staff/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('staff/login/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('staff/login/js/scripts.js') }}"></script>
    <script src="{{ asset('staff/login/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('staff/login/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('staff/login/js/jquery.scrollTo.js') }}"></script>
    <script>
        $('#check').click(function() {
            if ('password' == $('#matkhau').attr('type')) {
                $('#matkhau').prop('type', 'text');
            } else {
                $('#matkhau').prop('type', 'password');
            }
        });
    </script>
</body>

</html>
