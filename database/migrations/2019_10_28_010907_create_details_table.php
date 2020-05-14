<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_information_id');//foreignKye
            $table->integer('sex')->length(2)->default(0);//性別
            $table->date('birthday')->nullable()->default(null);//誕生日
            $table->integer('age')->default(0);//年齢
            $table->string('born', 100)->default('');//出身
            $table->integer('partner')->default(0);//パートナー有無
            $table->integer('child')->default(0);//子供有無
            $table->string('partner_name', 50)->default('');//パートナー名
            $table->date('partner_birthday')->nullable()->default(null);//パートナー誕生日
            $table->string('child1_name', 50)->default('');//子供１名前
            $table->date('child1_birthday')->nullable()->default(null);//子供１誕生日
            $table->string('child2_name', 50)->default('');//子供２名前
            $table->date('child2_birthday')->nullable()->default(null);//子供２誕生日
            $table->string('relation', 50)->default('');//関係性
            $table->string('encount', 191)->default('');//出会い
            $table->string('hope', 191)->default('');//結家に期待していること
            $table->string('job', 191)->default('');//仕事
            $table->string('position', 50)->default('');//役職
            $table->string('hoby', 191)->default('');//趣味
            $table->string('dream', 191)->default('');//夢
            $table->string('other', 191)->default('');//その他
            $table->timestamps();

            $table
              ->foreign('customer_information_id')
              ->references('id')
              ->on('customer_information')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
