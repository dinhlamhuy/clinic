@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý quyền lợi</title>
@endsection
@section('admin_add_css')
    <!-- <link href="{{ asset('admin/css/style_ad_provider.css') }}" rel="stylesheet" /> -->
    .
@endsection
@section('admin_add_content')
    <div class="row">
        <div class="col-md-12 px-0" style="background-color: #edf2f4;">
            <div class="row ">
                <div class="col-md-12 pl-4 pr-4">
                    <div class="row " style="margin-top:-20px;">
                        <div class="col-md-12">
                            <span class="admin_titile">Quản lý quyền lợi</span>
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-3 pr-1 pt-1 " style="background-color: white;">
                            <div class="row ">
                                <div class="col-md-4"
                                    style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                    <center>
                                        <h4 class="mt-2">Thêm quyền lợi</h4>
                                    </center>
                                    <form action="{{ URL::to('/admin/add_interest') }}" class="pt-1" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input  type="number" class="form-control" name="ql_so" name="ql_so" placeholder="Nhập mã số quyền lợi" required>
                                            <input  type="number" class="form-control mt-2" name="ql_phantram" placeholder="Nhập vào tỉ lệ số phần trăm (%)" required>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-success " type="submit">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <table id="dsquyenloi" class="display pt-2" style="width:100%;">
                                        <thead>
                                            <tr class="tbl_header">
                                                <th class="text-center">Mã</th>
                                                <th class="text-center">Mã số quyền lợi</th>
                                                <th class="text-center">Phần trăm (%)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($dsquyenloi as $ql)
                                                <tr>
                                                    <td width="10%;" class="text-center">
                                                        {{ 'QL' . sprintf('%01d', $ql->ql_ma) }}</td>
                                                    <td width="30%;" class="text-break text-center">
                                                        {{ $ql->ql_so }}
                                                    </td>
                                                    <td width="35%;" class="text-break text-center">
                                                        {{ $ql->ql_phantram }}
                                                    </td>
                                                    <td width="25%;" class="text-center">

                                                        <button type="button" class="btn btn-info float-left ml-5 mr-1"
                                                            data-toggle="modal"
                                                            data-target="#editchuql{{ $ql->ql_ma }}"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></button>

                                                        <!-- Modal edit quyền lợi -->
                                                        <div class="modal fade" id="editchuql{{ $ql->ql_ma }}"
                                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="staticBackdropLabel">
                                                                            Thông tin quyền lợi</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ URL::to('/admin/edit_interest') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="container-fluid">
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Mã quyền lợi:</label>
                                                                                        <input type="hidden" name="ql_ma" value="{{ $ql->ql_ma }}">
                                                                                        <input type="text" class="form-control" disabled value="{{ 'QL' . sprintf('%01d', $ql->ql_ma) }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Mã số quyền lợi:</label>
                                                                                        <input
                                                                                            type="number"
                                                                                            class="form-control"
                                                                                            name="ql_so"
                                                                                            value="{{ $ql->ql_so }}" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Phần trăm(%):</label>
                                                                                        <input type="number" name="ql_phantram" class="form-control" max="100" min="0" value="{{$ql->ql_phantram }}" required>
                                                                                </div>

                                                                            </div>

                                                                            <center><button type="button"
                                                                                    class="btn btn-secondary center"
                                                                                    data-dismiss="modal">Thoát</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary center"><i
                                                                                        class="fa fa-floppy-o"
                                                                                        aria-hidden="true"></i>&ensp;Lưu</button>
                                                                            </center>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{ URL::to('/admin/delete_interest') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="ql_ma" value="{{ $ql->ql_ma }}">
                                                            <button class="btn btn-danger float-left  show_confirm"
                                                                type="submit"><i class="fa fa-times"
                                                                    aria-hidden="true"></i></button>
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
         $('#quanlybhyt').addClass('active');
        $('#quanlyquyenloi').addClass('active');
        $(document).ready(function() {
            $('#dsquyenloi').DataTable({
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
                    text: "Bạn sẽ xóa quyền lợi này",
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
       

    </script>
@endsection
