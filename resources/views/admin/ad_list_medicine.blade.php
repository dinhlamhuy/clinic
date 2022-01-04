@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Danh sách thuốc cấp phép</title>
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
                            <span class="admin_titile">Danh sách thuốc</span>
                            <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addthuoc"><i
                                    class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                            
                                    <button class="btn btn-info mb-3 mt-2 float-right" id="btn-dsthuoc"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button>
                           
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-1 pr-1 pt-1" style="background-color: white;">
                            <table id="dsthuoc" class="display pt-2" style="width:100%;">
                                <thead>
                                    <tr class="tbl_header">
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên thuốc</th>
                                        <th class="text-center">Phân loại</th>
                                        <th class="text-center">Nhóm thuốc</th>
                                        <th class="text-center">Gốc thuốc / hoạt chất</th>
                                       
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($dsthuoc as $thuoc)
                                        

                                        <tr>
                                            <td width="9%;" class="text-center">{{ 'T' . sprintf('%05d', $thuoc->t_ma) }}
                                            </td>
                                            <td width="23%;" class="text-break">
                                                {{ $thuoc->t_ten }} <br>
                                                <button type="button" class="btn p-0"
                                                    style="font-size: 14px; color:rgb(16, 16, 133);" data-toggle="modal"
                                                    data-target="#xemthuoc{{ $thuoc->t_ma }}">Chi tiết</button>
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
                                                                                <span class="text-muted">{{ $thuoc->t_ten }}</span></label></div>
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
                                                                  
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Thoát</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="12%;" class="text-center">{{ $thuoc->pl_ten }}</td>
                                            <td width="20%;">
                                                {{ $thuoc->nt_ten }}
                                            </td>
                                            <td width="15%;" >{{ $thuoc->tg_ten }}</td>
                                        
                                            <td width="11%;" class="text-center">
                                                <button type="button" class="btn btn-info float-left ml-1"
                                                    data-toggle="modal" data-target="#editthuoc{{ $thuoc->t_ma }}"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <!-- Modal edit thuốc -->
    <div class="modal fade" id="editthuoc{{ $thuoc->t_ma }}" data-backdrop="static" data-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thông tin thuốc</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ URL::to('/admin/edit_medicine') }}" method="post">
                @csrf
            <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-form-label chu float-left">Mã thuốc:</label>
                            <input type="hidden" name="t_ma" value="{{ $thuoc->t_ma }}" >
                            <input type="text" class="form-control" value="{{'T'.sprintf('%05d', $thuoc->t_ma )}}" disabled>
                        </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label float-left">Tên thuốc:</label>
                                    <input type="text" name="t_ten" class="form-control" value="{{ $thuoc->t_ten }}" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">PL thuốc:</label>
                                        <select class="select2 form-control w-100" name="pl_ma" required>
                                            @foreach ($phanloai as $pl)
                                            <option value="{{$pl->pl_ma}}" <?php if($thuoc->pl_ma==$pl->pl_ma){echo 'selected';} ?>>{{$pl->pl_ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">Nhóm thuốc:</label>
                                        <select class="select2 form-control w-100" name="nt_ma" required>
                                            @foreach ($nhomthuoc as $nt)
                                            <option value="{{$nt->nt_ma}}" <?php if($thuoc->nt_ma==$nt->nt_ma){echo 'selected';} ?>>{{$nt->nt_ten}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">Gốc thuốc / hoạt chất:</label>
                                        <select class="select2 form-control w-100" name="tg_ma" required>
                                            @foreach ($thuocgoc as $tg)
                                            <option value="{{$tg->tg_ma}}" <?php if($thuoc->tg_ma==$tg->tg_ma){echo 'selected';} ?>>{{$tg->tg_ten}}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">Hàm lượng:</label>
                                        <input type="text" class="form-control" name="t_hamluong" value="{{ $thuoc->t_hamluong }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">Cách sử dụng:</label>
                                        <select class="select2 form-control w-100" name="csd_ma" required>
                                            @foreach ($cachsudung as $csd)
                                            <option value="{{$csd->csd_ma}}" <?php if($thuoc->csd_ma==$csd->csd_ma){echo 'selected';} ?>>{{$csd->csd_ten}}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="col-form-label float-left chu">Liều dùng:</label>
                                        <input type="text" class="form-control" name="t_lieudung" value="{{ $thuoc->t_lieudung }}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label float-left chu">Giá BHYT (VND):</label>
                                        <input type="number" class="form-control float-left w-100" name="t_giabhyt" value="{{ $thuoc->t_giabhyt }}" required>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="" class="col-form-label float-left chu">Giá dịch vụ (VND):</label>
                                        <input type="number" class="form-control float-left w-100" name="t_giadv" value="{{ $thuoc->t_giadv }}" required>
                                    </div>
                                </div>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
            </div>
                </form>
        </div>
    </div>
</div>

                                                <form action="{{ URL::to('/admin/delete_medicine') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="t_ma" value="{{ $thuoc->t_ma }}">

                                                    <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times"
                                                        aria-hidden="true"></i></button>
                                                    </form>
                                            </td>
                                        </tr>
                                       

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Mã</th>
                                        <th class="text-center">Tên thuốc</th>
                                        <th class="text-center">Phân loại</th>
                                        <th class="text-center">Nhóm thuốc</th>
                                        <th class="text-center">Gốc thuốc / hoạt chất</th>
                                       
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        <table id="filexuat" class="display pt-2 d-none" style="width:100%;">
                            <tr>
                                <td colspan="10"><h1 style="font-weight:bold;color:#0096c7;text-align:center;">HỆ THỐNG QUẢN LÝ PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN</h1></td>            
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td colspan="10"><H2 style="font-weight:bold;text-align:center">DANH SÁCH THUỐC ĐƯỢC PHÉP HOẠT ĐỘNG</H2></td>
                            </tr>
                            <tr></tr>
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center"><b>Mã</b></th>
                                    <th class="text-center"><b>Tên thuốc</b></th>
                                    <th class="text-center"><b>Phân loại</b></th>
                                    <th class="text-center"><b>Nhóm thuốc</b></th>
                                    <th class="text-center"><b>Gốc thuốc / hoạt chất</b></th>
                                    <th class="text-center"><b>Hàm lượng</b></th>
                                    <th class="text-center"><b>Liều dùng</b></th>
                                    <th class="text-center"><b>Cách sử dụng</b></th>
                                    <th class="text-center"><b>Giá BHYT</b></th>
                                    <th class="text-center"><b>Giá dịch vụ</b></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($dsthuoc as $thc)
                                    
                    
                                    <tr>
                                        <td width="9%;" class="text-center">{{ 'T' . sprintf('%05d', $thc->t_ma) }} </td>
                                        <td width="23%;" class="text-break">{{ $thc->t_ten }} </td>
                                        <td width="12%;" class="text-center">{{ $thc->pl_ten }}</td>
                                        <td width="20%;">{{ $thc->nt_ten }}</td>
                                        <td width="15%;" >{{ $thc->tg_ten }}</td>
                                        <td>{{ $thc->t_hamluong }}</td>
                                        <td>{{ $thc->t_lieudung }}</td>
                                        <td>{{ $thc->csd_ten }}</td>
                                        <td>{{ $thc->t_giabhyt }}</td>
                                        <td>{{ $thc->t_giadv }}</td>
                                     
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
    <!-- Modal addthuoc -->
    <div class="modal fade" id="addthuoc" data-backdrop="static" data-keyboard="false" 
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Thêm thuốc</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ URL::to('/admin/add_medicine') }}" method="post">
                    @csrf
                <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                          
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label chu float-left">Tên thuốc:</label>
                                        <input type="text" name="t_ten" class="form-control" required>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu float-left">PL thuốc:</label>
                                            <select class="select2 form-control w-100" name="pl_ma" required>
                                                @foreach ($phanloai as $pl)
                                                <option value="{{$pl->pl_ma}}">{{$pl->pl_ten}}</option>
                                                    
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu float-left">Nhóm thuốc:</label>
                                            <select class="select2 form-control w-100" name="nt_ma" required>
                                                <option value="" disabled selected>-- Chọn nhóm thuốc --</option>
                                                @foreach ($nhomthuoc as $nt)
                                                <option value="{{$nt->nt_ma}}">{{$nt->nt_ten}}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">Gốc thuốc / hoạt chất:</label>
                                            <select class="select2 form-control w-100" name="tg_ma" required>
                                                <option value="" disabled selected>-- Chọn gốc thuốc / hoạt chất--</option>
                                                @foreach ($thuocgoc as $tg)
                                                <option value="{{$tg->tg_ma}}">{{$tg->tg_ten}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu ">Hàm lượng:</label>
                                            <input type="text" class="form-control" name="t_hamluong" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">Cách sử dụng:</label>
                                            <select class="select2 form-control w-100" name="csd_ma" required>
                                                @foreach ($cachsudung as $csd)
                                                <option value="{{$csd->csd_ma}}">{{$csd->csd_ten}}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="col-form-label chu">Liều dùng:</label>
                                            <input type="text" class="form-control" name="t_lieudung">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu">Giá BHYT (VND):</label>
                                            <input type="number" class="form-control float-left w-100" name="t_giabhyt" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label chu">Giá dịch vụ (VND):</label>
                                            <input type="number" class="form-control float-left w-100" name="t_giadv" required>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"
                            aria-hidden="true"></i>&ensp;Lưu</button>
                        </center>
                    </div>
                    </form>
                    
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
            this.api().columns([2,3,4]).every( function () {
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
            if ($mess == 'Cập nhật thành công') {
            $icon = 'success';
            $tb = 'Cập nhật thành công';
        } else if ($mess == 'Thêm thành công') {
            $icon = 'success';
            $tb = 'Thêm thành công';
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
                        title: 'Xác nhận xóa thuốc',
                        text: "Bạn hãy suy nghĩ thật cẩn thận!",
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

        $('#quanlythuocne').addClass('active');
        $('#danhsachthuoc').addClass('active');

        $("#btn-dsthuoc").click(function() {
            $("#filexuat").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachThuoc",
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
