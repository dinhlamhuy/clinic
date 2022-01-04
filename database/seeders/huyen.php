<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class huyen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        // Thành phố Cần Thơ idtp=1
        $list[]=
        [
            'h_ma'    => '1',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Ninh Kiều'
        ];
        $list[]=[
            'h_ma'    => '2',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Ô Môn'
        ];
        $list[]=[
            'h_ma'    => '3',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Bình Thủy'
        ];
        $list[]=[
            'h_ma'    => '4',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Cái Răng'
        ];
        $list[]=[
            'h_ma'    => '5',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Thốt Nốt'
        ];$list[]=[
            'h_ma'    => '6',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Cờ Đỏ'
        ];
        $list[]=[
            'h_ma'    => '7',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Phong Điền'
        ];
        $list[]=[
            'h_ma'    => '8',
            'tp_ma'    => '1',
            'h_ten'    => 'Quận Thới Lai'
        ];
        // Thành phố Hậu Giang idtp=2
        $list[]=
        [
            'h_ma'    => '9',
            'tp_ma'    => '2',
            'h_ten'    => 'TP Vị Thanh'
        ];
        $list[]=
        [
            'h_ma'    => '10',
            'tp_ma'    => '2',
            'h_ten'    => 'TP Ngã Bảy'
        ];
        $list[]=
        [
            'h_ma'    => '11',
            'tp_ma'    => '2',
            'h_ten'    => 'Huyện Châu Thành A'
        ];
        $list[]=
        [
            'h_ma'    => '12',
            'tp_ma'    => '2',
            'h_ten'    => 'Huyện Châu Thành'
        ];
        $list[]=
        [
            'h_ma'    => '13',
            'tp_ma'    => '2',
            'h_ten'    => 'Huyện Phụng Hiệp'
        ];
        $list[]=
        [
            'h_ma'    => '14',
            'tp_ma'    => '2',
            'h_ten'    => 'Huyện Vị Thủy'
        ];
        $list[]=
        [
            'h_ma'    => '15',
            'tp_ma'    => '2',
            'h_ten'    => 'Huyện Long Mỹ'
        ];
        // Thành phố Sóc Trăng idtp=3
        $list[]=
        [
            'h_ma'    => '16',
            'tp_ma'    => '3',
            'h_ten'    => 'TP Sóc Trăng'
        ];
        $list[]=
        [
            'h_ma'    => '17',
            'tp_ma'    => '3',
            'h_ten'    => 'Huyện Châu Thành'
        ];
        $list[]=
        [
            'h_ma'    => '18',
            'tp_ma'    => '3',
            'h_ten'    => 'Huyện Kế Sách'
        ];
        $list[]=
        [
            'h_ma'    => '19',
            'tp_ma'    => '3',
            'h_ten'    => 'Huyện Mỹ Tú'
        ];
        $list[]=
        [
            'h_ma'    => '20',
            'tp_ma'    => '3',
            'h_ten'    => 'Huyện Cù Lao Dung'
        ];
        $list[]=
        [
            'h_ma'    => '21',
            'tp_ma'    => '3',
            'h_ten'    => 'Huyện Long Phú'
        ];
    DB::table('huyen')->insert($list);
    }
}
