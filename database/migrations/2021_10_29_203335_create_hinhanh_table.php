<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->increments('ha_id');
            $table->unsignedInteger('pcd_ma');
            $table->unsignedInteger('cls_ma');
            $table->string('ha_ten')->nullable();
            $table->timestamps();
            $table->foreign(['pcd_ma','cls_ma'])->references(['pcd_ma','cls_ma'])->on('chitietchidinh')->onDelete('CASCADE')->onUpdate('CASCADE');
            // $table->foreign('cls_ma')->references('cls_ma')->on('chitietchidinh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanh');
    }
}
