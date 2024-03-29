<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn thuốc</title>
    <link rel="shortcut icon" href="{{asset('staff/images/logo.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('/vendor/paper-css-master/paper.css')}}">
    <style>
        @page {
            size: A4
        }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <table width="100%">
            <tr>
                <td style="height: 60px; width: 60px;"><img src="{{asset('/admin/images/logo.png')}}"
                        style="height: 80px; width: 80px;" alt=""></td>
                <td>
                    <b style="font-size: 18px; vertical-align: middle;">PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN<br> Thành phố
                            Cần Thơ</b><br>
                            Số 132, đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ
                        </td>
                        <td>
                            <span >Ngày lập: {{ date('d/m/Y H:m:i',strtotime($donthuoc->ngaylap)) }}</span><br>
                            <span >Mã BN: {{ 'BN'.sprintf('%05d',$donthuoc->bn_ma) }}</span><br>
                            <span>Mã đơn thuốc: {{ 'DT'.sprintf('%05d',$donthuoc->dthuoc_ma) }}</span>
                        </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h1>HÓA ĐƠN THUỐC</h1>
                    (<span ><b>{{ $donthuoc->lhk_ten }}</b></span>)
                </td>
            </tr>

        </table>
        <table width="100%" class="pt-5">
            <tr>
                <td style="width:20%">Tên Bệnh Nhân: </td>
                <td style="width:40%">{{ $donthuoc->bn_ten }}</td>
                <td style="width:20%">Tuổi: <b>{{ floor((time() - strtotime($donthuoc->bn_ngaysinh)) / 31556926); }}</b></td>
                <td style="width:20%">Giới tính:<b>{{ $donthuoc->bn_gioitinh }}</b></td>
            </tr>
            <tr>
                <td style="width:20%">Địa chỉ: </td>
                <td colspan="3" style="width:80%">{{ $donthuoc->bn_diachi.' '.$donthuoc->x_ten.', '.$donthuoc->h_ten.', '.$donthuoc->tp_ten }}</td>
            </tr>
            <tr>
                <td style="width:20%">Đối tượng: </td>
                <td style="width:30%">{{ $donthuoc->lhk_ten }}</td>
                <td style="width:20%">Số BHYT: </td>
                <td style="width:30%"><?php if(!empty($bhyt->bhyt_maso)){echo $bhyt->dt_ten.$bhyt->ql_so.$bhyt->nc_so.$bhyt->bhyt_maso; }?></td>
            </tr>
            <tr>
                <td style="width:20%">Chẩn đoán: </td>
                <td colspan="3" style="width:80%">
                    <?php $cd=''; 
                    foreach ($chuandoan as $cdoan):
                        $cd.=$cdoan->b_ten.', ';
                    endforeach;
                    echo rtrim($cd, ", ");
                    ?>
            </td>
            </tr>
        </table>
        <h3>Thuốc điều trị</h3>
        <table cellspacing="1" border="1" width="100%" style="margin-top: 20px;">
            <tr>
                <th style="width:10%;">STT</th>
                <th style="width:45%;">Tên thuốc/hàm lượng</th>
                <th style="width:15%;">ĐVT</th>
                <th style="width:15%;">Số lượng</th>
                <th style="width:30%;">Giá (VND)</th>
            </tr>
            <?php $i=1; $tongtien=0;?>
            @foreach ($ketoa as $thuoc)
                
            <tr>
                <td style="text-align: center;" >{{$i++}}</td>
                <td style="text-align: left;">{{$thuoc->t_ten}}<br>
                   <i>{{($thuoc->t_lieudung)}}</i>
                </td>
                <td style="text-align: center;">{{$thuoc->dvtt_ten}}</td>
                <td style="text-align: center;">{{ $thuoc->ctdt_soluong }}</td>
                <td style="text-align: right;">{{ number_format($thuoc->ctdt_giaban*$thuoc->ctdt_soluong) }} </td>
            </tr>
            <?php $tongtien=$tongtien+($thuoc->ctdt_giaban*$thuoc->ctdt_soluong) ?>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: right;"><b>Tổng cộng</b></td>
                <td  style="text-align: right;"><b> {{number_format($tongtien)}} </b> </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><b>BHYT</b>
                </td>
                <td  style="text-align: right;">
                    <?php
                    $tienchitra = 0;
                    $phantram='';
                 $tinhtien = 0;
                    if ($donthuoc->ldt_ma == '1') {
                       
                            if ($donthuoc->pkb_ma == $bhyt->pkb_ma) {
                                $phantram= $bhyt->ql_phantram . '%';
                                $tienchitra = 223500 * ($bhyt->ql_phantram / 100); //lấy này là tiền quyền lợi theo bhyt
                            }
                        // nếu kq của tổng tiền trừ cho tiền quyền lợi nó lớn hơn -1 thì chứng tỏ là nó lớn hơn tiền quyền lợi cho phép của bhyt nên lấy tổng số tiền đó trừ tiền quyền lợi
                        if ($tongtien-$tienchitra < -1) {
                            $tinhtien = 0;
                        }else {
                            $tinhtien = $tongtien-$tienchitra;
                        }
                        echo $phantram;
                    }else{
                        $tinhtien = $tongtien;
                    }
                    ?>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Tổng
                    tiền</b></td>
                <td class="text-right font-weight-bold" style="text-align: right;">
                    {{ number_format($tinhtien) . ' VND' }}</td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="width:50%; text-align: left;" >Cộng khoản: <b>{{$i-1}}</b></td>
                <td style="width:50%; "></td>
            </tr>
            <tr ></tr>
            <tr ></tr>
            <tr ></tr>
            {{-- <tr >
                <td colspan="2">Lời dặn của bác sĩ: {{ $donthuoc->dthuoc_loidan }}</td>
            </tr>
            <tr >
                <td colspan="2" >{{ $thuoc->dthuoc_loidan }}</td>
            </tr>
            <tr >
                <td colspan="2">Lời hẹn: {{ $donthuoc->dthuoc_loihen }}</td>
            </tr>
            <tr >
                <td colspan="2">
                    <span>Khi đi tái khám nhớ mang theo đơn thuốc này.</span>
                </td>
            </tr> --}}
            <tr>
                <td colspan="2" height="30px;"></td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;">Ngày {{ date('d',strtotime($donthuoc->ngaylap)) }} tháng {{ date('m',strtotime($donthuoc->ngaylap)) }} năm {{ date('Y',strtotime($donthuoc->ngaylap)) }} </td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;"><b>Bệnh nhân điều trị</b> </td>
            </tr>
        </table>
    </section>
</body>

</html>