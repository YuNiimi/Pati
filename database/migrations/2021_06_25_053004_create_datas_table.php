<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('store_id');
            $table->string('slot_id');
            $table->string('daiban');
            $table->string('bb');
            $table->string('rb');
            $table->string('games');
            $table->date('date');
            $table->unique(['store_id', 'slot_id','daiban','date']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datas');
    }
}
