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
                        <span class="admin_titile">Quản lý lô chi tiết lô nhập thuốc</span>
                        <button class="btn btn-info float-right mt-2" id="btnexcel">Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 " style="background-color: white;">
                        <div class="row pt-2 mb-4">
                            <div class="col-md-6">
                                <p>Chi tiết lô nhập: <span style="font-weight: bold;">{{ $lonhapthuoc->lnt_ten }}</span></p>
                                <p>Nhà cung cấp: <span>{{ $nhacungcap->ncc_ten }}</span></p>
                                <p>Ngày lập: <span>{{ date('d/m/Y h:m:i',strtotime($lonhapthuoc->created_at)) }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <center>
                                    <h4 style="font-weight: bold;">Thêm chi tiết</h4>
                                </center>
                                <form action="{{ URL::to('/admin/add_details_import_medicine') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="lnt_ma" value="{{ $lonhapthuoc->lnt_ma }}">
                                    <div class="form-group">
                                            <label for="" class="col-form-label chu float-left">Tên thuốc:</label>
                                            <select class="select2 form-control w-100" name="t_ma" required>
                                                <option value="" disabled selected>-- Chọn tên thuốc --</option>
                                                @foreach($dsthuoc as $tenthuoc)
                                                <option value="{{ $tenthuoc->t_ma }}">{{ $tenthuoc->t_ten }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu float-left">Số lượng:</label>
                                            <input type="number" name="ctlnt_slchua" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu float-left">DVT:</label>
                                            <select class="select2 form-control w-100" name="ctlnt_dvtchua" required>
                                                @foreach($dsdvtt as $dvt)
                                                <option value="{{ $dvt->dvtt_ten }}">{{ $dvt->dvtt_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <input type="number" name="ctlnt_soluong" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="select2 form-control w-100" name="dvtt_ma" required>
                                                @foreach($dsdvtt as $dvt)
                                                <option value="{{ $dvt->dvtt_ma }}">{{ $dvt->dvtt_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu float-left">Ngày SX:</label>
                                             <input type="date" name="ctlnt_ngaysx" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu float-left">HSD:</label>
                                            <input type="date" name="ctlnt_hansudung" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label chu float-left">Giá nhập (VND):</label>
                                        <input type="number" name="ctlnt_gianhap" class="form-control" required>
                                    </div>
                                    <div class="mt-2">
                                        <center>
                                        <button type="submit" class="btn btn-success w-50"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table id="dsctlnt" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên thuốc</th>
                                    <th class="text-center">ĐVT</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Giá nhập</th>
                                    <th class="text-center">Ngày sản xuất</th>
                                    <th class="text-center">HSD</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($dsctlnt as $ctlonhap)
                                <tr>
                                    <td width="7%;" class="text-center">{{ $i++ }}</td>
                                    <td width="18%;">
                                        @foreach($dsthuoc as $tenthuoc)
                                        <?php if ($ctlonhap->t_ma == $tenthuoc->t_ma) {
                                            echo $tenthuoc->t_ten;
                                        } ?>
                                        @endforeach
                                    </td>
                                    <td width="10%;" class="text-center">
                                        <?php if(!empty($ctlonhap->ctlnt_dvtchua)){
                                            echo $ctlonhap->ctlnt_dvtchua;
                                        }else{ ?>
                                        @foreach($dsdvtt as $dvt)
                                        <?php if ($ctlonhap->dvtt_ma == $dvt->dvtt_ma) {
                                            echo $dvt->dvtt_ten;
                                        } ?>
                                        @endforeach
                                        <?php } ?>
                                    </td>
                                    <td width="10%;" class="text-break text-center"><?php if(!empty($ctlonhap->ctlnt_slchua)){ echo number_format($ctlonhap->ctlnt_slchua).' | '; } echo number_format($ctlonhap->ctlnt_soluongnhap);  ?></td>
                                    <td width="16%;" class="text-break text-right">{{ number_format($ctlonhap->ctlnt_gianhap) }}</td>
                                    <td width="15%;" class=" text-center">{{ date('d/m/Y', strtotime($ctlonhap->ctlnt_ngaysx)) }}</td>
                                    <td width="15%;" class=" text-center">{{ date('d/m/Y', strtotime($ctlonhap->ctlnt_hansudung)) }}</td>
                                    <td width="9%;" class="text-center">
                                        <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#editctthuoc{{ $ctlonhap->t_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <!-- Modal editctthuoc -->
<div class="modal fade" id="editctthuoc{{ $ctlonhap->t_ma }}" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Sửa thông tin thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('/admin/edit_details_import_medicine') }}" method="post">
                @csrf
            <div class="modal-body">
                    <input type="hidden" name="malonhap" value="{{ $ctlonhap->lnt_ma }}">
                    <input type="hidden" name="mathuoc" value="{{ $ctlonhap->t_ma }}" >
                        <div class="form-group">
                            <label for="" class="col-form-label float-left chu">Tên thuốc:</label>
                            <select class="select2 form-control w-100" name="tenthuoc" disabled>
                                @foreach($dsthuoc as $tenthuoc)
                                            <option value="{{ $tenthuoc->t_ma }}" <?php if($ctlonhap->t_ma==$tenthuoc->t_ma){echo 'selected';} ?>>{{ $tenthuoc->t_ten }}</option>
                                            @endforeach
                            </select>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Số lượng hộp chứa:</label>
                                <input type="text" class="form-control" name="ctlnt_slchua" value="{{ number_format($ctlonhap->ctlnt_slchua) }}">
                               
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Đơn vị chứa:</label>
                                <select class="select2 form-control w-100" name="ctlnt_dvtchua" >
                                    @foreach($dsdvtt as $dvt)
                                    <option value="{{ $dvt->dvtt_ten }}" <?php if($ctlonhap->ctlnt_dvtchua==$dvt->dvtt_ten){echo 'selected';} ?>>{{ $dvt->dvtt_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6"> 
                                <label for="" class="col-form-label float-left chu">Số lượng:</label>
                                <input type="number" class="form-control" name="soluong" value="{{ $ctlonhap->ctlnt_soluongnhap }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Đơn vị tính:</label>
                                <select class="select2 form-control w-100" name="donvitinh" required>
                                    @foreach($dsdvtt as $dvt)
                                    <option value="{{ $dvt->dvtt_ma }}" <?php if($ctlonhap->dvtt_ma==$dvt->dvtt_ma){echo 'selected';} ?>>{{ $dvt->dvtt_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Ngày sản xuất:</label>
                                <input type="date" class="form-control" name="ngaysanxuat" style="font-size: 14px;" value="{{ $ctlonhap->ctlnt_ngaysx }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label float-left chu">Hạn sử dụng:</label>
                                <input type="date" class="form-control" name="hansudung" style="font-size: 14px;" value="{{ $ctlonhap->ctlnt_hansudung }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label float-left chu">Giá nhập (VND):</label>
                            <input type="number" class="form-control" name="gianhap" value="{{ $ctlonhap->ctlnt_gianhap }}" required>
                        </div>
                <center>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                </center>
            </div>
            </form>
        </div>
    </div>
</div>
                                        <form action="{{ URL::to('/admin/delete_details_import_medicine') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="lnt_ma" value="{{ $ctlonhap->lnt_ma }}">
                                            <input type="hidden" name="t_ma" value="{{ $ctlonhap->t_ma }}">
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
</script>
<script src="{{asset('admin/js/ad_details_import_medicine.js')}}"></script>
@endsection