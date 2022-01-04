@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý nơi cấp</title>
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
                            <span class="admin_titile">Quản lý nơi cấp</span>
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-3 pr-1 pt-1 " style="background-color: white;">
                            <div class="row ">
                                <div class="col-md-4"
                                    style="border-left: 1px solid #b1154a;border-right: 1px solid #b1154a;border-top: 1px solid #b1154a;">
                                    <center>
                                        <h4 class="mt-2">Thêm nơi cấp</h4>
                                    </center>
                                    <form action="{{ URL::to('/admin/add_issued') }}" method="post">
                                        @csrf
                                        {{-- <input  type="text" class="form-control" name="nc_thanhpho" required> --}}
                                        <select name="nc_thanhpho" class="select2 form-control" required>
                                            <option value="" disabled selected>-- Chọn thành phố --</option>
                                            @foreach ($dsthanhpho as $tp)
                                            <option value="{{ $tp->tp_ten }}">{{ $tp->tp_ten }}</option>
                                            @endforeach
                                        </select>
                                        <input  type="number" class="form-control mt-2" name="nc_so"  name="nc_so" required placeholder="Mã số nơi cấp">
                                        <div class="row mt-2">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-success " type="submit">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                
                        </div>
                                <div class="col-md-8 mt-1">
                                    <table id="dsquyenloi" class="display " style="width:100%;">
                                        <thead>
                                            <tr class="tbl_header">
                                                <th class="text-center">Mã</th>
                                                <th class="text-center">Mã số nơi cấp</th>
                                                <th class="text-center">Thành phố</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($dsnoicap as $nc)
                                                <tr>
                                                    <td width="15%;" class="text-center">
                                                        {{ 'NC' . sprintf('%02d', $nc->nc_ma) }}</td>
                                                    <td width="30%;" class="text-break text-center">
                                                        {{ $nc->nc_so }}
                                                    </td>
                                                    <td width="40%;" class="text-break">
                                                        {{ $nc->nc_thanhpho }}
                                                    </td>
                                                    <td width="15%;" class="text-center">

                                                        <button type="button" class="btn btn-info float-left ml-2 mr-1"
                                                            data-toggle="modal"
                                                            data-target="#editchunc{{ $nc->nc_ma }}"><i
                                                                class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></button>

                                                        <!-- Modal edit nơi cấp -->
                                                        <div class="modal fade" id="editchunc{{ $nc->nc_ma }}"
                                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="staticBackdropLabel">
                                                                            Thông tin nơi cấp</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ URL::to('/admin/edit_issued') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="container-fluid">
                                                                                <div class="form-group">
                                                                                        <label for=""
                                                                                        class="col-form-label chu float-left">Mã nơi cấp:</label>
                                                                                        <input type="hidden" name="nc_ma"
                                                                                            value="{{ $nc->nc_ma }}">
                                                                                        <input type="text"
                                                                                            class="form-control" disabled
                                                                                            value="{{ 'NC' . sprintf('%02d', $nc->nc_ma) }}">
                                                                                    
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for=""
                                                                                            class="col-form-label chu float-left">Mã số nơi cấp:</label>
                                                                                        <input
                                                                                            type="number"
                                                                                            class="form-control"
                                                                                            name="nc_so" max="100" min="0"
                                                                                            value="{{ $nc->nc_so }}" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                        <label for="" class="col-form-label chu float-left">Tên thành phố:</label>
                                                                                        {{-- <input type="text" name="nc_thanhpho" 
                                                                                            class="form-control" value="{{$nc->nc_thanhpho }}" required> --}}
                                                                                            <select name="nc_thanhpho" class="select2 form-control" required>
                                                                                                @foreach ($dsthanhpho as $tp)
                                                                                                <option value="{{ $tp->tp_ten }}" <?php if(strcasecmp($nc->nc_thanhpho,$tp->tp_ten)==0){echo 'selected';} ?>>{{ $tp->tp_ten }}</option>
                                                                                                @endforeach
                                                                                            </select>
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
                                                        <form action="{{ URL::to('/admin/delete_issued') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="nc_ma" value="{{ $nc->nc_ma }}">
                                                            <button class="btn btn-danger float-left show_confirm"
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
        $('#quanlynoicap').addClass('active');
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
                    text: "Bạn sẽ xóa nơi cấp này",
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
