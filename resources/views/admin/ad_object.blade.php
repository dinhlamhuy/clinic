@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý đối tượng</title>
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
                        <span class="admin_titile">Quản lý đối tượng</span>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-3 pr-1 pt-1 " style="background-color: white;">
                        <div class="row ">
                            <div class="col-md-4"  style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                <center>
                                    <h4 class="mt-2">Thêm đối tượng</h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_object') }}" class="pt-1" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="dt_ten" placeholder="Nhập tên ký tự viết tắt của đối tượng" required maxlength="2">
                                        <textarea name="dt_ghichu" rows="4" class="form-control mt-2" placeholder="Nhập ghi chú (nếu có)"></textarea>
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
                                <table id="dsdoituong" class="display pt-2" style="width:100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Ký tự viết tắt tên đối tượng</th>
                                            <th class="text-center">Ghi chú</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($dsdoituong as $dt)
                                        <tr>
                                            <td width="15%;" class="text-center">{{ 'DT'.sprintf('%02d', $dt->dt_ma )}}</td>
                                            <td width="20%;" class="text-break text-center">
                                            {{ $dt->dt_ten }}
                                            </td>
                                            <td width="50%;" class="text-break">
                                            {{ $dt->dt_ghichu }}
                                            </td>
                                            <td width="15%;">

                                                <button type="button" class="btn btn-info float-left ml-2" data-toggle="modal"
                                                    data-target="#editchudt{{ $dt->dt_ma }}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>

<!-- Modal edit đối tượng -->
<div class="modal fade" id="editchudt{{ $dt->dt_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin đối tượng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('/admin/edit_object') }}" method="post">
                    @csrf
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Mã đối tượng:</label>
                            <input type="hidden" name="dt_ma"  value="{{ $dt->dt_ma }}">
                            <input type="text" class="form-control" disabled value="{{ 'DT'.sprintf('%02d',$dt->dt_ma) }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Ký tự viết tắt của đối tượng:</label>
                            <input type="text" class="form-control" name="dt_ten" value="{{ $dt->dt_ten }}" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Ghi chú:</label>
                            <textarea name="dt_ghichu" rows="4" class="form-control">{{ $dt->dt_ghichu }}</textarea>
                        </div>
                    <center><button type="button" class="btn btn-secondary center" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary center"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                    </center>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</div>

                                                        <form action="{{ URL::to('/admin/delete_object') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" name="dt_ma" value="{{ $dt->dt_ma }}">
                                                            <button class="btn btn-danger float-left show_confirm ml-1"type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
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
    $('#quanlydoituong').addClass('active');
    $(document).ready(function() {
        $('#dsdoituong').DataTable({
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
                        text: "Bạn sẽ xóa đối tượng này",
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