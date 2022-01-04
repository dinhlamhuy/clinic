@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý cách sử dụng thuốc</title>
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
                        <span class="admin_titile">Quản lý cách sử dụng thuốc</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addcsd"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 " style="background-color: white;">
                        <table id="dscsd" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Cách sử dụng</th>
                                    <th class="text-center">Ghi chú</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="10%;" class="text-center">01</td>
                                    <td width="40%;" class="text-break">Dược Pharma htght hythth ghght hghgfghjgjyjyhjyjyjyjhtgh hmhjkhlo
                                        rfytr nyt retgre</td>
                                    <td width="40%;">0964012396</td>
                                    <td width="10%;" class="text-center">
                                        <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#editcsd"><i class="fa fa-pencil-square-o"
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
<!-- Modal addcsd -->
<div class="modal fade" id="addcsd" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm cách sử dụng thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Cách sử dụng:</label>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control"></div>
                        </div>
                        <!-- <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Ghi chú:</label>
                            </div>
                            <div class="col-md-9"><textarea name="" id="" rows="2" class="form-control"></textarea></div>
                        </div> -->
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
<!-- Modal edit csd -->
<div class="modal fade" id="editcsd" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin cách sử dụng thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Mã:</label>
                            </div>
                            <div class="col-md-9"><input type="text" class="form-control" disabled></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Cách sử dụng:</label>
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
    <script src="{{asset('admin/js/ad_using_medicine.js')}}"></script>
@endsection