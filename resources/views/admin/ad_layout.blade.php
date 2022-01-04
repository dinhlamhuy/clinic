
<?php
                    $ad_id=session()->get('ad_id');
                    $ad_ten=session()->get('ad_ten');
                    $ad_tentaikhoan=session()->get('ad_tentaikhoan');
			?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- //bootstrap-css -->
<!-- logo -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" type="image/png">
<!-- select2 -->
<link rel="stylesheet" href="{{asset('vendor/select2-4.1.0-rc.0/dist/css/select2.min.css')}}">
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('admin/css/style_ad_layout.css')}}" rel="stylesheet"/>
@yield('admin_add_css')
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
<link href="{{asset('vendor/font-awesome/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="{{asset('vendor/morrisjs/lib/example.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}"> --}}

<!-- datatable -->
<link rel="stylesheet" href="{{asset('vendor/DataTables/datatables.min.css')}}">


<!-- calendar -->
<link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">
@yield('admin_add_title')

<script src="{{asset('vendor/jquery-3.6.0/jquery-3.6.0.min.js')}}"></script>
{{-- <script src="{{asset('vendor/morrisjs/raphael-min.js')}}"></script>
<script src="{{asset('vendor/morrisjs/morris.js')}}"></script> --}}
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="" class="logo" style="font-weight: bold;">
    PHƯƠNG NGÂN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown ">
            <a data-toggle="dropdown" class="dropdown-toggle pt-2 pb-2 pl-2 pr-2" href="#">
                <img alt="" src="{{asset('admin/images/logo.png')}}">
                <span class="username">{{ $ad_ten }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                {{-- <li><a href="#"><i class=" fa fa-suitcase"></i>Tài khoản</a></li> --}}
                <!-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                <li ><a href="{{url('/admin/logout')}}" style="font-size:15px;"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu " id="nav-accordion" style="margin-top:55px;">
                <li >
                    <a id="dashboard" href="{{URL::to('/admin/index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" id="quanlynhansu">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Quản lý nhân sự</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/admin/position')}}" id="quanlychucvu">Quản lý chức vụ</a></li>
                        <li><a href="{{URL::to('/admin/staff')}}" id="quanlynhanvien">Quản lý nhân viên</a></li>
                        <!-- <li><a href="grids.html">Grids</a></li> -->
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" id="quanlycanlamsang">
                        <i class="fa fa-bed" aria-hidden="true"></i>
                        <span>Quản lý cận lâm sàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/admin/group_subclinical')}}" id="quanlynhomcls">Quản lý nhóm CLS</a></li>
                        <li><a href="{{URL::to('/admin/subclinical')}}" id="quanlycls">Quản lý CLS</a></li>
                        <!-- <li><a href="grids.html">Grids</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{URL::to('/admin/clinic')}}" id="quanlyphongkham">
                        <i class="fa fa-bullhorn"></i>
                        <span>Quản lý phòng khám</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/patient')}}" id="danhsachbenhnhan">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Danh sách bệnh nhân</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" id="quanlybenh">
                        <i class="fa fa-book"></i>
                        <span>Quản lý bệnh</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('admin/group_diseases')}}" id="quanlynhombenh">Quản lý nhóm bệnh</a></li>
						<li><a href="{{URL::to('admin/diseases')}}" id="quanlyb">Quản lý bệnh</a></li>
						<li><a href="{{URL::to('admin/disease_symptoms')}}" id="quanlytcb">Quản lý t.chứng bệnh</a></li>
					
                    </ul>
                </li>
                
                <li class="sub-menu " >
                    <a href="javascript:;" id="quanlybhyt">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <span>Quản lý BHYT</span>
                    </a>
                    <ul class="sub">
						<li ><a href="{{url('/admin/object')}}" id="quanlydoituong">Quản lý đối tượng</a></li>
						<li><a href="{{url('/admin/interest')}}" id="quanlyquyenloi">Quản lý quyền lợi</a></li>
						<li><a href="{{url('/admin/issued')}}" id="quanlynoicap">Quản lý nơi cấp</a></li>
				
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" id="quanlykhambenh">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <span>Quản lý khám bệnh</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ url('/admin/nationality') }}" id="quanlyquoctich">Quản lý quốc tịch</a></li>
						<li><a href="{{ url('/admin/nation') }}" id="quanlydantoc">Quản lý dân tộc</a></li>
						<li><a href="{{ url('/admin/job') }}" id="quanlynghenghiep">Quản lý nghề nghiệp</a></li>
						{{-- <li><a href="" id="quanlychiso">Quản lý chỉ số</a></li>
						<li><a href="" id="quanlyloaihinhkham">Quản lý loại hình KB</a></li> --}}
						<li><a href="{{ url('/admin/city') }}" id="quanlythanhpho">Quản lý thành phố</a></li>
						<li><a href="{{ url('/admin/district') }}" id="quanlyhuyen">Quản lý quận / huyện</a></li>
						<li><a href="{{ url('/admin/wards') }}" id="quanlyxa">Quản lý xã / phường</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" id="quanlylichhen">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>Quản lý lịch hẹn</span>
                    </a>
                    <ul class="sub">
						<!-- <li><a href="" id="quanlybuoi">Quản lý buổi</a></li> -->
						{{-- <li><a href="" id="quanlychung">Quản lý khung giờ</a></li>
						<li><a href="" id="quanlytrangthailichhen">Quản lý trạng thái lịch hẹn</a></li> --}}
						<li><a href="{{ url('/admin/appointment_schedule') }}" id="quanlylhen">Quản lý lịch hẹn</a></li>
						<li><a href="{{ url('/admin/symptom') }}" id="quanlytrieuchung">Quản lý triệu chứng</a></li>
						<li><a href="{{ url('/admin/status_appchedule') }}" id="quanlytrangthailh">Quản lý trạng thái lịch hẹn</a></li>
                    </ul>
                </li>
                <li class="sub-menu " >
                    <a href="javascript:;" id="quanlythuocne">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span>Quản lý thuốc</span>
                    </a>
                    <ul class="sub">
						{{-- <li  ><a href="{{url('/admin/supplier')}}" id="quanlyncc">Quản lý nhà cung cấp</a></li> --}}
						{{-- <li><a href="{{url('/admin/import_medicine')}}" id="quanlyphieunhapthuoc">Quản lý lô nhập</a></li> --}}
						<li><a href="{{url('/admin/generic_drug')}}" id="quanlygocthuoc">Quản lý gốc thuốc</a></li>
						<li><a href="{{url('/admin/group_medicine')}}" id="quanlynhomthuoc">Quản lý nhóm thuốc</a></li>
						<li><a href="{{ url('/admin/using') }}" id="quanlycsd">Quản lý CSD</a></li>
						<li><a href="{{ url('/admin/drug_unit') }}" id="quanlydvtt">Quản lý DVTT</a></li>
                        <li><a href="{{URL::to('admin/list_medicine')}}" id="danhsachthuoc">Danh sách thuốc</a></li>
						{{-- <li><a href="{{url('/admin/medicine')}}" id="quanlythuoc">Quản lý thuốc</a></li> --}}
                    </ul>
                </li>
                <li class="sub-menu " >
                    <a href="javascript:;" id="quanlykho">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span>Quản lý kho hàng</span>
                    </a>
                    <ul class="sub">
						<li  ><a href="{{url('/admin/supplier')}}" id="quanlyncc">Quản lý nhà cung cấp</a></li>
						<li><a href="{{url('/admin/import_medicine')}}" id="quanlyphieunhapthuoc">Quản lý lô nhập</a></li>
						{{-- <li><a href="{{url('/admin/generic_drug')}}" id="quanlygocthuoc">Quản lý gốc thuốc</a></li> --}}
						{{-- <li><a href="{{url('/admin/group_medicine')}}" id="quanlynhomthuoc">Quản lý nhóm thuốc</a></li> --}}
						{{-- <li><a href="{{ url('/admin/using') }}" id="quanlycsd">Quản lý CSD</a></li> --}}
						{{-- <li><a href="{{ url('/admin/drug_unit') }}" id="quanlydvtt">Quản lý DVTT</a></li> --}}
						<li><a href="{{url('/admin/medicine')}}" id="quanlythuoc">Quản lý SL thuốc</a></li>
                    </ul>
                </li>
                
                {{-- <li class="sub-menu">
                    <a href="{{URL::to('/admin/schedule')}}" id="quanlylichtruc">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <span>Quản lý lịch trực</span>
                    </a>
                    <!-- <ul class="sub">
						<li><a href="" id="quanlybuoitruc">Quản lý buổi trực</a></li>
						<li><a href="" id="quanlylt">Quản lý lịch trực</a></li>
                    </ul> -->
                </li> --}}
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
@yield('admin_add_content')
</section>
 
</section>
<!--main content end-->
</section>

<script src="{{asset('vendor/jquery-3.6.0/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/table2excel/jquery.table2excel.min.js')}}"></script>
<script src="js/bootstrap.js"></script>
<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('vendor/DataTables/DataTables-1.11.2/js/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('vendor/select2-4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
<script src="{{asset('vendor/DataTables/DataTables-1.11.2/js/jquery.dataTables.min.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
{{-- <script src="{{asset('vendor/morrisjs/morris.js')}}"></script> --}}
{{-- <script src="{{asset('vendor/morrisjs/morris.min.js')}}"></script> --}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('admin_add_js')
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('admin/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
