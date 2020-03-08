<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');//ユーザーID
            $table->string('status', 20)->default('');//状況
            $table->date('introduce')->nullable()->default(null);//紹介された日
            $table->date('apply')->nullable()->default(null);//申込予定年
            $table->string('accuracy' ,10)->default('');//確度
            $table->string('reading', 50)->default('');//ふりがな
            $table->string('customer_name', 50)->default('');//お客様名
            $table->string('introducer', 10)->default('');//案件種別
            $table->string('introducer_name', 50)->default('');//紹介者名
            $table->string('introduction_type', 10)->default('');//紹介種別
            $table->string('progress')->default('');//進捗
            $table->string('remarks')->default('');//備考
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
        Schema::dropIfExists('customer_information');
    }
}
