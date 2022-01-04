<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thanhpho extends Seeder
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
                'tp_ma'    => '1',
                'tp_ten'    => 'Cần Thơ'
            ];
            
            $list[]=[
                'tp_ma'    => '2',
                'tp_ten'    => 'Hậu Giang'
            ];
            $list[]=[
                'tp_ma'    => '3',
                'tp_ten'    => 'Sóc Trăng'
            ];
       
        DB::table('thanhpho')->insert($list);
    }
}
