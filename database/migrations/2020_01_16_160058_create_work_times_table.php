<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');//ユーザーID
            $table->date('date')->nullable()->default(null);//日付
            $table->time('start')->nullable()->default(null);//始業時刻
            $table->time('end')->nullable()->default(null);//終業時刻
            $table->time('break')->nullable()->default(null);//休憩
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
        Schema::dropIfExists('work_times');
    }
}
