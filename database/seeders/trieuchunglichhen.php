<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trieuchunglichhen extends Seeder
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
            'tclh_ma'    => '1',
            'tclh_ten'    => 'Sốt'
        ];
        $list[]=
        [
            'tclh_ma'    => '2',
            'tclh_ten'    => 'Đau họng'
        ];
        $list[]=
        [
            'tclh_ma'    => '3',
            'tclh_ten'    => 'Cảm cúm'
        
        ];
        $list[]=
        [
            'tclh_ma'    => '4',
            'tclh_ten'    => 'Tai'
        
        ];
        $list[]=
        [
            'tclh_ma'    => '5',
            'tclh_ten'    => 'Da liễu'
        
        ];
        DB::table('trieuchunglichhen')->insert($list);
    }
}
