@extends('admin.ad_layout')
@section('admin_add_title')
<title>Trang chủ</title>
@endsection
@section('admin_add_css')
<link href="{{asset('admin/css/style_ad_dashboard.css')}}" rel="stylesheet" />
<style>
    #line-chart,
    #pie-chart{
        height: 300px;
    }
    table, th, td{
    border-top:1px solid #ccc;
    border-bottom:1px solid #ccc;
    }
    table{
    border-collapse:collapse;
    overflow:auto;
    }
</style>
@endsection
@section('admin_add_content')
<div class="row mt-3">
    <div class="col-md-4">
        <div class="tongbenhnhan">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-address-book fa-4x mt-3 ml-3" aria-hidden="true"></i>
                </div>
                <div class="col-md-8">
                    <span style="font-weight:bold;font-size:22px;padding-top:5px;">Tổng số bệnh nhân </span><br><br>
                    <center><h3 style="font-weight:bold;">{{ $tongbenhnhan }}</h3></center>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="doanhthukham">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-font-awesome fa-4x mt-3 ml-3" aria-hidden="true"></i>
                </div>
                <div class="col-md-8">
                    <span style="font-weight:bold;padding-top:5px;font-size:22px;">Tổng doanh thu khám</span><br><br>
                    <center><h3 style="font-weight:bold;">{{ number_format($tongpkb).' VND' }}</h3></center>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="doanhthucls">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-bed fa-4x mt-3 ml-3" aria-hidden="true"></i>
                </div>
                <div class="col-md-8">
                    <span style="font-weight:bold;padding-top:5px;font-size:22px;">Tổng doanh thu CLS</span><br><br>
                    <center><h3 style="font-weight:bold;">{{ number_format($tonggiacls).' VND' }}</h3></center>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3">
        <div class="thongkebntn">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-address-book fa-4x mt-3 ml-3" aria-hidden="true"></i>
                </div>
                <div class="col-md-8">
                    <h1 class="mt-3">{{ number_format($tongbenhnhantheongay) }}</h1>
                    <span style="font-weight:bold;">Bệnh nhân theo ngày</span>
                </div>
            </div>
        </div>
    </div> --}}
    

