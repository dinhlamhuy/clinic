@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý nhóm thuốc</title>
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
                        <span class="admin_titile">Quản lý nhóm thuốc</span>
                        {{-- <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addnhomthuoc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button> --}}
                        <button class="btn btn-info mb-3 mt-2 float-right" id="btn-dsnhomthuoc"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                        <div class="row pt-1">
                            <div class="col-md-4" style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm Nhóm thuốc </h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_group_medicine') }}" class="pt-1" method="post">
                                    @csrf
                                        <input type="text" name="tennhom" class="form-control" placeholder="Nhập tên nhóm thuốc mới" required>
                                    <center>
                                    <button type="submit" class="btn btn-success mt-2"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                    </center>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table id="dsnhomthuoc" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên nhóm thuốc</th>
                                            {{-- <th class="text-center">Ghi chú</th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsnhomthuoc as $nhomthuoc)
                                        <tr>
                                            <td width="10%;" class="text-center">{{ 'NT'.sprintf('%03d',$nhomthuoc->nt_ma) }}</td>
                                            <td width="40%;" class="text-break">{{ $nhomthuoc->nt_ten }}</td>
                                            {{-- <td width="40%;">{{ $nhomthuoc->nt_ghichu }}</td> --}}
                                            <td width="10%;" class="text-center">
                                                <button type="button" class="btn btn-info float-left ml-3" data-toggle="modal" data-target="#editnhomthuoc{{ $nhomthuoc->nt_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <!-- Modal edit ncc -->
                                                <div class="modal fade" id="editnhomthuoc{{ $nhomthuoc->nt_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Thông tin nhóm thuốc</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ URL::to('/admin/edit_group_medicine') }}" method="post">
                                                                    @csrf
                                                                        <input type="hidden" name="manhom" class="form-control" value="{{ $nhomthuoc->nt_ma }}">
                                                                        <div class="form-group">
                                                                                <label for="" class="float-left chu col-form-label">Mã nhóm:</label>
                                                                                <input type="text"  class="form-control" value="{{ 'NT'.sprintf('%03d',$nhomthuoc->nt_ma) }}" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="" class="col-form-label float-left chu">Tên nhóm thuốc:</label>
                                                                                <input type="text" name="tennhom" class="form-control" value="{{ $nhomthuoc->nt_ten }}" required>
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
                                                <form action="{{ URL::to('/admin/delete_group_medicine') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="manhom" value="{{ $nhomthuoc->nt_ma }}">
        
                                                <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table id="filexuat" class="display pt-2 d-none" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên nhóm thuốc</th>
                                            {{-- <th class="text-center">Ghi chú</th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsnhomthuoc as $nhomthuoc)
                                        <tr>
                                            <td width="10%;" class="text-center">{{ 'NT'.sprintf('%03d',$nhomthuoc->nt_ma) }}</td>
                                            <td width="40%;" class="text-break">{{ $nhomthuoc->nt_ten }}</td>
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
    $(document).ready(function() {
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
                        title: 'Chắc chắn xóa?',
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
    $("#btn-dsnhomthuoc").click(function() {
            $("#filexuat").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachNhomThuoc",
                fileext: ".xls"
            })
        });
</script>
<script src="{{asset('admin/js/ad_group_medicine.js')}}"></script>
@endsection