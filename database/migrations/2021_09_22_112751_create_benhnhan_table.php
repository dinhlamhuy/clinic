<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenhnhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benhnhan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('bn_ma');
            $table->string('bn_ten',50);
            $table->string('bn_gioitinh',4);
            $table->string('bn_sdt',10)->nullable();
            $table->string('bn_ngaysinh',30)->nullable();
            $table->string('bn_diachi',255)->nullable();
            $table->string('bn_cmnd',12)->nullable()->nullable();
            $table->string('bn_email',50)->nullable();
            $table->string('bn_matkhau',255);
            $table->unsignedInteger('qt_ma');
            $table->unsignedInteger('nn_ma')->nullable();
            $table->unsignedInteger('dtoc_ma');
            $table->unsignedInteger('x_ma');
            $table->timestamps();

            $table->foreign('qt_ma')->references('qt_ma')->on('quoctich')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nn_ma')->references('nn_ma')->on('nghenghiep')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dtoc_ma')->references('dtoc_ma')->on('dantoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('x_ma')->references('x_ma')->on('xa')->onDelete('CASCADE')->onUpdate('CASCADE');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benhnhan');
    }
}
