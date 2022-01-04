<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class nghenghiep extends Seeder
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
            'nn_ma'    => '1',
            'nn_ten'    => ''
        ];
        $list[]=
        [
            'nn_ma'    => '2',
            'nn_ten'    => 'Doanh nhân'
        ];
        $list[]=
        [
            'nn_ma'    => '3',
            'nn_ten'    => 'Sinh viên'
        ];
        $list[]=
        [
            'nn_ma'    => '4',
            'nn_ten'    => 'Nghệ sĩ'
        ];
        $list[]=
        [
            'nn_ma'    => '5',
            'nn_ten'    => 'Giáo viên'
        ];
        $list[]=
        [
            'nn_ma'    => '6',
            'nn_ten'    => 'Nông dân'
        ];
        $list[]=
        [
            'nn_ma'    => '7',
            'nn_ten'    => 'Nội trợ'
        ];
        
        $list[]=
        [
            'nn_ma'    => '8',
            'nn_ten'    => 'Công nhân'
        ];
        DB::table('nghenghiep')->insert($list);
    }
}
