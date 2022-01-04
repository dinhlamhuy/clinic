@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý đơn vị tính thuốc</title>
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
                        <span class="admin_titile">Quản lý đơn vị tính thuốc</span>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 pt-1 " style="background-color: white;">
                        <div class="row ">
                            <div class="col-md-4"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm đơn vị tính thuốc</h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_drug_unit') }}" class="pt-1" method="post">
                                    @csrf
                                    <input type="text" class="form-control" name="dvtt_ten" placeholder="Nhập tên đơn vị tính mới" required>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <center>
                                            <button class="btn btn-success" type="submit">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                            </button>
                                            </center>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table id="dsdvtt" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên đơn vị tính thuốc</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($dsdonvitinhthuoc as $dvtt)
                                        <tr>
                                            <td width="20%;" class="text-center">{{ 'DVTT'.sprintf('%03d', $dvtt->dvtt_ma )}}</td>
                                            <td width="64%;" class="text-break">
                                            {{ $dvtt->dvtt_ten }}
                                            </td>
                                            <td width="16%;" class="text-center">

                                                <button type="button" class="btn btn-info float-left ml-3" data-toggle="modal"
                                                    data-target="#editchudvtt{{ $dvtt->dvtt_ma }}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>

<!-- Modal edit đơn vị tính thuốc -->
<div class="modal fade" id="editchudvtt{{ $dvtt->dvtt_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin đơn vị tính thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/edit_drug_unit') }}" method="post">
                    @csrf
                  
                        <div class="form-group">
                                <label for="" class="col-form-label chu float-left">Mã đơn vị tính thuốc:</label>
                                <input type="hidden" name="dvtt_ma"  value="{{ $dvtt->dvtt_ma }}">
                                <input type="text" class="form-control" disabled value="{{ 'CV'.sprintf('%03d',$dvtt->dvtt_ma) }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Tên đơn vị tính thuốc:</label>
                            <input type="text" class="form-control" name="dvtt_ten" value="{{ $dvtt->dvtt_ten }}" required>
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

                                                        <form action="{{ URL::to('/admin/delete_drug_unit') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" name="dvtt_ma" value="{{ $dvtt->dvtt_ma }}">
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
        $('#quanlythuocne').addClass('active');
    $('#quanlydvtt').addClass('active');
    $(document).ready(function() {
        $('#dsdvtt').DataTable({
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
                        text: "Bạn sẽ xóa đơn vị tính thuốc này",
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