<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 20);
            $table->integer('period')->length(3);
            $table->json('R_rent_my')->nullable()->default(null);
            $table->json('R_rent_int')->nullable()->default(null);
            $table->json('R_rent_out')->nullable()->default(null);
            $table->json('R_rent_salesInt')->nullable()->default(null);
            $table->json('R_rent_salesInt_com')->nullable()->default(null);
            $table->json('R_trade_my')->nullable()->default(null);
            $table->json('R_trade_int')->nullable()->default(null);
            $table->json('R_trade_out')->nullable()->default(null);
            $table->json('R_trade_salesInt')->nullable()->default(null);
            $table->json('R_trade_salesInt_com')->nullable()->default(null);
            $table->json('R_other1')->nullable()->default(null);
            $table->string('R_other1_remark', 191)->nullable()->default(null);
            $table->json('R_other2')->nullable()->default(null);
            $table->string('R_other2_remark', 191)->nullable()->default(null);
            $table->json('R_other3')->nullable()->default(null);
            $table->string('R_other3_remark', 191)->nullable()->default(null);
            $table->json('R_manage')->nullable()->default(null);
            $table->json('S_rent_my')->nullable()->default(null);
            $table->json('S_rent_int')->nullable()->default(null);
            $table->json('S_rent_out')->nullable()->default(null);
            $table->json('S_rent_salesInt')->nullable()->default(null);
            $table->json('S_rent_salesInt_com')->nullable()->default(null);
            $table->json('S_trade_my')->nullable()->default(null);
            $table->json('S_trade_int')->nullable()->default(null);
            $table->json('S_trade_out')->nullable()->default(null);
            $table->json('S_trade_salesInt')->nullable()->default(null);
            $table->json('S_trade_salesInt_com')->nullable()->default(null);
            $table->json('S_other1')->nullable()->default(null);
            $table->string('S_other1_remark', 191)->nullable()->default(null);
            $table->json('S_other2')->nullable()->default(null);
            $table->string('S_other2_remark', 191)->nullable()->default(null);
            $table->json('S_other3')->nullable()->default(null);
            $table->string('S_other3_remark', 191)->nullable()->default(null);
            $table->json('S_manage')->nullable()->default(null);
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
        Schema::dropIfExists('budgets');
    }
}
