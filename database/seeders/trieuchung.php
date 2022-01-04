<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trieuchung extends Seeder
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
            'tc_ma'    => '1',
            'tc_ten'    => 'Sốt'
        ];
        $list[]=
        [
            'tc_ma'    => '2',
            'tc_ten'    => 'Đau họng'
        ];
        $list[]=
        [
            'tc_ma'    => '3',
            'tc_ten'    => 'Cảm cúm'
        
        ];
        $list[]=
        [
            'tc_ma'    => '4',
            'tc_ten'    => 'Tai'
        
        ];
        $list[]=
        [
            'tc_ma'    => '5',
            'tc_ten'    => 'Da liễu'
        
        ];
        DB::table('trieuchung')->insert($list);
    }
}
