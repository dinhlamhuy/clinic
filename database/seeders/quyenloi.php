<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class quyenloi extends Seeder
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
            'ql_ma'    => '1',
            'ql_so'    => '1',
            'ql_phantram'    => '100'
        ];
        $list[]=
        [
            'ql_ma'    => '2',
            'ql_so'    => '2',
            'ql_phantram'    => '95'
        ];
        $list[]=
        [
            'ql_ma'    => '3',
            'ql_so'    => '3',
            'ql_phantram'    => '80'
        ];
        $list[]=
        [
            'ql_ma'    => '4',
            'ql_so'    => '4',
            'ql_phantram'    => '100'
        ];
        $list[]=
        [
            'ql_ma'    => '5',
            'ql_so'    => '5',
            'ql_phantram'    => '100'
        ];
        
        DB::table('quyenloi')->insert($list);
    }
}
