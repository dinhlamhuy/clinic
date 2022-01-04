<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrieuchungbenhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trieuchungbenh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('tcb_ma');
            // $table->unsignedInteger('b_ma');
            $table->string('tcb_ten',100);
            $table->timestamps();

            // $table->foreign('b_ma')->references('b_ma')->on('benh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trieuchungbenh');
    }
}
