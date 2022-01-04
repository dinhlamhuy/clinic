<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class chitietnhanvienphong extends Seeder
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
            'nv_ma'    => '1',
            'p_ma'    => '1',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '2',
            'p_ma'    => '2',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '3',
            'p_ma'    => '3',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '4',
            'p_ma'    => '4',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '5',
            'p_ma'    => '5',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '6',
            'p_ma'    => '6',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '7',
            'p_ma'    => '7',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '8',
            'p_ma'    => '8',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '9',
            'p_ma'    => '9',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '10',
            'p_ma'    => '10',
            'ngaybatdau'    => '2021-10-10',
            // 'ngayketthuc'    => NULL
            
        ];
        DB::table('chitietnhanvienphong')->insert($list);
    }
}
