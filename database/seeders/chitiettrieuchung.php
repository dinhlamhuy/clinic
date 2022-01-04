<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class chitiettrieuchung extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        // viêm họng
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '1'
        ];
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '3'
        ];
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '4'
        ];
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '11'
        ];
        $list[]=
        [
            'b_ma'    => '1',
            'tcb_ma'    => '31'
        ];
        // Viêm VA
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '1'
        ];
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '3'
        ];
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '4'
        ];
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '11'
        ];
       
        $list[]=
        [
            'b_ma'    => '2',
            'tcb_ma'    => '31'
        ];

        // Viêm xoang

        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '8'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '10'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '15'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '36'
        ];
        $list[]=
        [
            'b_ma'    => '3',
            'tcb_ma'    => '37'
        ];

        // Viêm mũi dị ứng
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '8'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '10'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '15'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '36'
        ];
        $list[]=
        [
            'b_ma'    => '4',
            'tcb_ma'    => '37'
        ];
        // Viêm tai giữa
        $list[]=
        [
            'b_ma'    => '5',
            'tcb_ma'    => '12'
        ];

        $list[]=
        [
            'b_ma'    => '5',
            'tcb_ma'    => '15'
        ];

        // Viêm tai ngoài
        $list[]=
        [
            'b_ma'    => '6',
            'tcb_ma'    => '12'
        ];

        $list[]=
        [
            'b_ma'    => '6',
            'tcb_ma'    => '15'
        ];
        // Viêm amidam
        $list[]=
        [
            'b_ma'    => '7',
            'tcb_ma'    => '1'
        ];
        $list[]=
        [
            'b_ma'    => '7',
            'tcb_ma'    => '2'
        ];
        $list[]=
        [
            'b_ma'    => '7',
            'tcb_ma'    => '3'
        ];
        $list[]=
        [
            'b_ma'    => '7',
            'tcb_ma'    => '11'
        ];
        $list[]=
        [
            'b_ma'    => '7',
            'tcb_ma'    => '31'
        ];

        // Rối loạn giọng nói
        $list[]=
        [
            'b_ma'    => '8',
            'tcb_ma'    => '38'
        ];

        // Bệnh ù tai
        $list[]=
        [
            'b_ma'    => '9',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '9',
            'tcb_ma'    => '12'
        ];
        $list[]=
        [
            'b_ma'    => '9',
            'tcb_ma'    => '15'
        ];
        // Viêm mũi cấp tính
        $list[]=
        [
            'b_ma'    => '10',
            'tcb_ma'    => '6'
        ];

        $list[]=
        [
            'b_ma'    => '10',
            'tcb_ma'    => '8'
        ];
        $list[]=
        [
            'b_ma'    => '10',
            'tcb_ma'    => '10'
        ];
        $list[]=
        [
            'b_ma'    => '10',
            'tcb_ma'    => '37'
        ];

        // Viêm da
        $list[]=
        [
            'b_ma'    => '11',
            'tcb_ma'    => '39'
        ];

        // Phát ban 
        $list[]=
        [
            'b_ma'    => '12',
            'tcb_ma'    => '39'
        ];
        $list[]=
        [
            'b_ma'    => '12',
            'tcb_ma'    => '40'
        ];
        // Vảy nến
        $list[]=
        [
            'b_ma'    => '13',
            'tcb_ma'    => '39'
        ];
        $list[]=
        [
            'b_ma'    => '13',
            'tcb_ma'    => '40'
        ];
        // Chàm
        $list[]=
        [
            'b_ma'    => '14',
            'tcb_ma'    => '39'
        ];
        $list[]=
        [
            'b_ma'    => '14',
            'tcb_ma'    => '40'
        ];
        // Viêm giác mạc
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '17'
        ];
       
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '21'
        ];

        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '41'
        ];
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '42'
        ];
        $list[]=
        [
            'b_ma'    => '15',
            'tcb_ma'    => '58'
        ];
        // Lẹo mắt
        $list[]=
        [
            'b_ma'    => '16',
            'tcb_ma'    => '43'
        ];
        $list[]=
        [
            'b_ma'    => '16',
            'tcb_ma'    => '58'
        ];
        // Giác mạc hình nón

        $list[]=
        [
            'b_ma'    => '17',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '17',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '17',
            'tcb_ma'    => '22'
        ];
        // Viêm màn bồ đào
        $list[]=
        [
            'b_ma'    => '18',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '18',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '18',
            'tcb_ma'    => '22'
        ];
        $list[]=
        [
            'b_ma'    => '18',
            'tcb_ma'    => '58'
        ];
        // Tăng nhãn áp
        $list[]=
        [
            'b_ma'    => '19',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '19',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '19',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '19',
            'tcb_ma'    => '44'
        ];
        $list[]=
        [
            'b_ma'    => '19',
            'tcb_ma'    => '58'
        ];
        // Đau mắt đỏ ( viêm kết mạc)
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '17'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '20'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '21'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '22'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '44'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '45'
        ];
        $list[]=
        [
            'b_ma'    => '20',
            'tcb_ma'    => '58'
        ];

        // Dị ứng mắt
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '17'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '19'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '20'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '21'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '22'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '44'
        ];
        $list[]=
        [
            'b_ma'    => '21',
            'tcb_ma'    => '58'
        ];
        // Viêm loét dạ dày tá tràng
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '14'
        ];
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '28'
        ];
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '46'
        ];
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '47'
        ];
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '48'
        ];
        $list[]=
        [
            'b_ma'    => '22',
            'tcb_ma'    => '52'
        ];
        // TRào ngược dạ dày thực quản
        $list[]=
        [
            'b_ma'    => '23',
            'tcb_ma'    => '27'
        ];
        $list[]=
        [
            'b_ma'    => '23',
            'tcb_ma'    => '28'
        ];
        $list[]=
        [
            'b_ma'    => '23',
            'tcb_ma'    => '29'
        ];
        $list[]=
        [
            'b_ma'    => '23',
            'tcb_ma'    => '33'
        ];
        $list[]=
        [
            'b_ma'    => '23',
            'tcb_ma'    => '49'
        ];
        // Xuất huyết dạ dày
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '14'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '27'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '48'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '50'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '51'
        ];
        $list[]=
        [
            'b_ma'    => '24',
            'tcb_ma'    => '52'
        ];
        // Viêm hang vị dạ dày
        $list[]=
        [
            'b_ma'    => '25',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '25',
            'tcb_ma'    => '29'
        ];
        $list[]=
        [
            'b_ma'    => '25',
            'tcb_ma'    => '33'
        ];
        $list[]=
        [
            'b_ma'    => '25',
            'tcb_ma'    => '46'
        ];
        $list[]=
        [
            'b_ma'    => '25',
            'tcb_ma'    => '52'
        ];
        // Nhiễm vi khuẩn Hp dạ dày
        $list[]=
        [
            'b_ma'    => '26',
            'tcb_ma'    => '4'
        ];
        $list[]=
        [
            'b_ma'    => '26',
            'tcb_ma'    => '14'
        ];
        $list[]=
        [
            'b_ma'    => '26',
            'tcb_ma'    => '29'
        ];
        $list[]=
        [
            'b_ma'    => '26',
            'tcb_ma'    => '31'
        ];
        $list[]=
        [
            'b_ma'    => '26',
            'tcb_ma'    => '53'
        ];
        // Đau nữa đầu Migraine
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '7'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '16'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '54'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '55'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '56'
        ];
        $list[]=
        [
            'b_ma'    => '27',
            'tcb_ma'    => '58'
        ];
        // Đau đầu do căng thẳng
        $list[]=
        [
            'b_ma'    => '28',
            'tcb_ma'    => '57'
        ];
        $list[]=
        [
            'b_ma'    => '28',
            'tcb_ma'    => '58'
        ];
        // Đau nữa đầu mãn tính
        $list[]=
        [
            'b_ma'    => '29',
            'tcb_ma'    => '5'
        ];
        $list[]=
        [
            'b_ma'    => '29',
            'tcb_ma'    => '14'
        ];
        $list[]=
        [
            'b_ma'    => '29',
            'tcb_ma'    => '35'
        ];
        $list[]=
        [
            'b_ma'    => '29',
            'tcb_ma'    => '54'
        ];
        $list[]=
        [
            'b_ma'    => '29',
            'tcb_ma'    => '58'
        ];
        DB::table('chitiettrieuchung')->insert($list);
    }
}
