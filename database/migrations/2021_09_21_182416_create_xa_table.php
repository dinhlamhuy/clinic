<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('x_ma');
            $table->string('x_ten',50);
            $table->unsignedInteger('h_ma');
            $table->timestamps();

            $table->foreign('h_ma')->references('h_ma')->on('huyen')->onDelete('CASCADE')->onUpdate('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xa');
    }
}
