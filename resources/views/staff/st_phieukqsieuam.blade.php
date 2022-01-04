<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu kết quả siêu âm</title>
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
                        style="height: 60px; width: 60px;" alt=""></td>
                <td >
                    <b style="font-size: 18px; vertical-align: middle;">PHÒNG KHÁM ĐA KHOA PHƯƠNG NGÂN <br> Thành phố Cần Thơ</b> <br>
                    Số 132, đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ
                </td>
                <td>
                    <span >Ngày lập: {{ date('d/m/Y H:i:s',strtotime($phieusieuam->ngaylap)) }}</span><br>
                    <span >Mã BN: {{ 'BN'.sprintf('%05d',$phieusieuam->bn_ma) }}</span><br>
                    <span>Mã PCD: {{ 'PCD'.sprintf('%05d',$phieusieuam->pcd_ma) }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h1>PHIẾU KẾT QUẢ SIÊU ÂM</h1>
                    <h3>({{ $phieusieuam->cls_ten }})</h3>
                    <h5></h5>
                </td>
            </tr>

        </table>
        <table width="100%">
            <tr>
                <td style="width:20%">Tên Bệnh Nhân: </td>
                <td style="width:30%"><b>{{ $phieusieuam->bn_ten }}</b></td>
                <td style="width:20%">Tuổi: <b>{{ floor((time() - strtotime($phieusieuam->bn_ngaysinh)) / 31556926); }}</b></td>
                <td style="width:20%">Giới tính: <b>{{ $phieusieuam->bn_gioitinh }}</b></td>
            </tr>
            <tr>
                <td style="width:20%">Địa chỉ: </td>
                <td colspan="3" style="width:80%">{{ $phieusieuam->bn_diachi.', '.$phieusieuam->x_ten.', '.$phieusieuam->h_ten.', '.$phieusieuam->tp_ten }}</td>
            </tr>
            {{-- <tr>
                <td style="width:20%">Đối tượng: </td>
                <td style="width:30%">BHYT (80%) - QL4</td>
                <td style="width:20%">Số BHYT: </td>
                <td style="width:30%">BH9789009</td>
            </tr> --}}
            {{-- <tr>
                <td style="width:20%">B.sĩ điều trị: </td>
                <td style="width:30%">bubububu</td>
                <td style="width:20%">Phòng: </td>
                <td style="width:30%">01-Phòng tai-mũi-họng</td>
            </tr> --}}
            {{-- <tr>
                <td style="width:20%">Dấu hiệu LS: </td>
                <td colspan="3" style="width:80%">Dau đầu, nhức đầu, chóng mặt</td>
            </tr> --}}
        </table>
        
        <table cellspacing="0"  width="100%" style="margin-top: 20px;">
            <tr>
                <td style="width:65%; vertical-align: top;">
                    {!! $phieusieuam->ctcd_ctthuchien !!}
                </td>
                <td style="width:35%;">
                    @foreach ($hinhanhminhhoa as $hinhanh)
                    <center><img src="{{asset('/images/'. $hinhanh->ha_ten )}}" width="250px" style="height: 150px;" alt=""></center>
                        
                    @endforeach
                   
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    <h3 style="padding-left: 50px;">Kết luận</h3>
                    <p style="padding-left: 120px;font-weight:bold;">{{$phieusieuam->ctcd_ketquachidinh}}</p> 
                </td>
            </tr>
            
        </table>
        <table width="100%">
            
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;">Ngày {{ date('d',strtotime($phieusieuam->ngaylap)) }} tháng {{ date('m',strtotime($phieusieuam->ngaylap)) }} năm {{ date('Y',strtotime($phieusieuam->ngaylap)) }} </td>
            </tr>
            <tr>
                <td style="width:50%; "></td>
                <td style="width:50%; text-align: center;"><b>Bác sĩ siêu âm</b> 
                    <br><br><br><br>
                    
            </tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr ></tr>
           <tr>
               <td colspan="2">
                   <span>Khi đi tái khám nhớ đem theo phiếu kết quả siêu âm này.</span>
               </td>
           </tr>
           
        </table>
    </section>
</body>

</html>