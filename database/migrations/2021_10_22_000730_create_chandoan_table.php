<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChandoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chandoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('b_ma');
            $table->unsignedInteger('dthuoc_ma');
            $table->timestamps();
            
            $table->primary(['b_ma','dthuoc_ma']);
            $table->foreign('b_ma')->references('b_ma')->on('benh')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dthuoc_ma')->references('dthuoc_ma')->on('donthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chandoan');
    }
}