</div>
<hr>
<div class="row mt-3">
        <div class="col-md-1"></div>
        <div class="col-md-10">
         
            <form id="loc_thongke" class="text-center" method="post">
                <div class="row mb-3">
                    <div class="col-md-5 ">
                        <label>Từ: </label>
                        <input type="date" name="ngaybd" class="form-control " id="ngaybd" min="{{ date('Y-m-d', strtotime('2018-12-31')) }}" max="{{ date('Y-m-d')}}">
                    </div>
                  
                    <div class="col-md-5">
                        <label>Đến: </label>
                        <input type="date" name="ngaykt" class="form-control " id="ngaykt" min="{{ date('Y-m-d', strtotime('2018-12-31')) }}" max="{{ date('Y-m-d')}}">
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="submit" class="btn btn-info"><i class="fa fa-filter" aria-hidden="true">&ensp;</i>Tìm kiếm</button>
                    </div>
                </div>
            </form>
         
            <div class="row" id="bangkq">
                <div class="col-md-6">
                    <center><h5>Kết quả</h5></center>
                    <table class="mt-1 table table-bordered" width="100%;">
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lượt khám:</td>
                            <td class="text-center"> <span style="color: red;"><?php $pkb=0; if($sluongpkb>0){ $pkb=$sluongpkb; } echo $pkb; ?></span></td>
                        </tr>
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Loại hình khám bệnh:</td>
                            <td class="text-center"> 
                                <span >DV</span>: <span style="color: red;"><?php    $dv=0; if($sllhk_dv>0){ $dv=round((($sllhk_dv)/($sllhk_dv+$sllhk_bhyt))*100,2); } echo $dv; ?>%</span> <br>
                                <span>BHYT</span>: <span style="color: red;"><?php $bhyte=0; if($sllhk_bhyt>0){ $bhyte=round((($sllhk_bhyt)/($sllhk_dv+$sllhk_bhyt))*100,2); } echo $bhyte; ?>%</span>
                            </td>
                        </tr>
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lịch hẹn:</td>
                            <td class="text-center"> <span style="color: red;"><?php $lh=0; if($slh>0){ $lh=$slh; } echo $lh; ?></span></td>
                        </tr>
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng doanh thu khám:</td>
                            <td class="text-center"> <span style="color: red;"><?php $gkhambenh=0; if($tonggkhambenh>0){ $gkhambenh=$tonggkhambenh; } echo $gkhambenh; ?> (VND)</span></td>
                        </tr>
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng doanh thu CLS:</td>
                            <td class="text-center"> <span style="color: red;"><?php $giacls=0; if($tonggcls>0){ $giacls=$tonggcls; } echo $giacls; ?> (VND)</span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <center><h5>Các bệnh thường gặp</h5></center>
                    <table  class="mt-1 table table-bordered" width="100%">
                        <?php $tongbenh=0;  $tongsobenh=0;?>


                        @foreach($tongbthuonggap as $tongb)
                        <?php  $tongsobenh=$tongsobenh+$tongb->total_benh; ?>
                        @endforeach
                        @foreach($dsbthuonggap as $btg)
                        <?php $tongbenh=$tongbenh+$btg->total_benh; ?>
                        <tr height="50px;">
                            <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>{{ $btg->b_ten }}</td>
                            <td class="text-center"> <span style="color: red;">{{ round(($btg->total_benh/$tongsobenh)*100,2) }}%</span></td>
                        </tr>
                        @endforeach
                        <?php 
                               if($tongsobenh>0){
                         ?>
                        <tr height="50px;">
                            <td class="pl-2"><button type="button" class="btn " data-toggle="modal" data-target="#showbenhkhac"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Khác  </button></td>
                            <td class="text-center"> <span style="color: red;">{{ round((($tongsobenh-$tongbenh)/$tongsobenh)*100,2) }}%</span></td>
                        </tr>
                    </table>
                        
  <div class="modal fade" id="showbenhkhac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Các bệnh thường gặp khác</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <button id="btninbtg" class="btn btn-success" style="float:right;"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
          <table id="thongkebtg" class=" w-100 table table-bordered">
            <tr>
                <th style="width:20%;">STT</th>
                <th style="width:50%;">Tên bệnh</th>
                <th style="width:30%;">Tỷ lệ (%)</th> 
            </tr>
        
                <?php 
                    $i=1;
                  foreach($tongbthuonggap as $tongb){
                  echo '<tr>
                   <th>'.$i++.'</th>
                   <td>'.$tongb->b_ten.'</td>
                   <td>'.round(($tongb->total_benh/$tongsobenh)*100,2).' %</td>
                   </tr>' ;
                }
                    ?>
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          
        </div>
      </div>
    </div>
  </div>
                        <?php }
                        ?>
                    
                 
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
</div>
<hr>
<div class="row mt-3">
    <div class="col-md-8  border" style="">
        <div class="row pl-3">
            <div class="col-md-12" style="background-color:#ffe5d9;">
                <h4 style="padding-top:5px; padding-bottom:5px;"></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                
                <div class="border">
                    <h5 class="text-center mt-2 mb-2" >
                        Bệnh<br>
                    </h5>
                    {{-- <center>
                        <form id="loc_benhthuonggap" method="post">
                     
                                    <input type="date" name="benh_ngaybd" class="form-control ml-1" id="benh_ngaybd" style="font-size: 14px; width:150px; float:left;" >
                                <span style="float:left; " class="mx-1 mt-2">Đến</span>
                                    <input type="date" name="benh_ngaykt" class="form-control" id="benh_ngaykt" style="font-size: 14px; width:150px; float:left;">
                                
                                    <button type="submit" class="btn btn-info" style="font-size: 14px; float-left"><i class="fa fa-filter" aria-hidden="true"></i></button>
                               
                        </form>
                    </center> --}}
                    <div id="pie-chart" style="height: 300px"></div>
                    
                </div>
            </div>
            <div class="col-md-6">
                
                        <div class="border">
                            <h5 class="text-center  mt-2 mb-2">Loại hình khám</h5>
                           
                            <div id="loaihinhkham" style="height: 300px"></div>
                            
                        </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="border">
            <h4 class="text-center" style="background-color:#ffe5d9;padding-top:5px; padding-bottom:5px;">Thống kê theo ngày <span>{{ date('d/m/Y', strtotime(date('Y-m-d'))) }}</span></h4>
            <div class="border">
                <div class="row">
                    <div class="col-md-8">
                        <p style="margin-left:20px;margin-top: 10px;"><i class="fa fa-bell" aria-hidden="true"></i>&ensp;Số lượng lịch hẹn mới: </p>
                        <p style="margin-left:20px;margin-top: 10px;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&ensp;Số lượng lượt khám: </p>
                        <p style="margin-left:20px;margin-top: 10px;"><i class="fa fa-user" aria-hidden="true"></i>&ensp;Số lượng BN mới:</p>
                    </div>
                    <div class="col-md-4">
                        <p style="margin-top:10px;"><?php $sllh=0; if($sllichhen>0){ $sllh=$sllichhen; } echo $sllh; ?></p>
                     
                        <p style="margin-top:10px;"><?php $slpk=0; if($slpkb>0){ $slpk=$slpkb; } echo $slpk; ?></p>
                        <p style="margin-top:10px;"><?php $slbn=0; if($slbenhnhan>0){ $slbn=$slbenhnhan; } echo $slbn; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row mt-3">
    <div class="col-md-12" style="">
        <h4 style="background-color:#ffe5d9;padding-top:5px; padding-bottom:5px;">Thống kê số lượng lượt khám</h4><br>
        <div class="row">
            <div class="col-md-12">
                <div id="line-chart" style="height: 250px;"></div>
            </div>
            {{-- <div class="col-md-5">
                <form id="loc_benhthuonggap" method="post">
                    <div class="row mb-3">
    
                       
                        <div class="col-md-5 ">
                            <label>Từ: </label>
                            <input type="date" name="benh_ngaybd" class="form-control " id="benh_ngaybd" >
                        </div>
                      
                        <div class="col-md-5">
                            <label>Đến: </label>
                            <input type="date" name="benh_ngaykt" class="form-control " id="benh_ngaykt" >
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button type="submit" class="btn btn-info"><i class="fa fa-filter" aria-hidden="true"></i></button>
                        </div>
                    </div>
    
                </form>

                <span><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lượt khám: &ensp;&ensp; <span style="color: red;">13</span></span><br>
                <span><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lịch hẹn:</span>
            </div> --}}
        </div>
            
       
        
    </div>
    {{-- <div class="col-md-4" style="">
        <h4 class="text-center">Bệnh thường gặp</h4>
        <div id="pie-chart"></div>
        
    </div> --}}
