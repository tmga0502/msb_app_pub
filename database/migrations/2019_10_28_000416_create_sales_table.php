<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_information_id');//foreignKye
            $table->integer('brokerage_fee')->default(0);//仲手
            $table->integer('advertising_fee')->default(0);//AD
            $table->integer('discount')->default(0);//割引
            $table->date('bf_payment_schedule')->nullable()->default(null);//仲手入金予定年
            $table->integer('bf_payment_check')->default(0);//仲手入金チェック
            $table->integer('bf_payment_amount')->default(0);//仲手入金額
            $table->date('bf_payment')->nullable()->default(null);//仲手入金
            $table->date('ad_payment_schedule')->nullable()->default(null);//AD入金予定
            $table->integer('ad_payment_check')->default(0);//AD入金チェック
            $table->integer('ad_payment_amount')->default(0);//AD入金額
            $table->date('ad_payment')->nullable()->default(null);//AD入金
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
        Schema::dropIfExists('sales');
    }
}
