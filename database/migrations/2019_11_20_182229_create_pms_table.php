<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owners_id');//foreignKye
            $table->string('property_name', 100);//物件名
            $table->string('room_number', 50);//号室
            $table->string('property_group', 191)->default(null);//物件名
            $table->integer('status');//状況
            $table->string('owner_name', 100);//オーナー名
            $table->float('pm_fee');//PMフィー
            $table->string('cycle', 50);//入金サイクル
            $table->string('transfer_date', 50);//振込日
            $table->string('tenant_name', 100);//入居者名
            $table->date('start_date');//入居日
            $table->date('end_date');//退去日
            $table->string('rent', 50);//賃料
            $table->string('cs_fee', 50);//共益費
            $table->string('deposit', 50);//敷金・預り金
            $table->string('person', 100);//担当
            $table->text('transfer_name');//備考・振り込み名義
            $table->timestamps();

            $table
              ->foreign('owners_id')
              ->references('id')
              ->on('owners')
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
        Schema::dropIfExists('pms');
    }
}