</div>
<hr>
<div class="row mt-3">
    <div class="col-md-8" style="">
        
        <h4 style="background-color:#ffe5d9;padding-top:5px; padding-bottom:5px;">Thống kê lô nhập thuốc</h4>
        <div id="lonhap" style="height: 250px;"></div>
    </div>
    <div class="col-md-4" style="">

        <?php $i=1; $slconit=0; $slsaphethan=0;
                        foreach ($dslonhap as $dsthuoc){
                            $first_date = strtotime($dsthuoc->ctlnt_hansudung);
                                        $second_date = strtotime(date('Y-m-d'));
                                        $datediff = abs($first_date - $second_date);
                         if(floor($datediff / (60*60*24))<=30){ $slsaphethan=$slsaphethan+1; }
                         if($dsthuoc->ctlnt_soluong<=30){ $slconit=$slconit+1; }
                        }
                         
                         ?>
        <button class="btn btn-info float-right w-100 mt-5  ml-1" data-toggle="modal" data-target="#dsshh">Tổng số thuốc sắp hết hạn: {{ $slsaphethan }}</button>
        <button class="btn btn-info float-right w-100 mt-1" data-toggle="modal" data-target="#dstslit">Tổng số lượng thuốc sắp hết: {{ $slconit }} </button>
    
    </div>
