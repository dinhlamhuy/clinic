<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu chỉ định</title>
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
                <td width="420px;">
                    <b style="font-size: 18px; vertical-align: middle;">PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN <br> Thành phố
                            Cần Thơ</b><br>
                            Số 132, đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ
                </td>
                <td>
                    <span >Ngày lập: {{ date('d/m/Y H:m:i', strtotime($benhnhan->ngaylap))}}</span><br>
                    <span >Mã BN: {{ 'BN'.sprintf('%05d',$benhnhan->bn_ma) }}</span><br>
                    <span >Mã PCD: {{'PCD'.sprintf('%05d', $benhnhan->pcd_ma)}}</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h1>PHIẾU CHỈ ĐỊNH</h1>
                </td>
            </tr>

        </table>
        <table width="100%">
            <tr>
                <td style="width:20%">Tên Bệnh Nhân: </td>
                <td style="width:30%"><b>{{ $benhnhan->bn_ten }}</b></td>
                <td style="width:20%">Tuổi: <b>{{ floor((time() - strtotime($benhnhan->bn_ngaysinh)) / 31556926); }}</b></td>
                <td style="width:20%">Giới tính: <b>{{ $benhnhan->bn_gioitinh }}</b></td>
            </tr>
            <tr>
                <td style="width:20%">Địa chỉ: </td>
                <td colspan="3" style="width:80%">{{ $benhnhan->bn_diachi.', '.$benhnhan->x_ten.', '.$benhnhan->h_ten.', '.$benhnhan->tp_ten }}</td>
            </tr>
            <tr>
                <td style="width:20%">Đối tượng: </td>
                <td style="width:30%"> {{ $benhnhan->lhk_ten }}</td>
                <td style="width:20%">Số BHYT: </td>
                <td style="width:30%"><?php if(!empty($checkbhyt)){
                    echo $checkbhyt->dt_ten.$checkbhyt->ql_so.$checkbhyt->nc_so.$checkbhyt->bhyt_maso;
                }  ?></td>
            </tr>
            <tr>
                <td style="width:20%">Bác sĩ chỉ đinh:</td>
                <td style="width:30%">{{ $benhnhan->cv_ten }}. {{ $benhnhan->nv_ten }}</td>
                <td style="width:20%">Phòng chỉ định:</td>
                <td style="width:30%">{{ $benhnhan->p_ten }}</td>
            </tr>
            {{-- <tr>
                <td style="width:20%">B.sĩ điều trị: </td>
                <td style="width:30%">bubububu</td>
                <td style="width:20%">Phòng: </td>
                <td style="width:30%">01-Phòng tai-mũi-họng</td>
            </tr> --}}
            {{-- <tr>
                <td style="width:20%">Dấu hiệu LS: </td>
                <td colspan="3" style="width:80%">Dau đầu, nhức đầu, chóng mặt</td>
            </tr>
            <tr>
                <td style="width:20%">Chẩn đoán: </td>
                <td colspan="3" style="width:80%"><b>Bị ăn nhiều quá mập</b></td>
            </tr> --}}
        </table>
        <table cellspacing="0" border="1" width="100%" style="margin-top: 20px;">
            <tr>
                <th style="width:10%;">STT</th>
                <th style="width:40%;">Yêu cầu thực hiện</th>
                <th style="width:25%;">Phòng thực hiện</th>
                <th style="width:20%;">Giá tiền</th>
            </tr>
            <?php $i=1; $total=0; ?>
            @foreach ($dscls as $cls)
                
            <tr>
                <td style="text-align: center;" >{{ $i++ }}</td>
                <td style="text-align: left;">{{ $cls->cls_ten }}</td>
                <td style="text-align: center;">{{ $cls->p_ten }}</td>
                <td style="text-align: right;">{{ number_format($cls->ctcd_giatien)}} VND</td>
                <?php $total=$total+$cls->ctcd_giatien; ?>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-right"><b>Tổng tiền</b></td>
                <td style="text-align: right;"><b>{{ number_format($total) }} VND</b></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="width:50%; text-align: left;">Cộng khoản: <b>{{ $i-1 }}</b></td>
                <td style="width:50%; "></td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;">Ngày ... tháng ... năm 20.. </td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;"><b>Bác sĩ điều trị</b> 
                    <br><br><br><br>
                    <span>{{ $benhnhan->cv_ten }}. {{ $benhnhan->nv_ten }}</span>
            </td>
            </tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           
        </table>
    </section>
</body>

</html>