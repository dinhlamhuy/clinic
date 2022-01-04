<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nhomthuoc extends Seeder
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
            'nt_ma'    => '1',
            'nt_ten'    => 'Nhóm giảm đau, hạ sốt, chống viêm',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '2',
            'nt_ten'    => 'Nhóm dị ứng, mẫn cảm',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '3',
            'nt_ten'    => 'Nhóm ký sinh trùng, nhiễm khuẩn',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '4',
            'nt_ten'    => 'Nhóm tim mạch',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '5',
            'nt_ten'    => 'Nhóm da liễu',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '6',
            'nt_ten'    => 'Nhóm Mắt',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '7',
            'nt_ten'    => 'Nhóm Tai mũi họng',
            'nt_ghichu' =>  ''
        ];
        $list[]=
        [
            'nt_ma'    => '8',
            'nt_ten'    => 'Nhóm gây tê, gây mê, giãn cơ, giải giãn cơ',
            'nt_ghichu' =>  ''
        ];
        DB::table('nhomthuoc')->insert($list);
    }
}
