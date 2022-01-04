@extends('website.ws_layout')
@section('ws_title')
<title>Đăng ký khám bệnh</title>
@endsection
@section('ws_css')
<style>
    .error{
        color: red;
        font-size: 14px;
    }
</style>
@endsection
@section('ws_content')
<div class="container">
    <div class="row" style="margin-bottom:250px;margin-top:80px;">
        <div class="col-md-6">
            <center>
                <h3>BẠN CHƯA CÓ MÃ SỐ BỆNH NHÂN</h3><br>
            </center>
            <center><span>Bạn chưa có MSBN tại phòng khám đa khoa Tân Khánh vui lòng đăng ky khám bệnh với thông tin
                    bệnh nhân mới</span></center>
            <center><button type="button" class="btn btn-success w-75 mt-5" data-toggle="modal" data-target="#exampleModal1""><img src=" {{asset('website/images/icon2.png')}}" width="55px">&ensp;Đăng ký khám bệnh</button></center>
        </div>
        <!-- modal đăng ký khám bệnh nhân mới -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel1"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4 style="font-weight: bold;color: #2698d6; font-size:25px;">LƯU Ý</h4>
                                    <div style="margin-top:50px;">
                                        <li>Lịch hẹn chỉ có hiệu lực khi quý khách được xác nhân chính thức từ Phòng
                                            khám thông qua điện thoại hoặc email</li>
                                        <li style="margin-top:30px;">Quý khách sử dụng dịch vụ đặt hẹn trực tuyến, vui
                                            lòng đặt hẹn ít nhất 24h trước khi đến khám</li>
                                        <li style="margin-top:30px;">Quý khách vui lòng cung cấp thông tin chính xác để
                                            được hỗ trợ nhanh nhất</li>
                                        <li style="margin-top:30px;">Trường hợp khẩn cấp hay có triệu chứng nguy hiểm,
                                            vui lòng liên hệ trực tiếp cơ sở y tế để kịp thời xử lý</li>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <a href="tel:0964012396"><button type="tel" class="btn" style="background-color: #2698d6;font-size:30px;"><i class="fa fa-phone-square" aria-hidden="true" style="font-size: 40px;">&ensp;Hotline: 19000909</i> </button></a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header" style="background-color: #2698d6;">
                                            <span style="font-weight: bold;color: white !important;font-size:25px">CUNG
                                                CẤP THÔNG TIN</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row pt-1 pb-2">
                                                <div class="col-md-12">
                                                    <span class="ttin" style="font-size:22px;">Bạn muốn đặt lịch hẹn
                                                        khám cho:</span>
                                                </div>
                                            </div>
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bản thân</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Người thân</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <form action="{{ URL::to('/clinic/add_medical_register') }}" method="post" onsubmit="return banthan()">
                                                        @csrf
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Họ tên<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control error" name="dk_hoten" id="dk_hotenbt">
                                                                <span id="ktrahtenbt" class="error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 ">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Giới tính<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label" for="gt">
                                                                        <input class="form-check-input" type="radio" name="dk_gioitinh" id="gtnam" value="Nam" checked>
                                                                        Nam</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label" for="gt">
                                                                        <input class="form-check-input" type="radio" name="dk_gioitinh" id="gtnu" value="Nữ">
                                                                        Nữ</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin float-right">Năm sinh<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="date" name="dk_ngaysinh" class="form-control" value="2000-01-01">
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">SĐT<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="tel" class="form-control" name="dk_sdt" id="dk_sdtbt" placeholder="0964xxxxxx">
                                                                <span id="ktrasdtbt" class="error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Email </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="email" class="form-control" name="dk_email" id="dk_email" placeholder="abc@gmail.com">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Địa chỉ<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="dk_diachi" id="dk_diachi">
                                                                <span id="ktradiachibt" class="error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Triệu chứng<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                @foreach($dstc as $tc)
                                                                <input type="checkbox" name="trieuchung[]" value="{{ $tc->tclh_ma }}">&ensp;<label for="">{{ $tc->tclh_ten }}</label>&emsp;&ensp;&ensp;&emsp;
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Ngày khám<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="date" class="form-control" name="lh_ngaykham" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin float-right">Khung giờ<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select  id="gio" name="kg_ma" class="form-control">
                                                                    @foreach($dskg as $kg)
                                                                        <option value="{{$kg->kg_ma}}">{{$kg->kg_khunggio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="text-center mb-4 mt-4">
                                                            <button type="submit" value="register"  class="btn btn-success pl-5 pr-5 pt-2 pb-2" style="background-color: #2698d6 !important;">Đặt lịch
                                                                hẹn</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <form action="{{ URL::to('/clinic/add_medical_register') }}" method="post"  onsubmit="return ngthandat()">
                                                        @csrf
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-12">
                                                                <span class="ttin" style="font-size: 22px;">Thông tin
                                                                    người đặt</span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Họ tên<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="dk_hotennd" id="dk_hotennd" >
                                                                <span class="error" id="ktrahtnt"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">SĐT<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="tel" class="form-control" name="dk_sdtnd" id="dk_sdtnd" placeholder="0964xxxxxx" >
                                                                <span class="error" id="ktrasdtnt"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Email</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="email" class="form-control" name="dk_emailnd" id="dk_emailnd">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-12">
                                                                <hr class="ngang" style="width:80% ;size:100px; text-align:center;color:#cb997e;">
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-12">
                                                                <span class="ttin" style="font-size: 22px;">Thông tin
                                                                    bệnh nhân</span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Họ tên<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="dk_hoten" id="dk_hotennk">
                                                                <span class="error" id="ktrahtnk"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 ">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Giới tính<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label" for="gt">
                                                                        <input class="form-check-input" type="radio" name="dk_gioitinh" id="gtnam" value="Nam" checked>
                                                                        Nam</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label" for="gt">
                                                                        <input class="form-check-input" type="radio" name="dk_gioitinh" id="gtnu" value="Nữ">
                                                                        Nữ</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin float-right">N.sinh<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="date" name="dk_ngaysinh"  class="form-control" value="2000-01-01">
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">SĐT<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="tel" class="form-control" name="dk_sdt" id="dk_sdtnk">
                                                                <span class="error" id="ktrasdtnk"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Email </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="email" class="form-control" name="dk_email">
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Địa chỉ<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="dk_diachi" id="dk_diachink">
                                                                <span class="error" id="ktradiachink"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Triệu chứng<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                @foreach($dstc as $tc)
                                                                <input type="checkbox" name="trieuchung[]" value="{{ $tc->tclh_ma }}">&ensp;<label for="">{{ $tc->tclh_ten }}</label>&emsp;&ensp;&ensp;&emsp;
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="row pt-1 pb-2">
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin">Ngày khám<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="date" class="form-control" name="lh_ngaykham" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="" class="ttin float-right">Khung giờ<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select  id="gio" name="kg_ma" class="form-control">
                                                                    @foreach($dskg as $kg)
                                                                        <option value="{{$kg->kg_ma}}">{{$kg->kg_khunggio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="text-center mb-4 mt-4">
                                                            <button type="submit" class="btn btn-success pl-5 pr-5 pt-2 pb-2" value="register" style="background-color: #2698d6 !important;">Đặt lịch
                                                                hẹn</button>
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
        <div class="col-md-6">
            <center>
                <h3>BẠN ĐÃ CÓ MÃ SỐ BỆNH NHÂN</h3><br>
            </center>
            <center>
                <span>Nhập mã số bệnh nhân của bạn để đăng ký khám bệnh trực tuyến</span>
            </center>

            <form action="{{ URL::to('/clinic/login_patient') }}" method="post" class="mt-5">
            @csrf
                <div class="form-group">
                    <label for="" style="margin-left:70px;">Mã bệnh nhân</label>
                    <center><input type="text" name="bn_ma" class="form-control w-75" required></center>
                </div>
                <div class="form-group">
                    <label for="" style="margin-left:70px;">Mật khẩu</label>
                    <center><input type="password" name="password" class="form-control w-75" required></center>
                </div>
                <center><button type="submit" class="btn btn-success">Đăng nhập</button></center>
            </form>
        </div>
    </div>
</div>
@endsection
@section('ws_js')
<script>

function banthan() {
        var hoten = document.getElementById('dk_hotenbt').value;
        var sdt = document.getElementById('dk_sdtbt').value;
        var sdtd = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        // var email =.document.getElementById('dk_email').valuel;
        // var emaild = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // var password = document.myform.password.value;
        var diachi = document.getElementById('dk_diachi').value;
        var status = false;
 
        if (hoten.length < 1) {
            document.getElementById("ktrahtenbt").innerHTML = 
                "Họ tên không được để trống!";
            status = false;
        } else {
            document.getElementById("ktrahtenbt").innerHTML = 
                "";
            status = true;
        }

        if (sdt.length < 1) {
            document.getElementById("ktrasdtbt").innerHTML = 
                "Số điện thoại không được để trống!";
            status = false;
        }else if(sdtd.test(sdt)){
            document.getElementById("ktrasdtbt").innerHTML = 
                "";
            status = true;
        } else {
            document.getElementById("ktrasdtbt").innerHTML = 
                "Số điện thoại không hợp lệ";
            status = false;
        }

        if(diachi.length < 1){
            document.getElementById('ktradiachibt').innerHTML="Địa chỉ không được để trống!";
            status = false;
        }else{
            document.getElementById("ktradiachibt").innerHTML="";
            status = true;
        }
        return status;
    }

// 
function ngthandat(){
    var hotennd = document.getElementById('dk_hotennd').value;
    var sdtnd = document.getElementById('dk_sdtnd').value;
    var sdtnk = document.getElementById('dk_sdtnk').value;
    var sdtndd = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var hotennk = document.getElementById('dk_hotennk').value;
    var diachi = document.getElementById('dk_diachink').value;
    var status = false;

    if (hotennk.length < 1) {
        document.getElementById("ktrahtnk").innerHTML = 
            "Họ tên không được để trống!";
        status = false;
    } else {
        document.getElementById("ktrahtnk").innerHTML = 
            "";
        status = true;
    }
    

    if (sdtnk.length < 1) {
            document.getElementById("ktrasdtnk").innerHTML = 
                "Số điện thoại không được để trống! (Nếu người khám không có SĐT vui lòng điền vào SĐT của người thân)";
            status = false;
        }else if(sdtndd.test(sdtnk)){
            document.getElementById("ktrasdtnk").innerHTML = 
                "";
            status = true;
        } else {
            document.getElementById("ktrasdtnk").innerHTML = 
                "Số điện thoại không hợp lệ";
            status = false;
        }
    
    if(diachi.length < 1){
        document.getElementById('ktradiachink').innerHTML="Địa chỉ không được để trống!";
        status = false;
    }else{
        document.getElementById("ktradiachink").innerHTML="";
        status = true;
    }
    if (hotennd.length < 1) {
            document.getElementById("ktrahtnt").innerHTML = 
                "Họ tên không được để trống!";
            status = false;
        } else {
            document.getElementById("ktrahtnt").innerHTML = 
                "";
            status = true;
    }
    if (sdtnd.length < 1) {
            document.getElementById("ktrasdtnt").innerHTML = 
                "Số điện thoại không được để trống!";
            status = false;
        }else if(sdtd.test(sdt)){
            document.getElementById("ktrasdtnt").innerHTML = 
                "";
            status = true;
        } else {
            document.getElementById("ktrasdtnt").innerHTML = 
                "Số điện thoại không hợp lệ";
            status = false;
        }

   
        return status;
}
// 


    $(document).ready(function() {
        <?php
        $mess = session()->get('thongbao');
        $icon = '';
        $tb = '';
        if ($mess == 'Đăng ký thành công') {
            $icon = 'success';
            $tb = 'Đăng ký thành công';
        }
        if ($mess) {


        ?>
            Swal.fire(
                '<?= $tb ?>',
                'Vui lòng chờ nhân viên xác nhận',
                '<?= $icon ?>'

            )
        <?php session()->put('thongbao', null);
        }
        ?>

        <?php
    $messs = session()->get('tbao');
    $icons = '';
    $tbs = '';
    
    if ($messs == 'Đăng nhập thất bại') {
        $icons = 'error';
        $tbs = 'Đăng nhập thất bại';
    }
    if ($messs) {


    ?>
        Swal.fire(
            '<?= $tbs ?>',
            'Vui lòng kiểm tra lại mã bệnh nhân và mật khẩu',
            '<?= $icons ?>'

        )
    <?php session()->put('tbao', null);
    }
    ?>

    });
</script>
@endsection