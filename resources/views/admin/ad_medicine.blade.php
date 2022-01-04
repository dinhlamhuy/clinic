@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý thuốc</title>
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
                            <span class="admin_titile">Quản lý thuốc</span>
                                    <button class="btn btn-info mt-2 float-right ml-1" id="btnexcel">Xuất file DS thuốc SL sắp hết</button>
                                    <button class="btn btn-info mt-2 float-right ml-1" id="btnexcelsaphethan">Xuất file DS thuốc sắp hết hạn</button>
                            <button class="btn btn-info float-right mt-2 ml-1" data-toggle="modal" data-target="#dsshh">
                                Danh sách thuốc sắp hết hạn
                            </button>
                            <button class="btn btn-info mt-2 float-right" data-toggle="modal" data-target="#dstslit">
                                Danh sách thuốc SL sắp hết
                            </button>
                                
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-1 pr-1 pt-2" style="background-color: white;">
                            <button class="btn btn-info float-right mb-2" id="btnexceldsthuoc">Xuất file DS Thuốc</button>
                            <table id="dsthuoc" class="display pt-2" style="width:100%;">
                                <thead>
                                    <tr class="tbl_header">
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên thuốc</th>
                                        <th></th>
                                        <th class="text-center">Phân loại</th>
                                        <th class="text-center">Nhóm thuốc</th>
                                        <th class="text-center">Gốc thuốc / Hoạt chất</th>
                                        <th class="text-center">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ktthuoc = ''; ?>
                                    @foreach ($dsthuoc as $thuoc)
                                        <?php foreach ($chitietlothuoc as $tongthuoc) {
                                     if($tongthuoc->t_ma==$thuoc->t_ma){
                                    ?>
                                        <tr>
                                            <td width="10%;" class="text-center">{{ 'T' . sprintf('%05d', $thuoc->t_ma) }}
                                            </td>
                                            <td width="25%;" class="text-break">
                                                {{ $thuoc->t_ten }} <br>
                                             
                                                <div class="modal fade" id="xemthuoc{{ $thuoc->t_ma }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Thông
                                                                    tin thuốc</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="" class="col-form-label"><b>Mã
                                                                                    thuốc:</b>
                                                                                <span class="text-muted">{{ 'T' . sprintf('%05d', $thuoc->t_ma) }}</span></label>
                                                                        </div>
                                                                        <div class="col-md-7"><label for=""
                                                                                class="col-form-label"><b>Tên thuốc:</b>
                                                                                <span class="text-muted" style="color: #7f5539 !important; font-weight:bold;">{{ $thuoc->t_ten }}</span></label></div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="" class="col-form-label"><b>Thuốc
                                                                                    gốc:</b> <span class="text-muted">{{ $thuoc->tg_ten }}</span></label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <label for="" class="col-form-label"><b>Nhóm
                                                                                    thuốc:</b>
                                                                                <span class="text-muted">{{ $thuoc->nt_ten }}</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="" class="col-form-label"><b>Hàm
                                                                                    lượng:</b>
                                                                                <span class="text-muted">{{ $thuoc->t_hamluong }}</span></label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <label for="" class="col-form-label"><b>Liều
                                                                                    dùng:</b>
                                                                                <span class="text-muted">{{ $thuoc->t_lieudung }}</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="" class="col-form-label"><b>Giá
                                                                                    BHYT:</b>
                                                                                <span class="text-muted">{{ $thuoc->t_giabhyt }}</span></label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <label for="" class="col-form-label"><b>Giá dịch
                                                                                    vụ:</b> <span class="text-muted">{{ $thuoc->t_giadv }}</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $tenlonhap='';
                                                                    foreach ($dslonhap as $lonhap) {
                                                                        if($lonhap->t_ma == $thuoc->t_ma){
                                                                            if($tenlonhap!=$lonhap->lnt_ma){?>
                                                                    <div class="row mt-2">
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                            <h5><b>- {{ $lonhap->lnt_ten }}</b></h5>
                                                                        </div>
                                                                    </div>
                                                                        <?php } $tenlonhap=$lonhap->lnt_ma; ?>
                                                                    <div class="row">
                                                                        <div class="col-md-12">

                                                                            &emsp; &emsp;<b>Ngày nhập:</b><span
                                                                                class="text-muted">
                                                                                {{ date('d/m/Y', strtotime($lonhap->ngaynhap)) }}</span>
                                                                            &emsp;
                                                                            <b>Số lượng:</b><span class="text-muted">
                                                                                {{ $lonhap->ctlnt_soluongnhap . ' ' . $lonhap->dvtt_ten }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <?php } 
                                                                    } ?>
                                                                </div>
                                                            
                                                                <center>
                                                                <button type="button" class="btn btn-secondary mt-3"
                                                                    data-dismiss="modal">Thoát</button>
                                                                </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="9%;" class="text-center">
                                                
                                                <button type="button" class="btn p-0"
                                                style="font-size: 14px; color:rgb(16, 16, 133);" data-toggle="modal"
                                                data-target="#xemthuoc{{ $thuoc->t_ma }}">Chi tiết</button>
                                            </td>
                                            <td width="12%;" class="text-center">{{ $thuoc->pl_ten }}</td>
                                            <td width="20%;">
                                                {{ $thuoc->nt_ten }}
                                            </td>
                                            <td width="16%;" class="text-break" >{{ $thuoc->tg_ten }}</td>
                                            <td width="10%;" class="text-right">{{$tongthuoc->total }}</td>
                                            
                                        </tr>
                                        <?php }}  ?>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên thuốc</th>
                                        <th></th>
                                        <th class="text-center">Phân loại</th>
                                        <th class="text-center">Nhóm thuốc</th>
                                        <th class="text-center">Gốc thuốc</th>
                                        <th class="text-center">Số lượng</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <table id="xuatexceldsthuoc" style="display:none;">
                                <tr class="tbl_header">
                                    <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                                    <th ><span style="font-weight:bold;">Tên thuốc</span></th>
                                    <th><span style="font-weight:bold;">Phân loại</span></th>
                                    <th><span style="font-weight:bold;">Nhóm thuốc</span></th>
                                    <th><span style="font-weight:bold;">Gốc thuốc</span></th>
                                    <th><span style="font-weight:bold;">Hàm lượng</span></th>
                                    <th><span style="font-weight:bold;">Giá BHYT</span></th>
                                    <th><span style="font-weight:bold;">Gốc DV</span></th>
                                    <th><span style="font-weight:bold;">Liều dùng</span></th>
                                    <th><span style="font-weight:bold;">Số lượng</span></th>
                                </tr>
                                <?php $ktthuoc = ''; ?>
                                    @foreach ($dsthuoc as $thuoc)
                                        <?php foreach ($chitietlothuoc as $tongthuoc) {
                                     if($tongthuoc->t_ma==$thuoc->t_ma){

                                    ?>
                                <tr>
                                    <td class="text-center">{{ 'T' . sprintf('%05d', $thuoc->t_ma) }}</td>
                                    <td>{{ $thuoc->t_ten }}</td>
                                    <td>{{ $thuoc->pl_ten }}</td>
                                    <td>{{ $thuoc->nt_ten }}</td>
                                    <td>{{ $thuoc->tg_ten }}</td>
                                    <td>{{ $thuoc->t_hamluong }}</td>
                                    <td>{{ $thuoc->t_giabhyt }}</td>
                                    <td>{{ $thuoc->t_giadv }}</td>
                                    <td>{{ $thuoc->t_lieudung }}</td>
                                    <td>{{$tongthuoc->total }}</td>
                                </tr>
                                <?php }}  ?>
                                @endforeach
                            </table>
{{-- IN thuốc sắp hết số lượng --}}
                            <table style="display:none;" id="xuatexcelthuoc" width="100%">
                                <tr>
                                    <td colspan="9"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="9"><H2 style="font-weight:bold;text-align:center">DANH SÁCH THUỐC CÓ SỐ LƯỢNG SẮP HẾT</H2></td>
                                </tr>
                                <tr></tr>
                                <tr class="tbl_header">
                                    <th class="text-center"><span style="font-weight:bold;">STT</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Tên thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Phân loại</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Nhóm thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Gốc thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Lô nhập</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Hạn sử dụng</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Số lượng</span></th>
                                </tr>
                                <?php $i=1; 
                                foreach ($dslonhap as $dsthuoc){
                                 
                                 if($dsthuoc->ctlnt_soluong<=30){ ?>
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ 'T'.sprintf('%05d',$dsthuoc->t_ma) }}</td>
                                    <td>{{ $dsthuoc->t_ten }}</td>
                                    <td>{{ $dsthuoc->pl_ten }}</td>
                                    <td>{{ $dsthuoc->nt_ten }}</td>
                                    <td class="text-center">{{ $dsthuoc->tg_ten}}</td>
                                    <td>{{ 'LN'.sprintf('%05d',$dsthuoc->lnt_ma) }}</td>
                                    <td class="text-center">{{ date('d/m/Y',strtotime($dsthuoc->ctlnt_hansudung)) }}</td>
                                    <td class="text-center">{{ $dsthuoc->ctlnt_soluong }}</td>
                                </tr>
                              <?php }} ?>
                            </table>
                            {{-- In thuốc sắp hết hạn  --}}
                            <table  style="display:none;" id="xuatexcelthuocsaphethan" width="100%">
                                <tr>
                                    <td colspan="9"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                                </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <td colspan="9"><H2 style="font-weight:bold;text-align:center">DANH SÁCH THUỐC SẮP HẾT HẠN SỬ DỤNG</H2></td>
                                </tr>
                                <tr></tr>
                                <tr class="tbl_header">
                                    <th class="text-center"><span style="font-weight:bold;">STT</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Tên thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Phân loại</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Nhóm thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Gốc thuốc</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Lô nhập</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Hạn sử dụng</span></th>
                                    <th class="text-center"><span style="font-weight:bold;">Số lượng</span></th>
                                </tr>
                                <?php $i=1; 
                            foreach ($dslonhap as $dsthuoc){
                                $first_date = strtotime($dsthuoc->ctlnt_hansudung);
                                $second_date = strtotime(date('Y-m-d'));
                                $datediff = abs($first_date - $second_date);
                             if(floor($datediff / (60*60*24))<=30){ ?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ 'T'.sprintf('%05d',$dsthuoc->t_ma) }}</td>
                                <td>{{ $dsthuoc->t_ten }}</td>
                                <td>{{ $dsthuoc->pl_ten }}</td>
                                <td>{{ $dsthuoc->nt_ten }}</td>
                                <td class="text-center">{{ $dsthuoc->tg_ten}}</td>
                                <td>{{ 'LN'.sprintf('%05d',$dsthuoc->lnt_ma) }}</td>
                                <td class="text-center">{{ date('d/m/Y',strtotime($dsthuoc->ctlnt_hansudung)) }}</td>
                                <td class="text-center">{{ $dsthuoc->ctlnt_soluong }}</td>
                            </tr>
                          <?php }} ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    {{-- modal thuốc sắp hết hạn --}}
    <div class="modal fade" id="dsshh" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Danh sách thuốc sắp hết hạn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table">
                            <tr style="background-color: #fde2e4;">
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã</th>
                                <th class="text-center">Tên thuốc</th>
                                <th class="text-center">Lô nhập</th>
                                <th class="text-center">Hạn sử dụng</th>
                                <th class="text-center">Số lượng</th>
                            </tr>
                            <?php $i=1; 
                            foreach ($dslonhap as $dsthuoc){
                                $first_date = strtotime($dsthuoc->ctlnt_hansudung);
                                            $second_date = strtotime(date('Y-m-d'));
                                            $datediff = abs($first_date - $second_date);
                             if(floor($datediff / (60*60*24))<=30){ ?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ 'T'.sprintf('%05d',$dsthuoc->t_ma) }}</td>
                                <td>{{ $dsthuoc->t_ten }}</td>
                                <td>{{ 'LN'.sprintf('%05d',$dsthuoc->lnt_ma) }}</td>
                                <td class="text-center">{{ date('d/m/Y',strtotime($dsthuoc->ctlnt_hansudung)) }}</td>
                                <td class="text-center">{{ $dsthuoc->ctlnt_soluong }}</td>
                            </tr>
                          <?php }} ?>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    {{-- <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"
                            aria-hidden="true"></i>&ensp;Lưu</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- modal thuốc số lượng còn ít --}}
    <div class="modal fade" id="dstslit" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Danh sách thuốc SL sắp hết</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table">
                            <tr style="background-color: #fde2e4;">
                                <th class="text-center">STT</th>
                                <th class="text-center">Mã</th>
                                <th class="text-center">Tên thuốc</th>
                                <th class="text-center">Lô nhập</th>
                                <th class="text-center">Hạn sử dụng</th>
                                <th class="text-center">Số lượng</th>
                            </tr>
                            <?php $i=1; 
                            foreach ($dslonhap as $dsthuoc){
                             
                             if($dsthuoc->ctlnt_soluong<=30){ ?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ 'T'.sprintf('%05d',$dsthuoc->t_ma) }}</td>
                                <td>{{ $dsthuoc->t_ten }}</td>
                                <td>{{ 'LN'.sprintf('%05d',$dsthuoc->lnt_ma) }}</td>
                                <td class="text-center">{{ date('d/m/Y',strtotime($dsthuoc->ctlnt_hansudung)) }}</td>
                                <td class="text-center">{{ $dsthuoc->ctlnt_soluong }}</td>
                            </tr>
                          <?php }} ?>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    {{-- <button type="button" class="btn btn-primary"><i class="fa fa-floppy-o"
                            aria-hidden="true"></i>&ensp;Lưu</button> --}}
                </div>
            </div>
        </div>
    </div>
   

    <!-- Modal xem thuốc -->

@endsection
@section('admin_add_js')
    <script>
        $(document).ready(function() {
            $('#dsthuoc').DataTable({
            initComplete: function () {
            this.api().columns([3,4,5]).every( function () {
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
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
                },
            });
            $(".select2").select2();
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

        $('#quanlykho').addClass('active');
        $('#quanlythuoc').addClass('active');

        $("#btnexcel").click(function() {
            $("#xuatexcelthuoc").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachThuocSLConIt",
                fileext: ".xls"
            })
        });
        
        $("#btnexceldsthuoc").click(function() {
            $("#xuatexceldsthuoc").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachSoLuongThuoc",
                fileext: ".xls"
            })
        });
        $("#btnexcelsaphethan").click(function() {
            $("#xuatexcelthuocsaphethan").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachThuocSapHetHan",
                fileext: ".xls"
            })
        });
    </script>
    {{-- <script src="{{asset('admin/js/ad_medicine.js')}}"></script> --}}
@endsection
