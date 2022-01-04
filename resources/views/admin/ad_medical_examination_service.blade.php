@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý loại hình khám bệnh</title>
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
                        <span class="admin_titile">Quản lý loại hình khám bệnh</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addlhk"><i
                                class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 " style="background-color: white;">
                        <table id="dslhk" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên loại hình khám</th>
                                    <th class="text-center">Giá tiền</th>
                                    <th class="text-center">Tiền chênh lệch</th>
                              
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="5%;" class="text-center">T00001</td>
                                    <td width="30%;" class="text-break">
                                        Khám bảo hiểm y tế
                                    </td>
                                    <td width="25%;">0</td>
                                    <td width="25%;">
                                       30.000
                                    </td>
                                    <td width="15%;" class="text-center">
                                        <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#editlhk"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-times"
                                                aria-hidden="true"></i></button>
                                    </td>
                                </tr>
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
            </div>
        </div>
    </div>
</div>
<!-- Modal addlhk -->
<div class="modal fade" id="addlhk" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm loại hình khám</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Tên loại hình:</label>
                                    </div>
                                    <div class="col-md-9"><input type="text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Giá tiền:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        VNĐ
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Tiền chênh lệch:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        VNĐ
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>&ensp;Lưu</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit lhk -->
<div class="modal fade" id="editlhk" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Mã loại hình:</label>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" disabled></div>
                        </div>
                        <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Tên loại hình:</label>
                                    </div>
                                    <div class="col-md-9"><input type="text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Giá tiền:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        VNĐ
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label">Tiền chênh lệch:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        VNĐ
                                    </div>
                                </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>&ensp;Lưu</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('admin_add_js')
<script>
    $(document).ready(function() {
    $('#dslhk').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    $(".select2").select2();
} );

$('#quanlykhambenh').addClass('active');
$('#quanlyloaihinhkham').addClass('active');
</script>
@endsection