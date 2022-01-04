@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý nghề nghiệp</title>
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
                        <span class="admin_titile">Quản lý nghề nghiệp</span>
                    </div>
                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                        <div class="row pt-1">
                            <div class="col-md-4"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm nghề nghiệp mới</h4>
                                </center>
                                <form action="{{ url('/admin/add_job') }}" class="pt-1" method="post">
                                    @csrf
                                    <input type="text" class="form-control" placeholder="Nhập tên nghề nghiệp mới" name="tennghenghiep" required>
                                    
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
                                <table id="dsnghenghiep" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên nghề nghiệp</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsnghenghiep as $nn)
                                        <tr>
                                            <td width="20%;" class="text-center">{{ 'NN'.sprintf('%03d', $nn->nn_ma )}}</td>
                                            <td width="64%;" class="text-break">
                                            {{ $nn->nn_ten }}
                                            </td>
                                            <td width="16%;" class="text-center">

                                                <button type="button" class="btn btn-info float-left ml-2" data-toggle="modal"
                                                    data-target="#editnghenghiep{{ $nn->nn_ma }}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>

<!-- Modal edit chức vụ -->
<div class="modal fade" id="editnghenghiep{{ $nn->nn_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin nghề nghiệp</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/edit_job') }}" method="post">
                    @csrf
                        <div class="form-group">
                                <label for="" class="col-form-label chu float-left">Mã nghề nghiệp:</label>
                                <input type="hidden" name="nn_ma"  value="{{ $nn->nn_ma }}">
                                <input type="text" class="form-control" disabled value="{{ 'NN'.sprintf('%03d',$nn->nn_ma) }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Tên nghề nghiệp:</label>
                            <input type="text" class="form-control" name="nn_ten" value="{{ $nn->nn_ten }}">
                        </div>
                    <center><button type="button" class="btn btn-secondary center" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary center"><i class="fa fa-floppy-o"
                        aria-hidden="true"></i>&ensp;Lưu</button>
                    </center>
                    </form>
                </div>
        </div>
    </div>
</div>

                                                        <form action="{{ URL::to('/admin/delete_job') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" name="nn_ma" value="{{ $nn->nn_ma }}">
                                                            <button class="btn btn-danger float-left ml-1 show_confirm" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
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
    $('#dsnghenghiep').DataTable({
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
                        title: 'Bạn chắc chưa?',
                        text: "Bạn sẽ xóa nghề nghiệp này?",
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
$('#quanlykhambenh').addClass('active');
$('#quanlynghenghiep').addClass('active');


</script>
@endsection