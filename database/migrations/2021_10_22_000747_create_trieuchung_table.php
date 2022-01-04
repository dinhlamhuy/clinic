<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrieuchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trieuchung', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dthuoc_ma');
            $table->unsignedInteger('tcb_ma');
            $table->timestamps();
            
            $table->primary(['dthuoc_ma','tcb_ma']);
            $table->foreign('dthuoc_ma')->references('dthuoc_ma')->on('donthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tcb_ma')->references('tcb_ma')->on('trieuchungbenh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trieuchung');
    }
}
