<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class trangthailichhen extends Seeder
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
            'ttlh_ma'    => '1',
            'ttlh_ten'    => 'Chưa xác nhận'
        ];
        $list[]=
        [
            'ttlh_ma'    => '2',
            'ttlh_ten'    => 'Đã xác nhận'
        ];
        $list[]=
        [
            'ttlh_ma'    => '3',
            'ttlh_ten'    => 'Hoàn thành'
        ];
        DB::table('trangthailichhen')->insert($list);
    }
}
