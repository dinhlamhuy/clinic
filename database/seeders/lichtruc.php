<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class lichtruc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-j');


        $list = [];
        for($i=0;$i<=7;$i++ ){
            $newdate = strtotime ( '+'.$i.' day' , strtotime ( $date ) ) ;
            $newdate = date ( 'Y-m-j' , $newdate );
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '1',
                'nv_ma'    => '1'
            ];
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '2',
                'nv_ma'    => '5'
            ];
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '3',
                'nv_ma'    => '4'
            ];
    
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '4',
                'nv_ma'    => '2'
            ];
    
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '5',
                'nv_ma'    => '2'
            ];
    
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '6',
                'nv_ma'    => '2'
            ];
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '7',
                'nv_ma'    => '2'
            ];
            $list[]=
            [
                'lt_ngay'    => $newdate,
                'pk_ma'    => '8',
                'nv_ma'    => '2'
            ];
        }
        DB::table('lichtruc')->insert($list);
    }
}
