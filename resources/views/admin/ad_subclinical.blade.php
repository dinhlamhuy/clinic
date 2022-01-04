@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý CLS</title>
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
                        <span class="admin_titile">Quản lý cận lâm sàng</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addthuoc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                        <!-- <button class="btn btn-info ml-3 mb-3"  data-toggle="modal" data-target="#addthuoc">
                            Danh sách thuốc sắp hết hạn
                        </button> -->
                        <button class="btn btn-info float-right mt-2" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 pt-1" style="background-color: white;">
                        <table id="dscls" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên CLS</th>
                                    <th class="text-center">Mã NCLS</th>
                                    <th class="text-center">Tên NCLS</th>
                                    <th class="text-center">Giá BHYT</th>
                                    <th class="text-center">Giá DV</th>
                                    <th class="text-center">Giá C.lệch</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dscls as $cls)
                                <tr>
                                    <td width="9%;" class="text-center">{{ 'CLS'.sprintf('%04d',$cls->cls_ma) }}</td>
                                    <td width="20%;" class="text-break ">
                                        {{ $cls->cls_ten }}
                                    </td>
                                    <td width="5%;" class="text-center">{{ 'NCLS'.sprintf('%03d',$cls->ncls_ma) }}</td>
                                    <td width="15%;" class="text-center"><?php
                                                                            foreach ($dsncls as $ncls) {
                                                                                if ($cls->ncls_ma == $ncls->ncls_ma) {
                                                                                    echo $ncls->ncls_ten;
                                                                                }
                                                                            }

                                                                            ?></td>
                                    <td width="14%;" class="text-right">
                                        {{ number_format($cls->cls_giabhyt) }} VND
                                    </td>
                                    <td width="14%;" class="text-right">
                                        {{ number_format($cls->cls_giadv) }} VND
                                    </td>
                                    <td width="14%;" class="text-right">{{ number_format($cls->cls_tienchenhlech) }} VND</td>

                                    <td width="9%;" class="text-center">

                                        <button type="button" class="btn btn-info float-left " data-toggle="modal" data-target="#editcls{{ $cls->cls_ma}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <!-- Modal edit cận lâm sàng -->
                                        <div class="modal fade" id="editcls{{ $cls->cls_ma}}" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Thông tin CLS</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ URL::to('/admin/edit_subclinical') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="cls_ma" value="{{ $cls->cls_ma }}">
                                                            <div class="form-group">
                                                                <label for="" class="col-form-label chu float-left">Mã cận lâm sàng:</label>
                                                                <input type="text" class="form-control" value="{{ 'CSL'.sprintf('%04d',$cls->cls_ma) }}" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-form-label chu float-left">Tên CLS:</label>
                                                                <input type="text" class="form-control" name="cls_ten" value="{{ $cls->cls_ten }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="" class="col-form-label chu float-left">Nhóm cận lâm sàng:</label>
                                                                    <select class="select2 form-control w-100" name="ncls_ma" required>
                                                                        @foreach($dsncls as $ncls)
                                                                        <option value="{{ $ncls->ncls_ma }}" <?php if ($ncls->ncls_ma == $cls->ncls_ma) {
                                                                                                                    echo 'selected';
                                                                                                                } else {
                                                                                                                } ?>>{{ $ncls->ncls_ten }}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="col-form-label chu float-left">Giá BHYT (VND):</label>
                                                                    <input type="number" class="form-control" name="cls_giabhyt" value="{{ $cls->cls_giabhyt }}" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="" class="col-form-label chu float-left">Giá DV (VND):</label>
                                                                    <input type="number" class="form-control" name="cls_giadv" value="{{ $cls->cls_giadv }}" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="" class="col-form-label chu float-left">Giá chênh lệch (VND):</label>
                                                                    <input type="text" name="cls_tienchenhlech" class="form-control" value="{{ $cls->cls_tienchenhlech }}" required>
                                                            </div>
                                                            <div class="row w-100 mt-4 text-center">
<div class="col-md-12">

    <center>
        <button type="button" class="btn btn-secondary center" data-dismiss="modal">Thoát</button>
        <button type="submit" class="btn btn-primary center"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
    </center>
</div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ URL::to('/admin/delete_subclinical') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="cls_ma" value="{{ $cls->cls_ma }}">
                                            <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- <tfoot>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Nhóm thuốc</th>
                                    <th class="text-center">Tên thuốc</th>
                                    <th class="text-center">Gốc thuốc</th>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">CSD</th>
                                    <th></th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
                <table style="display:none;" id="xuatexcelcls"style="width:100%;">
                    <tr class="tbl_header">
                        <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Tên CLS</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Mã NCLS</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Tên NCLS</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Giá BHYT</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Giá DV</span></th>
                        <th class="text-center"><span style="font-weight:bold;">Giá chênh lệch</span></th>
                    </tr>
                    @foreach($dscls as $cls)
                    <tr>
                        <td width="9%;" class="text-center">{{ 'CLS'.sprintf('%04d',$cls->cls_ma) }}</td>
                        <td width="20%;" class="text-break ">
                            {{ $cls->cls_ten }}
                        </td>
                        <td width="5%;" class="text-center">{{ 'NCLS'.sprintf('%03d',$cls->ncls_ma) }}</td>
                        <td width="15%;" class="text-center"><?php
                                                                foreach ($dsncls as $ncls) {
                                                                    if ($cls->ncls_ma == $ncls->ncls_ma) {
                                                                        echo $ncls->ncls_ten;
                                                                    }
                                                                }

                                                                ?></td>
                        <td width="14%;" class="text-right">
                            {{ number_format($cls->cls_giabhyt) }} VND
                        </td>
                        <td width="14%;" class="text-right">
                            {{ number_format($cls->cls_giadv) }} VND
                        </td>
                        <td width="14%;" class="text-right">{{ number_format($cls->cls_tienchenhlech) }} VND</td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
<!-- Modal add CLS -->
<div class="modal fade" id="addthuoc" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm CLS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/add_subclinical') }}" method="post">
                    @csrf
                                <div class="form-group">
                                    <label for="" class="col-form-label chu float-left">Tên cận lâm sàng:</label>
                                    <input type="text" name="cls_ten" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-form-label chu float-left">Nhóm cận lâm sàng:</label>
                                        <select class="select2 form-control w-100" name="ncls_ma" required>
                                            <option value="" disabled selected>-- Chọn nhóm cận lâm sàng --</option>
                                            @foreach($dsncls as $ncls)
                                            <option value="{{ $ncls->ncls_ma }}">{{ $ncls->ncls_ten }}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label chu float-left">Giá BHYT (VND):</label>
                                        <input type="number" class="form-control" name="cls_giabhyt" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label chu float-left ">Giá dịch vụ (VND):</label>
                                        <input type="number" class="form-control" name="cls_giadv" required>
                                    </div>
                                    <div class="col-md-4">
                                    <label for="" class="col-form-label chu float-left">Giá chênh lệch (VND):</label>
                                    <input type="number" class="form-control" name="cls_tienchenhlech" required>
                                </div>
                       
                    </div>
                    <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                </center>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
@section('admin_add_js')
<script>
    $(document).ready(function() {
        $('#dscls').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
            },
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
                        title: 'Chắc chắn xóa CLS này?',
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

    $('#quanlycanlamsang').addClass('active');
    $('#quanlycls').addClass('active');


$("#btnexcel").click(function(){
    $("#xuatexcelcls").table2excel({
        name: "Worksheet Name",
        filename: "DanhSachCanLamSang",
        fileext: ".xls"
    }) 
 });
</script>
@endsection