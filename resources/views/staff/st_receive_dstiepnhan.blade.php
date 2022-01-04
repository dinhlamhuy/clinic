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
                    <a class="nav-link link2 " id="receives"  href="{{ url('staff/receive') }}">Thông tin tiếp nhận</a>
                    <a class="nav-link link2 active" id="list_receive" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Danh sách tiếp nhận</a>
                    <a class="nav-link link2" id="list_appointment_schedule" href="{{ url('staff/dsdatlichhen') }}">Danh sách đặt lịch hẹn</a>
                    <a class="nav-link link2" href="{{ url('staff/dsbenhnhan') }}">Danh sách bệnh nhân </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  " id="nav-home" role="tabpanel" aria-labelledby="receives"></div>
                <div class="tab-pane fade mt-3 show active" id="nav-contact" role="tabpanel" aria-labelledby="list_receive">
                    <table id="dstiepnhan" class="display" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">SĐT</th>
                                <th class="text-center">PKB</th>
                                <th class="text-center">Phòng khám</th>
                                <th class="text-center">Bác sĩ khám</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($dstiepnhan as $tiepnhan)
                            <?php
                            if(strtotime(date('Y-m-d', strtotime($tiepnhan->ngaylap)))==strtotime(date('Y-m-d'))){
                                if($tiepnhan->ttk_ma=='1' || $tiepnhan->ttk_ma=='4'){
                                ?>
                            <tr>
                                <td width="9%;" class="text-center">{{ 'BN'.sprintf('%05d',$tiepnhan->bn_ma) }}</td>
                                <td width="16%;">{{ $tiepnhan->bn_ten }} </td>
                                <td width="8%;" class="text-center">{{ $tiepnhan->bn_gioitinh }}</td>
                                <td width="7%;" class="text-center">{{ $tiepnhan->bn_sdt }}</td>
                                <td width="8%;" class="text-center">
                                    <a href="{{ url('/staff/print_medical_bill/' . $tiepnhan->pkb_ma) }}"
                                        target="_blank">Xem phiếu</a>
                                </td>
                                <td width="12%;" class="text-center">{{ $tiepnhan->p_ten }}</td>
                                <td width="16%;">{{ $tiepnhan->nv_ten }}</td>
                                <td width="12%;" class="text-center">{{ $tiepnhan->ttk_ten }}</td>
                                <td width="12%;" class="text-center">
                                    <button type="button" class="btn btn-info " data-toggle="modal"
                                        data-target="#staticBackdrop3"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></button>
                                    <!-- <button class="btn btn-danger"><i class="fa fa-times"
                                            aria-hidden="true"></i></button> -->
                                </td>
                            </tr>
                            <?php  }
                        } ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">SĐT</th>
                                <th class="text-center">PKB</th>
                                <th class="text-center">Phòng khám</th>
                                <th class="text-center">Bác sĩ khám</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hết modal -->
                    <!-- Modal chỉnh sửa -->
                    <div class="modal fade" id="staticBackdrop4" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hết modal -->
                </div>
                <div class="tab-pane fade mt-3" id="nav-profile" role="tabpanel"  aria-labelledby="list_appointment_schedule">
                </div>
                <div class="tab-pane fade mt-3" id="nav-dsbn" role="tabpanel" aria-labelledby="list_of_patients_examined">
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
<script src="{{ asset('staff/js/st_receive.js') }}"></script>
@endsection