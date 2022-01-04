<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class loaidonthuoc extends Seeder
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
            'ldt_ma'    => '1',
            'ldt_ten'    => 'Khám BHYT',
          
        ];
        $list[]=
        [
            'ldt_ma'    => '2',
            'ldt_ten'    => 'Khám dịch vụ',
           
        ];
       
        DB::table('loaidonthuoc')->insert($list);
    }
}
