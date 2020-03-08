<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_information_id');//foreignKye
            $table->integer('required_documents')->default(0);//必要書類
            $table->integer('contract_location')->default(0);//契約場所案内
            $table->integer('settlement')->default(0);//精算書送付
            $table->integer('life_line')->default(0);//ライフライン案内
            $table->integer('confirmation')->default(0);//契約金入金確認
            $table->integer('guarantor')->default(0);//保証人承諾書案内
            $table->integer('hand_ovre_kye')->default(0);//鍵渡し場所案内
            $table->integer('contract_procedures')->default(0);//契約手続き
            $table->integer('ADs_invoice')->default(0);//AD請求書送付
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
        Schema::dropIfExists('flows');
    }
}
