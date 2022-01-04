<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class othuba extends Seeder
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
            'otb_ma' => '1',
            'otb_so' => '01',
            'otb_ghichu' => 'Thành phố Hà Nội',

        ];
        $list[]=
        [
            'otb_ma' => '2',
            'otb_so' => '72',
            'otb_ghichu' => 'Thành phố Hồ Chí Minh',

        ];
        $list[]=
        [
            'otb_ma' => '3',
            'otb_so' => '94',
            'otb_ghichu' => 'Tỉnh Sóc Trăng',

        ];$list[]=
        [
            'otb_ma' => '4',
            'otb_so' => '92',
            'otb_ghichu' => 'Thành phố Cần Thơ',

        ];$list[]=
        [
            'otb_ma' => '5',
            'otb_so' => '95',
            'otb_ghichu' => 'Tỉnh Bạc Liêu',

        ];$list[]=
        [
            'otb_ma' => '6',
            'otb_so' => '83',
            'otb_ghichu' => 'Tỉnh bến tre',

        ];$list[]=
        [
            'otb_ma' => '7',
            'otb_so' => '96',
            'otb_ghichu' => 'Tỉnh Cà Mau',

        ];$list[]=
        [
            'otb_ma' => '8',
            'otb_so' => '93',
            'otb_ghichu' => 'Tỉnh Hậu Giang',

        ];$list[]=
        [
            'otb_ma' => '10',
            'otb_so' => '87',
            'otb_ghichu' => 'Tỉnh Đồng Tháp',
        ];
        
       
        
        DB::table('othuba')->insert($list);
    }
}
