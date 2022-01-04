<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class lonhapthuoc extends Seeder
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
            'lnt_ma'    => '1',
            'lnt_ten'    => 'Lô hàng số 1',
            'lnt_ghichu'    => '',
            'ncc_ma'    => '1',
            'created_at' => '2021-11-01'
        ];

        // $list[]=
        // [
        //     'lnt_ma'    => '2',
        //     'lnt_ten'    => 'Lô hàng số 2',
        //     'lnt_ghichu'    => '',
        //     'ncc_ma'    => '2',
        //     'created_at' => '2021-11-05'
        // ];

        // $list[]=
        // [
        //     'lnt_ma'    => '3',
        //     'lnt_ten'    => 'Lô hàng số 3',
        //     'lnt_ghichu'    => '',
        //     'ncc_ma'    => '3',
        //     'created_at' => '2021-11-07'
        // ];
        DB::table('lonhapthuoc')->insert($list);

    }
}
