<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class othunhat extends Seeder
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
            'otn_ma'    => '1',
            'otn_ten'    => 'CH',
            'otn_ghichu'    => 'Nhóm lao động làm việc trong các cơ quan nhà nước'
        ];
        $list[]=
        [
            'otn_ma'    => '2',
            'otn_ten'    => 'HN',
            'otn_ghichu'    => 'Người thuộc hộ gia đình nghèo'
        ];
        $list[]=
        [
            'otn_ma'    => '3',
            'otn_ten'    => 'XD',
            'otn_ghichu'    => 'Người đang sinh sống tại xã đảo huyện đảo'
        ];
        $list[]=
        [
            'otn_ma'    => '4',
            'otn_ten'    => 'SV',
            'otn_ghichu'    => 'Sinh viên đang theo học tại các cơ sở giáo dục và đào tạo'
        ];
        $list[]=
        [
            'otn_ma'    => '5',
            'otn_ten'    => 'GD',
            'otn_ghichu'    => 'Nhóm hộ gia đình'
        ];
        $list[]=
        [
            'otn_ma'    => '6',
            'otn_ten'    => 'TE',
            'otn_ghichu'    => 'Nhóm trẻ em'
        ];
        $list[]=
        [
            'otn_ma'    => '7',
            'otn_ten'    => 'HS',
            'otn_ghichu'    => 'Nhóm học sinh'
        ];
        
        DB::table('othunhat')->insert($list);
    }
}
