<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuyenloiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyenloi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ql_ma');
            $table->tinyInteger('ql_so');
            $table->integer('ql_phantram');
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
        Schema::dropIfExists('quyenloi');
    }
}
