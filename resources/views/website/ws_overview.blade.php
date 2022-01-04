@extends('website.ws_layout')
@section('ws_title')
  <title>Tổng quan phòng khám</title>
@endsection
@section('ws_css')
    <style>
        .radien {
            background-color: #e8e8e4; /* Dành cho các trình duyệt không hỗ trợ gradient */
            background-image: linear-gradient(180deg, #fcd5ce, #90e0ef ); 
        }
        .col1{
            background-color:#f8edeb;
        }
        .tongquan{
            margin-top:20px;
        }
    </style>
@endsection
@section('ws_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 radien" >
                <h2 style="padding-top:80px;padding-bottom:10px;padding-left:120px;font-weight:bold;color:#bb3e03;">TỔNG QUAN PHÒNG KHÁM</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col1"></div>
            <div class="col-md-10">
                <div class="row mt-5">
                    <div class="col-md-7">
                        <h3 style="font-weight: bold;color:#2698d6;">Giới thiệu</h3>
                        <p class="pt-2  ">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Không chỉ mang lại niềm tin cho người bệnh từ cơ sở vật chất , hay danh tiếng từ đội ngũ cán bộ y tế, Phòng Khám Đa Khoa Phương Ngân còn mong muốn mang lại cho người bệnh một cảm giác ấm áp, thân thiện ngay từ dịch vụ thăm khám, chăm sóc sức khỏe.
                            Tâm lý của bệnh nhân cũng có ảnh hưởng phần nào đến kết quả điều trị và chúng tôi luôn làm tất cả những gì có thể để người bệnh có thể cảm thấy thoải mái và an tâm nhất, không gì vui hơn khi chúng tôi có thể giúp người bệnh trút bỏ nổi lo và có được sức khỏe, niềm vui trong cuộc sống.

                            Phòng Đa Khoa Phương Ngân hoạt động với phương châm: <br><br>
                            <span style="color:red;margin-left:150px;font-weight:bold;">“BỆNH NHÂN LÀ NGƯỜI THÂN, TẬN TÂM PHỤC VỤ”</span>
                        </p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('website/images/doingukham8.jpg')}}" width="500px;">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-7">
                        <h3 style="font-weight: bold;color:#2698d6;">Đội ngũ bác sĩ</h3>
                        <p class="pt-2">
                            <li class=" ">Đội ngũ Bác sĩ với trình độ  yên môn cao và coi trọng đạo đức nghề nghiệp. </li>
                            <li class=" ">Đội ngũ điều dưỡng, nhân viên phòng khám, nhà thuốc luôn nhiệt tình, tôn trọng, và quan tâm chăm sóc bệnh nhân.</li>
                            <li class=" "> Môi trường khám bệnh thân thiện và trách nhiệm.</li>

                            <li class=" ">Phòng khám không ngừng cải thiện dịch vụ chăm sóc khách hàng.</li>

                            <li class=" ">Các giữ liệu hồ sơ khám bệnh luôn đảm bảo tính lưu trữ lâu dài.</li>

                            <li class=" ">Có nhà thuốc tại chỗ, cung cấp đầy đủ các tân dược cần thiết với giá cả hợp lý.</li>
                        </p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('website/images/doingukham9.jpg')}}" width="500px;">
                    </div>
                </div>
                <div class="row mt-5">
                    <h3 style="font-weight: bold;color:#2698d6;" class="pl-3">Điều khiến bạn nên đến với chúng tôi</h3>
                    <div class="col-md-12 mx-0 mt-3" data-aos="fade-up" data-aos-duration="1000">
                        <table class="w-100 mx-0 text-center pt-0 " style=" vertical-align: baseline;">
                            <tr>
                                <th width="20%" class="p-3 pb-5 lead" style="color:white; background-color: #ffa800; vertical-align: baseline;">BÁC SỸ GIỎI  YÊN MÔN GIÀU NHÂN ÁI</th>
                                <th width="20%" class="p-3 pb-5 lead" style="color:white; background-color: #91BA39; vertical-align: baseline;">CÔNG NGHỆ TIÊN TIẾN VÀ VƯỢT TRỘI</th>
                                <th width="20%" class="p-3 pb-5 lead" style="color:white; background-color: #FF8686; vertical-align: baseline;">DỊCH VỤ TẬN TÂM   ĐÁO</th>
                                <th width="20%" class="p-3 pb-5 lead" style="color:white; background-color: #3DAFC7; vertical-align: baseline;">MÔI TRƯỜNG THÂN THIỆN</th>
                                <th width="20%" class="p-3 pb-5 lead" style="color:white; background-color: #B374F4; vertical-align: baseline;">CHI PHÍ TỐI ƯU</th>
                            </tr>
                            <tr>
                                <td><img src="{{asset('website/images/icon1_fix.png')}}" alt="" style="margin:-43px auto auto auto;"></td>
                                <td><img src="{{asset('website/images/icon2_fix.png')}}" alt="" style="margin:-43px auto auto auto;"></td>
                                <td><img src="{{asset('website/images/icon3_fix.png')}}" alt="" style="margin:-43px auto auto auto;"></td>
                                <td><img src="{{asset('website/images/icon4_fix.png')}}" alt="" style="margin:-43px auto auto auto;"></td>
                                <td><img src="{{asset('website/images/icon5_fix.png')}}" alt="" style="margin:-43px auto auto auto;"></td>
                            </tr>
                            <tr>
                                <td class="pt-0 px-3 pb-auto text-left  " style="vertical-align: baseline;">Đội ngũ y bác sĩ và điều dưỡng viên của phòng khám đều là những bậc lương y giỏi  yên môn và giàu kinh nghiệm khám chữa ở lĩnh vực liên quan. Là những người tâm huyết với nghề, từng được đào tạo hoặc tác nghiệp tại nước ngoài.</td>
                                <td class="pt-0 px-3 pb-auto text-left  " style="vertical-align: baseline;">Chúng tôi coi trọng tìm tòi và triển khai các công nghệ kỹ thuật tiên tiến, đặc biệt là những công nghệ kiểm tra tinh vi mang tính quốc tế. Hiện nay phần lớn thiết bị và công nghệ chữa trị chúng tôi tin dùng đều đến từ các quốc gia có nền y học phát triển.</td>
                                <td class="pt-0 px-3 pb-auto text-left  " style="vertical-align: baseline;">Với mong muốn mang đến sự thuận tiện và tiết kiệm thời gian tối đa cho bệnh nhân. Phòng khám đã cho xây dựng hệ thống các dịch vụ từ tư vấn hướng dẫn, chẩn đoán điều trị tới chăm sóc sau điều trị.</td>
                                <td class="pt-0 px-3 pb-auto text-left  " style="vertical-align: baseline;">Phòng khám được thiết kế, bố trí tổng thể dựa trên các yêu cầu về tiêu  ẩn phòng khám tư được ban hành bởi bộ y tế. Ngoài ra Phòng Khám Đa Khoa Thái Hà cũng đặc biệt quan tâm tới yếu tố tâm lý người bệnh với mong muốn tạo một không gian khám chữa tiện nghi thoải mái và ấm áp cho người bệnh.</td>
                                <td class="pt-0 px-3 pb-auto text-left  " style="vertical-align: baseline;">100% chi phí của chúng tôi đều công khai, minh bạch và được nhập hệ thống cẩn thận. Bác sỹ sẽ đưa ra chi phí điều trị dự kiến cùng các liệu trình điều trị. Người bệnh có quyền lựa chọn liệu trình phù hợp nhất với điều kiện kinh tế và tính chất công việc của mình.</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="pt-5">
                    <h3 class="pl-2" style="font-weight: bold;color:#2698d6;">Cam kết của chúng tôi</h3><br>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div style="background-color: #ff7e7e;color:white;position:relative;right:0px;"  data-aos="fade-right" data-aos-duration="1000">
                                <p class=" p-4 mx-0 " style="padding-right:40px;">100% chi phí của chúng tôi điều công khai, minh bạch. Bác sỹ sẽ đưa ra chi phí điều trị dự kiến cùng các liệu trình điều trị. Người bệnh có quyền lựa chọn liệu trình phù hợp nhất với điều kiện kinh tế và tính chất công việc của mình</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('website/images/battay.jpg')}}" alt="" height="150px;" width="100%" class="pl-0" data-aos="fade-left" data-aos-duration="1000">

                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/2.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Cư xử bình đẳng, nhân ái, lịch sự, tôn trọng</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/3.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Tận tụy, cẩn thận, nhiệt tình,   đáo, tất cả vì người bệnh</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/4.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Tận tình giải thích tình hình sức khỏe người bệnh cũng như kế hoạch điều trị cụ thể</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/5.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Cung cấp các kỹ thuật chữa trị và dịch vụ chăm sóc y tế tốt nhất</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/6.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Thông báo đầy đủ thông tin bệnh tình, không che giấu</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/7.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Tôn trọng quyền được biết, quyền riêng tư của bệnh nhân</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/8.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Thông báo các chi phí khám chữa liên quan trước khi tiến hành quá trình điều trị</span>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in">
                            <img src="{{asset('website/images/9.jpg')}}" alt="" class="w-100"><br>
                            <span class=" ">Luôn lắng nghe những ý kiến đóng góp chia sẻ và phàn nàn từ phía người bệnh</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col1"></div>
        </div>
    </div>
@endsection
@section('ws_js')
@endsection