</div>
<?php $phantram=0; ?>
@foreach ($dsloaihinhkham as $lhk)
<?php $phantram=$lhk->loaihinhkham+ $phantram; ?>

       @endforeach

       
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
                <button id="btnexcelsaphethan" class="btn btn-success float-right">Xuất file</button>
                    <table class="table" id="xuatexcelthuocsaphethan">
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
                            <td class="text-center">{{ 'T'.sprintf('%03d',$dsthuoc->t_ma) }}</td>
                            <td>{{ $dsthuoc->t_ten }}</td>
                            <td>{{ 'LN'.sprintf('%02d',$dsthuoc->lnt_ma) }}</td>
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
{{-- modal bệnh thường gặp --}}
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
<button id="btnexcel" class="btn btn-success float-right"></button>

                    <table class="table" id="xuatexcelthuoc">
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
                            <td class="text-center">{{ 'T'.sprintf('%03d',$dsthuoc->t_ma) }}</td>
                            <td>{{ $dsthuoc->t_ten }}</td>
                            <td>{{ 'LN'.sprintf('%02d',$dsthuoc->lnt_ma) }}</td>
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
@endsection




@section('admin_add_js')
<script>
$('#dashboard').addClass('active');
Morris.Donut({
  element: 'pie-chart',
  data: [
    @foreach ($dsbenhthuonggap as $benh)
    {label: "{{ $benh->b_ten }}", value: {{ $benh->total_benh }}},
           @endforeach
  ]
});
Morris.Donut({
  element: 'loaihinhkham',
  data: [
    @foreach ($dsloaihinhkham as $lhk)
    {label: "<?php if($lhk->lhk_ma==1){echo 'BHYT';}else {echo 'DỊCH VỤ';} ?>", value: '{{ sprintf('%.2f',($lhk->loaihinhkham/$phantram)*100) }} '},
           @endforeach
  ]
});


var data = [
    @foreach($dsbnhandakham as $dsbn)
      { x: '{{ $dsbn->date }}', y: {{ $dsbn->total_pkb }} },
      @endforeach

    ],
    config = {
      data: data,
      xkey: 'x',
      ykeys: ['y'],
      behaveLikeLine: true,
      labels: ['Số lượng BN:', 'Total Outcome'],
    //   fillOpacity: 0.6,
    //   hideHover: 'auto',
    //   behaveLikeLine: true,
    //   resize: true,
    //   pointFillColors:['#ffffff'],
    //   pointStrokeColors: ['black'],
    //   lineColors:['gray','red']
  };

config.element = 'line-chart';
Morris.Line(config);


var data = [
    @foreach($dslonhapthuoc as $dslnt)
        @foreach($lonhap as $lnt)
        <?php if($dslnt->lnt_ma==$lnt->lnt_ma){ ?>
      {  x:'{{ $lnt->created_at }}', y: {{ $dslnt->total_lonhap }} , z: {{ $dslnt->lnt_ma }} },
      <?php }?>
      @endforeach
      @endforeach

    ],
    config = {
      data: data,
      xkey: 'x',
      ykeys: ['y','z'],
      behaveLikeLine: true,
      labels: ['Tổng giá trị:', 'Lô nhập LNT'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['red','gray']
  };
;
config.element = 'lonhap';
Morris.Line(config);
$(document).on('submit', '#loc_thongke', function(e){
    e.preventDefault();
    var ngaybd=$('#ngaybd').val();
    var ngaykt=$('#ngaykt').val();
    if(ngaybd >= ngaykt){
        alert('Ngày bắt đầu không được lớn hơn hoặc bằng ngày kết thúc của kết quả tìm kiếm!');

    }else {
    var bangkq=$('#bangkq');
    var data = new FormData(this);

    $.ajax({
                    url: "{{ url('/admin/thongke') }}",
                    method: "POST",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        bangkq.html(data.output);
                        $("#btninbtg2").click(function() {
            $("#thongkebtg2").table2excel({
                name: "Worksheet Name",
                filename: "DSthongkebenhthuonggap",
                fileext: ".xls"
            })
        });
                    }
                });
    }
});

$("#btnexcel").click(function() {
            $("#xuatexcelthuoc").table2excel({
                name: "Worksheet Name",
                filename: "DanhSachThuocSLConIt",
                fileext: ".xls"
            })
        });
$("#btninbtg").click(function() {
            $("#thongkebtg").table2excel({
                name: "Worksheet Name",
                filename: "DSthongkebenhthuonggap",
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
$(document).ready(function(){
    
});

</script>
@endsection