<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietnhanvienphongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhanvienphong', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            // $table->increments('ctnv_id');
            $table->unsignedInteger('nv_ma');
            $table->unsignedInteger('p_ma');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc')->nullable();
            $table->timestamps();

            $table->primary(['nv_ma','p_ma']);
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('p_ma')->references('p_ma')->on('phong')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietnhanvienphong');
    }
}
