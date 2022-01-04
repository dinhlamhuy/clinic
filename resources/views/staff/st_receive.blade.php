@extends('staff.st_layout')
@section('st_title')
<title>Tiếp nhận bệnh nhân</title>
@endsection
@section('st_add_css')
<link rel="stylesheet" href="{{ asset('staff/css/style_st_receive.css') }}">
<style>
    .error{
        color: red;
        font-size: 14px;
    }
</style>
@endsection
@section('st_content')
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12 px-0 mx-0">
            <nav class="frames_receive ">
                <div class="nav nav-tabs nav-receive" id="nav-tab" role="tablist">
                    <a class="nav-link link2 active" id="receives" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Thông tin tiếp nhận</a>
                    <a class="nav-link link2" id="list_receive" href="{{ url('staff/dstiepnhan') }}">Danh sách tiếp nhận</a>
                    <a class="nav-link link2" id="list_appointment_schedule" href="{{ url('staff/dsdatlichhen') }}">Danh sách đặt lịch hẹn</a>
                    <a class="nav-link link2" id="list_of_patients_examined" href="{{ url('staff/dsbenhnhan') }}">Danh sách bệnh nhân </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="receives">
                    <div class="container-fluid ">
                        <div class="row pt-1">
                            <div class="col-md-7"></div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <form action="{{ URL::to('/staff/create_medical_records') }}" method="post" onsubmit="return ttbenhnhan()">
                            @csrf
                            <input type="hidden" name="lt_ngay" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="benhnhan_ma" value="">
                            <div class="row mt-1">
                                <div class="col-md-1"></div>
                                <div class="col-md-10"
                                    style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                    <label for="" class="col-form-label chu float-left">Họ tên<span class="star">*</span></label>
                                                    <input type="text" class="form-control" name="hoten" id="hoten" autocomplete="off">
                                                    <span class="error" id="ktraht"></span>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for=""  class="col-form-label chu float-left">Quốc tịch<span class="star">*</span></label>
                                                    <select name="quoctich" class="form-control" >
                                                        @foreach ($dsquoctich as $quoctich)
                                                        <option value="{{ $quoctich->qt_ma }}">
                                                            {{ $quoctich->qt_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for=""  class="col-form-label chu float-left">D.Tộc<span class="star">*</span></label>
                                                    <select name="dantoc"  class="form-control" >
                                                        @foreach ($dsdantoc as $dantoc)
                                                        <option value="{{ $dantoc->dtoc_ma }}">{{ $dantoc->dtoc_ten }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-form-label chu float-left">Ng.nghiệp<span class="star">*</span></label>
                                                    <select name="nghenghiep" id="nghenghiep"  class="form-control">
                                                        <option  value="1" selected>- Nghề nghiệp -</option>
                                                        @foreach ($dsnghenghiep as $nghenghiep)
                                                        <option value="{{ $nghenghiep->nn_ma }}">
                                                            {{ $nghenghiep->nn_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error" id="ktranghenghiep"></span>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <div class="col-md-6">
                                                    <label for=""  class="col-form-label chu float-left">Ngày sinh<span class="star">*</span></label>
                                                    <input type="date" class="form-control" name="ngaysinh" value="2000-01-01">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""  class="col-form-label chu float-left">G.tính<span class="star">*</span></label>
                                                    <select name="gioitinh"  class="form-control">
                                                        <option value="Nam">Nam</option>
                                                        <option value="Nữ">Nữ</option>
                                                        <option value="Khác">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <div class="col-md-6">
                                                    <label for=""  class="col-form-label chu float-left">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="sdt" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label for=""  class="col-form-label chu float-left">CMND</label>
                                                    <input type="text" class="form-control" name="cmnd" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-form-label chu float-left">Email</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for=""  class="col-form-label chu float-left">Thành phố<span class="star">*</span></label>
                                                    <select name="thanhpho" id="thanhpho" class="form-control">
                                                        <option value="" selected disabled>-Tỉnh / thành phố-</option>
                                                        @foreach ($dsthanhpho as $thanhpho)
                                                        <option value="{{ $thanhpho->tp_ma }}">
                                                            {{ $thanhpho->tp_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error" id="ktrthanhpho"></span>

                                                </div>
                                                <div class="col-md-4">
                                                    <label  class="col-form-label chu float-left">Quận / huyện<span class="star">*</span></label>
                                                    <select name="huyen" id="huyen" class="form-control" ></select>
                                                    <span class="error" id="ktrhuyen"></span>

                                                </div>
                                                <div class="col-md-4">
                                                    <label for=""  class="col-form-label chu float-left">Xã / phường<span class="star">*</span></label>
                                                    <select name="xa" id="xa" class="form-control" ></select>
                                                    <span class="error" id="ktrxa"></span>

                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <label for=""  class="col-form-label chu float-left">Địa chỉ cụ thể</label>
                                                <textarea name="diachi" id="diachi" rows="2"
                                                    class="form-control"></textarea>
                                                    <span class="error" id="ktradchi"></span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <center><h3 class="col-form-label" style="font-weight:bold;color:rgb(112, 182, 209);font-size:25px;">BHYT</h3></center>

                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group" style="padding-top: 40px;">
                                                    <div class="col-md-2">
                                                        <label for="" class="col-form-label chu float-left">Đ.tượng</label>
                                                        <select name="doituong" class="form-control select2 mr-0" >
                                                            <option value=""></option>
                                                            @foreach ($dsdoituong as $doituong)
                                                            <option value="{{ $doituong->dt_ma }}">
                                                                {{ $doituong->dt_ten }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="col-form-label chu float-left">Q.lợi</label>
                                                        <select name="quyenloi" class="form-control select2 mx-0" style="font-size: 14px;">
                                                            <option value=""></option>
                                                            @foreach ($dsquyenloi as $quyenloi)
                                                            <option value="{{ $quyenloi->ql_ma }}">
                                                                {{ $quyenloi->ql_so }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for=""  class="col-form-label chu float-left">Nơi cấp</label>
                                                        <select name="noicap" class="form-control select2 mx-0" style="font-size: 14px;">
                                                            <option value=""></option>
                                                            @foreach ($dsnoicap as $noicap)
                                                            <option value="{{ $noicap->nc_ma }}">{{ $noicap->nc_so }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for=""  class="col-form-label chu float-left">Mã số</label>
                                                    <input type="text" class="form-control ml-0"  name="bhyt" id="bhyt">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-5">
                                                        <label for=""  class="col-form-label chu float-left">Thời gian BHYT:</label>
                                                        <input type="date" class="form-control" name="ngaybdbhyt">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <center><label for="" class=" col-form-label chu text-center" style="margin-top:30px;">đến</label></center>
                                                        
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="" class="col-form-label chu float-left">Thời gian kết thúc</label>
                                                        <input type="date" class="form-control" name="ngayktbhyt">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="" class="col-form-label chu float-left">Đúng tuyến</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="phancachngang">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for=""  class="col-form-label chu float-left">Phòng khám<span class="star">*</span></label>
                                                    <select name="phong" id="phong" class="form-control">
                                                        <option value=""  disabled selected >-- Chọn phòng khám --</option>
                                                        @foreach ($dsphong as $phong)
                                                        <option value="{{ $phong->p_ma }}">{{ $phong->p_ten }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error" id="ktrphong"></span>

                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label  class="col-form-label chu float-left">Loại hình khám<span class="star">*</span></label>
                                                    <select name="loaihinhkham" id="loaihinhkham" class="form-control">
                                                        <option value="" disabled selected>-- Chọn loại hình khám --</option>
                                                        @foreach ($dsloaihinhkham as $loaihinhkham)
                                                        <option value="{{ $loaihinhkham->lhk_ma }}">
                                                            {{ $loaihinhkham->lhk_ten }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error" id="ktrloaihinhkham"></span>

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="fa fa-floppy-o" aria-hidden="true">&ensp;</i>Lưu thông tin
                                                </button>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu &ensp;&&ensp; <i class="fa fa-print" aria-hidden="true"></i> in phiếu</button> -->
                                            </div>
                                           
                                        </div>
                                    </div>
                                   
                                  
                                </div>
                        </form>
                    </div>
                </div>
            </div>
                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel" aria-labelledby="list_receive">
                </div>
                <div class="tab-pane fade mt-3" id="nav-profile" role="tabpanel"
                    aria-labelledby="list_appointment_schedule">
                </div>
                <div class="tab-pane fade mt-3" id="nav-dsbn" role="tabpanel"
                    aria-labelledby="list_of_patients_examined">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('st_add_js')
<script>
function ttbenhnhan(){
    var hoten = document.getElementById('hoten').value;
    var nghenghiep = document.getElementById('nghenghiep').value;
    var bhyt = document.getElementById('bhyt').value;
    var loaihinhkham = document.getElementById('loaihinhkham').value;
    var thanhpho = document.getElementById('thanhpho').value;
    var huyen = document.getElementById('huyen').value;
    var xa = document.getElementById('xa').value;
    var phong = document.getElementById('phong').value;
    var status = false;

    if (hoten.length < 1) {
            document.getElementById("ktraht").innerHTML = 
                "Họ tên không được để trống!";
            status = false;
        } else {
            document.getElementById("ktraht").innerHTML = 
                "";
            status = true;
    }
    if (thanhpho.length < 1) {
            document.getElementById("ktrthanhpho").innerHTML = 
                "Thành phố không được để trống!";
            status = false;
        } else {
            document.getElementById("ktrthanhpho").innerHTML = 
                "";
            status = true;
    }
    if (huyen.length < 1) {
            document.getElementById("ktrhuyen").innerHTML = 
                "Phường/Huyện không được để trống!";
            status = false;
        } else {
            document.getElementById("ktrhuyen").innerHTML = 
                "";
            status = true;
    }
    if (xa.length < 1) {
            document.getElementById("ktrxa").innerHTML = 
                "Thị xã không được để trống!";
            status = false;
        } else {
            document.getElementById("ktrxa").innerHTML = 
                "";
            status = true;
    }
    if (nghenghiep.length < 1) {
            document.getElementById("ktranghenghiep").innerHTML = 
                "Nghề nghiệp không được để trống";
            status = false;
        } else {
            document.getElementById("ktranghenghiep").innerHTML = 
                "";
            status = true;
    }
    if (phong.length < 1) {
            document.getElementById("ktrphong").innerHTML = 
                "Chọn phòng khám cho bệnh nhân";
            status = false;
        } else {
            document.getElementById("ktrphong").innerHTML = 
                "";
            status = true;
    }
    if (loaihinhkham.length < 1) {
            document.getElementById("ktrloaihinhkham").innerHTML = 
                "Chọn loại hình khám cho bệnh nhân";
            status = false;
        } else {
            document.getElementById("ktrloaihinhkham").innerHTML = 
                "";
            status = true;
    }

    return status;
}



$(document).ready(function() {
    <?php
        $mess = session()->get('thongbao');
        $icon = '';
        $tb = '';
        if ($mess == 'Xác nhận thành công') {
            $icon = 'success';
            $tb = 'Xác nhận thành công';
        } else if ($mess == 'Tạo thành công') {
            $icon = 'success';
            $tb = 'Tạo thành công';
        } else if ($mess == 'Tạo thất bại') {
            $icon = 'error';
            $tb = 'Tạo thất bại';
        } else if ($mess == 'BHYT đã tồn tại') {
            $icon = 'error';
            $tb = 'BHYT đã tồn tại';
        } else if ($mess == 'Xóa thành công') {
            $icon = 'success';
            $tb = 'Xóa thành công';
        }
        if ($mess) {


        ?>
    Swal.fire({
        position: 'top-end',
        icon: '<?= $icon ?>',
        title: '<?= $tb ?>',
        showConfirmButton: false,
        timer: 1500
    });
    <?php session()->put('thongbao', null);
        }
        ?>

    $('#thanhpho').change(function(event) {
        event.preventDefault();
        // let url='{{ url('staff/loadquanhuyen') }}';
        let thanhpho = $('#thanhpho').val();
        $.ajax({
            method: "POST",
            url: "{{ url('staff/loadquanhuyen') }}",
            data: {
                tp_ma: thanhpho
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option disabled selected>Chọn quận huyện</option>"
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.h_ma + "'>" + value.h_ten +
                        "</option>";
                })
                $('#huyen').html('').append(html);
            }
        })
    });
    $('#huyen').change(function(event) {
        event.preventDefault();
        // let url='{{ url('staff/loadthixa') }}';
        let huyen = $('#huyen').val();
        $.ajax({
            method: "POST",
            url: "{{ url('staff/loadthixa') }}",
            data: {
                h_ma: huyen
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option disabled selected>Chọn thị xã</option>"
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.x_ma + "'>" + value.x_ten +
                        "</option>";
                })
                $('#xa').html('').append(html);
            }
        })
    });


    $('.thanhpho').change(function(event) {
        event.preventDefault();
        // let url='{{ url('staff/loadquanhuyen') }}';
        var thanhpho = $(this).find("option:selected").val();

        // let thanhpho = $('.thanhpho').val();
        $.ajax({
            method: "POST",
            url: "{{ url('staff/loadquanhuyen') }}",
            data: {
                tp_ma: thanhpho
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option value=''>Chọn quận huyện</option>";
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.h_ma + "'>" + value.h_ten +
                        "</option>";
                })
                $('.huyen').html('').append(html);
            }
        })
    });




    $('.huyen').change(function(event) {
        event.preventDefault();


        let huyen = $(this).find("option:selected").val();
        $.ajax({
            method: "POST",
            url: "{{ url('staff/loadthixa') }}",
            data: {
                h_ma: huyen
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option value=''>Chọn thị xã</option>";
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.x_ma + "'>" + value.x_ten +
                        "</option>";
                })
                $('.xa').html('').append(html);
            }
        })
    });


});
</script>
<script src="{{ asset('staff/js/st_receive.js') }}"></script>
@endsection