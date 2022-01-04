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
                    <a class="nav-link link2" id="list_appointment_schedule" href="{{ url('staff/dsdatlichhen') }}">Danh sách đặt lịch hẹn</a>
                    <a class="nav-link link2 active" id="list_of_patients_examined" data-toggle="tab" href="#nav-dsbn"
                        role="tab" aria-controls="nav-dsbn" aria-selected="false">Danh sách bệnh nhân </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  " id="nav-home" role="tabpanel" aria-labelledby="receives"></div>
                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel" aria-labelledby="list_receive"></div>
                <div class="tab-pane fade mt-3" id="nav-profile" role="tabpanel" aria-labelledby="list_appointment_schedule"></div>
                <div class="tab-pane fade mt-3 show active" id="nav-dsbn" role="tabpanel"
                    aria-labelledby="list_of_patients_examined">
                    <table id="dsbenhnhan" class="display" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Năm sinh</th>
                                <th class="text-center">SĐT</th>
                                <th class="text-center">Thành phố</th>
                                <th class="text-center">Huyện</th>
                                <th class="text-center">Xã</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dsbenhnhancu as $bncu)
                            <?php $trangthai = '';
                                    foreach ($dsphieukhambenh as $pkb) {
                                        if ($pkb->bn_ma == $bncu->bn_ma) {
                                            $trangthai = $pkb->ttk_ma;
                                        }
                                    }
                                    ?>
                            @if ($trangthai == '1' || $trangthai == '3')
                            <tr>
                                <td class="text-center" width="9%">{{ 'BN'.sprintf('%05d',$bncu->bn_ma) }}</td>
                                <td width="24%">{{ $bncu->bn_ten }}</td>
                                <td class="text-center" width="8%">{{ $bncu->bn_gioitinh }}</td>
                                <td width="10%">{{ $bncu->bn_ngaysinh }}</td>
                                <td width="10%">{{ $bncu->bn_sdt }}</td>
                                <td width="15%">{{ $bncu->tp_ten }}</td>
                                <td width="15%">{{ $bncu->h_ten }}</td>
                                <td width="15%">{{ $bncu->x_ten }}</td>
                                <td class="text-center" width="4%">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#ttinbncu{{ $bncu->bn_ma }}">
                                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    </button>
                                    <!-- Modal thông tin lịch hẹn -->
                                    <div class="modal fade" id="ttinbncu{{ $bncu->bn_ma }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="staticBackdropLabel"  style="font-weight:bold;color:#0077b6;">Tạo phiếu khám bệnh</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">

                                                        <form action="{{ URL::to('/staff/re_create_medical_records') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="lichhen_ma" value="">
                                                            <input type="hidden" name="benhnhan_ma"
                                                                value="{{ $bncu->bn_ma }}">
                                                            <div class="row mt-1">

                                                                <div class="col-md-12"
                                                                    style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                                                    <div class="row mt-1">
                                                                        <div class="col-md-6 ">
                                                                            <div class="form-group">
                                                                                <label for="" class="chu float-left col-form-label">Mã BN</label>
                                                                                <input type="text"class="form-control"value="{{ 'BN' . sprintf('%05d', $bncu->bn_ma) }}"disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="chu float-left col-form-label">Họ tên<span class="star">*</span></label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="hoten"
                                                                                    value="{{ $bncu->bn_ten }}"
                                                                                    autocomplete="off" disabled>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="chu float-left col-form-label">Quốc tịch<span class="star">*</span></label>
                                                                                    <select name="quoctich"
                                                                                        class="form-control" disabled>
                                                                                        @foreach ($dsquoctich as
                                                                                        $quoctich)
                                                                                        <option
                                                                                            value="{{ $quoctich->qt_ma }}" <?php if ($quoctich->qt_ma == $bncu->qt_ma) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                                            {{ $quoctich->qt_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="chu float-left col-form-label">Dân Tộc<span class="star">*</span></label>
                                                                                    <select name="dantoc" id=""
                                                                                        class="form-control" disabled>
                                                                                        @foreach ($dsdantoc as $dantoc)
                                                                                        <option
                                                                                            value="{{ $dantoc->dtoc_ma }}" <?php if ($dantoc->dtoc_ma == $bncu->dtoc_ma) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                                            {{ $dantoc->dtoc_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="chu float-left col-form-label">Nghề nghiệp<span class="star">*</span></label>
                                                                                    <select name="nghenghiep"
                                                                                        class="form-control" required>
                                                                                        <option value="1"  >-- Nghề nghiệp --</option>
                                                                                        @foreach ($dsnghenghiep as
                                                                                        $nghenghiep)

                                                                                        <option
                                                                                            value="{{ $nghenghiep->nn_ma }}" <?php if ($nghenghiep->nn_ma == $bncu->nn_ma) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                                            {{ $nghenghiep->nn_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Ngày sinh<span class="star">*</span></label>
                                                                                    <input type="date"
                                                                                        class="form-control px-0"
                                                                                        name="ngaysinh" 
                                                                                        value="{{ date('Y-m-d', strtotime($bncu->bn_ngaysinh)) }}"
                                                                                        disabled>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="float-left chu col-form-label">Giới tính<span class="star">*</span></label>
                                                                                    <select name="gioitinh"
                                                                                        class="form-control" disabled>
                                                                                        <option
                                                                                            value="{{ $bncu->bn_gioitinh }}"
                                                                                            selected>
                                                                                            {{ $bncu->bn_gioitinh }}
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="float-left chu col-form-label">Tuổi</label>
                                                                                    <input type="number"
                                                                                        class="form-control" id="tuoi"
                                                                                        value="{{ floor((time() - strtotime($bncu->bn_ngaysinh)) / 31556926) }}" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="col-form-label chu float-left">Số điện thoại</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="sdt"
                                                                                        value="{{ $bncu->bn_sdt }}">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="" class="float-left chu col-form-label">CMND</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="cmnd"
                                                                                        value="{{ $bncu->bn_cmnd }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label chu float-left">Email</label>
                                                                                <input type="text" class="form-control" name="email" value="{{ $bncu->bn_email }}">
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="col-form-label chu float-left">Tỉnh / thành phố<span class="star">*</span></label>
                                                                                    <select name="thanhpho"
                                                                                        class="thanhpho form-control" required>
                                                                                        <option value="" selected disabled>-Tỉnh / thành phố-</option>
                                                                                        @foreach ($dsthanhpho as
                                                                                        $thanhpho)
                                                                                        <option
                                                                                            value="{{ $thanhpho->tp_ma }}" <?php if ($bncu->tp_ma == $thanhpho->tp_ma) {
                                                                                                                echo 'selected';
                                                                                                            } ?>>
                                                                                            {{ $thanhpho->tp_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="col-form-label chu float-left">Quận / huyện<span class="star">*</span></label>
                                                                                    <select name="huyen"
                                                                                        class="form-control huyen" required>
                                                                                        <option
                                                                                            value="{{ $bncu->h_ma }}">
                                                                                            {{ $bncu->h_ten }}
                                                                                        </option>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="" class="col-form-label chu float-left">Thị xã<span class="star">*</span></label>
                                                                                    <select name="xa" class="form-control xa" required>
                                                                                        <option
                                                                                            value="{{ $bncu->x_ma }}">{{ $bncu->x_ten }}</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="" class="col-form-label chu float-left">Địa chỉ cụ thể</label>
                                                                                    <textarea name="diachi" rows="2" class="form-control">{{ $bncu->bn_diachi }}</textarea>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <center><h3 class="col-form-label" style="font-weight:bold;color:rgb(112, 182, 209);font-size:25px;">BHYT</h3></center>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        $othu1 = '';
                                                                        $maothu1 = '';
                                                                        $othu2 = '';
                                                                        $maothu2 = '';
                                                                        $othu3 = '';
                                                                        $maothu3 = '';
                                                                        $maso = '';
                                                                        $thoigianbg = '';
                                                                        $thoigiankt = '';
                                                                        foreach ($dsbhyt as $bhyt) {
                                                                            if ($bncu->bn_ma == $bhyt->bn_ma) {
                                                                                // $doituong='$bhyt->dt_ma'; $quyenloi='$bhyt->ql_ma'; $noicap='$bhyt->nc_ma';
                                                                                $othu1 = $bhyt->dt_ten;
                                                                                $maothu1 = $bhyt->dt_ma;
                                                                                $othu2 = $bhyt->ql_so;
                                                                                $maothu2 = $bhyt->ql_ma;
                                                                                $othu3 = $bhyt->nc_so;
                                                                                $maothu3 = $bhyt->nc_ma;
                                                                                $maso = $bhyt->bhyt_maso;
                                                                                $thoigianbg = date('Y-m-d', strtotime($bhyt->bhyt_ngaybatdau));
                                                                                $thoigiankt = date('Y-m-d', strtotime($bhyt->bhyt_ngayketthuc));
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <div class="row form-group" style="padding-top: 40px;">
                                                                            <div class="col-md-2 px-1">
                                                                                <label for="" class="col-form-label chu float-left">Đ.tượng</label>
                                                                                    <select name="doituong" class="form-control select2 " style="font-size:14px;" >
                                                                                        <option value=""></option>
                                                                                       @foreach ($dsdoituong as $doituong)
                                                                                            <option value="{{ $doituong->dt_ma }}" <?php if($maothu1==$doituong->dt_ma){echo 'selected';} ?>>{{ $doituong->dt_ten }}</option>
                                                                                            @endforeach 
                                                                                    </select>
                                                                            </div>
                                                                            <div class="col-md-2 px-1">
                                                                                <label for="" class="col-form-label chu float-left">Q.lợi</label>
                                                                                    <select name="quyenloi" class="form-control select2 " style="font-size:14px;" >
                                                                                        <option value=""></option>
                                                                                       @foreach ($dsquyenloi as $quyenloi)
                                                                                                <option value="{{ $quyenloi->ql_ma }}" <?php if($maothu2==$quyenloi->ql_ma){echo 'selected';} ?>>{{ $quyenloi->ql_so }}</option>
                                                                                            @endforeach 
                                                                                    </select>
                                                                            </div>
                                                                            <div class="col-md-2 px-1">
                                                                                <label for="" class="col-form-label chu float-left">N.cấp</label>
                                                                                <select name="noicap" class="form-control select2 " style="font-size:14px;" >
                                                                                    <option value=""></option>
                                                                                    @foreach ($dsnoicap as $noicap)
                                                                                        <option value="{{ $noicap->nc_ma }}" <?php if($maothu3==$noicap->nc_ma){echo 'selected';} ?> >{{ $noicap->nc_so }}</option>
                                                                                        @endforeach 
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="" class="col-form-label chu float-left">Mã số BHYT</label>
                                                                                <input type="text"
                                                                                        class="form-control" name="bhyt"
                                                                                        value="{{ $maso }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-5">
                                                                                <label for="" class="chu float-left col-form-label">Thời gian BHYT</label>
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        style="font-size: 14px;"
                                                                                        name="ngaybdbhyt"
                                                                                        value="{{ $thoigianbg }}">
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <label for="" class=" col-form-label chu text-center" style="margin-top:30px;">đến</label>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <label for="" class="chu float-left col-form-label">Thời gian kết thúc</label>
                                                                                <input type="date"
                                                                                        class="form-control"
                                                                                        style="font-size: 14px;"
                                                                                        name="ngayktbhyt"
                                                                                        value="{{ $thoigiankt }}">
                                                                            </div>
                                                                        </div>
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
                                                                <div class="row mt-1">
                                                                    <div class="col-md-3"></div>
                                                                    <div class="col-md-6">
                                                                        <hr class="phancachngang">
                                                                    </div>
                                                                    <div class="col-md-3"></div>
                                                                </div>
                                                                    <div class="row mt-1">
                                                                        <div class="col-md-6 ">
                                                                            <div class="form-group">
                                                                                    <label for="" class="float-left chu col-form-label">Phòng khám<span class="star">*</span></label>
                                                                                    <select name="phong" class="form-control" required>
                                                                                        <option value="" selected disabled >-- Chọn phòng khám --</option>
                                                                                        @foreach ($dsphong as $phong)
                                                                                        <option
                                                                                            value="{{ $phong->p_ma }}">
                                                                                            {{ $phong->p_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        <div class="col-md-6 ">
                                                                            <div class="form-group">
                                                                                    <label class="float-left chu col-form-label">Loại hình khám<span class="star">*</span></label>
                                                                                    <select name="loaihinhkham" class="form-control loaihinhkham" required>
                                                                                        <option value="" disabled selected >-- Loại hình khám --</option>
                                                                                        @foreach ($dsloaihinhkham as $loaihinhkham)
                                                                                        <option
                                                                                            value="{{ $loaihinhkham->lhk_ma }}">
                                                                                            {{ $loaihinhkham->lhk_ten }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <!-- <input type="text" name="loaihinhkham" id="loaihinhkham" class="form-control"> -->
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3"></div>
                                                                        <div class="col-md-3">
                                                                            <button type="submit"
                                                                                class="btn btn-success w-100 show_confirm">
                                                                                <i class="fa fa-floppy-o"
                                                                                    aria-hidden="true">&ensp;</i>Tạo phiếu khám
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <button type="button"
                                                                                class="btn btn-secondary w-100"
                                                                                data-dismiss="modal">Hủy</button>
                                                                            <!-- <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu &ensp;&&ensp; <i class="fa fa-print" aria-hidden="true"></i> in phiếu</button> -->
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
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Năm sinh</th>
                                <th class="text-center">SĐT</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Thành phố</th>
                                <th class="text-center">Huyện</th>
                                <th class="text-center">Xã</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('st_add_js')
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
        } else if ($mess == 'Xóa thành công') {
            $icon = 'success';
            $tb = 'Xóa thành công';
        
        } else if ($mess == 'BHYT đã tồn tại') {
            $icon = 'error';
            $tb = 'BHYT đã tồn tại';
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
                        title: 'Tạo phiếu khám bệnh?',
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
                html = "<option  value='' selected disabled>Chọn quận huyện</option>"
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
                html = "<option  value='' selected disabled>Chọn thị xã</option>"
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
                html = "<option value='' selected disabled>Chọn quận huyện</option>";
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
                html = "<option value='' selected disabled>Chọn thị xã</option>";
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