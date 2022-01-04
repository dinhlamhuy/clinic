<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cachsudung extends Seeder
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
            'csd_ma'    => '1',
            'csd_ten'    => 'Uống'
        ];
        $list[]=
        [
            'csd_ma'    => '2',
            'csd_ten'    => 'Ngậm'
        ];
        $list[]=
        [
            'csd_ma'    => '3',
            'csd_ten'    => 'Bôi ngoài da'
        ];
        $list[]=
        [
            'csd_ma'    => '4',
            'csd_ten'    => 'Tiêm'
        ];
        $list[]=
        [
            'csd_ma'    => '5',
            'csd_ten'    => 'Nhỏ mắt'
        ];
       
       
       
        DB::table('cachsudung')->insert($list);
    }
}
