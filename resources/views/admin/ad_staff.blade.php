@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý nhân viên</title>
@endsection
@section('admin_add_css')
    <!-- <link href="{{ asset('admin/css/style_ad_provider.css') }}" rel="stylesheet" /> -->

@endsection
@section('admin_add_content')
    <div class="row">
        <div class="col-md-12 px-0" style="background-color: #edf2f4;">
            <div class="row ">
                <div class="col-md-12 pl-4 pr-4">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <span class="admin_titile">Quản lý nhân viên</span>
                            <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addnhanvien"><i
                                    class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>

                            <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-1 pr-1 pt-1" style="background-color: white;">
                            <table id="dsnhanvien" class="display pt-2" style="width:100%;">
                                <thead>
                                    <tr class="tbl_header">
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên NV</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">G.tính</th>
                                        <th class="text-center">Ngày sinh</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Chức vụ</th>
                                        <th class="text-center">Phòng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dsnhanvien as $nv)
                                        <tr>
                                            <td width="7%;" class="text-center">{{ 'NV'.sprintf('%03d',$nv->nv_ma )}}</td>
                                            <td width="28%;" >
                                                {{ $nv->nv_ten }}
                                            </td>
                                            <td width="10%;">
                                                <?php 
                                                $avatar='';
                                                if(empty($nv->nv_hinhanh)){
                                                    $avatar='noimg.jpg';
                                                }else {
                                                    
                                                    $avatar=$nv->nv_hinhanh;
                                                } ?>
                                                <center><img src="{{ asset('imgnhanvien/'.$avatar)}}" alt="" style="width: 85px;"></center></td>
                                            <td width="6%;" class="text-center">{{ $nv->nv_gioitinh }}</td>
                                            <td width="10%;" class="text-center">{{ $nv->nv_ngaysinh }}</td>

                                            <td width="12%;">{{ $nv->nv_email }}</td>
                                            {{-- <td width="15%;">{{ $nv->nv_hinhanh }}</td> --}}
                                            <td width="7%;">
                                                {{ $nv->cv_ten }}
                                            </td>
                                            <td width="22%;">
                                                {{ 'P' . $nv->p_ma . '-' . $nv->p_ten }}
                                            </td>
                                            <td width="7%;" class="text-center">
                                                <button type="button" class="btn btn-info text-center" data-toggle="modal"
                                                    data-target="#editnv{{ $nv->nv_ma }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                                <!-- Modal edit nhân viên-->
                                                <div class="modal fade" id="editnv{{ $nv->nv_ma }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Thông
                                                                    tin nhân viên</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ URL::to('/admin/edit_staff') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="row form-group">
                                                                                        @if ($nv->nv_hinhanh == '')
                                                                                            <img src="{{ asset('/imgnhanvien/noimg.jpg') }}"
                                                                                                alt=""
                                                                                                class="form-control"
                                                                                                style="height:200px;">
                                                                                        @else
                                                                                            <img src="{{ asset('/imgnhanvien/' . $nv->nv_hinhanh) }}"
                                                                                                alt=""
                                                                                                class="form-control"
                                                                                                style="height:200px;">
                                                                                        @endif
                                                                                        <input type="file" name="nvien_hinhanh"  class="form-control">
                                                                                </div>
                                                                                <input type="hidden" name="nv_ma"
                                                                                    value="{{ $nv->nv_ma }}">
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Tên tài khoản:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="tentaikhoan"
                                                                                            value="{{ $nv->nv_tentaikhoan }}" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="" class="col-form-label chu float-left">Mật khẩu:</label>
                                                                                    <input type="password" class="form-control" name="matkhau" >
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Mã NV:</label>
                                                                                        <input type="text" class="form-control" value="{{ 'NV'.sprintf('%03d',$nv->nv_ma)}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for=""
                                                                                            class="col-form-label chu float-left">Họ
                                                                                            tên:</label>
                                                                                   <input
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            name="hoten"
                                                                                            value="{{ $nv->nv_ten }}" required>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-6">
                                                                                        <label for=""
                                                                                            class="col-form-label float-left chu">Chức
                                                                                            vụ:</label>
                                                                                        <select name="chucvu"
                                                                                            class="form-control w-100" required>
                                                                                            @foreach ($dschucvu as $cv)
                                                                                                <option
                                                                                                    value="{{ $cv->cv_ma }}"
                                                                                                    <?php if ($cv->cv_ma == $nv->cv_ma) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                                                                    {{ $cv->cv_ten }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="" class="float-left col-form-label chu">Phòng trực:</label>
                                                                                        <select class="form-control w-100"
                                                                                            name="phong" required>
                                                                                            @foreach ($dsphong as $dsp)
                                                                                                <option
                                                                                                    value="{{ $dsp->p_ma }}"
                                                                                                    <?php if ($dsp->p_ma == $nv->p_ma) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                                                                    {{ $dsp->p_ten }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for=""
                                                                                            class="col-form-label float-left chu">Giới
                                                                                            tính:</label>
                                                                                        <select name="gioitinh"
                                                                                            class=" form-control w-100" required>

                                                                                            <option
                                                                                                value="{{ $nv->nv_gioitinh }}"
                                                                                                selected>
                                                                                                {{ $nv->nv_gioitinh }}
                                                                                            </option>
                                                                                            <option value="Nam">Nam</option>
                                                                                            <option value="Nữ">Nữ</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label for=""
                                                                                            class="float-left col-form-label chu">Ngày
                                                                                            sinh:</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="ngaysinh"
                                                                                            value="{{ date('Y-m-d', strtotime($nv->nv_ngaysinh)) }}" required>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label for=""
                                                                                            class="col-form-label float-left chu">CCCD:</label>
                                                                                        <input type="tel"
                                                                                            class="form-control"
                                                                                            name="sdt"
                                                                                            value="{{ $nv->nv_cmnd }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-6">
                                                                                        <label for=""
                                                                                            class="col-form-label float-left chu"
                                                                                            >Số điện thoại:</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="cmnd"
                                                                                            value="{{ $nv->nv_sdt }}" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="" class="col-form-label float-left chu">Email:</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            name="email"
                                                                                            value="{{ $nv->nv_email }}" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for=""
                                                                                            class="col-form-label float-left chu">Địa
                                                                                            chỉ:</label>
                                                                                        <textarea name="diachi" rows="2"
                                                                                            class="form-control" required>{{ $nv->nv_diachi }}</textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label float-left chu">Trạng thái tài khoản:</label>
                                                                                        <label for="trangthai1">
                                                                                            <input
                                                                                                type="radio"
                                                                                                name="trangthai"
                                                                                                id="trangthai1" value="1"
                                                                                                <?php if ($nv->nv_trangthai == '1') {
                                                                                                    echo 'checked';
                                                                                                } ?> >Mở</label>
                                                                                        &emsp;
                                                                                        <label for="trangthai0"><input
                                                                                                type="radio"
                                                                                                name="trangthai"
                                                                                                id="trangthai0" value="0"
                                                                                                <?php if ($nv->nv_trangthai == '0') {
                                                                                                    echo 'checked';
                                                                                                } ?>>Khóa</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <center>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Thoát</button>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-floppy-o"
                                                                                aria-hidden="true"></i>&ensp;Lưu</button>
                                                                    </center>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <button class="btn btn-danger float-left ml-1"><i class="fa fa-times"
                                                        aria-hidden="true"></i></button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên NV</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">G.tính</th>
                                        <th class="text-center">Ngày sinh</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Chức vụ</th>
                                        <th class="text-center">Phòng</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <table style="display:none;" id="xuatexcelnv">
                        <tr>
                            <td colspan="10"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <tr>
                            <td colspan="10"><H2 style="font-weight:bold;text-align:center">DANH SÁCH NHÂN VIÊN</H2></td>
                        </tr>
                        <tr></tr>
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Họ tên</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Phòng</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Tên tài khoản</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Giới tính</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Ngày sinh</span></th>
                                <th class="text-center"><span style="font-weight:bold;">CCCD</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Số điện thoại</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Địa chỉ email</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Địa chỉ</span></th>
                                {{-- <th class="text-center"><span style="font-weight:bold;">Ngày tạo</span></th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dsnhanvien as $dsnv)
                                <tr>
                                    <td>{{ 'NV'.sprintf('%02d',$dsnv->nv_ma ) }}</td>
                                    <td>{{ $dsnv->nv_ten }}</td>
                                    <td>

                                        {{ 'P' . $dsnv->p_ma . ' ' . $dsnv->p_ten }}

                                    </td>
                                    <td>{{ $dsnv->nv_tentaikhoan }}</td>
                                    <td>{{ $dsnv->nv_gioitinh }}</td>
                                    <td>{{ $dsnv->nv_ngaysinh }}</td>
                                    <td>{{ $dsnv->nv_cmnd }}</td>
                                    <td>{{ $dsnv->nv_sdt }}</td>
                                    <td>{{ $dsnv->nv_email }}</td>
                                    <td>{{ $dsnv->nv_diachi }}</td>
                                    {{-- <td>{{ $dsnv->ngaytaonv }}</td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal addnhanvien-->
    <div class="modal fade" id="addnhanvien" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Thêm nhân viên</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ URL::to('/admin/add_staff') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <img src="{{ asset('/imgnhanvien/noimg.jpg') }}" alt=""
                                                class="form-control" style="height:200px;">
                                            <input type="file" name="nvien_hinhanh" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="chu">Tên tài khoản:</label>
                                        <input type="text" class="form-control" name="nvien_tentaikhoan" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="" class="chu">Mật khẩu:</label>
                                            <input type="password" class="form-control" name="nvien_matkhau" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="col-form-label chu">Họ tên:</label>
                                        <input type="text" class="form-control" name="nvien_ten" required>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">Giới tính</label>
                                            <select class="form-control  w-100 " name="nvien_gioitinh" required>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">Ngày sinh:</label>
                                            <input type="date" class="form-control" name="nvien_ngaysinh" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">CCCD:</label>
                                            <input type="text" class="form-control" name="nvien_cmnd" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu">Chức vụ:</label>
                                            <select class=" form-control w-100" name="cv_ma" required>
                                                <option value="" disabled selected >-- Chọn chức vụ --</option>
                                                @foreach ($dschucvu as $dscv)
                                                    <option value="{{ $dscv->cv_ma }}">{{ $dscv->cv_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class=" col-form-label chu">Phòng trực:</label>
                                            <select class=" form-control w-100" name="p_ma" required>
                                                <option value="" disabled selected >-- Chọn phòng trực --</option>
                                                @foreach ($dsphong as $dsp)
                                                    <option value="{{ $dsp->p_ma }}">{{ $dsp->p_ten }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu">Số điện thoại:</label>
                                            <input type="tel" class="form-control" name="nvien_sdt" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu">Email:</label>
                                            <input type="email" class="form-control" name="nvien_email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="" class="col-form-label chu">Địa chỉ:</label>
                                            <textarea name="nvien_diachi" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                                aria-hidden="true"></i>&ensp;Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('admin_add_js')
    <script src="{{ asset('admin/js/ad_staff.js') }}"></script>
    <script>
        $(document).ready(function() {

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
    </script>
@endsection
