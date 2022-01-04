<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trangthaidonthuoc extends Seeder
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
            'ttdt_ma'    => '1',
            'ttdt_ten'    => 'Chưa hoàn thành'
        ];
        $list[]=
        [
            'ttdt_ma'    => '2',
            'ttdt_ten'    => 'Đã hoàn thành'
        ];
       
       
        DB::table('trangthaidonthuoc')->insert($list);
    }
}
