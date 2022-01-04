@extends('staff.st_layout')
@section('st_title')
<title>Khám bệnh</title>
@endsection
@section('st_add_css')
<link rel="stylesheet" href="{{asset('staff/css/style_st_medical_examination.css')}}">
@endsection
@section('st_content')
<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12 px-0 mx-0">
            <nav class="frames_medical_examination">
                <div class="nav nav-tabs nav-receive " id="nav-tab" role="tablist">
                    <a class="nav-link active" id="waitting_list" data-toggle="tab" href="#nav-dschokham" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Danh sách chờ khám</a>
                    <a class="nav-link " id="appointment_schedule" data-toggle="tab" href="#nav-dsdakham" role="tab"
                        aria-controls="nav-home" aria-selected="true">Danh sách đã khám</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade mt-4 active show" id="nav-dschokham" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
                    <table id="listchokham" class="display" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Năm sinh</th>
                                <th class="text-center">Phòng khám</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dsbenhnhanchokham as $bnchokham)
                            <?php  if(session()->get('p_ma') == $bnchokham->p_ma){?>

                                <tr>
                                    <td width="10%;" class="text-center">{{ 'BN'.sprintf('%05d',$bnchokham->bn_ma) }}</td>
                                    <td width="20%;">{{ $bnchokham->bn_ten }} </td>
                                    <td width="10%;" class="text-center">{{ $bnchokham->bn_gioitinh }}</td>
                                    <td width="15%;" class="text-center"> {{  date('d/m/Y',strtotime($bnchokham->bn_ngaysinh)) }}</td>
                                    <td width="20%;" class="text-center"> {{ $bnchokham->p_ten }}</td>
                                    <td width="14%;" class="text-center">{{ $bnchokham->ttk_ten }}</td>
                                    <td width="10%;" class="text-center">
                                       
                                                <a href="{{ url('staff/medical_exam/'.$bnchokham->pkb_ma) }}" class="btn btn-success">
                                                    <i class="fa fa-check" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Năm sinh</th>
                                <th class="text-center">Phòng khám</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="tab-pane fade mt-4" id="nav-dsdakham" role="tabpanel" aria-labelledby="nav-home-tab">
                <table id="listdakham" class="display mt-4" style="width:100%">
                        <thead>
                            <tr class="tbl_header">
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Năm sinh</th>
                                <th class="text-center">Phòng khám</th>
                                <th class="text-center">Toa thuốc</th>
                                <th class="text-center">Trạng thái</th>

                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($dsbenhnhandakham as $bndakham)
                            <?php  if(session()->get('p_ma') == $bndakham->p_ma){?>
                            <tr>

                                <td width="10%;" class="text-center">{{ 'BN'.sprintf('%05d',$bndakham->bn_ma) }}</td>
                                <td width="27%;">{{ $bndakham->bn_ten }}  </td>
                                <td width="8%;" class="text-center">{{ $bndakham->bn_gioitinh }}</td>
                                <td width="10%;" class="text-center">{{ date('d/m/Y',strtotime($bndakham->bn_ngaysinh)) }} </td>
                                <td width="25%;" class="text-center"> {{ $bndakham->p_ten }}</td>
                                <td width="8%;" class="text-center">  
                                    @foreach ($donthuoc as $dthuoc)
                                    @if ($dthuoc->pkb_ma == $bndakham->pkb_ma)
                                    <a target="_blank" href="{{ url('staff/toathuoc/'.$bndakham->pkb_ma) }}">Xem Toa</a></td>
                                    @endif
                                    @endforeach
                                <td width="12%;" class="text-center">{{ $bndakham->ttk_ten }}</td>
                                
                            </tr>
                            <?php } ?>
                            @endforeach
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th class="text-center">Mã BN</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Giới tính</th>
                                <th class="text-center">Xem toa thuốc</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot> -->
                    </table>



                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection
@section('st_add_js')
<script>
$(document).ready(function() {
    <?php
        $mess = session()->get('thongbao');
        $icon = '';
        $tb = '';
        if ($mess == 'Xác nhận thành công') {
            $icon = 'success';
            $tb = 'Xác nhận thành công';
        } 
        // else if ($mess == 'Tạo thành công') {
        //     $icon = 'success';
        //     $tb = 'Tạo thành công';
        // } else if ($mess == 'Tạo thất bại') {
        //     $icon = 'error';
        //     $tb = 'Tạo thất bại';
        // } else if ($mess == 'Xóa thành công') {
        //     $icon = 'success';
        //     $tb = 'Xóa thành công';
        // }
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
// $('#cashier').addClass('highlight');
// $('#cashier').addClass('active');
</script>
<script src="{{asset('staff/js/st_medical_examination.js')}}"></script>
@endsection