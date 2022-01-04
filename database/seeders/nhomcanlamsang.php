<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nhomcanlamsang extends Seeder
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
            'ncls_ma'    => '1',
            'ncls_ten'    => 'Xét nghiệm'
        ];
        $list[]=
        [
            'ncls_ma'    => '2',
            'ncls_ten'    => 'Siêu âm'
        ];
        $list[]=
        [
            'ncls_ma'    => '3',
            'ncls_ten'    => 'Nội soi'
        ];
        DB::table('nhomcanlamsang')->insert($list);
    }
}
