<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class donvitinhthuoc extends Seeder
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
            'dvtt_ma'    => '1',
            'dvtt_ten'    => 'Viên'
        ];
        $list[]=
        [
            'dvtt_ma'    => '2',
            'dvtt_ten'    => 'Ống'
        ];
        $list[]=
        [
            'dvtt_ma'    => '3',
            'dvtt_ten'    => 'Bơm tiêm'
        ];
        $list[]=
        [
            'dvtt_ma'    => '4',
            'dvtt_ten'    => 'Lọ'
        ];
       
        $list[]=
        [
            'dvtt_ma'    => '5',
            'dvtt_ten'    => 'Tube'
        ];
        $list[]=
        [
            'dvtt_ma'    => '6',
            'dvtt_ten'    => 'Chai'
        ];
       
        $list[]=
        [
            'dvtt_ma'    => '7',
            'dvtt_ten'    => 'Gói'
        ];
       
       
       
        DB::table('donvitinhthuoc')->insert($list);
    }
}
