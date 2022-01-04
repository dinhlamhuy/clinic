<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class phanloai extends Seeder
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
            'pl_ma'    => '1',
            'pl_ten'    => 'BHYT'
        ];
        $list[]=
        [
            'pl_ma'    => '2',
            'pl_ten'    => 'Dịch vụ'
        ];
        DB::table('phanloai')->insert($list);

    }
}
