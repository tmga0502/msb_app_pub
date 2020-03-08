<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('c_id' )->length(11)->nullable()->default(null);
            $table->string('l_name',50)->nullable()->default(null);
            $table->string('l_kana',50)->nullable()->default(null);
            $table->string('l_relation',50)->nullable()->default(null);
            $table->date('l_birthday')->nullable()->default(null);
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
        Schema::dropIfExists('livings');
    }
}
