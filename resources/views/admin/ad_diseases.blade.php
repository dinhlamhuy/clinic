@extends('admin.ad_layout')
@section('admin_add_title')
<title>Quản lý bệnh</title>
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
                        <span class="admin_titile">Quản lý bệnh</span>
                        <button class="btn btn-success ml-3 mb-3" data-toggle="modal" data-target="#addbenh"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Thêm</button>
                        <!-- <button class="btn btn-info ml-3 mb-3"  data-toggle="modal" data-target="#addthuoc">
                            Danh sách thuốc sắp hết hạn
                        </button> -->
                        <button class="btn btn-info float-right mt-2" id="btnexcel">Xuất file excel</button>
                    </div>

                </div>
                <div class="row ml-1 mr-1">
                    <div class="col-md-12 pl-1 pr-1 pt-1" style="background-color: white;">
                        <table id="dsbenh" class="display pt-2" style="width:100%;">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên bệnh</th>
                                    <th class="text-center">Mã nhóm bệnh</th>
                                    <th class="text-center">Tên nhóm bệnh</th>
                                    <th class="text-center">Triệu chứng bệnh</th>
                                    {{-- <th class="text-center">Mô tả</th> --}}

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                          
                                @foreach($dsbenh as $benh)
                                <tr>
                                    <td width="10%;" class="text-center">{{ 'B'.sprintf('%04d',$benh->b_ma) }}</td>
                                    <td width="20%;" class="text-break">
                                        {{ $benh->b_ten }}
                                    </td>
                                    <td width="10%;" class="text-center">{{ 'NB'.sprintf('%03d',$benh->nb_ma) }}</td>
                                    <td width="15%;">
                                        <?php foreach ($dsnhombenh as $nhombenh) {
                                            if ($benh->nb_ma == $nhombenh->nb_ma) {
                                                echo $nhombenh->nb_ten;
                                            }
                                        } ?>
                                    </td>
                                    <td width="35%;">
                                        <?php foreach ($dschitietbn as $chitietbn) {
                                            if ($benh->b_ma == $chitietbn->b_ma ) {
                                                echo '<button class="p-0 btn  mt-1  mx-1" style="background-color: rgb(211, 214, 214); ">'.$chitietbn->tcb_ten.'</button>';
                                            }
                                        } ?>
                                    </td>
                                    <td width="10%;" class="text-center">
                                        <button type="button" class="btn btn-info float-left ml-2" data-toggle="modal" data-target="#editthuoc{{ $benh->b_ma }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <!-- Modal edit bệnh -->
                                        <div class="modal fade" id="editthuoc{{ $benh->b_ma }}" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="staticBackdropLabel">Thông tin bệnh</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{URL::to('admin/edit_diseases')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="b_ma" class="form-control" value="{{ $benh->b_ma }}">
                                                                        <div class="form-group">
                                                                                <label for="" class="col-form-label chu float-left">Mã bệnh:</label>
                                                                                <input type="text" class="form-control" value="{{ 'B'.sprintf('%04d',$benh->b_ma) }}" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            
                                                                            <label for="" class="col-form-label chu float-left">Tên bệnh:</label>
                                                                            <input type="text" name="b_ten" value="{{ $benh->b_ten }}" class="form-control" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="" class="col-form-label chu float-left">Nhóm bệnh:</label>
                                                                                <select class="select2 form-control w-100" name="nb_ma" required>
                                                                          
                                                                                    <?php foreach ($dsnhombenh as $nhombenh) {
                                                                                    ?>

                                                                                        <option value="{{$nhombenh->nb_ma}}" <?php if ($benh->nb_ma == $nhombenh->nb_ma) {
                                                                                                                                    echo 'selected';
                                                                                                                                } ?>>{{$nhombenh->nb_ten}}</option>
                                                                                    <?php
                                                                                    } ?>

                                                                                </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                                <label for="" class="col-form-label float-left chu">Triệu chứng bệnh:</label>
                                                                                {{-- <select class="js-dstrieuchung js-states form-control text-left" name="trieuchung[]" multiple="multiple">
                                                                                    @foreach ($dschitietbn as $cttchung)
                                                                                    <?php
                                                                                    // $tcbmoi= $cttchung->tcb_ma;
                                                                                    // if($cttchung->b_ma==$benh->b_ma ){
                                                                                        ?>
                                                                                        <option value="{{ $cttchung->tcb_ma }}" selected>{{ $cttchung->tcb_ten }}</option>
                                                                                        <?php 
                                                                                        // }else {
                                                                                        //     if($tcbmoi!=$tcbcu){
                                                                                        ?>
                                                                                        <option value="{{ $cttchung->tcb_ma }}" >{{ $cttchung->tcb_ten }}</option>
                                                                                        <?php
                                                                                    //  }} $tcbcu= $cttchung->tcb_ma; 
                                                                                     ?>
                                                                                    @endforeach
                                                                                </select> --}}
                                                                                
                                                                                <select class="js-dstrieuchung js-states form-control text-left" name="trieuchung[]" multiple="multiple">
                                                                                  
                                                                                    @foreach ($dstrieuchungbenh as $dstchung)
                                                                                        <?php $selecttc=""; ?>
                                                                                        @foreach ($dschitietbn as $cttchung)
                                                                                            <?php
                                                                                            if(  $cttchung->b_ma==$benh->b_ma && $cttchung->tcb_ma==$dstchung->tcb_ma){
                                                                                                $selecttc="selected"; 
                                                                                            }  ?>
                                                                                         @endforeach
                                                                                        <option value="{{ $dstchung->tcb_ma }}" {{ $selecttc }} >{{ $dstchung->tcb_ten }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                
                                                                        </div>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Lưu</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{URL::to('admin/delete_diseases')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="b_ma" class="form-control" value="{{ $benh->b_ma }}">
                                            <button type="submit" class="btn btn-danger float-left ml-1 show_confirm"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                             <tfoot>
                                <tr>
                                    <th class="text-center">Mã</th>
                                    <th class="text-center">Tên bệnh</th>
                                    <th class="text-center">Mã nhóm bệnh</th>
                                    <th class="text-center">Tên nhóm bệnh</th>
                                    {{-- <th class="text-center">Mô tả</th> --}}
                                    <th></th>
                                </tr>
                            </tfoot> 
                        </table>
                        <table id="xuatexceldsbenh" style="display:none;width:100%;">
                            <tr>
                                <th class="text-center"><span style="font-weight:bold;">Mã</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Tên bệnh</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Mã nhóm bệnh</span></th>
                                <th class="text-center"><span style="font-weight:bold;">Tên nhóm bệnh</span></th>
                            </tr>
                            @foreach($dsbenh as $benh)
                            <tr>
                                <td>{{ 'B'.sprintf('%04d',$benh->b_ma) }}</td>
                                <td>{{ $benh->b_ten }}</td>
                                <td>{{ 'NB'.sprintf('%03d',$benh->nb_ma) }}</td>
                                <td>
                                    <?php foreach ($dsnhombenh as $nhombenh) {
                                    if ($benh->nb_ma == $nhombenh->nb_ma) {
                                        echo $nhombenh->nb_ten;
                                    }
                                } ?>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal addbênh-->
<div class="modal fade" id="addbenh" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Thêm bệnh mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('admin/add_diseases')}}" method="post">
                    @csrf
                    <div class="container-fluid">
                                <div class="form-group">
                                    <label for="" class="col-form-label chu float-left">Tên bệnh:</label>
                                    <input type="text" name="b_ten" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-form-label chu float-left">Nhóm bệnh:</label>
                                        <select class="select2 form-control w-100" name="nb_ma" required>
                                            <option value="" disabled selected>-- Chọn nhóm bệnh --</option>
                                            <?php foreach ($dsnhombenh as $nhombenh) {
                                            ?>

                                                <option value="{{$nhombenh->nb_ma}}" ;>{{$nhombenh->nb_ten}}</option>
                                            <?php
                                            } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-form-label float-left chu">Triệu chứng bệnh:</label>
                                        <select class="js-dstrieuchung js-states form-control" name="trieuchung[]"
                                        multiple="multiple" required>
                                        {{-- <option value="">Chọn triệu chứng</option> --}}
                                        @foreach ($dstrieuchungbenh as $tcbenh)
                                                <option value="{{ $tcbenh->tcb_ma }}">{{ $tcbenh->tcb_ten }}</option>
                                            @endforeach
                                    </select>
                        </div>
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


@endsection
@section('admin_add_js')
<script>
    $(document).ready(function() {
        $('#dsbenh').DataTable( {
            initComplete: function () {
                this.api().columns([3]).every( function () {
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
        
    } );
        $(".select2").select2();
        $(".js-dstrieuchung").select2({ });
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
                        title: 'Chắc chắn xóa bệnh này?',
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

    $('#quanlybenh').addClass('active');
    $('#quanlyb').addClass('active');

    $("#btnexcel").click(function(){
    $("#xuatexceldsbenh").table2excel({
        name: "Worksheet Name",
        filename: "DanhSachBenh",
        fileext: ".xls"
    }) 
 });
</script>
@endsection