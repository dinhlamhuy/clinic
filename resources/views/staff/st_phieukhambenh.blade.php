<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu khám bệnh</title>
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
                        style="height: 80px; width: 80px;" alt="">
                </td>
                <td style="text-align:left;" colspan="2">
                    <b style="font-size: 18px; vertical-align: middle;">PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN<br> Thành phố
                            Cần Thơ</b>
                        <br>
                        Số 132, đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ
                </td>
                <td style="float: left">
                    <span class="pt-1">Ngày lập: {{ date('d/m/Y H:m:i',strtotime($phieukham->ngaylap)) }}</span><br>
                    <span>Mã PKB: {{'PKB' . sprintf('%05d', $phieukham->pkb_ma)}}</span><br>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            
            <tr>
                <td colspan="4" style="text-align: center;">
                    <h1>PHIẾU KHÁM BỆNH</h1>
                    <span>({{ $phieukham->lhk_ten }})</span>
                </td>
            </tr>
            <tr>
        <td colspan="4" style="text-align: center;"><h1>STT: <b>{{ $phieukham->pkb_ma }}</b></h1></td>
        </tr>

        </table>
        <table width="100%">
            <tr>
                <td style="width:20%">Tên Bệnh Nhân: </td>
                <td style="width:40%"><b>{{ $phieukham->bn_ten }}</b></td>
                <td style="width:20%">Tuổi: <b>{{ floor((time() - strtotime($phieukham->bn_ngaysinh)) / 31556926); }}</b></td>
                <td style="width:20%">Giới tính: <b>{{ $phieukham->bn_gioitinh }}</b></td>
            </tr>
            <tr>
                <td style="width:20%">Dân tộc: </td>
                <td style="width:30%">{{ $phieukham->dtoc_ten }}</td>
                <td style="width:20%">Quốc tịch: <b></b></td>
                <td style="width:30%">{{ $phieukham->qt_ten }}</td>
            </tr>
            <tr>
                <td style="width:20%">Địa chỉ: </td>
                <td colspan="3" style="width:80%">{{ $phieukham->bn_diachi.', '.$phieukham->x_ten.', '. $phieukham->h_ten.', '.$phieukham->tp_ten }}</td>
            </tr>
            <tr>
                <td style="width:20%">Khám tại: </td>
                <td colspan="3" style="width:80%"><h3><b>{{ $phieukham->p_ten }}</b></h3></td>
            </tr>
          
            <tr>
                <td style="width:20%">Tiền công khám: </td>
                <td colspan="3" style="width:80%"><b>{{ number_format($phieukham->lhk_giatien+$phieukham->lhk_giachenhlech)}}</b>&ensp;VND</td>
            </tr>
           
            <tr style="height:30px;"><td colspan="4"></td></tr>
            <tr>
           
                <td ><b>Ghi chú:</b> </td>
                <td colspan="3" style="width:80%"><span style="font-weight:inherit;">Bệnh nhân vui lòng kiểm tra lại thông tin trước khi vào khám bệnh</span></td>
            </tr>
          
        </table>
        
        <!-- <table width="100%">
            <tr>
                <td style="width:50%; text-align: left;">Cộng khoản: <b>1</b></td>
                <td style="width:50%; "></td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;">Ngày ... tháng ... năm 20.. </td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;"><b>Bác sĩ điều trị</b> </td>
            </tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr >
               <td colspan="2" style="font-size: 10px;">Bệnh nhân đi khám lần sau mang theo đơn này!</td>
           </tr>
           <tr >
               <td colspan="2">Lời dặn của bác sĩ: </td>
           </tr>
        </table> -->
    </section>
</body>

</html>