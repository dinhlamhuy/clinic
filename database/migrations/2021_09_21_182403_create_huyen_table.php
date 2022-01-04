<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('h_ma');
            $table->string('h_ten',50);
            $table->unsignedInteger('tp_ma');
            $table->timestamps();
            
            // $table->primary(['h_ma','tp_ma']);
            $table->foreign('tp_ma')->references('tp_ma')->on('thanhpho')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huyen');
    }
}
