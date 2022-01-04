<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class othuhai extends Seeder
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
            'oth_ma'    => '1',
            'oth_so'    => '1',
            'oth_ghichu'    => 'Giảm 100% chi phí khám chữa bệnh'
        ];
        $list[]=
        [
            'oth_ma'    => '2',
            'oth_so'    => '2',
            'oth_ghichu'    => 'Giảm 95% chi phí khám chữa bệnh'
        ];
        $list[]=
        [
            'oth_ma'    => '3',
            'oth_so'    => '3',
            'oth_ghichu'    => 'Giảm 80% chi phí khám chữa bệnh'
        ];
        $list[]=
        [
            'oth_ma'    => '4',
            'oth_so'    => '4',
            'oth_ghichu'    => ''
        ];
        $list[]=
        [
            'oth_ma'    => '5',
            'oth_so'    => '5',
            'oth_ghichu'    => ''
        ];
        
        DB::table('othuhai')->insert($list);
    }
}
