@extends('staff.st_layout')
@section('st_title')
    <title>Phát thuốc</title>
@endsection
@section('st_add_css')
    <!-- <link rel="stylesheet" href="{{ asset('staff/css/style_st_cashier.css') }}"> -->
@endsection
@section('st_content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12 px-0 mx-0">
                <!-- <h3 class="TEXT-CENTER mt-4">THANH TOÁN TIỀN PHÍ KHÁM</h3> -->
                <table id="dsphatthuoc" class="display w-100 " style="width:100%">
                    <thead>
                        <tr class="tbl_header">
                            <th class="text-center">Mã TT</th>
                            <th class="text-center">Mã BN</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">LHK</th>
                            <th class="text-center">Thu tiền</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($donthuoc as $dt)
                       <?php  if ($dt->dthuoc_trangthai == '0'){?>
                            <tr>
                                <td width="10%" class="text-center">{{ 'DT' . sprintf('%05d', $dt->dthuoc_ma) }}</td>
                                <td width="10%" class="text-center">{{ 'BN' . sprintf('%05d', $dt->bn_ma) }}</td>
                                <td width="30%" class="text-center">{{ $dt->bn_ten }}</td>
                                <td width="10%" class="text-center">{{ $dt->ldt_ten }}</td>
                                <td width="15%" class="text-center">
                                    <?php
                                    
                                    $total = 0;
                                    foreach ($ketoa as $ktoa) {
                                        if ($dt->dthuoc_ma == $ktoa->dthuoc_ma) {
                                            $total = $total + ($ktoa->ctdt_giaban*$ktoa->ctdt_soluong);
                                            // echo $ktoa->t_ten;
                                        }
                                    }
                                    echo number_format($total) . ' VND';
                                    ?>
                                </td>
                                <td width="15%" class="text-center">
                                    <?php if ($dt->dthuoc_trangthai == '0') {
                                        echo 'Chưa Thanh Toán';
                                    } else if ($dt->dthuoc_trangthai == '1'){ echo 'Đã thanh toán';} ?><br>
                                    <a target="_blank" href="{{ url('staff/hoadonthuoc/'.$dt->pkb_ma) }}">Hóa đơn</a></td>   
                                </td>
                                <td width="10%" class="text-center">
                                    {{-- <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="pkb_ma" value="">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form> --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#donthuoc{{ $dt->dthuoc_ma }}">
                                        Chi tiết
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="donthuoc{{ $dt->dthuoc_ma }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Chi tiết</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2 class="text-center">Đơn Thuốc</h2>
                                                    <form action="{{ URL::to('staff/thanhtoanthuoc')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="pkb_ma" value="{{ $dt->pkb_ma }}">
                                                        <input type="hidden" name="dthuoc_ma" value="{{ $dt->dthuoc_ma }}">
                                                        {{-- <input type="text" name="pkb_ma" value="{{ $dt->pkb_ma }}"> --}}
                                                        <table class="table w-100 table-striped">
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Mã thuốc</th>
                                                                <th>Tên thuốc</th>
                                                                <th>Lô nhập thuốc</th>
                                                                <th>Số lượng</th>
                                                                <th>Giá tiền</th>
                                                            </tr>
                                                            <?php $i=1; foreach ($ketoa as $ktoa) {
                                                                 if($dt->dthuoc_ma== $ktoa->dthuoc_ma){
                                                        ?>
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ 'TT' . sprintf('%05d', $ktoa->t_ma) }}</td>
                                                                <td>{{ $ktoa->t_ten }}</td>
                                                                <td>{{ 'LNT' . sprintf('%05d', $ktoa->lnt_ma) }}</td>
                                                                <td>{{ $ktoa->ctdt_soluong }}</td>
                                                                <td>{{ $ktoa->ctdt_giaban }}</td>
                                                            </tr>
                                                            <?php  }  } ?>
                                                            <tr>
                                                                <td colspan="5" class="text-right font-weight-bold">Tổng
                                                                    Tiền</td>
                                                                <td class="text-right font-weight-bold">
                                                                    {{ number_format($total) . ' VND' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" class="text-right font-weight-bold">BHYT
                                                                </td>
                                                                <td class="text-right font-weight-bold">

                                                                    <?php
                                                                    
                                                                    $tienchitra = 0;
                                                                    $phantram='';
                                                                 $tinhtien = 0;
                                                                    if ($dt->ldt_ma == '1') {
                                                                        foreach ($bhyt as $bh) {
                                                                            if ($dt->pkb_ma == $bh->pkb_ma) {
                                                                                $phantram= $bh->ql_phantram . '%';
                                                                                $tienchitra = 223500 * ($bh->ql_phantram / 100);
                                                                            }
                                                                        }
                                                                        if ($total-$tienchitra < -1) {
                                                                            $tinhtien = 0;
                                                                        }else {
                                                                            $tinhtien = $total-$tienchitra;

                                                                        }
                                                                        echo $phantram;
                                                                    }else{
                                                                        $tinhtien = $total;
                                                                    }
                                                                    
                                                                    ?>
                                                                    {{-- {{ number_format($tienchitra).' VND' }}</td> --}}
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" class="text-right font-weight-bold">Tính
                                                                    tiền</td>
                                                                <td class="text-right font-weight-bold">
                                                                    {{ number_format($tinhtien) . ' VND' }}</td>
                                                            </tr>
                                                        </table>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Hủy</button>
                                                            <button type="submit" class="btn btn-primary show_confirm">Xác nhận thanh
                                                                toán</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
<?php } ?>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">Mã BN</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Phòng khám</th>
                            <th class="text-center">LHK</th>
                            <th class="text-center">Tiền thu</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('st_add_js')
    <script src="{{ asset('staff/js/st_medicine_supply.js') }}"></script>
    <script>
        $(document).ready(function() {
            <?php
            $mess = session()->get('thongbao');
            $icon = '';
            $tb = '';
            if ($mess == 'Xác nhận thành công') {
            $icon = 'success';
            $tb = 'Xác nhận thành công';
                } else if ($mess == 'Tạo thành công') {
            $icon = 'success';
            $tb = 'Tạo thành công';
                    } else if ($mess == 'Tạo thất bại') {
            $icon = 'error';
            $tb = 'Tạo thất bại';
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
                        title: 'Xác nhận thanh toán?',
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
        $('#medicine_supply').addClass('highlight');
        $('#medicine_supply').addClass('active');
    </script>
@endsection
