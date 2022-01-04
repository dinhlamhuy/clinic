@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý nhóm bệnh</title>
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
                            <span class="admin_titile">Quản lý nhóm bệnh</span>
                            <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                            <div class="row pt-1">
                                <div class="col-md-4"
                                    style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                    <center>
                                        <h4 class="mt-2">Thêm nhóm bệnh </h4>
                                    </center>
                                    <form action="{{ URL::to('admin/add_group_diseases') }}" class="pt-1" method="post">
                                        @csrf
                                            <input type="text" name="tennhom" class="form-control" placeholder="Nhập tên nhóm bệnh" required>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <center>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                                </button>
                                                </center>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <table id="dsnhombenh" class="display pt-2" style="width:100%;">
                                        <thead>
                                            <tr class="tbl_header">
                                                <th class="text-center">Mã</th>
                                                <th class="text-center">Tên nhóm bệnh</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dsnhombenh as $nhombenh)
                                                <tr>
                                                    <td width="22%;" class="text-center">{{ 'NB'.sprintf('%03d',$nhombenh->nb_ma) }}</td>
                                                    <td width="63%;" class="text-break">
                                                        {{ $nhombenh->nb_ten }}
                                                    </td>
                                                    <td width="15%;" class="text-center">

                                                        <button type="button" class="btn btn-info float-left ml-2"
                                                            data-toggle="modal"
                                                            data-target="#editncls{{ $nhombenh->nb_ma }}"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></button>
                                                        <!-- Modal edit nhóm bệnh -->
                                                        <div class="modal fade" id="editncls{{ $nhombenh->nb_ma }}"
                                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="staticBackdropLabel">
                                                                            Thông tin nhóm bệnh</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ URL::to('admin/edit_group_diseases') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="container-fluid">
                                                                                <div class="row form-group">
                                                                                        <label for="" class="col-form-label float-left chu">Mã nhóm:</label>
                                                                                        <input type="hidden" class="form-control" name="manhom" value="{{ $nhombenh->nb_ma }}">
                                                                                        <input type="text" class="form-control" value="{{ 'NB'.sprintf('%03d',$nhombenh->nb_ma) }}" disabled>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label for="" class="col-form-label chu float-left">Tên nhóm:</label>
                                                                                    <input type="text" class="form-control" name="tennhom" value="{{ $nhombenh->nb_ten }}" required>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Thoát</button>
                                                                            <button type="submit" class="btn btn-primary"><i
                                                                                    class="fa fa-floppy-o"
                                                                                    aria-hidden="true"></i>&ensp;Lưu</button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{ URL::to('admin/delete_group_diseases') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="manhom"
                                                                value="{{ $nhombenh->nb_ma }}">
                                                            <button type="submit"
                                                                class="btn btn-danger float-right mr-2 btn-flat show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    class="fa fa-times" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
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
        $('#dsnhombenh').DataTable({
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
                        title: 'Chắc chắn xóa nhóm bệnh?',
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
    $('#quanlybenh').addClass('active');
    $('#quanlynhombenh').addClass('active');
</script>

@endsection
