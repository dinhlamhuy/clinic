@extends('staff.st_layout')
@section('st_title')
<title>Tiếp nhận bệnh nhân</title>
@endsection
@section('st_add_css')
<link rel="stylesheet" href="{{ asset('staff/css/style_st_receive.css') }}">
@endsection
@section('st_content')
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12 px-0 mx-0">
            <nav class="frames_receive ">
                <div class="nav nav-tabs nav-receive" id="nav-tab" role="tablist">
                    <a class="nav-link link2 " id="receives" href="{{ url('staff/receive') }}">Thông tin tiếp nhận</a>
                    <a class="nav-link link2" id="list_receive" href="{{ url('staff/dstiepnhan') }}">Danh sách tiếp nhận</a>
                    <a class="nav-link link2 active" id="list_appointment_schedule" data-toggle="tab" href="#nav-profile"
                        role="tab" aria-controls="nav-profile" aria-selected="false">Danh sách đặt lịch hẹn</a>
                    <a class="nav-link link2" id="list_of_patients_examined" href="{{ url('staff/dsbenhnhan') }}">Danh sách bệnh nhân </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  " id="nav-home" role="tabpanel" aria-labelledby="receives">
                  
                </div>
                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel" aria-labelledby="list_receive">
                </div>
                <div class="tab-pane fade mt-3 show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="list_appointment_schedule">

                    <table id="dsdatlichhen" class="display w-100" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Stt</th>
                                <th class="text-center">Người hẹn</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Người khám</th>
                                <th class="text-center">Ngày hẹn</th>
                                <th class="text-center">Buổi hẹn</th>
                                <th class="text-center">Khung giờ</th>
                                <th class="text-center">Triệu chứng</th>
                                <th class="text-center">Ngày đặt</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($dslichhen as $dk)
                            <?php
                                    $doituong_ma=''; $quyenloi_ma=''; $noicap_ma=''; $bhyt_maso=''; $bhyt_ngaybatdau='';
                                    $bhyt_ngayketthuc=''; $thanhpho_ma=''; $huyen_ma=''; $xa_ma=''; $thanhpho_ten='';
                                    $huyen_ten=''; $xa_ten='';
                                    $bn_ma='';
                            foreach ($dsbhyt as $bhyt) {
                                if($dk->bn_ma==$bhyt->bn_ma){
                                    $doituong_ma=$bhyt->dt_ma; $quyenloi_ma=$bhyt->ql_ma;
                                    $noicap_ma=$bhyt->nc_ma; $bhyt_maso=$bhyt->bhyt_maso;
                                    $bhyt_ngaybatdau=$bhyt->bhyt_ngaybatdau; $bhyt_ngayketthuc=$bhyt->bhyt_ngayketthuc;
                                    $thanhpho_ma=$bhyt->tp_ma; $huyen_ma=$bhyt->h_ma;
                                    $xa_ma=$bhyt->x_ma; $thanhpho_ten=$bhyt->tp_ten;
                                    $huyen_ten=$bhyt->h_ten; $xa_ten=$bhyt->x_ten;
                                    $bn_ma=$dk->bn_ma;
                                }
                            }
                            if ($dk->ttlh_ma != '3') {
                            ?>
                            <tr>
                                <td style="width:5%;" class="text-center">{{ $i++ }}</td>
                                <td style="width:15%;"><?php
                                            if ($dk->dk_hotennd == '') {
                                                echo $dk->dk_hoten;
                                            } else {
                                                echo $dk->dk_hotennd;
                                            }
                                        ?>
                                </td>
                                <td style="width:10%;" class="text-center"><?php
                                            if ($dk->dk_hotennd == '') {
                                                echo $dk->dk_sdt;
                                            } else {
                                                echo $dk->dk_sdtnd; 
                                            }
                                        ?></td>
                                <td style="width:15%;">{{ $dk->dk_hoten }}</td>
                                <td style="width:8%;" class="text-center">
                                    {{ date('d/m/Y', strtotime($dk->lh_ngay)) }}</td>
                                <td style="width:5%;" class="text-center">{{ $dk->buoi_ten }}</td>
                                <td style="width:4%;" class="text-center">{{ $dk->kg_khunggio }}</td>
                                <td style="width:15%;"><?php
                                            $str = '';
                                            foreach ($dsctlh as $ctlh) {
                                                if ($ctlh->lh_ma == $dk->lh_ma) {
                                                    $str .= $ctlh->tclh_ten . ',';
                                                }
                                            }
                                            echo rtrim($str, ',');
                                        ?></td>
                                        {{-- {{ $dk->ttlh_ten }} --}}
                                <td style="width:5%;" class="text-center">{{ date('d/m/Y', strtotime($dk->ngaydat)) }}</td>

                                
                                <?php 
                                    if($dk->ttlh_ten == 'Chưa xác nhận'){
                                        echo '<td class="text-center font-weight-bold" style="width:10%; color:#c73866;">Chưa xác nhận</td>';
                                    }else if($dk->ttlh_ten == 'Đã xác nhận'){
                                        echo '<td class="text-center font-weight-bold" style="width:10%; color:#428cd4;">Đã xác nhận</td>';
                                    
                                    }else if($dk->ttlh_ten == 'Đã hủy'){
                                        echo '<td class="text-center font-weight-bold" style="width:10%; color:#dd0606;">Đã hủy</td>';
                                    }
                                ?>
                               
                                <td style="width:8%;" class="text-center">
                                    <?php
                                        if ($dk->ttlh_ma == '2') { ?>
                                    <button type="button" class="btn btn-info float-left" data-toggle="modal"
                                        data-target="#ttinlichhen{{ $dk->lh_ma }}">
                                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    </button>
                                    <!-- Modal thông tin lịch hẹn -->
                                    <div class="modal fade" id="ttinlichhen{{ $dk->lh_ma }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="staticBackdropLabel" style="font-weight:bold;color:#0077b6;">Tạo phiếu khám bệnh</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        <form action="{{ URL::to('/staff/create_medical_records') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="lichhen_ma"
                                                                value="{{ $dk->lh_ma }}">
                                                            <input type="hidden" name="benhnhan_ma"
                                                                value="{{ $dk->bn_ma }}">
                                                            <div class="row mt-1">
                                                                <div class="col-md-12"
                                                                    style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-6 ">
                                                                            <div class="form-group">
                                                                                    <label for="" class="float-left chu col-form-label">Mã BN</label>
                                                                                    <?php 
                                                                                    $mabn='';
                                                                                    if($dk->bn_ma!=0){
                                                                                        $mabn='BN' . sprintf('%05d', $dk->bn_ma);
                                                                                    } ?>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $mabn }}"
                                                                                        disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="float-left chu col-form-label">Họ tên<span class="star">*</span></label>
                                                                                <input type="text" class="form-control" name="hoten" value="{{ $dk->dk_hoten }}" autocomplete="off" id="hoten">
                                                                                <span id="ktraht" class="error"></span>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Quốc tịch<span class="star">*</span></label>
                                                                                    <select name="quoctich"
                                                                                        class="form-control">
                                                                                        @foreach ($dsquoctich as
                                                                                        $quoctich)
                                                                                        <option
                                                                                            value="{{ $quoctich->qt_ma }}">
                                                                                            {{ $quoctich->qt_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Dân Tộc<span class="star">*</span></label>
                                                                                    <select name="dantoc" id=""
                                                                                        class="form-control">
                                                                                        @foreach ($dsdantoc as $dantoc)
                                                                                        <option
                                                                                            value="{{ $dantoc->dtoc_ma }}">
                                                                                            {{ $dantoc->dtoc_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="float-left chu col-form-label">Nghề nghiệp<span
                                                                                        class="star">*</span></label></label>
                                                                                    <select name="nghenghiep"
                                                                                        class="form-control" required>
                                                                                        <option value="" disabled selected>- Nghề nghiệp -</option>
                                                                                        @foreach ($dsnghenghiep as
                                                                                        $nghenghiep)

                                                                                        <option
                                                                                            value="{{ $nghenghiep->nn_ma }}">
                                                                                            {{ $nghenghiep->nn_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left col-form-label chu">Giới tính<span class="star">*</span></label>
                                                                                    <select name="gioitinh"
                                                                                        class="form-control">
                                                                                        <option value="Nam" selected>Nam</option>
                                                                                        <option value="Nữ">Nữ</option>
                                                                                        <option value="Khác">Khác</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Ngày sinh<span class="star">*</span></label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        name="ngaysinh"
                                                                                        value="{{ date('Y-m-d', strtotime($dk->dk_ngaysinh)) }}">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="float-left chu col-form-label">Tuổi</label>
                                                                                    <input type="number"
                                                                                        class="form-control" id="tuoi"
                                                                                        value="{{ floor((time() - strtotime($dk->dk_ngaysinh)) / 31556926) }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="float-left chu col-form-label">Số điện thoại</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="sdt"
                                                                                        value="{{ $dk->dk_sdt }}">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="float-left chu col-form-label">CMND</label>
                                                                                    <input type="text" class="form-control" name="cmnd" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label chu float-left">Email</label>
                                                                                <input type="text" class="form-control" name="email" value="{{ $dk->dk_email }}">
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Tỉnh / thành phố<span
                                                                                        class="star">*</span></label>
                                                                                    <select name="thanhpho"
                                                                                        id="thanhpho{{ $dk->dk_ma }}"
                                                                                        onchange="loadhuyen('{{ $dk->dk_ma }}');"
                                                                                        class="thanhpho form-control" required>
                                                                                        <option selected disabled value="">- Tỉnh / thành phố -</option>
                                                                                        @foreach ($dsthanhpho as
                                                                                        $thanhpho)
                                                                                        <option
                                                                                            value="{{ $thanhpho->tp_ma }}"
                                                                                            <?php if($thanhpho->tp_ma==$thanhpho_ma){echo 'selected';} ?>>
                                                                                            {{ $thanhpho->tp_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="float-left chu col-form-label">Quận / Huyện<span
                                                                                        class="star">*</span></label>
                                                                                    <select name="huyen" id="huyen{{ $dk->dk_ma }}" class="form-control huyen" onchange="loadxa('{{ $dk->dk_ma }}');" required>
                                                                                        <option selected disabled value="">- Quận / Huyện -</option>
                                                                                        <option value="{{ $huyen_ma }}">
                                                                                            {{ $huyen_ten }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Xã / Phường<span
                                                                                        class="star">*</span></label>
                                                                                    <select name="xa" class="form-control xa" id="xa{{ $dk->dk_ma }}" required>
                                                                                        <option selected disabled value="">- Xã / Phường -</option>
                                                                                        <option value="{{ $xa_ma }}">
                                                                                            {{ $xa_ten }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="float-left chu col-form-label">Địa chỉ cụ thể</label>
                                                                                <textarea name="diachi" rows="2"
                                                                                    class="form-control">{{ $dk->dk_diachi }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 ">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="float-left chu col-form-label">Lịch hẹn</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        name="lt_ngay"
                                                                                        style="font-size: 14px;"
                                                                                        value="{{ date('Y-m-d', strtotime($dk->lh_ngay)) }}">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="float-left chu col-form-label">Giờ</label>
                                                                                        <select name="khunggio"
                                                                                            class="form-control">
                                                                                            @foreach ($dskhunggio as
                                                                                            $khunggio)
                                                                                            <option
                                                                                                value="{{ $khunggio->kg_ma }}" <?php if ($khunggio->kg_ma == $dk->kg_ma) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                                                {{ $khunggio->kg_khunggio }}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                            </div>
                                                                            </div>
                                                                            <center><h5 style="font-weight:bold;color:rgb(112, 182, 209);font-size:25px;padding-top:50px;">BHYT</h5></center>
                                                                            <div class="row form-group mt-2">
                                                                                <div class="col-md-2">
                                                                                    <label for="" class="chu float-left col-form-label">Đ.tượng</label>
                                                                                    <select name="doituong" class="form-control select2 px-1">
                                                                                        <option value=""></option>
                                                                                        @foreach ($dsdoituong as
                                                                                        $doituong)
                                                                                        <option
                                                                                            value="{{ $doituong->dt_ma }}"
                                                                                            <?php if( $doituong_ma==$doituong->dt_ma){ echo 'selected';} ?>>
                                                                                            {{ $doituong->dt_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="" class="chu float-left col-form-label">Q.lợi</label>
                                                                                    <select name="quyenloi"
                                                                                        class="form-control select2 px-1">
                                                                                        <option value=""></option>

                                                                                        @foreach ($dsquyenloi as
                                                                                        $quyenloi)
                                                                                        <option
                                                                                            value="{{ $quyenloi->ql_ma }}"
                                                                                            <?php if($quyenloi_ma==$quyenloi->ql_ma){ echo 'selected';} ?>>
                                                                                            {{ $quyenloi->ql_so }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="" class="float-left chu col-form-label">N.cấp</label>
                                                                                    <select name="noicap"
                                                                                        class="form-control select2 px-1">
                                                                                        <option value=""></option>
                                                                                        @foreach ($dsnoicap as $noicap)
                                                                                        <option
                                                                                            value="{{ $noicap->nc_ma }}"
                                                                                            <?php if($noicap_ma==$noicap->nc_ma){ echo 'selected';} ?>>
                                                                                            {{ $noicap->nc_so }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="col-form-label chu float-left">Mã BHYT</label>
                                                                                    <input type="text"
                                                                                    class="form-control px-1"
                                                                                    name="bhyt"
                                                                                    value="{{ $bhyt_maso }}">
                                                                                </div>
                                                                            </div>
                                                                            <?php if(!empty($dk->bn_ma)){?>
                                                                            <div class="row form-group">
                                                                                    <div class="col-md-5">
                                                                                        <label for="" class="float-left chu col-form-label">Thời gian BHYT</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            style="font-size: 14px;"
                                                                                            name="ngaybdbhyt"
                                                                                            value="{{ $bhyt_ngaybatdau }}">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <label for="" class="chu float-left col-form-label" style="margin-top:30px;">đến</label>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <label for="" class="chu float-left col-form-label">Thời gian kết thúc</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            style="font-size: 14px;"
                                                                                            name="ngayktbhyt"
                                                                                            value="{{ $bhyt_ngayketthuc }}">
                                                                                    </div>
                                                                            </div>
                                                                            <?php } else { ?>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-5">
                                                                                    <label for="" class="float-left col-form-label chu">Thời gian BHYT</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        style="font-size: 14px;"
                                                                                        name="ngaybdbhyt">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="" class="chu text-center col-form-label" style="margin-top:30px;">đến</label>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <label for="" class="chu float-left col-form-label">Thời gian kết thúc</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        style="font-size: 14px;"
                                                                                        name="ngayktbhyt">
                                                                                </div>
                                                                            </div>
                                                                            <?php }?>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-3">
                                                                                    <label for="" class="chu col-form-label float-left">Đúng tuyến</label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <input type="checkbox" id="vehicle1"
                                                                                            name="vehicle1" value="1">
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-6">
                                                                                <hr class="phancachngang">
                                                                            </div>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-6 ">
                                                                            <label for="" class="float-left chu col-form-label">Phòng khám<span class="star">*</span></label>
                                                                                    <select name="phong" class="form-control" required>
                                                                                        <option value="" disabled selected>-- Chọn phòng khám --</option>
                                                                                        @foreach ($dsphong as $phong)
                                                                                        <option
                                                                                            value="{{ $phong->p_ma }}">
                                                                                            {{ $phong->p_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <span class="error" id="ktrphong"></span>
                                                                                </div>
                                                                        <div class="col-md-6 ">
                                                                                <label class="float-left chu col-form-label" >Loại hình khám<span class="star">*</span></label>
                                                                                    <select name="loaihinhkham" class="form-control" required>
                                                                                        <option value="" disabled selected>-- Chọn loại hình khám --</option>
                                                                                        @foreach ($dsloaihinhkham as
                                                                                        $loaihinhkham)
                                                                                        <option
                                                                                            value="{{ $loaihinhkham->lhk_ma }}">
                                                                                            {{ $loaihinhkham->lhk_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <!-- <input type="text" name="loaihinhkham" id="loaihinhkham" class="form-control"> -->
                                                                                </div>

                                                                            </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3"></div>
                                                                        <div class="col-md-3">
                                                                            <button type="submit"
                                                                                class="btn btn-success w-100">
                                                                                <i class="fa fa-floppy-o"
                                                                                    aria-hidden="true">&ensp;</i>Tạo
                                                                                phiếu khám
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button type="button"
                                                                                class="btn btn-secondary w-100"
                                                                                data-dismiss="modal">Hủy</button>
                                                                            </div>
                                                                        <div class="col-md-3"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hết modal thông tin lịch hẹn -->
                                    <?php } else { ?>
                                    @if($dk->ttlh_ma == '1')

                                    <form action="{{ URL::to('/staff/confirmation_receive') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="lichhen_ma" value="{{ $dk->lh_ma }}">
                                        <button type="submit" class="btn btn-success float-left show_confirm">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    @endif

                                    <!-- <form action="{{ URL::to('/staff/confirmation_receive') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="lichhen_ma" value="{{ $dk->lh_ma }}">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                </button>
                                            </form> -->
                                    <?php } ?>
                                    @if($dk->ttlh_ma == '1')
                                    <form action="{{ URL::to('/staff/delete_receive') }}" method="post"
                                        >
                                        @csrf
                                        <input type="hidden" name="lhen_ma" value="{{ $dk->lh_ma }} ">
                                        <button type="submit" class="btn btn-danger show_delete">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            <?php } ?>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Stt</th>
                                <th class="text-center">Người hẹn</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Người khám</th>
                                <th class="text-center">Ngày hẹn</th>
                                <th class="text-center">Buổi hẹn</th>
                                <th class="text-center">Khung giờ</th>
                                <th class="text-center">Triệu chứng</th>
                                <th class="text-center">Ngày đặt</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>


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
<script src="{{ asset('staff/js/st_receive.js') }}"></script>
<script>

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
        
        } else if ($mess == 'Hủy lịch hẹn thành công') {
            $icon = 'success';
            $tb = 'Hủy lịch hẹn thành công';
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
           
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("manhom");
                event.preventDefault();
                Swal.fire({
                        title: 'Xác nhận lịch hẹn?',
                        // text: "Bạn sẽ xóa nhóm bệnh",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Chắc chắn!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
            });
            $('.show_delete').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("manhom");
                event.preventDefault();
                Swal.fire({
                        title: 'Hủy lịch hẹn?',
                        // text: "Bạn sẽ xóa nhóm bệnh",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Chắc chắn!'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
            });

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
                html = "<option>Chọn quận huyện</option>"
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
                html = "<option>Chọn thị xã</option>"
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

@endsection