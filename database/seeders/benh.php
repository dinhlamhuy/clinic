<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class benh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $list = [];
        // Nhóm bệnh tai mũi họng
        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '1',
            'b_ten'    => 'Viêm họng'
        
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '2',
            'b_ten'    => 'Viêm VA'           
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '3',
            'b_ten'    => 'Viêm xoang'
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '4',
            'b_ten'    => 'Viêm mũi dị ứng'
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '5',
            'b_ten'    => 'Viêm tai giữa'
        ];
        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '6',
            'b_ten'    => 'Viêm tai ngoài'
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '7',
            'b_ten'    => 'Viêm amidam'
        ];
        
        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '8',
            'b_ten'    => 'Rối loạn giọng nói'
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '9',
            'b_ten'    => 'Bệnh ù tai'
        ];

        $list[]=
        [
            'nb_ma'    => '1',
            'b_ma'    => '10',
            'b_ten'    => 'Viêm mũi cấp tính'
        ];
        // Nhóm bệnh da
        $list[]=
        [
            'nb_ma'    => '2',
            'b_ma'    => '11',
            'b_ten'    => 'Viêm da'
        ];

        $list[]=
        [
            'nb_ma'    => '2',
            'b_ma'    => '12',
            'b_ten'    => 'Phát ban da (mề đay)'
        ];

        $list[]=
        [
            'nb_ma'    => '2',
            'b_ma'    => '13',
            'b_ten'    => 'Bệnh vẩy nến'
        ];

        $list[]=
        [
            'nb_ma'    => '2',
            'b_ma'    => '14',
            'b_ten'    => 'Bệnh chàm'
        ];

        // Nhóm bệnh về mắt
        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '15',
            'b_ten'    => 'Viêm giác mạc'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '16',
            'b_ten'    => 'Lẹo mắt'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '17',
            'b_ten'    => 'Giác mạc hình nón'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '18',
            'b_ten'    => 'Viêm màn bồ đào'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '19',
            'b_ten'    => 'Tăng nhãn áp'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '20',
            'b_ten'    => 'Đau mắt đỏ (viêm kết mạc)'
        ];

        $list[]=
        [
            'nb_ma'    => '3',
            'b_ma'    => '21',
            'b_ten'    => 'Dị ứng mắt'
        ];
    //    Nhóm bệnh dạ dày
        $list[]=
        [
            'nb_ma'    => '4',
            'b_ma'    => '22',
            'b_ten'    => 'Viêm loét dạ dày tá tràng'
        ];

        $list[]=
        [
            'nb_ma'    => '4',
            'b_ma'    => '23',
            'b_ten'    => 'Trào ngược dạ dày thực quản'
        ];
        $list[]=
        [
            'nb_ma'    => '4',
            'b_ma'    => '24',
            'b_ten'    => 'Xuất huyết dạ dày'
        ];
        $list[]=
        [
            'nb_ma'    => '4',
            'b_ma'    => '25',
            'b_ten'    => 'Viêm hang vị dạ dày'
        ];
        $list[]=
        [
            'nb_ma'    => '4',
            'b_ma'    => '26',
            'b_ten'    => 'Nhiễm vi khuẩn Hp dạ dày'
        ];

        // nhóm bệnh về đầu
        $list[]=
        [
            'nb_ma'    => '5',
            'b_ma'    => '27',
            'b_ten'    => 'Đau nửa đầu Migraine'
        ];

        $list[]=
        [
            'nb_ma'    => '5',
            'b_ma'    => '28',
            'b_ten'    => 'Đau đầu do căng thẳng'
        ];
        $list[]=
        [
            'nb_ma'    => '5',
            'b_ma'    => '29',
            'b_ten'    => 'Đau nửa đầu mãn tính'
        ];
        



        DB::table('benh')->insert($list);
    }
}
