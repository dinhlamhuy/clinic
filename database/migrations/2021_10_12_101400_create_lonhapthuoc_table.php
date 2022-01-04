<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLonhapthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lonhapthuoc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('lnt_ma');
            $table->string('lnt_ten',50);
            $table->string('lnt_ghichu',255)->nullable();
            $table->unsignedInteger('ncc_ma');
            $table->timestamps();

            // $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lonhapthuoc');
    }
}
