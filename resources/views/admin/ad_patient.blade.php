@extends('admin.ad_layout')
@section('admin_add_title')
<title>Danh sách Bệnh nhân</title>
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
                        <span class="admin_titile">Danh sách bệnh nhân</span>
                        {{-- <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addncc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button> --}}
                        <button class="btn btn-info mb-3 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1 ">
                    <div class="col-md-12 pl-1 pr-1 pt-1 " style="background-color: white;">
                        <table id="dsncc" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên BN</th>
                                    <th class="text-center">G.tính</th>
                                    <th class="text-center">N.sinh</th>
                                    <th class="text-center">SĐT</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">CMND</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dsbenhnhan as $dsbn)
                                <tr>
                                    <td width="6%;" class="text-center">{{ 'BN'.sprintf('%05d',$dsbn->bn_ma) }}</td>
                                    <td width="15%;" class="text-break">{{ $dsbn->bn_ten }}</td>
                                    <td width="7%;" class="text-center">{{ $dsbn->bn_gioitinh }}</td>
                                    <td width="10%;">{{ $dsbn->bn_ngaysinh }}</td>
                                    <td width="9%;">{{ $dsbn->bn_sdt }}</td>
                                    <td width="15%;">{{ $dsbn->bn_email }}</td>
                                    <td width="10%;">{{ $dsbn->bn_cmnd }}</td>
                                    <td width="23%;" class="text-break">{{ $dsbn->bn_diachi.' '.$dsbn->x_ten.', '.$dsbn->h_ten.', '.$dsbn->tp_ten }}</td>
                                    <td width="5%;" class="text-center">
                                        <button type="button" class="btn btn-info float-left ml-1" data-toggle="modal" data-target="#editncc{{ $dsbn->bn_ma }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <!-- Modal edit bệnh nhân -->
                                        <div class="modal fade" id="editncc{{ $dsbn->bn_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Thông tin bệnh nhân</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                        @csrf
                                                            <div class="container-fluid">
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Mã BN:</label>
                                                                    {{-- <input type="hidden" name="ncc_ma" class="form-control" value="{{ $nhacc->ncc_ma }}"> --}}
                                                                    <input type="text" class="form-control" value="{{ 'BN'.sprintf('%05d',$dsbn->bn_ma) }}" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Tên BN:</label>
                                                                    <input type="text" ư class="form-control" value="{{ $dsbn->bn_ten }}">
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="" class="col-form-label float-left chu">Quốc tịch:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->qt_ten }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="float-left col-form-label chu">Dân tộc:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->dtoc_ten }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="col-form-label float-left chu">Giới tính:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->bn_gioitinh }}">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="float-left col-form-label chu">Ngày sinh:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->bn_ngaysinh }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-6">
                                                                        <label for="" class="col-form-label float-left chu">SDT:</label>
                                                                        <input type="tel" class="form-control" value="{{ $dsbn->bn_sdt }}">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="" class="float-left chu col-form-label">CMND:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->bn_cmnd }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="col-form-label float-left chu">Thành phố:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->tp_ten }}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="" class="float-left col-form-label chu">Huyện:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->h_ten }}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="" class="col-form-label float-left chu">Xã:</label>
                                                                        <input type="text" class="form-control" value="{{ $dsbn->x_ten }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="" class="col-form-label float-left chu">Địa chỉ cụ thể:</label> 
                                                                        <textarea rows="2" class="form-control">{{ $dsbn->bn_diachi .' '. $dsbn->x_ten .','. $dsbn->h_ten .', '. $dsbn->tp_ten }}</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                            {{-- <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button> --}}
                                                        </form>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <form action="" method="post">
                                                    @csrf
                                                    <input type="hidden" name="ncc_ma" value="{{ $dsbn->bn_ma }}">
                                        <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button> --}}
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
                        <td colspan="11"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                    </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr>
                        <td colspan="11"><H2 style="font-weight:bold;text-align:center">DANH SÁCH BỆNH NHÂN</H2></td>
                    </tr>
                    <tr></tr>
                    <thead>
                                <tr class="tbl_header">
                                    <th class="text-center"><span style="font-weight:bold;"> Mã </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Họ tên </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Giới tính </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Năm sinh </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> SĐT </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Email </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> CMND </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Thành phố </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Huyện </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Xã </span></th>
                                    <th class="text-center"><span style="font-weight:bold;"> Địa chỉ cụ thể </span></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dsbenhnhan as $dsbn)
                                <tr>
                                    <td class="text-center">{{ 'BN'.sprintf('%03d',$dsbn->bn_ma) }}</td>
                                    <td class="text-break">{{ $dsbn->bn_ten }}</td>
                                    <td >{{ $dsbn->bn_gioitinh }}</td>
                                    <td >{{ $dsbn->bn_ngaysinh }}</td>
                                    <td >{{ $dsbn->bn_sdt }}</td>
                                    <td >{{ $dsbn->bn_email }}</td>
                                    <td >{{ $dsbn->bn_cmnd }}</td>
                                    <td >{{ $dsbn->tp_ten }}</td>
                                    <td >{{ $dsbn->h_ten }}</td>
                                    <td >{{ $dsbn->x_ten }}</td>
                                    <td >{{ $dsbn->bn_diachi .' '. $dsbn->x_ten .','. $dsbn->h_ten .','. $dsbn->tp_ten }}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal addncc -->
{{-- <div class="modal fade" id="addncc" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Tên nhà cung cấp:</label>
                            </div>
                            <div class="col-md-9"><input type="text" name="ncc_ten" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Số điện thoại:</label>
                            </div>
                            <div class="col-md-9"><input type="tel" name="ncc_sdt" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-md-9"><input type="email" name="ncc_email" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Địa chỉ:</label>
                            </div>
                            <div class="col-md-9"><textarea name="ncc_diachi" id="" rows="2" class="form-control"></textarea></div>
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
</div> --}}
@endsection
@section('admin_add_js')
<script>

$('#danhsachbenhnhan').addClass('active');
// $('#quanlyncc').addClass('active');

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
        filename: "DanhSachBenhNhan",
        fileext: ".xls"
    }) 
 });
    
</script>
@endsection