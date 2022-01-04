<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhunggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khunggio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('kg_ma');
            $table->string('kg_khunggio',50);
            $table->unsignedInteger('buoi_ma');
            $table->timestamps();

            $table->foreign('buoi_ma')->references('buoi_ma')->on('buoi')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khunggio');
    }
}
