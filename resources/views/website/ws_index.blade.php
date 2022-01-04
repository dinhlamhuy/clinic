@extends('website.ws_layout')
@section('ws_title')
<title>Phòng khám đa khoa Phương Ngân</title>
@endsection
@section('ws_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('website/images/background6.png')}}" class="d-block w-100" alt="...">
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid" style="margin-bottom:20px;">
    <div class="row" style="margin-top: 10px;background-color:#EEEEEE;">

        <div class="col-md-3 ">
            <div class="card w-75 center mx-auto px-auto">
                <div class="card-body p-0 w-auto">
                    <a href="{{URL::to('clinic/medical_register')}}"><button type="button" class="btn btn-danger w-100 "
                            data-aos="zoom-in-up" data-aos-duration="1000"><img
                                src="{{asset('website/images/icon2.png')}}" width="55px">&ensp;Đăng ký khám
                            bệnh</button></a>

                    <!--Modal đăng ký khám bệnh-->


                </div>
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="card w-75 mx-auto">
                <div class="card-body p-0 ">
                    <button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#exampleModal2"
                        data-aos="zoom-in-up" data-aos-duration="1000"><img src="{{asset('website/images/icon1.png')}}"
                            width="55px">&ensp;Tư vấn - Hỏi đáp</button>

                    <!--Modal2-->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel2"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div style="margin-top:60px;">
                                                    <p>Quý khách có các thắc mắc liên quan đến phương thức điều trị,
                                                        chính sách ưu đãi. biểu phí, chi phí, hình thức thanh toán vui
                                                        lòng để lại thông tin và chúng tôi sẽ nhanh chóng liên hệ lại
                                                        hoặc Quý khách có thể gọi đến tổng đài 19000909 để được hỗ trợ.
                                                        Cảm ơn Quý khách.</p>
                                                </div>
                                                <div class="mt-5 text-center">
                                                    <a href="tel:0964012396"><button type="tel" class="btn"
                                                            style="background-color: #2698d6;font-size:30px;"><i
                                                                class="fa fa-phone-square" aria-hidden="true"
                                                                style="font-size: 40px;">&ensp;Hotline: 19000909</i>
                                                        </button></a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <span
                                                            style="font-weight: bold;color: #2698d6 !important;font-size:25px">ĐẶT
                                                            CÂU HỎI ĐỂ CÁC CHUYÊN GIA HỎI ĐÁP</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="index.php?action=datcauhoi" method="post">
                                                            <div class="row pt-1 pb-2">
                                                                <div class="col-md-2">
                                                                    <label for="" class="ttin">Họ tên</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control"
                                                                        name="hoten">
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1 pl-0">
                                                                <div class="col-md-2">
                                                                    <label for="" class="ttin">Số điện
                                                                        thoại</span></label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="tel" class="form-control" name="sdt">
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1 pb-2">
                                                                <div class="col-md-2">
                                                                    <label for="" class="ttin">Email </label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="email" class="form-control"
                                                                        name="email">
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1 pb-2">
                                                                <div class="col-md-2">
                                                                    <label for="" class="ttin">Tiêu đề</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control"
                                                                        name="tieude">
                                                                </div>
                                                            </div>
                                                            <div class="row pt-1 pb-2">
                                                                <div class="col-md-2">
                                                                    <label for="" class="ttin">Câu hỏi</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <textarea name="noidung" class="form-control"
                                                                        rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="text-center mb-4 mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-success pl-5 pr-5 pt-2 pb-2"
                                                                    style="background-color: #2698d6 !important;">Đặt
                                                                    câu hỏi</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card w-75 mx-auto">
                <div class="card-body p-0">
                    <a href="" class="btn w-100 btn-danger" data-aos="zoom-in-up" data-aos-duration="1000"><img
                            src="{{asset('website/images/icon3.png')}}" width="55px;">&ensp;Dịch vụ</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card w-75 mx-auto ">
                <div class="card-body p-0 " data-aos="zoom-in-up" data-aos-duration="1000">
                    <a href="" class="btn w-100 btn-danger"><img src="{{asset('website/images/icon4.png')}}"
                            width="55px;">&ensp;Quy trình khám bệnh</a>
                </div>
            </div>
        </div>
    </div>
    <div class="dichvunoibat mt-4">
        <h3 class="text-center mt-3 mb-3" style="color: #bf0000;">Dịch vụ nổi bật</h3>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- The slideshow -->
            <div class="container carousel-inner no-padding">
                <div class="carousel-item active" style="height:350px;">
                    <div class="col-xs-3 col-sm-3 col-md-4 md3">
                        <a href="#" class="text-decoration-none">
                            <center><img class="content-image" src="{{asset('website/images/khamnhanh.jpg')}}"></center>
                            <center>
                                <h5 style="word-break:break-all" class="align-center">
                                    Khám nhanh và khám chuyên gia
                                </h5>
                            </center>
                        </a>
                        <span class="chu">Đáp ứng nhu cầu của một bộ phận khách hàng về thời gian khám bệnh nhanh chóng
                            và thuận tiện, phòng khám đã thiết kế không gian phù hợp.</span>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-4 md3">
                        <div class="content">
                            <a href="#" class="text-decoration-none">
                                <center><img class="content-image" src="{{asset('website/images/dieutrinoitru.jpg')}}">
                                </center>
                                <center>
                                    <h5 style="word-break:break-all">Điều trị nội trú</h5>
                                </center>
                            </a>
                            <span class="chu">Khu Điều trị theo yêu cầu trang bị hơn 160 giường bệnh với các loại phòng
                                từ 01 giường đến 03 giường/phòng phục vụ điều trị và chăm sóc nội trú.</span>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-4 md3 ">
                        <div class="content" class="class=" text-decoration-none>
                            <a href="#" class="text-decoration-none">
                                <center><img class="content-image" src="{{asset('website/images/canlamsang.jpg')}}">
                                </center>
                                <center>
                                    <h5 style="word-break:break-all">Cận lâm sàng</h5>
                                </center>
                            </a>
                            <span class="chu">Cung cấp các dịch vụ cận lâm sàng, chẩn đoán hình ảnh gồm xét nghiệm; đo
                                điện tim; siêu âm; chụp X-quang, CT-scanner, nội soi,... </span>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="height:350px;">

                    <div class="col-xs-3 col-sm-3 col-md-4 md3">
                        <div class="content">
                            <a href="#" class="text-decoration-none">
                                <center><img class="content-image" src="{{asset('website/images/xecapcuu.jpg')}}">
                                </center>
                                <center>
                                    <h5 style="word-break:break-all">Dịch vụ chuyển bệnh</h5>
                                </center>
                            </a>
                            <span class="chu">Dịch vụ chuyển bệnh: Xe cấp cứu chuyên dụng đời mới với đầy đủ trang thiết
                                bị, máy móc được sử dụng trong việc chuyển bệnh...</span>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-4 md3">
                        <div class="content">
                            <a href="#" class="text-decoration-none">
                                <center><img class="content-image"
                                        src="{{asset('website/images/khambenhngoaitru.jpg')}}"></center>
                                <center>
                                    <h5 style="word-break:break-all">Khám bệnh ngoại trú</h5>
                                </center>
                            </a>
                            <span class="chu">Có các phòng khám chuyên khoa Nội tổng quát; Nội tim mạch; Tai mũi họng;
                                Nhi khoa; Nội tiêu hóa - Gan mật; Nội tiết; Huyết học; Ngoại tổng quát; Nhi khoa</span>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-4 md3 ">
                        <div class="content" class="text-decoration-none">
                            <a href="#" class="text-decoration-none">
                                <center><img class="content-image" src="{{asset('website/images/khamdinhky.png')}}">
                                </center>
                                <center>
                                    <h5 style="word-break:break-all">Khám sức khỏe tổ chức và cá nhân</h5>
                                </center>
                            </a>
                            <span class="chu">Cung cấp dịch vụ khám sức khỏe định kỳ cho các tổ chức, doanh nghiệp và cá
                                nhân giúp tầm soát sức khỏe kịp thời với gói khám phù hợp, chi phí hợp lý...</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <i class="fa fa-chevron-left fa-2x" style="color: black;" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <i class="fa fa-chevron-right fa-2x" style="color: black;" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="row mt-3">
        <div class="col-md-1 abc"></div>
        <div class="col-md-10">
            <div class="container-fluid bg">
                <div class="row">
                    <div class="col-md-8">
                        <div class="tintuc" style="background-color:white;">
                            <a href="" class="text-decoration-none">
                                <h5 class="khung">&nbsp;Tin tức y tế</h5>
                            </a>
                            <div class="row">
                                <div class="col-md-6">

                                    <a href="#" class="a text-decoration-none">
                                        <img src="{{asset('website/images/ketnoituxa.png')}}" alt="" class="w-100">
                                        <span style="font-size: 18px !important;">Kết nối từ xa (Telehealth)</span><br>
                                    </a>
                                    <span class="time"></span><br>

                                </div>
                                <div class="col-md -6">

                                    <div class="row mb-2">

                                        <div class="col-md-5">
                                            <img src="{{asset('website/images/phongnguabenh.png')}}" alt="" class="w-100">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="#" class="a  text-decoration-none">
                                                <span>Phòng ngừa các bệnh ở trẻ em khi thời tiết giao mùa</span></a><br>
                                            <!-- <span class="time">Thứ 4, 10/3/2021</span> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img src="{{asset('website/images/thongdiep5k.jpg')}}" alt="" class="w-100">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="#" class="a  text-decoration-none">
                                                <span>Thông điệp 5k phòng ngừa COVID 19</span></a><br>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="thongbao" style="margin-top:10px;background-color:white;height:380px;">
                            <a href="#" class="text-decoration-none">
                                <h5 class="khung">&nbsp;Chuyên khoa</h5>
                            </a>
                            <div class="row tbao">

                                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active ml-3">
                                            <div class="d-block float-left">
                                                <img src="{{asset('website/images/canlamsang1.jpg')}}" class="d-block"
                                                    alt="..." width="380px;" height="250px">
                                                <span style="font-weight: bold; font-size:25px;">Khoa cận lâm
                                                    sàng</span>
                                            </div>
                                            <div class="d-block float-left ml-3 mr-2">
                                                <img src="{{asset('website/images/ranghammat.jpg')}}" class="d-block"
                                                    alt="..." width="395px;" height="250px">
                                                <span style="font-weight: bold; font-size:25px;">Mắt - Răng hàm mặt -
                                                    <br>Tai mũi họng</span>
                                            </div>
                                        </div>
                                        <div class="carousel-item ml-3">
                                            <div class="d-block float-left">
                                                <img src="{{asset('website/images/khoadinhduong.jpg')}}" class="d-block"
                                                    alt="..." width="390px;" height="250px">
                                                <span style="font-weight: bold; font-size:25px;">Khoa cận lâm
                                                    sàng</span>
                                            </div>
                                            <div class="d-block float-left ml-3 mr-2">
                                                <img src="{{asset('website/images/khoacapcuu.png')}}" class="d-block"
                                                    alt="..." width="385px;" height="250px">
                                                <span style="font-weight: bold; font-size:25px;">Khoa cận lâm
                                                    sàng</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls1" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls1" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="hoatdong" style="margin-top:10px;background-color:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="" class="text-decoration-none pr-0">
                                        <h5 class="khung">&nbsp;Tin tức - Sự kiện</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="" class="a text-decoration-none">
                                        <img src="{{asset('website/images/hieuqua1.png')}}" alt="" class="w-100 ">
                                        <span style="font-size: 18px !important;">Hiệu quả điều trị Covid-19 từ Bệnh viện dã chiến truyền nhiễm số 5G</span><br>
                                    </a>
                                    <span class="chu">Bệnh viện dã chiến truyền nhiễm số 5G đã thu dung, điều trị 350 bệnh nhân Covid-19. Ngày 21-9, bệnh viện tổ chức cho 16 người khỏi bệnh xuất viện.</span>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <img src="{{asset('website/images/kiemsoatbenh.jpg')}}" alt="" class="w-100 ">
                                            <a href="https://soytecantho.vn/?tabid=979&ndid=69027&key=Trung_tam_Kiem_soat_benh_tat_thanh_pho_tap_huan_truc_tuyen_cong_tac_phong_chong_dich_COVID_19" class="a  text-decoration-none"><span>Trung tâm Kiểm soát bệnh tật thành phố tập huấn trực tuyến công tác phòng, chống dịch COVID-19</span></a><br>
                                            <span class="time">Thứ 4, 10/11/2021</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <img src="{{asset('website/images/tiepnhanyte.jpg')}}" alt="" class="w-100 ">
                                            <a href="https://soytecantho.vn/?tabid=979&ndid=69028&key=Can_Tho_tiep_nhan_vat_tu_y_te_ho_tro_phong_chong_dich_COVID_19" class="a  text-decoration-none"><span>Cần Thơ tiếp nhận vật tư y tế hỗ trợ phòng, chống dịch COVID-19</span></a><br>
                                            <span class="time">Thứ 4, 10/11/2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lienket" style="background-color: white;">
                            <h5 class="khung">&nbsp;Liên kết</h5>
                            <a href="https://moh.gov.vn/" target="_blank"><img
                                    src="{{asset('website/images/congthongtindientu.png')}}" alt=""
                                    width="100%"></a><br>
                            <a href="http://soytecantho.vn/" target="_blank"><img
                                    src="{{asset('website/images/soytectho.png')}}" alt="" width="100%"
                                    style="margin-top:8px;"></a>
                        </div>
                        <div class="row mt-2 ">
                            <div class="col-md-12 mx-auto">
                                <div class="w-100">
                                    <a href="" class="text-decoration-none">
                                        <h5 class="khung">&nbsp;Thông tin từ sở y tế</h5>
                                    </a>
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist"
                                            style="background-color: #eeeeee; font-weight:bold;">
                                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Tin mới </a>
                                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Văn bản</a>
                                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Lịch làm việc</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent" style="height:200px;">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <li>
                                                <a href="" class="ab chu">Kiểm tra công tác phòng chống dịch COVID-19
                                                    tại các cơ sở sản xuất, kinh doanh</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Cập nhật nhanh danh sách các địa phương có
                                                    dịch COVID-19 trên địa bàn thành phố Cần Thơ tính đến ngày
                                                    8/3/2021</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Trao quyết định bổ nhiệm phó giám đốc sở y
                                                    tế</a>
                                            </li>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <li>
                                                <a href="" class="ab chu">Lịch tiếp công dân của Sở Y tế năm 2021</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch công tác tuần (Từ ngày 08/03/2021 đến
                                                    ngày 14/03/2021)</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch công tác tuần (Từ ngày 01/03/2021 đến ngày
                                                    07/03/2021)</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch trực đường dây nóng tháng 03 năm 2021</a>
                                            </li>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">
                                            <li>
                                                <a href="" class="ab chu">Lịch tiếp công dân của Sở Y tế năm 2021</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch công tác tuần (Từ ngày 08/03/2021 đến
                                                    ngày 14/03/2021)</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch công tác tuần (Từ ngày 01/03/2021 đến
                                                    ngày 07/03/2021)</a>
                                            </li>
                                            <li>
                                                <a href="" class="ab chu">Lịch trực đường dây nóng tháng 03 năm 2021</a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="covid mt-2" style="background-color:#eeeeee">
                            <h5 class="khung">&nbsp;Biện pháp phòng tránh COVID-19</h5>
                            <div style="padding-left: 5px;">
                                <iframe width="100%" name="hello" height="315"
                                    src="https://www.youtube.com/embed/l6eolsZWM0k" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                <p><a target="hello" href="https://youtube.com/embed/Q44s8-7RpPE" class="ab">Cách phá vỡ
                                        chuỗi lây nhiễm của Covid-19</a></p>
                                <p><a target="hello" href="https://youtube.com/embed/O0gRnxpY7zo" class="ab">Thông điệp
                                        Virus Corona</a></p>
                            </div>
                        </div>
                        <div class="khaibaoyte mt-2" style="background-color: white;">
                            <h5 class="khung">&nbsp;Khai báo y tế toàn dân</h5>
                            <div>
                                <a href="https://tokhaiyte.vn/"><img src="{{asset('website/images/khaibaoyte.png')}}"
                                        target="_blank" alt="" width="100%"></a>
                            </div>
                        </div>
                        <div class="hotro mt-2" style="background-color:#eeeeee">
                            <h5 class="khung">&nbsp;Hỗ trợ</h5>
                            <div style="padding-left: 5px;">
                                <p class="chu">Bộ phận chăm sóc khách hàng</p>
                                <p class="chu"><i class="fa fa-phone" aria-hidden="true"></i>&ensp;Hỗ trợ:<span
                                        style="color:black;font-weight:bold;">&ensp;0292 246 999</span></p>
                                <p class="chu"><i class="fa fa-phone" aria-hidden="true"></i>&ensp;Cấp cứu:<span
                                        style="color:red;font-weight:bold;">&ensp;0292 390 999</span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-1 abc"></div>
    </div>
</div>


<div class="container mt-1">

</div>

@endsection