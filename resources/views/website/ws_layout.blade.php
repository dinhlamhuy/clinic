<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- logo -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('website/images/logo.png')}}" type="image/png">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- css -->
    @yield('ws_css')
    <link rel="stylesheet" href="{{asset('website/css/style_website_nav.css')}}">
    <!-- font -->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    <!-- aos -->
    <link rel="stylesheet" href="{{asset('vendor/aos-master/dist/aos.css')}}">
    @yield('ws_title')
    <!-- <title>Phòng khám đa khoa Tân Khánh</title> -->
</head>
<body>
  
<div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-3 ">
            <a href="{{URL::to('clinic')}}" style="margin-left:20px;"><img src="{{asset('website/images/logo.png')}}" alt="" class="w-75 logo"></a>
          </div>
          <div class="col-md-9">
            <div style=" margin-top:15px;">
              <a href="" class="text-decoration-none">
                <span class="nava">PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</span><br>
                <span class="b">Thành Phố Cần Thơ</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-7">
                <div class="mt-3">
                  <div class="row">
                    <div class="col-md-3">
                      <i class="fa fa-phone mt-2" aria-hidden="true" style="font-size:35px;margin-left:110px;color:#2698d6;"></i>
                    </div>
                    <div class="col-md-9">
                      <div style="margin-left:50px;">
                        <span class="chu">Đường dây nóng </span>
                        <hr class="mt-1 mb-1" style="float:left;width:120px;">
                        <br>
                        <span class="chu" style="float: left;">0292 246 999</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="mt-3">
                  <div class="row">
                    <div class="col-md-2">
                      <i class="fa fa-clock-o mt-2" aria-hidden="true" style="font-size:35px;margin-left:80px;color:#2698d6;"></i>
                    </div>
                    <div class="col-md-10 ">
                      <div style="margin-left:70px;">
                      <span class="chu">Tuyển dụng</span>
                        <hr class="mt-1 mb-1" style="float:left;width:120px;">
                        <br>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar sticky-top navbar-expand-lg  ">
    <div class="container-fluid  nav-container mx-auto">
      <div class="collapse navbar-collapse text-center mx-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item active ml-lg-2">
            <a class="nav-link muc"  href="{{URL::to('clinic')}}">TRANG CHỦ</a>
          </li>
          <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Giới thiệu</a>
                        </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" style="font-size:15px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              GIỚI THIỆU
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{URL::to('/clinic/overview')}}">Tổng quan phòng khám</a>
              <a class="dropdown-item" href="#">Chính sách chất lượng</a>
              <a class="dropdown-item" href="#">Tầm nhìn - Sứ mệnh - Giá trị</a>
              <a class="dropdown-item" href="#">Sơ đồ tổ chức</a>
              <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              THÔNG TIN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Công tác xã hội</a>
              <a class="dropdown-item" href="#">Tin tức y tế</a>
              <a class="dropdown-item" href="#">Thông báo</a>
              <a class="dropdown-item" href="#">Kiến thức y khoa</a>
              <a class="dropdown-item" href="#">Tin tuyển dụng</a>
              <!-- <a class="dropdown-item" href="">Danh sách câu hỏi</a> -->
              <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              HOẠT ĐỘNG
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Sự kiện - Hội thảo</a>
              <a class="dropdown-item" href="#">Khám sức khỏe nhân đạo</a>
              <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              BÁC SĨ - CHUYÊN KHOA
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Đội ngũ bác sĩ</a>
              <a class="dropdown-item" href="{{URL::to('/clinic/clinic_hours')}}">Lịch khám bệnh</a>
              <a class="dropdown-item" href="{{URL::to('/clinic/medical_specialty')}}">Chuyên khoa điều trị</a>
              <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              HỖ TRỢ BỆNH NHÂN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{URL::to('/clinic/clinic_hours')}}">Lịch khám bệnh</a>
              <a class="dropdown-item" href="{{URL::to('/clinic/clinic_hours')}}">Thời gian khám bệnh</a>
              <a class="dropdown-item" href="{{URL::to('/clinic/quitrinhkham')}}">Quy trình khám bệnh</a>
              <a class="dropdown-item" href="#">Đặt lịch khám</a>
              <a class="dropdown-item" href="#">Quyền và trách nhiệm của bệnh nhân</a>
              <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link muc dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              DỊCH VỤ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- <a class="dropdown-item" href="#">Điều trị nội trú</a>  -->
              <a class="dropdown-item" href="#">Khám sức khỏe tổng quát</a>
              <a class="dropdown-item" href="#">Danh mục dịch vụ</a>
              <a class="dropdown-item" href="#">Danh mục bảo hiểm y tế</a>
              <!-- <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>
          <!-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </li> -->
          <li class="nav-item">
            <a class="nav-link muc" href="#">LIÊN HỆ - GÓP Ý</a>
          </li>
        </ul>
      </div>
      <nav class="navbar navbar-light ">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search"  aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit" style="background-color:#89c2d9;color:#0077b6;">Tìm kiếm</button>
        </form>
      </nav>

    </div>
  </nav>
