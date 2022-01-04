<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loaihinhkham extends Seeder
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
            'lhk_ma'    => '1',
            'lhk_ten'    => 'Khám BHYT',
            'lhk_giatien'    => '0',
            'lhk_giachenhlech'    => '30000'
        ];
        $list[]=
        [
            'lhk_ma'    => '2',
            'lhk_ten'    => 'Khám dịch vụ',
            'lhk_giatien'    => '40000',
            'lhk_giachenhlech'    => '30000'
        ];
       
        DB::table('loaihinhkham')->insert($list);
    }
}
