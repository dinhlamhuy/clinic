<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trangthaikham extends Seeder
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
            'ttk_ma'    => '1',
            'ttk_ten'    => 'Chưa thanh toán'
        ];
        $list[]=
        [
            'ttk_ma'    => '2',
            'ttk_ten'    => 'Chờ khám'
        ];
        $list[]=
        [
            'ttk_ma'    => '3',
            'ttk_ten'    => 'Khám thành công'
        ];
        DB::table('trangthaikham')->insert($list);

    }
}
