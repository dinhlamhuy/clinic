@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý nhóm cận lâm sàng</title>
@endsection
@section('admin_add_css')
<!-- <link href="{{asset('admin/css/style_ad_provider.css')}}" rel="stylesheet" /> -->
@endsection
@section('admin_add_content')
<div class="row">
    <div class="col-md-12 px-0" style="background-color: #edf2f4;">
        <div class="row ">
            <div class="col-md-12 pl-4 pr-4">
                <div class="row mt-1">
                    <div class="col-md-12">
                        <span class="admin_titile">Quản lý triệu chứng bệnh</span>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                        <div class="row pt-1">
                            <div class="col-md-4" style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm triệu chứng bệnh </h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_disease_symptoms') }}" class="pt-1" method="post">
                                    @csrf
                                    <input type="text" name="tennhom" class="form-control" required placeholder="Nhập triệu chứng bệnh">
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
                                <table id="dstcbenh" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên triệu chứng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dstcbenh as $tcbenh)
                                        <tr>
                                            <td width="20%;" class="text-center">{{ 'TCB'.sprintf('%04d',$tcbenh->tcb_ma ) }}</td>
                                            <td width="63%;" class="text-break">
                                                {{ $tcbenh->tcb_ten }}
                                            </td>
                                            <td width="17%;" class="text-center">

                                                <button type="button" class="btn btn-info float-left ml-3" data-toggle="modal" data-target="#editncls{{ $tcbenh->tcb_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <!-- Modal edit triệu chứng bệnh -->
                                                <div class="modal fade" id="editncls{{ $tcbenh->tcb_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Thông tin triệu chứng</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ URL::to('/admin/edit_disease_symptoms') }}" method="post">

                                                                    @csrf
                                                                    <div class="container-fluid">
                                                                        <div class="form-group">                                                                           
                                                                                <label for="" class="col-form-label float-left chu">Mã triệu chứng bệnh :</label>
                                                                                <input type="hidden" name="matcb"  value="{{ $tcbenh->tcb_ma }}">
                                                                                <input type="text"  class="form-control" value="{{ 'TCB'.sprintf('%04d',$tcbenh->tcb_ma) }}" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="" class="col-form-label float-left chu">Triệu chứng:</label>
                                                                            <input type="text" name="tennhom" class="form-control" value="{{ $tcbenh->tcb_ten }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="{{ URL::to('/admin/delete_disease_symptoms') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="matcb" value="{{ $tcbenh->tcb_ma }}">
                                                    <button class="btn btn-danger float-left mr-2 show_confirm ml-1"><i class="fa fa-times" aria-hidden="true"></i></button>
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
        $('#dstcbenh').DataTable({
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
                var name = $(this).data("matcb");
                event.preventDefault();
                Swal.fire({
                        title: 'Chắc chắn xóa triệu chứng này?',
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
    $('#quanlytcb').addClass('active');
</script>
@endsection