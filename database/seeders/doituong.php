<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class doituong extends Seeder
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
            'dt_ma'    => '1',
            'dt_ten'    => 'CH',
            'dt_ghichu'    => 'Nhóm lao động làm việc trong các cơ quan nhà nước'
        ];
        $list[]=
        [
            'dt_ma'    => '2',
            'dt_ten'    => 'HN',
            'dt_ghichu'    => 'Người thuộc hộ gia đình nghèo'
        ];
        $list[]=
        [
            'dt_ma'    => '3',
            'dt_ten'    => 'XD',
            'dt_ghichu'    => 'Người đang sinh sống tại xã đảo huyện đảo'
        ];
        $list[]=
        [
            'dt_ma'    => '4',
            'dt_ten'    => 'SV',
            'dt_ghichu'    => 'Sinh viên đang theo học tại các cơ sở giáo dục và đào tạo'
        ];
        $list[]=
        [
            'dt_ma'    => '5',
            'dt_ten'    => 'GD',
            'dt_ghichu'    => 'Nhóm hộ gia đình'
        ];
        $list[]=
        [
            'dt_ma'    => '6',
            'dt_ten'    => 'TE',
            'dt_ghichu'    => 'Nhóm trẻ em'
        ];
        $list[]=
        [
            'dt_ma'    => '7',
            'dt_ten'    => 'HS',
            'dt_ghichu'    => 'Nhóm học sinh'
        ];
        
        DB::table('doituong')->insert($list);
    }
}
