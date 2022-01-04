<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class buoi extends Seeder
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
            'buoi_ma'    => '1',
            'buoi_ten'    => 'Sáng'
            
        ];
        $list[]=
        [
            'buoi_ma'    => '2',
            'buoi_ten'    => 'Chiều'
            
        ];
        DB::table('buoi')->insert($list);
    }
}
