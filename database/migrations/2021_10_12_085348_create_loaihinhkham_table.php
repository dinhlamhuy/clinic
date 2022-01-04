<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaihinhkhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaihinhkham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('lhk_ma');
            $table->string('lhk_ten',50);
            $table->integer('lhk_giatien');
            $table->integer('lhk_giachenhlech');
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
        Schema::dropIfExists('loaihinhkham');
    }
}
