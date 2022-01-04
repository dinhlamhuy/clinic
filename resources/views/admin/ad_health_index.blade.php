@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý chỉ số sức khỏe</title>
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
                        <span class="admin_titile">Quản lý chỉ số sức khỏe</span>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 " style="background-color: white;">
                        <div class="row pt-3 mt-2">
                            <div class="col-md-5"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm chỉ số mới</h4>
                                </center>
                                <form action="" method="post">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                        <label for="" class="float-right">Tên chỉ số:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <button class="btn btn-success float-right">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <table id="dschiso" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên chỉ số</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="20%;" class="text-center">T00001</td>
                                            <td width="60%;" class="text-break">
                                                tênmkfckfvifhgdghyt
                                            </td>
                                            <td width="20%;" class="text-center">

                                                <button type="button" class="btn btn-info " data-toggle="modal"
                                                    data-target="#editchiso"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger"><i class="fa fa-times"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
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
<!-- Modal edit chỉ số -->
<div class="modal fade" id="editchiso" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin chỉ số</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Mã chỉ số:</label>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" disabled></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Tên chỉ số:</label>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control"></div>
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
    $('#dschiso').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    $(".select2").select2();
});

$('#quanlykhambenh').addClass('active');
$('#quanlychiso').addClass('active');
</script>
@endsection