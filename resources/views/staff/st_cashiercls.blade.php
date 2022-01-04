@extends('staff.st_layout')
@section('st_title')
<title>Thu ngân</title>
@endsection
@section('st_add_css')
<link rel="stylesheet" href="{{asset('staff/css/style_st_cashier.css')}}">
@endsection
@section('st_content')
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12 px-0 mx-0">
            <nav class="frames_cashier ">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link link3 " href="{{ url('/staff/cashier') }}">Phí khám</a>
                    <a class="nav-link link3 active" id="phicanlamsang" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Phí thực hiện cân lâm sàng</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
               
                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="phicanlamsang">
                    <h3 class="TEXT-CENTER mt-4">THANH TOÁN TIỀN PHÍ KHÁM CLS</h3>
                    <table id="dsthutiencls" class="display w-100" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Mã PCD</th>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">LHK</th>
                                {{-- <th class="text-center">Trạng thái</th> --}}
                                <th class="text-center">Tiền thu</th>
                                <th class="text-center">Chi tiết</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dschuathanhtoan as $chuathanhtoan)

                            <tr>
                                <td width="8%" class="text-center">{{ 'PCD'.sprintf('%05d',$chuathanhtoan->pcd_ma) }}</td>
                                <td width="10%" class="text-center">{{ 'BN'.sprintf('%05d',$chuathanhtoan->bn_ma) }}</td>
                                <td width="15%">{{ $chuathanhtoan->bn_ten }}</td>
                                <td width="12%" class="text-center">{{ $chuathanhtoan->lhk_ten }}</td>
                                <td width="12%" class="text-center">
                                    <?php $total=0; 
                                    foreach ($dschidinh as $chidinh){
                                        if($chidinh->pcd_ma==$chuathanhtoan->pcd_ma){
                                            $total=$total+$chidinh->ctcd_giatien;

                                        }
                                    }
                                    echo number_format($total).' VND';
                                      ?>
                            </td>
                           
                                <td width="18%" class="text-center">
                                    <a target="blank" rel="noopener noreferrer" href="{{ url('staff/phieuchidinh/'.$chuathanhtoan->pkb_ma) }}">Chi tiết</a>
                                    {{-- <p  onclick="window.open('{{ url('staff/phieuchidinh/'.$chuathanhtoan->pkb_ma) }}')" >Chi tiết</p> --}}
                                    
                                    </td>
                                    
                                
                                <td width="10%" class="text-center">
                                    <form action="{{ URL::to('/staff/confirm_cls') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="pcd_ma" value="{{$chuathanhtoan->pcd_ma}}">
                                        <button type="submit" class="btn btn-success show_confirm">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                </td>

                                </button>
                                </form>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Mã PCD</th>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                            
                                <th class="text-center">LHK</th>
                                <th class="text-center">Tiền thu</th>
                                <th class="text-center">Chi tiết</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
@section('st_add_js')
<script src="{{asset('staff/js/st_cashier.js')}}"></script>
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
$('#cashier').addClass('highlight');
$('#cashier').addClass('active');
</script>
@endsection