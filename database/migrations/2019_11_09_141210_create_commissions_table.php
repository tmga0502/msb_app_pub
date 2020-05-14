<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('csv_id')->nullable()->default(null);//foreignKye
            $table->string('user_id', 50)->nullable()->default(null);
            $table->string('customer_name', 255)->nullable()->default(null);
            $table->string('seller_name', 255)->nullable()->default(null);
            $table->string('apartment_name', 255)->nullable()->default(null);
            $table->string('room', 20)->nullable()->default(null);
            $table->string('company', 50)->nullable()->default(null);
            $table->string('partner', 50)->nullable()->default(null);
            $table->integer('brokerage_fee')->length(11)->nullable()->default(null);
            $table->date('b_fee_date')->nullable()->default(null);
            $table->integer('advertising_fee')->length(11)->nullable()->default(null);
            $table->date('ad_date')->nullable()->default(null);
            $table->integer('am_pm_fee')->length(11)->nullable()->default(null);
            $table->date('am_pm_fee_date')->nullable()->default(null);
            $table->integer('outsourcing_fee')->length(11)->nullable()->default(null);
            $table->date('o_fee_date')->nullable()->default(null);
            $table->integer('outsource')->length(11)->nullable()->default(null);
            $table->integer('ledger')->length(1)->nullable()->default(null);
            $table->string('service', 50)->nullable()->default(null);
            $table->integer('rate')->length(1)->nullable()->default(null);
            $table->integer('maxRate')->length(3)->nullable()->default(null);
            $table->json('receiver_percent')->nullable()->default(null);
            $table->timestamps();

            $table
              ->foreign('csv_id')
              ->references('id')
              ->on('csvs')
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
        Schema::dropIfExists('commissions');
    }
}
