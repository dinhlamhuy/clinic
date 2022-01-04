@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý lô nhập thuốc</title>
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
                        <span class="admin_titile">Quản lý lô nhập thuốc</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addlnt"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                        <button class="btn btn-info float-right mt-2" id="btnexcel">Xuất file excel</button>
                    </div>

                </div>

                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 pt-2 " style="background-color: white;">
                        <table id="dslnt" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên lô</th>
                                    <th class="text-center">Ngày nhập</th>
                                    <th class="text-center">Nhà cung cấp</th>
                                    <th class="text-center">Tổng G.trị</th>
                                    <th class="text-center">Ghi chú</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dslonhapthuoc as $lonhap)
                                <tr>
                                    <td width="10%;" class="text-center">{{ 'LN'.sprintf('%05d',$lonhap->lnt_ma) }}</td>
                                    <td width="15%;" class="text-break"><a href="{{url('/admin/details_import_medicine/'.$lonhap->lnt_ma)}}">{{ $lonhap->lnt_ten }}</a></td>
                                    <td width="10%;">{{ date('d-m-Y',strtotime($lonhap->created_at)) }}</td>
                                    <td width="20%;" class="text-break"><?php
                                                                        foreach ($dsncc as $ncc) {
                                                                            if ($lonhap->ncc_ma == $ncc->ncc_ma) {
                                                                                echo $ncc->ncc_ten;
                                                                            }
                                                                        }
                                                                        ?></td>
                                    <td width="15%;">
                                        <?php
                                        $tienlnt=0;
                                            foreach ($tonggialonhap as $tongtienlnt) {
                                               if($tongtienlnt->lnt_ma==$lonhap->lnt_ma){
                                                $tienlnt=$tongtienlnt->tonggiatri;
                                               }
                                            }
                                            ?>
                                            {{number_format($tienlnt) .' VND'}}
                                    </td>
                                    <td width="20%;" class="text-break">{{ $lonhap->lnt_ghichu }}</td>
                                    <td width="10%;" class="text-center">
                                        <button type="button" class="btn btn-info float-left ml-2" data-toggle="modal" data-target="#editlnt{{ $lonhap->lnt_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <div class="modal fade" id="editlnt{{ $lonhap->lnt_ma }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Thông tin lô nhập</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ URL::to('admin/edit_import_medicine')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="lnt_ma" class="form-control" value="{{ $lonhap->lnt_ma }}">
                                                                <div class="row form-group">
                                                                    <div class="col-md-6">
                                                                        <label for="" class="col-form-label float-left chu">Mã lô nhập:</label>
                                                                        <input type="text" class="form-control" value="{{ 'LN'.sprintf('%05d',$lonhap->lnt_ma) }}" disabled>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="" class="col-form-label float-left chu">Ngày nhập:</label>
                                                                        <input type="text" class="form-control"  value="{{ date('d-m-Y',strtotime($lonhap->created_at)) }}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Tên lô nhập:</label>
                                                                    <input type="text" name="lnt_ten" class="form-control" value="{{ $lonhap->lnt_ten }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Nhà cung cấp:</label>
                                                                        <select class="select2 form-control w-100" name="ncc_ma" required>
                                                                            <?php
                                                                            foreach ($dsncc as $ncc) {
                                                                            ?>
                                                                                <option value="{{ $ncc->ncc_ma }}" <?php if ($lonhap->ncc_ma == $ncc->ncc_ma) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>{{ $ncc->ncc_ten }}</option>
                                                                            <?php  }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="col-form-label float-left chu">Ghi chú:</label>
                                                                    <textarea name="lnt_ghichu" class="form-control">{{$lonhap->lnt_ghichu}}</textarea>
                                                                </div>
                                                                {{-- <div class="form-group">
                                                                     <label for="" class="col-form-label float-left chu">Ngày nhập:</label>
                                                                    <input type="text" class="form-control"  value="{{ date('d-m-Y',strtotime($lonhap->created_at)) }}" disabled>
                                                                </div> --}}
                                                          
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ URL::to('admin/delete_import_medicine')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="lnt_ma" class="form-control" value="{{ $lonhap->lnt_ma }}">
                                        <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button>
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
<!-- Modal addlnt -->
<div class="modal fade" id="addlnt" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm lô nhập</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('admin/add_import_medicine') }}" method="post">
                @csrf
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Tên lô nhập:</label>
                            <input type="text" name="lnt_ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label for="" class="col-form-label chu float-left">Nhà cung cấp:</label>
                                <select class="select2 form-control w-100" name="ncc_ma" required>
                                    @foreach ($dsncc as $ncc)
                                    <option value="{{ $ncc->ncc_ma }}">{{$ncc->ncc_ten}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <!-- <div class="row form-group">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Ngày nhập:</label>
                            </div>
                            <div class="col-md-9"><input type="date" name="lnt_ngaynhap" class="form-control"></div>
                        </div> -->
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Ghi chú:</label>
                            <textarea name="lnt_ghichu" rows="2" class="form-control"></textarea>
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
<!-- Modal edit ncc -->

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
</script>
<script src="{{asset('admin/js/ad_import_medicine.js')}}"></script> 
@endsection