<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class dantoc extends Seeder
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
            'dtoc_ma'    => '1',
            'dtoc_ten'    => 'Kinh'
        ];
        $list[]=
        [
            'dtoc_ma'    => '2',
            'dtoc_ten'    => 'Hoa'
        ];
        $list[]=
        [
            'dtoc_ma'    => '3',
            'dtoc_ten'    => 'Khmer'
        ];
        $list[]=
        [
            'dtoc_ma'    => '4',
            'dtoc_ten'    => 'Chăm'
        ];
        
        DB::table('dantoc')->insert($list);
    }
}
