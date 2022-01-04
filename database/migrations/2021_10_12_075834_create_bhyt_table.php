<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBhytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bhyt', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dt_ma');
            $table->unsignedInteger('ql_ma');
            $table->unsignedInteger('nc_ma');
            $table->unsignedInteger('bn_ma');
            $table->string('bhyt_maso',10);
            $table->date('bhyt_ngaybatdau');
            $table->date('bhyt_ngayketthuc');
            // $table->tinyInteger('bhyt_trangthai');
            $table->timestamps();

            $table->primary(['dt_ma','ql_ma','nc_ma','bhyt_maso']);
            $table->foreign('dt_ma')->references('dt_ma')->on('doituong')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ql_ma')->references('ql_ma')->on('quyenloi')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nc_ma')->references('nc_ma')->on('noicap')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('bn_ma')->references('bn_ma')->on('benhnhan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bhyt');
    }
}
