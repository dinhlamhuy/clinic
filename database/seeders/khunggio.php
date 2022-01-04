<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class khunggio extends Seeder
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
            'kg_ma'    => '1',
            'kg_khunggio'    => '7:00-8:00',
            'buoi_ma'   =>  '1'
            
        ];
        $list[]=
        [
            'kg_ma'    => '2',
            'kg_khunggio'    => '8:00-9:00',
            'buoi_ma'   =>  '1'
            
        ];
        $list[]=
        [
            'kg_ma'    => '3',
            'kg_khunggio'    => '9:00-10:00',
            'buoi_ma'   =>  '1'
           
        ];
        $list[]=
        [
            'kg_ma'    => '4',
            'kg_khunggio'    => '10:00-11:00',
            'buoi_ma'   =>  '1'
           
        ];
        $list[]=
        [
            'kg_ma'    => '5',
            'kg_khunggio'    => '13:00-14:00',
            'buoi_ma'   =>  '2'
            
        ];
        $list[]=
        [
            'kg_ma'    => '6',
            'kg_khunggio'    => '14:00-15:00',
            'buoi_ma'   =>  '2'
           
        ];
        $list[]=
        [
            'kg_ma'    => '7',
            'kg_khunggio'    => '15:00-16:00',
            'buoi_ma'   =>  '2'
           
        ];
        $list[]=
        [
            'kg_ma'    => '8',
            'kg_khunggio'    => '16:00-17:00',
            'buoi_ma'   =>  '2'
           
        ];
        DB::table('khunggio')->insert($list);
    }
}
