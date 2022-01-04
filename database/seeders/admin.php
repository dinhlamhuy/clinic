<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $list[]=[
            'ad_ma' =>  '1',
            'ad_ten' =>  'Administrators',
            'ad_tentaikhoan' =>  'admin',
            'ad_matkhau' =>  md5('123456')
        ];
        DB::table('admin')->insert($list);

    }
}
