@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý nhà cung cấp</title>
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
                        <span class="admin_titile">Quản lý nhà cung cấp</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addncc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                        <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel">Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1 ">
                    <div class="col-md-12 pl-1 pr-1 pt-2 " style="background-color: white;">
                        <table id="dsncc" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên nhà cung cấp</th>
                                    <th class="text-center">SĐT</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dsnhacungcap as $nhacc)
                                <tr>
                                    <td width="9%;" class="text-center">{{ 'NCC'.sprintf('%03d',$nhacc->ncc_ma) }}</td>
                                    <td width="28%;" class="text-break">{{ $nhacc->ncc_ten }}</td>
                                    <td width="13%;">{{ $nhacc->ncc_sdt }}</td>
                                    <td width="15%;">{{ $nhacc->ncc_email }}</td>
                                    <td width="25%;">{{ $nhacc->ncc_diachi }}</td>
                                    <td width="10%;" class="text-center">
                                        <button type="button" class="btn btn-info float-left ml-1" data-toggle="modal" data-target="#editncc{{ $nhacc->ncc_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <!-- Modal edit ncc -->
                                        <div class="modal fade" id="editncc{{ $nhacc->ncc_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Thông tin nhà cung cấp</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ URL::to('/admin/edit_supplier') }}" method="post">
                                                        @csrf
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Mã nhà cung cấp:</label>
                                                                    <input type="hidden" name="ncc_ma" class="form-control" value="{{ $nhacc->ncc_ma }}">
                                                                    <input type="text" class="form-control" value="{{ 'NCC'.sprintf('%03d',$nhacc->ncc_ma) }}" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Tên nhà cung cấp:</label>
                                                                    <input type="text" name="ncc_ten" class="form-control" value="{{ $nhacc->ncc_ten }}" required>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-6">
                                                                    <label for="" class="col-form-label float-left chu">Số điện thoại:</label>
                                                                    <input type="tel" name="ncc_sdt" class="form-control" value="{{ $nhacc->ncc_sdt }}" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="" class="col-form-label float-left chu">Email:</label>
                                                                    <input type="email" name="ncc_email" class="form-control" value="{{ $nhacc->ncc_email }}" required>
                                                                </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Địa chỉ:</label>
                                                                    <textarea name="ncc_diachi" id="" rows="2" class="form-control" required>{{ $nhacc->ncc_diachi }}</textarea>
                                                                </div>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                                        </form>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ URL::to('/admin/delete_supplier') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ncc_ma" value="{{ $nhacc->ncc_ma }}">
                                        <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <table style="display:none;" id="xuatexcelncc">
                    <tr>
                        <td colspan="5"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td colspan="5"><H2 style="font-weight:bold;text-align:center">DANH SÁCH NHÀ CUNG CẤP</H2></td>
                    </tr>
                    <tr></tr>
                <thead>
                                <tr class="tbl_header">
                                    <th class="text-center"><span style="font-weight:bold;"> Mã </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Tên nhà cung cấp </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> SĐT </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Email </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Địa chỉ </span></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dsnhacungcap as $nhacc)
                                <tr>
                                    <td width="5%;" class="text-center">{{ 'NCC'.sprintf('%03d',$nhacc->ncc_ma) }}</td>
                                    <td width="28%;" class="text-break">{{ $nhacc->ncc_ten }}</td>
                                    <td width="15%;" class="float-right">{{ $nhacc->ncc_sdt }}</td>
                                    <td width="15%;">{{ $nhacc->ncc_email }}</td>
                                    <td width="25%;">{{ $nhacc->ncc_diachi }}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal addncc -->
<div class="modal fade" id="addncc" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm nhà cung cấp</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/add_supplier') }}" method="post">
                    @csrf
                    <div class="container-fluid">
                        <div class="form-group">
                           
                            <label for="" class="col-form-label chu float-left">Tên nhà cung cấp:</label>
                            <input type="text" name="ncc_ten" class="form-control" required>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Số điện thoại:</label>
                                <input type="tel" name="ncc_sdt" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Email:</label>
                                <input type="email" name="ncc_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label float-left chu">Địa chỉ:</label>
                            <textarea name="ncc_diachi" id="" rows="2" class="form-control" required></textarea>
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

$('#quanlykho').addClass('active');
$('#quanlyncc').addClass('active');

$(document).ready(function() {
    $('#dsncc').DataTable({
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
                        title: 'Chắn chắn xóa nhà cung cấp này?',
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
    
    
} );

 $("#btnexcel").click(function(){
    $("#xuatexcelncc").table2excel({
        name: "Worksheet Name",
        filename: "DanhSachNCC",
        fileext: ".xls"
    }) 
 });
    
</script>
{{-- <script src="{{asset('admin/js/ad_supplier.js')}}"></script>  --}}
@endsection