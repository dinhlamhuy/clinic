<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('nv_ma');
            $table->string('nv_ten',50);
            $table->string('nv_tentaikhoan',50);
            $table->string('nv_hinhanh',255)->nullable();
            $table->string('nv_matkhau',255);
            $table->string('nv_gioitinh',4);
            $table->date('nv_ngaysinh');
            $table->string('nv_cmnd',12);
            $table->string('nv_sdt',13);
            $table->string('nv_email',50);
            $table->string('nv_diachi',255);
            $table->string('nv_trangthai',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
