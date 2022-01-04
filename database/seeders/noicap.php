<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class noicap extends Seeder
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
            'nc_ma' => '1',
            'nc_so' => '01',
            'nc_thanhpho' => 'Thành phố Hà Nội',

        ];
        $list[]=
        [
            'nc_ma' => '2',
            'nc_so' => '72',
            'nc_thanhpho' => 'Thành phố Hồ Chí Minh',

        ];
        $list[]=
        [
            'nc_ma' => '3',
            'nc_so' => '94',
            'nc_thanhpho' => 'Tỉnh Sóc Trăng',

        ];$list[]=
        [
            'nc_ma' => '4',
            'nc_so' => '92',
            'nc_thanhpho' => 'Thành phố Cần Thơ',

        ];$list[]=
        [
            'nc_ma' => '5',
            'nc_so' => '95',
            'nc_thanhpho' => 'Tỉnh Bạc Liêu',

        ];$list[]=
        [
            'nc_ma' => '6',
            'nc_so' => '83',
            'nc_thanhpho' => 'Tỉnh bến tre',

        ];$list[]=
        [
            'nc_ma' => '7',
            'nc_so' => '96',
            'nc_thanhpho' => 'Tỉnh Cà Mau',

        ];$list[]=
        [
            'nc_ma' => '8',
            'nc_so' => '93',
            'nc_thanhpho' => 'Tỉnh Hậu Giang',

        ];$list[]=
        [
            'nc_ma' => '10',
            'nc_so' => '87',
            'nc_thanhpho' => 'Tỉnh Đồng Tháp',
        ];
        
       
        
        DB::table('noicap')->insert($list);
    }
}
