<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bank_number')->length(3);
            $table->integer('year')->length(4);
            $table->integer('month')->length(2);
            $table->integer('day')->length(2);
            $table->string('name', 50)->default('');
            $table->integer('price')->length(11);
            $table->string('nominal', 20)->default('');
            $table->string('person', 20)->default('');
            $table->string('service', 50)->default('');
            $table->string('remark', 255)->default('');
            $table->integer('check')->length(1)->default(0);
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
        Schema::dropIfExists('csvs');
    }
}
