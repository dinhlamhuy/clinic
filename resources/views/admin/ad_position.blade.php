@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý chức vụ</title>
@endsection
@section('admin_add_css')
<!-- <link href="{{asset('admin/css/style_ad_provider.css')}}" rel="stylesheet" /> -->
.
@endsection
@section('admin_add_content')
<div class="row">
    <div class="col-md-12 px-0" style="background-color: #edf2f4;">
        <div class="row ">
            <div class="col-md-12 pl-4 pr-4">
                <div class="row " style="margin-top:-20px;">
                    <div class="col-md-12">
                        <span class="admin_titile">Quản lý chức vụ</span>
                        <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 pt-1 " style="background-color: white;">
                        <div class="row ">
                            <div class="col-md-4"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm chức vụ</h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_position') }}" class="pt-1" method="post">
                                    @csrf
                                        <input type="text" class="form-control" name="tenchucvu" placeholder="Nhập tên chức vụ mới" required>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <center>
                                            <button class="btn btn-success " type="submit">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                            </button>
                                            </center>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table id="dschucvu" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên chức vụ</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($dschucvu as $cvu)
                                        <tr>
                                            <td width="21%;" class="text-center">{{ 'CV'.sprintf('%02d', $cvu->cv_ma )}}</td>
                                            <td width="64%;" class="text-break">
                                            {{ $cvu->cv_ten }}
                                            </td>
                                            <td width="15%;" class="text-center">

                                                <button type="button" class="btn btn-info float-left ml-2" data-toggle="modal"
                                                    data-target="#editchucvu{{ $cvu->cv_ma }}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>

<!-- Modal edit chức vụ -->
<div class="modal fade" id="editchucvu{{ $cvu->cv_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin chức vụ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/edit_position') }}" method="post">
                    @csrf
                        <div class="form-group">
                                <label for="" class="col-form-label float-left chu">Mã chức vụ:</label>
                                <input type="hidden" name="cv_ma"  value="{{ $cvu->cv_ma }}">
                                <input type="text" class="form-control" disabled value="{{ 'CV'.sprintf('%02d',$cvu->cv_ma) }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label float-left chu">Tên chức vụ:</label>
                            <input type="text" class="form-control" name="cvten" value="{{ $cvu->cv_ten }}" required>
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

                                                        <form action="{{ URL::to('/admin/delete_position') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" name="cvu_ma" value="{{ $cvu->cv_ma }}">
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
<script src="{{asset('admin/js/ad_position.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dsnhomcls').DataTable({
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
                        text: "Bạn sẽ xóa chức vụ này",
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

    // $('#quanlycanlamsang').addClass('active');
    // $('#quanlynhomcls').addClass('active');
</script>
@endsection