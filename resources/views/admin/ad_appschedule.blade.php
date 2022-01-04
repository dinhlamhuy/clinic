@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý lịch hẹn</title>
@endsection
@section('admin_add_css')
    <!-- <link href="{{ asset('admin/css/style_ad_provider.css') }}" rel="stylesheet" /> -->
@endsection
@section('admin_add_content')
    <div class="row">
        <div class="col-md-12 px-0" style="background-color: #edf2f4;">
            <div class="row ">
                <div class="col-md-12 pl-4 pr-4">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <span class="admin_titile">Quản lý lịch hẹn</span>
                            {{-- <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button> --}}
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                            <div class="row pt-1">
                               
                                <div class="col-md-12 ">
                                    <table id="dslh" class="display pt-2" style="width:100%; ">
                                        <thead>
                                            <tr class="tbl_header">
                                                <th class="text-center">Stt</th>
                                                <th class="text-center">Người hẹn</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Người khám</th>
                                                <th class="text-center">Ngày hẹn</th>
                                                <th class="text-center">Buổi hẹn</th>
                                                <th class="text-center">Khung giờ</th>
                                                <th class="text-center">Triệu chứng</th>
                                                <th class="text-center">Ngày đặt</th>
                                                <th class="text-center">Trạng thái</th>
                                                
                                            </tr>
                
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            @foreach ($dslichhen as $dk)
                                                
                                                    <tr>
                                                        <td style="width:5%;" class="text-center">{{ $i++ }}</td>
                                                        <td style="width:15%;"><?php
                                                                    if ($dk->dk_hotennd == '') {
                                                                        echo $dk->dk_hoten;
                                                                    } else {
                                                                        echo $dk->dk_hotennd;
                                                                    }
                                                                ?>
                                                        </td>
                                                        <td style="width:10%;" class="text-center"><?php
                                                                    if ($dk->dk_hotennd == '') {
                                                                        echo $dk->dk_sdt;
                                                                    } else {
                                                                        echo $dk->dk_sdtnd; 
                                                                    }
                                                                ?></td>
                                                        <td style="width:15%;">{{ $dk->dk_hoten }}</td>
                                                        <td style="width:8%;" class="text-center">
                                                            {{ date('d/m/Y', strtotime($dk->lh_ngay)) }}</td>
                                                        <td style="width:5%;" class="text-center">{{ $dk->buoi_ten }}</td>
                                                        <td style="width:4%;" class="text-center">{{ $dk->kg_khunggio }}</td>
                                                        <td style="width:20%;"><?php
                                                                    $str = '';
                                                                    foreach ($dsctlh as $ctlh) {
                                                                        if ($ctlh->lh_ma == $dk->lh_ma) {
                                                                            $str .= $ctlh->tclh_ten . ',';
                                                                        }
                                                                    }
                                                                    echo rtrim($str, ',');
                                                                ?></td>
                                                                
                                                        <td style="width:5%;" class="text-center">{{ date('d/m/Y', strtotime($dk->ngaydat)) }}</td>
                                                        {{-- <td style="width:15%;" class="text-center"> --}}
                                                            <?php 
                                                                if($dk->ttlh_ma == '1'){
                                                                    echo '<td  class="text-center" style=" color:#c73866;">Chưa xác nhận</td>';
                                                                }else if($dk->ttlh_ma == '2'){
                                                                    echo '<td  class="text-center" style=" color:#428cd4;">Đã xác nhận</td>';
                                                                
                                                                }else if($dk->ttlh_ma == '3'){
                                                                    echo '<td  class="text-center" style=" color:#a78f08;">Đã Hoàn thành</td>';
                                                                
                                                                }else if($dk->ttlh_ma == '4'){
                                                                    echo '<td  class="text-center" style=" color:#ac0f0f;">Đã hủy</td>';
                                                                }
                                                            ?>
                                                            {{-- </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr >
                                                <th class="text-center">Stt</th>
                                                <th class="text-center">Người hẹn</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Người khám</th>
                                                <th class="text-center">Ngày hẹn</th>
                                                <th class="text-center">Buổi hẹn</th>
                                                <th class="text-center">Khung giờ</th>
                                                <th class="text-center">Triệu chứng</th>
                                                <th class="text-center">Ngày đặt</th>
                                                <th class="text-center">Trạng thái</th>
                                                
                                            </tr>
                                        </tfoot>
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
    $(document).ready(function() {
        $('#dslh').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
            },
            initComplete: function () {
            this.api().columns([5,6,9]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        });
        $(".select2").select2();
      
    });   
    $('#quanlylichhen').addClass('active');
    $('#quanlylhen').addClass('active');
</script>

@endsection
