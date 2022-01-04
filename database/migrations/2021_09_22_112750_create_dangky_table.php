<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangky', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('dk_ma');
            $table->string('dk_hotennd','50')->nullable();
            $table->string('dk_sdtnd',10)->nullable();
            $table->string('dk_emailnd',50)->nullable();
            $table->string('dk_hoten',50);
            $table->string('dk_diachi',255);
            $table->string('dk_gioitinh',4);
            $table->date('dk_ngaysinh');
            $table->string('dk_sdt',10);
            $table->string('dk_email',50)->nullable();
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
        Schema::dropIfExists('dangky');
    }
}
