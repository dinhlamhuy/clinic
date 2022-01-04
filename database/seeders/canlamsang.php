<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class canlamsang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        
        $list[]=
        [
            'ncls_ma'    => '1',
            'cls_ma'    => '1',
            'cls_ten'    => 'Xét nghiệm máu: Xét nghiệm huyết học',
            'cls_giabhyt'    => '234000',
            'cls_giadv'    => '250000',
            'cls_tienchenhlech'    => '30000',
            'cls_form' => '
            <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
               <td colspan="3">
                    <h4>Mô tả</h4>
               </td>
            </tr>
            <tr>
               <th style="width:20%">Chỉ số</th> 
               <th style="width:20%">Bình thường</th> 
               <th style="width:10%">Kết quả</th> 
               <th style="width:20%">Chỉ sổ</th> 
               <th style="width:20%">Bình thường</th> 
               <th style="width:10%">Kết quả</th>
            </tr>
           <tr>
                <td>HC</td>
                <td>
                Nam: 4.0-5.8 g/L<br>
                Nữ: 3.9-5.4g/L
                </td>
                <td></td>
                <td>BC</td>
                <td>4-10 g/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Huyết sắt tố</td>
                <td>
                Nam: 140-160 g/L<br>
                Nữ: 125-145g/L
                </td>
                <td></td>
                <td>Thành phần bạch cầu(%)</td>
                <td></td>
                <td></td>
           </tr>
           <tr>
                <td>Hematocrit</td>
                <td>Nam: 0.38-0.5 l/l<br>
                    Nữ: 0.35-0.47 l/l
                </td>
                <td></td>
                <td>Đoạn trung tính</td>
                <td></td>
                <td></td>
           </tr>
           <tr>
                <td>MCV</td>
                <td>83-92 fl</td>
                <td></td>
                <td>MHC</td>
                <td>27-32 pg</td>
                <td></td>
           </tr>
           <tr>
                <td>Đoạn ưa bazo</td>
                <td></td>
                <td></td>
                <td>Đoạn axit</td>
                <td></td>
                <td></td>
           </tr>
           <tr>
                <td>Môn</td>
                <td></td>
                <td></td>
                <td>Đoạn trung tính</td>
                <td></td>
                <td></td>
           </tr>
           <tr>
                <td>Hồng cầu có nhân</td>
                <td></td>
                <td></td>
                <td>Hồng cầu lưới</td>
                <td></td>
                <td></td>
           </tr>
           <tr>
                <td>SL tiểu cầu</td>
                <td>150-400 x10/l</td>
                <td></td>
                <td>Tế bào bất thường</td>
                <td></td>
                <td></td>
           </tr>
           
        </table>
        '

        ];
        $list[]=
        [
            'ncls_ma'    => '1',
            'cls_ma'    => '2',
            'cls_ten'    => 'Xét nghiệm máu: Xét nghiệm sinh hóa máu',
            'cls_giabhyt'    => '234000',
            'cls_giadv'    => '250000',
            'cls_tienchenhlech'    => '30000',
            'cls_form' => '
            <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
               <td colspan="6">
                    <h4>Mô tả</h4>
               </td>
            </tr>
            <tr>
               <th style="width:20%">Chỉ số</th> 
               <th style="width:20%">Bình thường</th> 
               <th style="width:10%">Kết quả</th> 
               <th style="width:20%">Chỉ sổ</th> 
               <th style="width:20%">Bình thường</th> 
               <th style="width:10%">Kết quả</th>
            </tr>
           <tr>
                <td>Urê</td>
                <td>2.5-7.5 mmol/L</td>
                <td></td>
                <td>Sắt</td>
                <td>Nam: 11-27 umol/L<br>
                    Nữ: 7-26 umol/L
                </td>
                <td></td>
           </tr>
           <tr>
                <td>Glucose</td>
                <td>3.9-6.4 mmol/L</td>
                <td></td>
                <td>Magie</td>
                <td>0.8-1.00 umol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Creatinin</td>
                <td>Nam: 62-120 umol/L<br>
                    Nữ: 53-100 umol/L
                </td>
                <td></td>
                <td>AST(GOT)</td>
                <td>≤37 U/L - 37°C </td>
                <td></td>
           </tr>
           <tr>
                <td>Acid Uric</td>
                <td>
                Nam: 180-420 umol/L<br>
                Nữ: 150-360 umol/L
                </td>
                <td></td>
                <td>ALT(GPT)</td>
                <td>≤40 U/L - 37°C </td>
                <td></td>
           </tr>
           <tr>
                <td>BilirubinT.P</td>
                <td>≤17 umol/L</td>
                <td></td>
                <td>BilirubinT.T</td>
                <td>≤4.3 umol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>BilirubinG.T</td>
                <td>≤12.7 umol/L</td>
                <td></td>
                <td>ProteinT.P</td>
                <td>65-82 g/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Albumin</td>
                <td>35-50 g/L</td>
                <td></td>
                <td>Globulin</td>
                <td>24-38 g/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Tỷ lệ A/G</td>
                <td>1.3-1.8</td>
                <td></td>
                <td>Fibrinogen</td>
                <td>2-4 g/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Cholesterol</td>
                <td>3.9-5.2 mmol/L</td>
                <td></td>
                <td>Triglycerid</td>
                <td>0.46-1.88 mmol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>HDL-cho</td>
                <td>≥0.9 mmol/L</td>
                <td></td>
                <td>LDL-cho</td>
                <td>≤3.4 mmol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Na+</td>
                <td>135-145 mmol/L</td>
                <td></td>
                <td>K+</td>
                <td>3.5-5 mmol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>Cl-</td>
                <td>98-106 mmol/L</td>
                <td></td>
                <td>Calci</td>
                <td>2.15-2.6 mmol/L</td>
                <td></td>
           </tr>
           <tr>
                <td>LDH</td>
                <td>230-460 U/L-37°C</td>
                <td></td>
                <td>GGT</td>
                <td>
                    Nam: 11- 50U/L-37°C <br> 
                    Nam: 7-32 U/L-37°C
                </td>
                <td></td>
           </tr>
        </table>
            '
            
        ];
        // ---------------------------------------
        $list[]=
        [
            'ncls_ma'    => '2',
            'cls_ma'    => '3',
            'cls_ten'    => 'Siêu âm ổ bụng tổng quát',
            'cls_giabhyt'    => '258000',
            'cls_giadv'    => '300000',
            'cls_tienchenhlech'    => '30000',
            'cls_form' => '
            <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
               <td colspan="2">
                    <h4>Mô tả</h4>
               </td>
            </tr>
           <tr>
                <td width="20%"><b>Gan-mật</b></td>
                <td width="80%"></td>  
           </tr>
           <tr>
                <td width="20%"><b>Tụy</b></td>
                <td width="80%"></td>  
           </tr>
           <tr>
                <td width="20%"><b>Lách</b></td>
                <td width="80%"></td>  
           </tr>
           <tr>
                <td width="20%"><b>Thận trái</b></td>
                <td width="80%"></td>
           </tr>
           <tr>
                <td width="20%"><b>Thận phải</b></td>
                <td width="80%"></td>
           </tr>
           <tr>
                <td width="20%"><b>Bàng quang</b></td>
                <td width="80%"></td>
           </tr>
           <tr>
                <td width="20%"><b>Nhận xét khác</b></td>
                <td width="80%"></td>
           </tr>
           </table>
            '
        ];
      
    //    ----------------------------------------------
        $list[]=
        [
            'ncls_ma'    => '3',
            'cls_ma'    => '4',
            'cls_ten'    => 'Nội soi tai-mũi-họng',
            'cls_giabhyt'    => '200000',
            'cls_giadv'    => '300000',
            'cls_tienchenhlech'    => '30000',
            'cls_form' => '
            <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
               <td colspan="3">
                    <h4>Mô tả</h4>
               </td>
            </tr>
            <tr>
                <th width="40%">Trái</th>
                <th width="20%"></th>
                <th width="40%">Phải</th>
            </tr>
           <tr>
                <td></td>
                <td>Vách ngăn</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Khe trên</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Khe giữa</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Mòm móc</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Bóng sáng</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Khe dưới</td>
                <td></td>
           </tr>
           <tr>
                <td></td>
                <td>Vòm</td>
                <td></td>
           </tr>
           </table>
            '
        ];
        $list[]=
        [
            'ncls_ma'    => '3',
            'cls_ma'    => '5',
            'cls_ten'    => 'Nội soi dạ dày - thực quản',
            'cls_giabhyt'    => '230000',
            'cls_giadv'    => '300000',
            'cls_tienchenhlech'    => '30000',
            'cls_form' => '
            <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
               <td colspan="2">
                    <h4>Mô tả</h4>
               </td>
            </tr>
            <tr>
                <th width="30%"></th>
                <th width="70%"></th>
            </tr>
           <tr>
                <td>Thực quản</td>  
                <td></td>
           </tr>
           <tr>
                <td>Dạ dày</td>  
                <td></td>
           </tr>
           <tr>
                <td>Lỗ môn vị</td>  
                <td></td>
           </tr>
           <tr>
                <td>Thân vị</td>  
                <td></td>
           </tr>
           <tr>
                <td>Tâm vị, phình vị</td>  
                <td></td>
           </tr>
           <tr>
                <td>Hai bờ cong</td>  
                <td></td>
           </tr>
           <tr>
                <td>Hành tá tràng</td>  
                <td></td>
           </tr>
           <tr>
                <td>Tá trạng</td>  
                <td></td>
           </tr>
           <tr>
                <td>Sinh thiết</td>  
                <td></td>
           </tr>
           
           </table>
            '

        ];
        DB::table('canlamsang')->insert($list);
    }
}
