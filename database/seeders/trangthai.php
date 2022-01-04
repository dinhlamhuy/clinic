<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class trangthai extends Seeder
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
            'tthai_ma'    => '1',
            'tthai_ten'    => 'Chưa xác nhận'
        ];
        $list[]=
        [
            'tthai_ma'    => '2',
            'tthai_ten'    => 'Đã xác nhận'
        ];
        $list[]=
        [
            'tthai_ma'    => '3',
            'tthai_ten'    => 'Hoàn thành'
        ];
        DB::table('trangthai')->insert($list);
    }
}
