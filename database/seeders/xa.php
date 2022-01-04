<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class xa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        // Tp Cần Thơ 
        // Ninh Kiều id=1
            $list[]=
            [
                'x_ma'    => '1',
                'h_ma'    => '1',
                'x_ten'    => 'Phường Cái Khế'
            ];
            $list[]=
            [
                'x_ma'    => '2',
                'h_ma'    => '1',
                'x_ten'    => 'Phường An Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '3',
                'h_ma'    => '1',
                'x_ten'    => 'Phường An Nghiệp'
            ];
            $list[]=
            [
                'x_ma'    => '4',
                'h_ma'    => '1',
                'x_ten'    => 'Phường An Cư'
            ];
            $list[]=
            [
                'x_ma'    => '5',
                'h_ma'    => '1',
                'x_ten'    => 'Phường An Khánh'
            ];
            $list[]=
            [
                'x_ma'    => '6',
                'h_ma'    => '1',
                'x_ten'    => 'Phường An Bình'
            ];
            // Quận ô Môn id=2
            $list[]=
            [
                'x_ma'    => '7',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Châu Văn Liêm'
            ];
            $list[]=
            [
                'x_ma'    => '8',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Thới Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '9',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Thới Long'
            ];
            $list[]=
            [
                'x_ma'    => '10',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Long Hưng'
            ];
            $list[]=
            [
                'x_ma'    => '11',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Trường Lạc'
            ];
            $list[]=
            [
                'x_ma'    => '12',
                'h_ma'    => '2',
                'x_ten'    => 'Phường Phước Thới'
            ];
            // Quận Bình Thủy id=3
            $list[]=
            [
                'x_ma'    => '13',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Bình Thủy'
            ];
            $list[]=
            [
                'x_ma'    => '14',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Trà An'
            ];
            $list[]=
            [
                'x_ma'    => '15',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Trà Nóc'
            ];
            $list[]=
            [
                'x_ma'    => '16',
                'h_ma'    => '3',
                'x_ten'    => 'Phường An Thới'
            ];
            $list[]=
            [
                'x_ma'    => '17',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Bùi Hữu Nghĩa'
            ];
            $list[]=
            [
                'x_ma'    => '18',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Long Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '19',
                'h_ma'    => '3',
                'x_ten'    => 'Phường Long Tuyền'
            ];
            // Quận Cái Răng
            $list[]=
            [
                'x_ma'    => '20',
                'h_ma'    => '4',
                'x_ten'    => 'Phường Lê Bình'
            ];
            $list[]=
            [
                'x_ma'    => '21',
                'h_ma'    => '4',
                'x_ten'    => 'Phường Hưng Phú'
            ];
            $list[]=
            [
                'x_ma'    => '22',
                'h_ma'    => '4',
                'x_ten'    => 'Phường Hưng Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '23',
                'h_ma'    => '4',
                'x_ten'    => 'Phường Thường Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '24',
                'h_ma'    => '4',
                'x_ten'    => 'Phường Tân Phú'
            ];
            // Quận Thốt Nốt
            $list[]=
            [
                'x_ma'    => '25',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Thốt Nốt'
            ];
            $list[]=
            [
                'x_ma'    => '26',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Thới Thuận'
            ];
            $list[]=
            [
                'x_ma'    => '27',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Thuận An'
            ];
            $list[]=
            [
                'x_ma'    => '28',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Tân Lộc'
            ];
            $list[]=
            [
                'x_ma'    => '29',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Thạnh Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '30',
                'h_ma'    => '5',
                'x_ten'    => 'Phường Tân Hưng'
            ];
            // Quận Cờ Đỏ
            $list[]=
            [
                'x_ma'    => '31',
                'h_ma'    => '6',
                'x_ten'    => 'Xã Trung An'
            ];
            $list[]=
            [
                'x_ma'    => '32',
                'h_ma'    => '6',
                'x_ten'    => 'Xã Trung Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '33',
                'h_ma'    => '6',
                'x_ten'    => 'Xã Thạnh Phú'
            ];
            $list[]=
            [
                'x_ma'    => '34',
                'h_ma'    => '6',
                'x_ten'    => 'Xã Trung Hưng'
            ];
            $list[]=
            [
                'x_ma'    => '35',
                'h_ma'    => '6',
                'x_ten'    => 'Xã Đông Hiệp'
            ];
            $list[]=
            [
                'x_ma'    => '36',
                'h_ma'    => '6',
                'x_ten'    => 'Thị trấn Cờ Đỏ'
            ];
            // Quận Phong Điền
            $list[]=
            [
                'x_ma'    => '37',
                'h_ma'    => '7',
                'x_ten'    => 'Thị trấn Phong Điền'
            ];
            $list[]=
            [
                'x_ma'    => '38',
                'h_ma'    => '7',
                'x_ten'    => 'Xã Nhơn Ái'
            ];
            $list[]=
            [
                'x_ma'    => '39',
                'h_ma'    => '7',
                'x_ten'    => 'Xã Giai Xuân'
            ];
            $list[]=
            [
                'x_ma'    => '40',
                'h_ma'    => '7',
                'x_ten'    => 'Xã Mỹ Khánh'
            ];
            // Quận Thời Lai
            $list[]=
            [
                'x_ma'    => '41',
                'h_ma'    => '8',
                'x_ten'    => 'Thị trấn Thới Lai'
            ];
            $list[]=
            [
                'x_ma'    => '42',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Thới Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '43',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Tân Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '44',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Đông Bình'
            ];
            $list[]=
            [
                'x_ma'    => '45',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Đông Thuận'
            ];
            $list[]=
            [
                'x_ma'    => '46',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Trường Xuân'
            ];
            $list[]=
            [
                'x_ma'    => '47',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Trường Xuân A'
            ];
            $list[]=
            [
                'x_ma'    => '48',
                'h_ma'    => '8',
                'x_ten'    => 'Xã Trường Xuân B'
            ];

            // Thành phố Hậu Giang
            // Tp Vị Thanh id=9
            $list[]=
            [
                'x_ma'    => '49',
                'h_ma'    => '9',
                'x_ten'    => 'Phường I'
            ];
            $list[]=
            [
                'x_ma'    => '50',
                'h_ma'    => '9',
                'x_ten'    => 'Phường II'
            ];
            $list[]=
            [
                'x_ma'    => '51',
                'h_ma'    => '9',
                'x_ten'    => 'Phường III'
            ];
            $list[]=
            [
                'x_ma'    => '52',
                'h_ma'    => '9',
                'x_ten'    => 'Phường IV'
            ];
            $list[]=
            [
                'x_ma'    => '53',
                'h_ma'    => '9',
                'x_ten'    => 'Phường V'
            ];
            // Tp Ngã Bảy id=10
            $list[]=
            [
                'x_ma'    => '54',
                'h_ma'    => '10',
                'x_ten'    => 'Phường Ngã Bảy'
            ];
            $list[]=
            [
                'x_ma'    => '55',
                'h_ma'    => '10',
                'x_ten'    => 'Phường Lái Hiếu'
            ];
            $list[]=
            [
                'x_ma'    => '56',
                'h_ma'    => '10',
                'x_ten'    => 'Phường Hiệp Thành'
            ];
            $list[]=
            [
                'x_ma'    => '57',
                'h_ma'    => '10',
                'x_ten'    => 'Xã Đại Thành'
            ];
            $list[]=
            [
                'x_ma'    => '58',
                'h_ma'    => '10',
                'x_ten'    => 'Xã Tân Thành'
            ];
            // Huyện Châu Thành A id=11
            $list[]=
            [
                'x_ma'    => '59',
                'h_ma'    => '11',
                'x_ten'    => 'Thị trấn Một Ngàn'
            ];
            $list[]=
            [
                'x_ma'    => '60',
                'h_ma'    => '11',
                'x_ten'    => 'Xã Tân Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '61',
                'h_ma'    => '11',
                'x_ten'    => 'Thị trấn Bảy Ngàn'
            ];
            $list[]=
            [
                'x_ma'    => '62',
                'h_ma'    => '11',
                'x_ten'    => 'Xã Trường Long Tây'
            ];
            $list[]=
            [
                'x_ma'    => '63',
                'h_ma'    => '11',
                'x_ten'    => 'Xã Trường Long A'
            ];
            $list[]=
            [
                'x_ma'    => '64',
                'h_ma'    => '11',
                'x_ten'    => 'Xã Nhơn Nghĩa A'
            ];
            $list[]=
            [
                'x_ma'    => '65',
                'h_ma'    => '11',
                'x_ten'    => 'Thị trấn Rạch Gòi'
            ];
            $list[]=
            [
                'x_ma'    => '66',
                'h_ma'    => '11',
                'x_ten'    => 'Xã Cái Tắc'
            ];
            // Huyện Châu Thành id =12
            $list[]=
            [
                'x_ma'    => '67',
                'h_ma'    => '12',
                'x_ten'    => 'Thị trấn Ngã Sáu'
            ];
            $list[]=
            [
                'x_ma'    => '68',
                'h_ma'    => '12',
                'x_ten'    => 'Thị trấn Mái Dầm'
            ];
            $list[]=
            [
                'x_ma'    => '69',
                'h_ma'    => '12',
                'x_ten'    => 'Xã Đông Phú'
            ];
            $list[]=
            [
                'x_ma'    => '70',
                'h_ma'    => '12',
                'x_ten'    => 'Xã Đông Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '71',
                'h_ma'    => '12',
                'x_ten'    => 'Xã Phú Hữu'
            ];
            $list[]=
            [
                'x_ma'    => '72',
                'h_ma'    => '12',
                'x_ten'    => 'Xã Phú Tân'
            ];
            $list[]=
            // HUyện Phụng Hiệp
            [
                'x_ma'    => '73',
                'h_ma'    => '13',
                'x_ten'    => 'Thị trấn Kinh Cùng'
            ];
            $list[]=
            [
                'x_ma'    => '74',
                'h_ma'    => '13',
                'x_ten'    => 'Thị trấn Cây Dương'
            ];
            $list[]=
            [
                'x_ma'    => '75',
                'h_ma'    => '13',
                'x_ten'    => 'Xã Long Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '76',
                'h_ma'    => '13',
                'x_ten'    => 'Xã Phụng Hiệp'
            ];
            // Huyện Vị Thủy id=14
            $list[]=
            [
                'x_ma'    => '77',
                'h_ma'    => '14',
                'x_ten'    => 'Thị trấn Nàng Mau'
            ];
            $list[]=
            [
                'x_ma'    => '78',
                'h_ma'    => '14',
                'x_ten'    => 'Xã Vị Trung'
            ];
            $list[]=
            [
                'x_ma'    => '79',
                'h_ma'    => '14',
                'x_ten'    => 'Xã Vị Thắng'
            ];
            $list[]=
            [
                'x_ma'    => '80',
                'h_ma'    => '14',
                'x_ten'    => 'Xã Vĩnh Trung'
            ];
            // Huyện Long Mỹ id=15
            $list[]=
            [
                'x_ma'    => '81',
                'h_ma'    => '15',
                'x_ten'    => 'Phường Thuận An'
            ];
            $list[]=
            [
                'x_ma'    => '82',
                'h_ma'    => '15',
                'x_ten'    => 'Phường Trà Lồng'
            ];
            $list[]=
            [
                'x_ma'    => '83',
                'h_ma'    => '15',
                'x_ten'    => 'Phường Bình Thạnh'
            ];

            // Thành phố Sóc Trăng
            // tpST id=16
            $list[]=
            [
                'x_ma'    => '84',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 1'
            ];
            $list[]=
            [
                'x_ma'    => '85',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 2'
            ];
            $list[]=
            [
                'x_ma'    => '86',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 3'
            ];
            $list[]=
            [
                'x_ma'    => '87',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 4'
            ];
            $list[]=
            [
                'x_ma'    => '88',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 5'
            ];
            $list[]=
            [
                'x_ma'    => '89',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 6'
            ];
            $list[]=
            [
                'x_ma'    => '90',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 7'
            ];
            $list[]=
            [
                'x_ma'    => '91',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 8'
            ];
            $list[]=
            [
                'x_ma'    => '92',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 9'
            ];
            $list[]=
            [
                'x_ma'    => '93',
                'h_ma'    => '16',
                'x_ten'    => 'Phường 10'
            ];
            // Huyện Châu Thành id=17
            $list[]=
            [
                'x_ma'    => '94',
                'h_ma'    => '17',
                'x_ten'    => 'Thị Trấn Châu Thành'
            ];
            $list[]=
            [
                'x_ma'    => '95',
                'h_ma'    => '17',
                'x_ten'    => 'Xã Hồ Đắc Kiện'
            ];
            $list[]=
            [
                'x_ma'    => '96',
                'h_ma'    => '17',
                'x_ten'    => 'Xã Phú Tâm'
            ];
            $list[]=
            [
                'x_ma'    => '97',
                'h_ma'    => '17',
                'x_ten'    => 'Xã Thuận Hòa'
            ];
            $list[]=
            [
                'x_ma'    => '98',
                'h_ma'    => '17',
                'x_ten'    => 'Xã Phú Tân'
            ];
            $list[]=
            [
                'x_ma'    => '99',
                'h_ma'    => '17',
                'x_ten'    => 'Xã An Hiệp'
            ];
            $list[]=
            [
                'x_ma'    => '100',
                'h_ma'    => '17',
                'x_ten'    => 'Xã Thiện Mỹ'
            ];
            // Huyện Kế Sách id=18 
            $list[]=
            [
                'x_ma'    => '101',
                'h_ma'    => '18',
                'x_ten'    => 'Thị Trấn Kế Sách'
            ];
            $list[]=
            [
                'x_ma'    => '102',
                'h_ma'    => '18',
                'x_ten'    => 'Thị Trấn An Lạc Thôn'
            ];
            $list[]=
            [
                'x_ma'    => '103',
                'h_ma'    => '18',
                'x_ten'    => 'Xã An Lạc Tây'
            ];
            $list[]=
            [
                'x_ma'    => '104',
                'h_ma'    => '18',
                'x_ten'    => 'Xã Phong Nẫm'
            ];
            $list[]=
            [
                'x_ma'    => '105',
                'h_ma'    => '18',
                'x_ten'    => 'Xã Trinh Phú'
            ];
            // HUyện Mỹ Tú id=19
            $list[]=
            [
                'x_ma'    => '106',
                'h_ma'    => '19',
                'x_ten'    => 'Thị trấn Huỳnh Hữu Nghĩa'
            ];
            $list[]=
            [
                'x_ma'    => '107',
                'h_ma'    => '19',
                'x_ten'    => 'Xã Long Hưng'
            ];
            $list[]=
            [
                'x_ma'    => '108',
                'h_ma'    => '19',
                'x_ten'    => 'Xã Hưng Phú'
            ];
            $list[]=
            [
                'x_ma'    => '109',
                'h_ma'    => '19',
                'x_ten'    => 'Xã Mỹ Hương'
            ];
            $list[]=
            [
                'x_ma'    => '110',
                'h_ma'    => '19',
                'x_ten'    => 'Xã Mỹ Tú'
            ];
            // Huyện Cù Lao Dung id=20
            $list[]=
            [
                'x_ma'    => '111',
                'h_ma'    => '20',
                'x_ten'    => 'Thị trấn Cù Lao Dung'
            ];
            $list[]=
            [
                'x_ma'    => '112',
                'h_ma'    => '20',
                'x_ten'    => 'Xã An Thạnh 1'
            ];
            $list[]=
            [
                'x_ma'    => '113',
                'h_ma'    => '20',
                'x_ten'    => 'Xã An Thạnh Tây'
            ];
            $list[]=
            [
                'x_ma'    => '114',
                'h_ma'    => '20',
                'x_ten'    => 'Xã An Thạnh Đông'
            ];
            $list[]=
            [
                'x_ma'    => '115',
                'h_ma'    => '20',
                'x_ten'    => 'Xã An Thạnh 2'
            ];
            $list[]=
            [
                'x_ma'    => '116',
                'h_ma'    => '20',
                'x_ten'    => 'Xã An Thạnh 3'
            ];
            // Huyện Long Phú id=21
            $list[]=
            [
                'x_ma'    => '117',
                'h_ma'    => '21',
                'x_ten'    => 'Thị trấn Đại Ngãi'
            ];
            $list[]=
            [
                'x_ma'    => '118',
                'h_ma'    => '21',
                'x_ten'    => 'Xã Hậu Thạnh'
            ];
            $list[]=
            [
                'x_ma'    => '119',
                'h_ma'    => '21',
                'x_ten'    => 'Xã Long Đức'
            ];
            $list[]=
            [
                'x_ma'    => '120',
                'h_ma'    => '21',
                'x_ten'    => 'Xã Trường Khánh'
            ];
        DB::table('xa')->insert($list);
    }
}
