@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý lịch trực</title>
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
                        <span class="admin_titile">Quản lý lịch trực</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addthuoc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                        <!-- <button class="btn btn-info ml-3 mb-3"  data-toggle="modal" data-target="#addthuoc">
                            Danh sách thuốc sắp hết hạn
                        </button> -->
                        <button class="btn btn-info float-right">Xuất file DS bệnh</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1 ">
                    <div class="col-md-12 pl-1 pr-1 " style="background-color: white;">
                        <h2 class="text-center">Danh sách lịch trực</h2>
                        <div class="row">
                            <div class="col-md-12 ml-3">
                                <select name="ngay" id="ngay">
                                    <option value="">10-10-2021 - 16-10-2021</option>
                                    <option value="">18-10-2021 - 22-10-2021</option>
                                    <option value="">25-10-2021 - 29-10-2021</option>
                                    <option value="">10-10-2021 - 16-10-2021</option>
                                    <option value="">10-10-2021 - 16-10-2021</option>
                                </select>

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-2"><button id="phongtt" class="btn btn-primary w-100">Phòng tiếp tân</button></div>
                            <div class="col-md-2"><button id="phong1" class="btn btn-primary w-100">Phòng khám 1</button></div>
                            <div class="col-md-2"><button id="phong2" class="btn btn-primary w-100">Phòng khám 2</button></div>
                            <div class="col-md-2"><button id="phong3" class="btn btn-primary w-100">Phòng khám 3</button></div>
                            <div class="col-md-2"><button id="phongcls" class="btn btn-primary w-100">Phòng cận lâm sàng</button></div>
                            <div class="col-md-2"><button id="phongtn" class="btn btn-primary w-100">Phòng thu ngân</button></div>
                        </div>
                        <div class="row mt-3">
                            <table class="display pt-2 mx-3" border="1" style="width:100%;">
                                <thead>
                                    <tr class="tbl_header">
                                        <th colspan="2" class="text-center">Phòng</th>
                                        <th class="text-center">Thứ 2</th>
                                        <th class="text-center">Thứ 3</th>
                                        <th class="text-center">Thứ 4</th>
                                        <th class="text-center">Thứ 5</th>
                                        <th class="text-center">Thứ 6</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th class="text-center" rowspan="2">Phòng tiếp tân</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>

                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

                                    </tr>
                                    
                                        <tr>
                                        <th class="text-center" rowspan="2">Phòng thu ngân</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>

                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

                                    </tr>
                                   
                                        <tr>
                                        <th class="text-center" rowspan="2">Phòng khám 1</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>

                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

                                    </tr>
                                  
                                        <tr>
                                        <th class="text-center" rowspan="2">Phòng khám 2</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>

                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

                                    </tr>
                                  
                                        <tr>
                                        <th class="text-center" rowspan="2">Phòng khám 3</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>

                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

                                    </tr>
                                    <tr>
                                        <th class="text-center" rowspan="2">Phòng CLS</th>
                                        <th>Nhân viên 1 </th>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                        <td>Đinh Văn Khỉ</td>
                                        <td>Huỳnh KP Ngân</td>
                                    </tr>
                                    <tr>
                                        <th>Nhân viên 2 </th>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>
                                        <td>Chó Mèo Gà Vitj</td>
                                        <td>Hồng Huệ Thu Thọ</td>

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
@endsection
@section('admin_add_js')
<script>
    $(document).ready(function() {
        $('#dsbenh').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
            },
        });
        $(".select2").select2();
    });

  
    $('#quanlylichtruc').addClass('active');
</script>
@endsection