</div>
@yield('ws_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <hr class="hr">
        </div>
    </div>
</div>
{{-- phone --}}
<div class="hotline-phone-ring-wrap">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
		<a href="tel:0987654321" class="pps-btn-img">
			<img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="tel:0292 246 999">
			<span class="text-hotline">0292 246 999</span>
		</a>
	</div>
</div>
{{-- ---- --}}



<div class="container-fluid">
    <div class="row row1">
        <div class="col-md-3 lienhe" style="padding-left:130px">
            <p style="font-size: 20px; font-weight:bold">Giới thiệu</p>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Phòng khám đa khoa Phương Ngân</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Công nghệ đột phá</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Hợp tác nghiên cứu</a>
        </div>
        <div class="col-md-3 lienhe" style="padding-left:130px">
            <p style="font-size: 20px; font-weight:bold">Dịch vụ</p>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Dịch vụ cấp cứu 24/24</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Dịch vụ khám theo yêu cầu</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Dịch vụ điều trị nội trú</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Khám sức khỏe tổng quát</a>
        </div>
        <div class="col-md-3 lienhe" style="padding-left:130px">
            <p style="font-size: 20px; font-weight:bold">Hướng dẫn khách hàng</p>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Hướng dẫn khám bệnh</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đặt lịch khám</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tra cứu kết quả</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sống khỏe & dinh dưỡng</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Chính sách bảo mật</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Chính sách phòng khám</a>
        </div>
        <div class="col-md-3 lienhe " style="padding-left:130px">
            <p style="font-size: 20px; font-weight:bold">Hỏi và đáp</p>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Thông báo</a><br>
            <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Bảo hiểm y tế</a>
        </div>
    </div>
    <div class="row " style="background-color:#e5e5e5;">
      <div class="col-md-2">
        <img src="{{asset('website/images/logo.png')}}" alt="" style="margin-left:120px;" class="w-50">
      </div>
        <div class="col-md-7">
            <span style="font-weight:bold;padding-top:2px; color:#0466c8;"><i class="fa fa-map" aria-hidden="true" style="color: #bc6c25;"></i>&ensp;Địa chỉ: 132, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, tp Cần Thơ</span><br>
            <span style="font-weight:bold;padding-top:2px; color:#0466c8;"><i class="fa fa-phone" aria-hidden="true" style="color: #bc6c25;"></i>&ensp;Điện thoại: 19000909 - 19001009</span><br>
            <span style="font-weight:bold;padding-top:2px; color:#0466c8;"><i class="fa fa-fax" aria-hidden="true" style="color: #bc6c25;"></i>&ensp;Fax: (0292) 3 833 234</span><br>
            <span style="font-weight:bold;padding-top:2px; color:#0466c8;"><i class="fa fa-envelope" aria-hidden="true" style="color: #bc6c25;"></i>&ensp;Email: pkdkphuongngan@gmail.com</span>
        </div>
        <div class="col-md-3">
          <h5 style="font-weight:bold;color:brown;">Giờ làm việc</h5>
          <span style="font-weight:bold;color:#0096c7;">Thứ 2 - Thứ 7: 7h đến 18h</span><br>
          <span style="font-weight:bold;color:#0096c7;">Chủ nhật: 7h đến 11h</span>
        </div>
    </div>
    <div class="row" style="background-color: #0077b6;">
        <div class="col-md-12 text-center" style="height: 80px;padding-top:10px;">
            <span style="color: white;" class="mt-3 pt-2 mb-2">Copyright ©2021 - Bản quyền thuộc về PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN - Phát triển bởi MediHub</span><br>
            <span style="color: white;">Tất cả những thông tin trên chỉ mang tính chất tham khảo, người bệnh phải đến trực tiếp phòng khám để bác sĩ chẩn đoán và điều trị.</span>
        </div>
    </div>
</div>

    <script src="{{asset('vendor/jquery-3.6.0/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/aos-master/dist/aos.js')}}"></script>
    <script >
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        AOS.init();
    </script>
   
    @yield('ws_js')
    
</body>
</html>