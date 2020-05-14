<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDividendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dividends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('com_id')->length(11)->nullable()->default(null);;
            $table->string('d_name', 20)->nullable()->default(null);
            $table->integer('d_percent')->length(3)->nullable()->default(null);;
            $table->integer('d_price')->length(11)->nullable()->default(null);;
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
        Schema::dropIfExists('dividends');
    }
}
