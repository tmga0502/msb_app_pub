<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pms_id');//foreignKye
            $table->string('corporate_name', 255);//会社名
            $table->string('owner_name', 50);//オーナー名
            $table->unsignedInteger('first_code')->default(0);//郵便番号1
            $table->unsignedInteger('last_code')->default(0);//郵便番号2
            $table->string('prefecture', 10)->default('');//住所１(都道府県)
            $table->string('city', 20)->default('');//市区町村
            $table->string('address')->default('');//以降の住所
            $table->string('tel', 20);//電話番号
            $table->string('phone', 20);//携帯番号
            $table->string('bank', 50)->default('');//銀行名
            $table->string('bank_branch', 50)->default('');//支店名
            $table->integer('bank_type')->length(1)->default(0);//種別
            $table->integer('bank_number')->length(10)->default(0);//口座番号
            $table->string('pay_name', 50)->default('');//振込名義
            $table->timestamps();

            $table
              ->foreign('pms_id')
              ->references('id')
              ->on('pms')
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
        Schema::dropIfExists('owners');
    }
}
