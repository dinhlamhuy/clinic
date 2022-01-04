<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class quoctich extends Seeder
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
            'qt_ma'    => '1',
            'qt_ten'    => 'Việt Nam'
        ];
        $list[]=
        [
            'qt_ma'    => '2',
            'qt_ten'    => 'Mỹ'
        ];
        $list[]=
        [
            'qt_ma'    => '3',
            'qt_ten'    => 'Pháp'
        ];
        $list[]=
        [
            'qt_ma'    => '4',
            'qt_ten'    => 'Anh'
        ];
        DB::table('quoctich')->insert($list);
    }
}
