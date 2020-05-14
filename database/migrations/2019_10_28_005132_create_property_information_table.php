<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_information_id');//foreignKye
            $table->string('apartment_name', 100)->default('');//物件名
            $table->string('room_number', 20)->default('');//部屋番号
            $table->unsignedInteger('first_code')->default(0);//郵便番号1
            $table->unsignedInteger('last_code')->default(0);//郵便番号2
            $table->string('prefecture', 10)->default('');//住所１(都道府県)
            $table->string('city', 20)->default('');//市区町村
            $table->string('address', 191)->default('');//以降の住所
            $table->string('real_estate_agent', 50)->default('');//管理会社
            $table->string('tel', 50)->default('');//管理会社tel
            $table->string('fax', 50)->default('');//管理会社fax
            $table->string('person_in_charge', 20)->default('');//担当者名
            $table->date('contract_start')->nullable()->default(null);//賃発
            $table->date('contract_end')->nullable()->default(null);//解約
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
        Schema::dropIfExists('property_information');
    }
}
