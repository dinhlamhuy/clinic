@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý xã</title>
@endsection
@section('admin_add_css')
<!-- <link href="{{asset('admin/css/style_ad_provider.css')}}" rel="stylesheet" /> -->
@endsection
@section('admin_add_content')
<div class="row">
    <div class="col-md-12 px-0" style="background-color: #edf2f4;">
        <div class="row ">
            <div class="col-md-12 pl-4 pr-4">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <span class="admin_titile">Quản lý xã / phường</span>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                        <div class="row pt-1">
                            <div class="col-md-4"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm xã / phường mới</h4>
                                </center>
                                <form action="{{ url('/admin/add_wards') }}" class="mt-1" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                        <select name="tp_ma" class="select2 form-control thanhpho">
                                            <option value="" disabled selected>-- Chọn tỉnh / thành phố --</option>
                                            @foreach ($dsthanhpho as $thanhpho)
                                            <option value="{{ $thanhpho->tp_ma }}">{{ $thanhpho->tp_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-12">
                                            <select name="h_ma" class="select2 form-control huyen" required>
                                                {{-- @foreach ($dshuyen as $huyen)
                                                <option value="{{ $huyen->h_ma }}">{{ $huyen->h_ten }}</option>
                                                @endforeach --}}
                                                <option value="" disabled selected>-- Chọn quận / huyện --</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" name="tenxa" placeholder="Nhập tên xã / phường mới" required>
                                        </div>
                                    </div>
                                            <div class="row mt-2">
                                        <div class="col-md-12">
                                            <center>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                            </button>
                                        </center>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table id="dsquoctich" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên tỉnh / thành phố</th>
                                            <th class="text-center">Tên quận / huyện</th>
                                            <th class="text-center">Tên xã / phường</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dsxa as $xa)
                                            
                                        <tr>
                                            <td width="10%;" class="text-center">{{ 'X'.sprintf('%04d', $xa->x_ma )}}</td>
                                            <td width="20%;" class="text-center">{{ $xa->tp_ten }}</td>
                                            <td width="20%;" class="text-center">{{ $xa->h_ten }}</td>
                                            <td width="23%;" class="text-break">
                                            {{ $xa->x_ten }}
                                            </td>
                                            <td width="12%;" class="text-center">

                                                <button type="button" class="btn btn-info float-left ml-1" data-toggle="modal"
                                                    data-target="#edithuyen{{ $xa->x_ma }}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>

<!-- Modal edit xã -->
<div class="modal fade" id="edithuyen{{ $xa->x_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin xã / phường</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/edit_wards') }}" method="post">
                    @csrf
                        <div class="form-group">
                                <label for="" class="col-form-label float-left chu">Mã xã / phường:</label>
                                <input type="hidden" name="x_ma"  value="{{ $xa->x_ma }}">
                                <input type="text" class="form-control" disabled value="{{ 'X'.sprintf('%04d',$xa->x_ma) }}">
                        </div>
                        <div class="form-group">
                                <label for="" class="col-form-label float-left chu">Tỉnh / thành phố:</label>
                                <select name="h_ma" class="select2 form-control thanhpho">
                                    
                                    @foreach ($dsthanhpho as $thanhpho)
                                    <option value="{{ $thanhpho->tp_ma }}" <?php if($xa->tp_ma == $thanhpho->tp_ma){ echo 'selected';}  ?>>{{ $thanhpho->tp_ten }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-form-label float-left chu">Tên quận / huyện:</label>
                                <select name="h_ma" class="select2 form-control huyen">
                                    @foreach ($dshuyen as $huyen)
                                    <option value="{{ $huyen->h_ma }}" <?php if($xa->h_ma == $huyen->h_ma){ echo 'selected';}  ?>>{{ $huyen->h_ten }}</option>
                                    @endforeach
                                </select>
                      
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label float-left chu">Tên xã / phường:</label>
                            <input type="text" class="form-control" name="x_ten" value="{{ $xa->x_ten }}">
                        </div>
                    <center><button type="button" class="btn btn-secondary center" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary center"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>&ensp;Lưu</button>
                    </center>
                    </form>
                </div>
        </div>
    </div>
</div>

                                                        <form action="{{ URL::to('/admin/delete_wards') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" name="x_ma" value="{{ $xa->x_ma }}">
                                                            <button class="btn btn-danger float-left ml-1 show_confirm" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('admin_add_js')
<script>
    $('#quanlykhambenh').addClass('active');
$('#quanlyxa').addClass('active');
$(document).ready(function() {


    $('#dsquoctich').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });

    
    $('.thanhpho').change(function(event) {
        event.preventDefault();
        // let url='{{ url('staff/loadquanhuyen') }}';
        var thanhpho = $(this).find("option:selected").val();

        // let thanhpho = $('.thanhpho').val();
        $.ajax({
            method: "POST",
            url: "{{ url('admin/loadquanhuyen') }}",
            data: {
                tp_ma: thanhpho
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option value=''>-- Chọn quận/huyện --</option>";
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.h_ma + "'>" + value.h_ten +
                        "</option>";
                })
                $('.huyen').html('').append(html);
            }
        })
    });
    $(".select2").select2();
    <?php
            $mess = session()->get('thongbao');
            $icon = '';
            $tb = '';
            if ($mess == 'Đã tồn tại') {
                $icon = 'error';
                $tb = 'Đã tồn tại';
            } else if ($mess == 'Thêm mới thành công') {
                $icon = 'success';
                $tb = 'Thêm mới thành công';
            } else if ($mess == 'Cập nhật thành công') {
                $icon = 'success';
                $tb = 'Cập nhật thành công';
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
            });
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("manhom");
                event.preventDefault();
                Swal.fire({
                        title: 'Bạn chắc chưa?',
                        text: "Bạn sẽ xóa xã này",
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



</script>
@endsection