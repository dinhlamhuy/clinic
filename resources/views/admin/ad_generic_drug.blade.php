@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý thuốc gốc</title>
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
                        <span class="admin_titile">Quản lý gốc thuốc / hoạt chất</span>
                        {{-- <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addgocthuoc"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button> --}}
                        <button class="btn btn-info mb-3 mt-2 float-right" id="btn-dsthuocgoc"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-2 mt-2" style="background-color: white;">
                        <div class="row pt-1">
                            <div class="col-md-4" style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm gốc thuốc / hoạt chất </h4>
                                </center>
                                
                                <form action="{{ URL::to('admin/add_generic_drug') }}" class="pt-1" method="post">
                                    @csrf
                                    <input type="text" name="tg_ten" placeholder="Nhập tên gốc thuốc / hoạt chất mới" class="form-control" required>
                                    <center>
                                    <button type="submit" class="btn btn-success pt-2 mt-2"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                    </center>
                                </form>
                                
                            </div>
                            <div class="col-md-8">

                                <table id="dsgocthuoc" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên gốc thuốc / hoạt chất</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsthuocgoc as $thuocgoc)
                                        <tr>
                                            <td width="13%;" class="text-center">{{ 'TG'.sprintf('%04d',$thuocgoc->tg_ma) }}</td>
                                            <td width="70%;" class="text-break">{{ $thuocgoc->tg_ten }}</td>
                                           
                                            <td width="17%;" class="text-center">
                                                <button type="button" class="btn btn-info float-left ml-3" data-toggle="modal" data-target="#editgocthuoc{{ $thuocgoc->tg_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <!-- Modal edit ncc -->
                                                <div class="modal fade" id="editgocthuoc{{ $thuocgoc->tg_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Thông tin gốc thuốc</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ URL::to('admin/edit_generic_drug') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="tg_ma" value="{{ $thuocgoc->tg_ma }}">
                                                                   
                                                                        <div class="form-group">
                                                                            <label for="" class="col-form-label chu float-left">Mã gốc thuốc:</label>
                                                                            <input type="text" class="form-control" value="{{ 'GT'.sprintf('%04d',$thuocgoc->tg_ma) }}" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="" class="col-form-label chu float-left">Tên gốc thuốc:</label>
                                                                            <input type="text" name="tg_ten" value="{{ $thuocgoc->tg_ten }}" class="form-control" required>
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
                                                <form action="{{ URL::to('admin/delete_generic_drug') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="tg_ma" value="{{ $thuocgoc->tg_ma }}">
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
                                            <th class="text-center">Tên gốc thuốc / hoạt chất</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsthuocgoc as $thuocgoc)
                                        <tr>
                                            <td width="13%;" class="text-center">{{ 'TG'.sprintf('%04d',$thuocgoc->tg_ma) }}</td>
                                            <td width="70%;" class="text-break">{{ $thuocgoc->tg_ten }}</td>
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
                        title: 'Chắn chắn xóa?',
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
                $("#btn-dsthuocgoc").click(function() {
            $("#filexuat").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachThuocGoc",
                fileext: ".xls"
            })
        });
</script>
<script src="{{asset('admin/js/ad_generic_drug.js')}}"></script>
@endsection