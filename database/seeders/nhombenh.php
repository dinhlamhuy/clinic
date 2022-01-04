<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nhombenh extends Seeder
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
            'nb_ma'    => '1',
            'nb_ten'    => 'Tai-mũi-họng'
        ];
        $list[]=
        [
            'nb_ma'    => '2',
            'nb_ten'    => 'Da liễu'
        ];
        $list[]=
        [
            'nb_ma'    => '3',
            'nb_ten'    => 'Mắt'
        ];

        $list[]=
        [
            'nb_ma'    => '4',
            'nb_ten'    => 'Dạ dày'
        ];

        $list[]=
        [
            'nb_ma'    => '5',
            'nb_ten'    => 'Đau đầu'
        ];
        DB::table('nhombenh')->insert($list);
    }
}
