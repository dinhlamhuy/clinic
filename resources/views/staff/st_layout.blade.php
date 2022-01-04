<?php
$p_ma = session()->get('p_ma');
$p_ten = session()->get('p_ten');
$nv_ma = session()->get('nv_ma');
$nv_ten = session()->get('nv_ten');
$cv_ma = session()->get('cv_ma');
$cv_ten = session()->get('cv_ten');
$nv_tentaikhoan = session()->get('nv_tentaikhoan');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- logo -->
    <link rel="shortcut icon" href="{{ asset('staff/images/logo.png') }}" type="image/png">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('staff/css/style_st_layout.css') }}">
    <link rel="stylesheet" href="{{ asset('staff/css/style.css') }}">
    <!-- datatable -->
    <link rel="stylesheet" href="{{asset('vendor/DataTables/datatables.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('vendor/DataTables/DataTables-1.11.2/css/jquery.datatables.min.css')}}"> -->
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/select2-4.1.0-rc.0/dist/css/select2.min.css') }}">
    <!-- ckeditor -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    @yield('st_add_css')
    @yield('st_title')
    <!-- <title>Hệ thống phòng khám</title> -->
</head>

<body>
    <div class="container-fluid">
        <div class="row navs">
            <div class="col-md-1 ">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <img src="{{ asset('staff/images/logo.png') }}" alt="" width="60px" class="ml-4">
            </div>
            <div class="col-md-11  navs">
                <div class="row">
                    <div class="col-md-12 navs1 ">
                        <div class="dropdown userdn float-right ">
                            <i style="color:#ffd700;">{{ 'P' . sprintf('%02d', $p_ma) . ' - ' . $p_ten }} | Xin
                                chào:&ensp;</i><span class=" dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $cv_ten . ' ' . $nv_ten }}
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="background-color: #97d4e8;">
                                {{-- <a class="dropdown-item" href="#">Thông tin cá nhân</a> --}}
                                <a class="dropdown-item" href="{{ url('/staff/st_logout') }}">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 navs2 pl-0">
                        <nav class="navbar navbar-expand-lg px-0 pt-0 pb-0">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    {{-- <li class="nav-item" id="home">

                                        <a class="nav-link link1 pl-1 mr-1" href="{{URL::to('/staff/index')}}">HOME</a>
                                    </li> --}}
                                    <li class="nav-item" id="receive">
                                        <?php if($p_ma=='1'){?>
                                        <a class="nav-link link1 ml-1 mr-1 "
                                            href="{{ URL::to('/staff/receive') }}">TIẾP NHẬN</a>

                                        <?php  } else {?>
                                        <a class="nav-link link1 ml-1 mr-1 disabled"
                                            onclick="return alert('Bạn không có thẩm quyền làm điều này!')" >TIẾP
                                            NHẬN</a>
                                        <?php }?>
                                    </li>
                                    <li class="nav-item" id="cashier">
                                        <?php if($p_ma=='2'){?>
                                        <a class="nav-link link1 ml-1 mr-1" href="{{ URL::to('/staff/cashier') }}">THU
                                            NGÂN</a>
                                        <?php  } else {?>
                                        <a class="nav-link link1 ml-1 mr-1 disabled"
                                            onclick="return alert('Bạn không có thẩm quyền làm điều này!')" >THU NGÂN</a>
                                        <?php }?>

                                    </li>
                                    <li class="nav-item" id="medical_examination">
                                        <?php if($p_ma=='4' || $p_ma=='5' || $p_ma=='6' || $p_ma=='7'){
                                          ?>
                                        <a class="nav-link link1 ml-1 mr-1"
                                            href="{{ URL::to('/staff/medical_examination') }}">KHÁM BỆNH</a>
                                      <?php } else {?>
                                        <a class="nav-link link1 ml-1 mr-1 disabled"
                                            onclick="return alert('Bạn không có thẩm quyền làm điều này!')" >KHÁM
                                            BỆNH</a>
                                        <?php }?>

                                    </li>
                                    <li class="nav-item" id="subclinical">
                                        <?php if(  $p_ma=='8' || $p_ma=='9'){?>
                                        <a class="nav-link link1 ml-1 mr-1"
                                            href="{{ URL::to('/staff/subclinical_examination') }}">CẬN LÂM SÀNG</a>
                                        <?php  } else {?>
                                        <a class="nav-link link1 ml-1 mr-1 disabled"
                                            onclick="return alert('Bạn không có thẩm quyền làm điều này!')" >CẬN LÂM
                                            SÀNG</a>
                                        <?php }?>

                                    </li>
                                    <li class="nav-item" id="medicine_supply">
                                        <?php if($p_ma=='3' ){?>
                                        <a class="nav-link link1 ml-1 mr-1"
                                            href="{{ URL::to('/staff/medicine_supply') }}">PHÁT THUỐC</a>
                                        <?php  } else {?>
                                        <a class="nav-link link1 ml-1 mr-1 disabled"
                                            onclick="return alert('Bạn không có thẩm quyền làm điều này!')" >PHÁT
                                            THUỐC</a>
                                        <?php }?>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('st_content')

    <script src="{{ asset('vendor/jquery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.11.2/js/dataTables.fixedColumns.min.js')}}"></script>
    <script src="{{asset('vendor/DataTables/DataTables-1.11.2/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/select2-4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('st_add_js')

</body>

</html>
