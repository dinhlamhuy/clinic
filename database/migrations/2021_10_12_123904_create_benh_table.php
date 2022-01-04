<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('b_ma');
            $table->unsignedInteger('nb_ma');
            $table->string('b_ten',100);
            $table->timestamps();

            $table->foreign('nb_ma')->references('nb_ma')->on('nhombenh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benh');
    }
}
